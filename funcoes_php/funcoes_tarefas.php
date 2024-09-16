<?php
session_start();
require_once 'conexao.php';

// Verifica se o usuário está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

// Recupera o ID do usuário da sessão
$usuario_id = $_SESSION['usuario_id'];

// Função para registrar uma tentativa no banco de dados
function registrarTentativa($conn, $usuario_id, $questao_id, $alternativa_id, $nivel) {
    // Verifica se a alternativa está correta
    $stmt = $conn->prepare("SELECT correta FROM alternativas WHERE id = ?");
    $stmt->bind_param("i", $alternativa_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $alternativa = $result->fetch_assoc();

    // Verifica se a resposta está correta
    $correta = $alternativa['correta'] ? 1 : 0;

    // Insere a tentativa no banco de dados
    $stmt = $conn->prepare("
        INSERT INTO tentativas_usuarios (id_usuario, id_questao, id_alternativa, correta, nivel, data_tentativa) 
        VALUES (?, ?, ?, ?, ?, NOW())
    ");
    $stmt->bind_param("iiiis", $usuario_id, $questao_id, $alternativa_id, $correta, $nivel);

    if ($stmt->execute()) {
        return $correta; // Retorna se a tentativa foi correta ou não
    } else {
        return false; // Falha ao salvar a tentativa
    }
}

// Inicializa variáveis
$imagemPerfil = 'img/default-avatar.png';
$nomeUsuario = 'Usuário';

// Consulta para obter a foto e o nome do usuário
$stmt = $conn->prepare("SELECT foto, nome FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

if ($usuario) {
    $imagemPerfil = $usuario['foto'] ?? $imagemPerfil;
    $nomeUsuario = $usuario['nome'] ?? $nomeUsuario;
}

// Obtém o nível do filtro, se definido
$nivel = isset($_GET['nivel']) ? intval($_GET['nivel']) : 1;

// Define a tabela com base no nível
switch ($nivel) {
    case 1:
        $tabela = 'questoes_nivel1';
        break;
    case 2:
        $tabela = 'questoes_nivel2';
        break;
    case 3:
        $tabela = 'questoes_nivel3';
        break;
    default:
        $tabela = 'questoes_nivel1';
}

// Define o número de questões por página
$questoes_por_pagina = 3;

// Obtém o número da página atual
$pagina_atual = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
$pagina_atual = ($pagina_atual > 0) ? $pagina_atual : 1;

// Calcula o offset
$offset = ($pagina_atual - 1) * $questoes_por_pagina;

// Consulta para obter o número total de questões
$total_questoes_sql = "SELECT COUNT(*) AS total FROM $tabela";
$total_questoes_result = $conn->query($total_questoes_sql);
$total_questoes_row = $total_questoes_result->fetch_assoc();
$total_questoes = $total_questoes_row['total'];

// Consulta para obter as questões e suas alternativas para a página atual
$questao_sql = "SELECT id, enunciado, explicacao FROM $tabela LIMIT $offset, $questoes_por_pagina";
$questao_result = $conn->query($questao_sql);

$questoes_data = [];

if ($questao_result->num_rows > 0) {
    while ($questao = $questao_result->fetch_assoc()) {
        $questao_id = $questao['id'];
        $enunciado = $questao['enunciado'];
        $explicacao = $questao['explicacao'];

        // Consulta para pegar as alternativas de cada questão
        $alternativas_sql = "SELECT id, texto, correta FROM alternativas WHERE questao_id = $questao_id";
        $alternativas_result = $conn->query($alternativas_sql);

        $questao_data = [
            'id' => $questao_id,
            'enunciado' => $enunciado,
            'explicacao' => $explicacao,
            'alternativas' => []
        ];

        while ($alternativa = $alternativas_result->fetch_assoc()) {
            $questao_data['alternativas'][] = $alternativa;
        }

        $questoes_data[] = $questao_data;
    }
}

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário
    $questao_id = $_POST['questao_id'];
    $alternativa_id = $_POST['alternativa'];
    $nivel = $_POST['nivel'];  // Pega o nível da questão

    // Registra a tentativa
    $correta = registrarTentativa($conn, $usuario_id, $questao_id, $alternativa_id, $nivel);

    // Redireciona com uma animação baseada no sucesso da resposta
    if ($correta) {
        // Exibe animação de sucesso
        echo "<script>alert('Resposta correta!');</script>";
    } else {
        // Exibe animação de erro
        echo "<script>alert('Resposta incorreta!');</script>";
    }

    // Redireciona de volta à página de questões
    header("Location: tarefas.php?nivel={$nivel}&pagina={$pagina_atual}");
    exit();
}

// Fecha a conexão
$stmt->close();
$conn->close();

// Calcula o número total de páginas
$total_paginas = ceil($total_questoes / $questoes_por_pagina);

?>
