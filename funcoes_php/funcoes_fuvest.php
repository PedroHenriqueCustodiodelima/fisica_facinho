<?php

session_start();
require_once('./conexao.php');

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$tabela_questoes = 'questoes'; 
$tabela_tentativas = 'tentativas_concursos';
$tabela_alternativas = 'alternativas_concurso';
$questoes_por_pagina = 1;
$pagina_atual = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
$pagina_atual = ($pagina_atual > 0) ? $pagina_atual : 1;
$offset = ($pagina_atual - 1) * $questoes_por_pagina;

// Consulta total de questões
$total_questoes_sql = "SELECT COUNT(*) AS total FROM $tabela_questoes WHERE concurso = 'FUVEST'";
$total_questoes_result = $conn->query($total_questoes_sql);
$total_questoes_row = $total_questoes_result->fetch_assoc();
$total_questoes = $total_questoes_row['total'];
$total_paginas = ceil($total_questoes / $questoes_por_pagina);

// Consulta das questões
$questao_sql = "SELECT id, enunciado, resolucao, foto_enunciado, materia, ano, concurso FROM $tabela_questoes WHERE concurso = 'FUVEST' LIMIT $questoes_por_pagina OFFSET $offset";
$questao_result = $conn->query($questao_sql);
$questoes_data = [];

if ($questao_result->num_rows > 0) {
    while ($questao = $questao_result->fetch_assoc()) {
        $questao_id = $questao['id'];
        $enunciado = $questao['enunciado'];
        $resolucao = $questao['resolucao'];
        $foto_enunciado = $questao['foto_enunciado'];
        $materia = $questao['materia']; 
        $ano = $questao['ano']; 
        $concurso = $questao['concurso'];

        $alternativas_sql = "SELECT id, texto FROM $tabela_alternativas WHERE id_questao = $questao_id";
        $alternativas_result = $conn->query($alternativas_sql);
        $questao_data = [
            'id' => $questao_id,
            'enunciado' => $enunciado,
            'resolucao' => $resolucao,
            'foto_enunciado' => $foto_enunciado,
            'materia' => $materia,  
            'ano' => $ano,          
            'concurso' => $concurso,
            'alternativas' => []
        ];

        while ($alternativa = $alternativas_result->fetch_assoc()) {
            $questao_data['alternativas'][] = $alternativa;
        }

        $questoes_data[] = $questao_data;
    }
}

// Tratamento de respostas
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'responder') {
    $id_usuario = $_SESSION['usuario_id'];
    $id_questao = intval($_POST['questao_id']);
    $id_alternativa = intval($_POST['alternativa_id']);
    $query = "SELECT correta FROM $tabela_alternativas WHERE id = ? AND id_questao = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $id_alternativa, $id_questao);
    $stmt->execute();
    $result = $stmt->get_result();
    $alternativa = $result->fetch_assoc();
    if ($alternativa) {
        $correta = $alternativa['correta'] == 1;
        $query_inserir = "INSERT INTO $tabela_tentativas (id_usuario, id_questao, id_alternativa, correta, data_tentativa) 
                          VALUES (?, ?, ?, ?, NOW())";
        $stmt_inserir = $conn->prepare($query_inserir);
        $stmt_inserir->bind_param("iiii", $id_usuario, $id_questao, $id_alternativa, $correta);

        if ($stmt_inserir->execute()) {
            echo json_encode([
                'status' => 'success',
                'correct' => $correta,
                'message' => $correta ? 'Resposta correta!' : 'Resposta incorreta!',
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Erro ao salvar a tentativa: ' . $stmt_inserir->error,
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Alternativa inválida ou questão não encontrada.',
        ]);
    }
    exit;
}

// Filtros
$enunciadoFiltro = isset($_GET['enunciado']) ? $_GET['enunciado'] : '';
$anoFiltro = isset($_GET['ano']) ? $_GET['ano'] : '';
$concursoFiltro = isset($_GET['concurso']) ? $_GET['concurso'] : '';
$dificuldadeFiltro = isset($_GET['dificuldade']) ? $_GET['dificuldade'] : '';

// Obter os anos únicos disponíveis no banco de dados
$anos_distinct_sql = "SELECT DISTINCT ano FROM $tabela_questoes WHERE concurso = 'FUVEST' ORDER BY ano ASC";
$anos_distinct_result = $conn->query($anos_distinct_sql);
$anos_distinct = [];
if ($anos_distinct_result->num_rows > 0) {
    while ($row = $anos_distinct_result->fetch_assoc()) {
        $anos_distinct[] = $row['ano'];
    }
}
// Obter as matérias únicas disponíveis no banco de dados
$materias_distinct_sql = "SELECT DISTINCT materia FROM $tabela_questoes WHERE concurso = 'FUVEST' ORDER BY materia ASC";
$materias_distinct_result = $conn->query($materias_distinct_sql);
$materias_distinct = [];
if ($materias_distinct_result->num_rows > 0) {
    while ($row = $materias_distinct_result->fetch_assoc()) {
        $materias_distinct[] = $row['materia'];
    }
}


// Contar questões de acordo com os filtros
$count_sql = "SELECT COUNT(*) AS total FROM $tabela_questoes WHERE concurso = 'FUVEST'";
$conditions = [];

if ($enunciadoFiltro) {
    $conditions[] = "enunciado LIKE '%" . $conn->real_escape_string($enunciadoFiltro) . "%'";
}
if ($anoFiltro) {
    $conditions[] = "ano = '" . $conn->real_escape_string($anoFiltro) . "'";
}
if ($concursoFiltro) {
    $conditions[] = "concurso = '" . $conn->real_escape_string($concursoFiltro) . "'";
}
if ($dificuldadeFiltro) {
    $conditions[] = "dificuldade = '" . $conn->real_escape_string($dificuldadeFiltro) . "'";
}

if (count($conditions) > 0) {
    $count_sql .= " AND " . implode(" AND ", $conditions);
}

$count_result = $conn->query($count_sql);
$total_questoes = $count_result->fetch_assoc()['total'];

$total_paginas = ceil($total_questoes / $questoes_por_pagina);

$questao_sql = "SELECT id, enunciado, resolucao, foto_enunciado, materia, ano, concurso FROM $tabela_questoes WHERE concurso = 'FUVEST'";
if (count($conditions) > 0) {
    $questao_sql .= " AND " . implode(" AND ", $conditions);
}
$questao_sql .= " LIMIT $questoes_por_pagina OFFSET $offset";
$questao_result = $conn->query($questao_sql);
$questoes_data = [];
while ($questao = $questao_result->fetch_assoc()) {
    $alternativas_sql = "SELECT id, texto FROM $tabela_alternativas WHERE id_questao = " . $questao['id'];
    $alternativas_result = $conn->query($alternativas_sql);
    
    $alternativas = [];
    while ($alternativa = $alternativas_result->fetch_assoc()) {
        $alternativas[] = $alternativa;
    }
    
    $questao['alternativas'] = $alternativas;
    $questoes_data[] = $questao;
}

?>
