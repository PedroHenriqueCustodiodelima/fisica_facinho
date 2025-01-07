<?php
session_start();
require_once('./conexao.php');

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$imagemPerfil = '/img/default-avatar.png';
$nomeUsuario = 'Usuário';

// Buscar dados do usuário
$stmt = $conn->prepare("SELECT email FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$email = $result->fetch_assoc()['email'] ?? '';

if (strpos($email, 'edu.br') !== false) {
    $stmt = $conn->prepare("SELECT foto, nome FROM professores WHERE id = ?");
} else {
    $stmt = $conn->prepare("SELECT foto, nome FROM usuarios WHERE id = ?");
}

$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

if ($usuario) {
    $imagemPerfil = !empty($usuario['foto']) && file_exists($_SERVER['DOCUMENT_ROOT'] . '/img/' . $usuario['foto'])
        ? '/img/' . $usuario['foto']
        : '/img/default-avatar.png';
    $nomeUsuario = $usuario['nome'] ?? $nomeUsuario;
}

// Paginação
$tabela = 'tarefas'; 
$questoes_por_pagina = 1;

$pagina_atual = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
$pagina_atual = ($pagina_atual > 0) ? $pagina_atual : 1;

$offset = ($pagina_atual - 1) * $questoes_por_pagina;

// Total de questões
$total_questoes_sql = "SELECT COUNT(*) AS total FROM $tabela WHERE materia = 'grandezas'";
$total_questoes_result = $conn->query($total_questoes_sql);
$total_questoes_row = $total_questoes_result->fetch_assoc();
$total_questoes = $total_questoes_row['total'];

// Total de páginas
$total_paginas = ceil($total_questoes / $questoes_por_pagina);

// Buscar as questões com paginação
$questao_sql = "SELECT id, enunciado, resolucao, foto_enunciado, materia, ano, dificuldade FROM $tabela WHERE materia = 'grandezas' LIMIT $questoes_por_pagina OFFSET $offset";
$questao_result = $conn->query($questao_sql);

$questoes_data = [];

if ($questao_result->num_rows > 0) {
    while ($questao = $questao_result->fetch_assoc()) {
        $questao_id = $questao['id'];
        $enunciado = $questao['enunciado'];
        $resolucao = $questao['resolucao'];
        $foto_enunciado = $questao['foto_enunciado'];
        $materia = $questao['materia']; // Matéria da questão
        $ano = $questao['ano'];         // Ano da questão
        $dificuldade = $questao['dificuldade']; // Dificuldade da questão

        // Buscando as alternativas relacionadas à questão
        $alternativas_sql = "SELECT id, texto, correta FROM alternativas WHERE questao_id = $questao_id";
        $alternativas_result = $conn->query($alternativas_sql);

        $questao_data = [
            'id' => $questao_id,
            'enunciado' => $enunciado,
            'resolucao' => $resolucao,
            'foto_enunciado' => $foto_enunciado,
            'materia' => $materia,  // Adicionando a matéria
            'ano' => $ano,          // Adicionando o ano
            'dificuldade' => $dificuldade,  // Adicionando a dificuldade
            'alternativas' => []
        ];

        while ($alternativa = $alternativas_result->fetch_assoc()) {
            $questao_data['alternativas'][] = $alternativa;
        }

        $questoes_data[] = $questao_data;
    }
}

// Responder uma questão
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'responder') {
    $id_usuario = $usuario_id;
    $id_questao = intval($_POST['questao_id']);
    $id_alternativa = intval($_POST['alternativa_id']);
    
    // Verificar se a alternativa é correta
    $query = "SELECT correta FROM alternativas WHERE id = ? AND questao_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $id_alternativa, $id_questao);
    $stmt->execute();
    $result = $stmt->get_result();
    $alternativa = $result->fetch_assoc();

    if ($alternativa) {
        $correta = $alternativa['correta'] == 1;
        
        // Inserir tentativa no banco
        $query_inserir = "INSERT INTO tentativas_usuarios (id_usuario, id_questao, id_alternativa, correta, data_tentativa) 
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
include 'header.php';



?>