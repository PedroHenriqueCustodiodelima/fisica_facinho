<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];


$imagemPerfil = 'img/default-avatar.png';
$nomeUsuario = 'Usuário';

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
    $imagemPerfil = $usuario['foto'] ?? $imagemPerfil;
    $nomeUsuario = $usuario['nome'] ?? $nomeUsuario;
}

function registrarTentativa($conn, $usuario_id, $questao_id, $alternativa_id, $nivel) {

    $stmt = $conn->prepare("SELECT correta FROM alternativas WHERE id = ?");
    $stmt->bind_param("i", $alternativa_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $alternativa = $result->fetch_assoc();

    $correta = $alternativa['correta'] ? 1 : 0;

    $stmt = $conn->prepare("
        INSERT INTO tentativas_usuarios (id_usuario, id_questao, id_alternativa, correta, nivel, data_tentativa) 
        VALUES (?, ?, ?, ?, ?, NOW())
    ");
    $stmt->bind_param("iiiis", $usuario_id, $questao_id, $alternativa_id, $correta, $nivel);

    if ($stmt->execute()) {
        return $correta; 
    } else {
        return false; 
    }
}



$nivel = isset($_GET['nivel']) ? intval($_GET['nivel']) : 1;

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


$questoes_por_pagina = 3;


$pagina_atual = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
$pagina_atual = ($pagina_atual > 0) ? $pagina_atual : 1;

$offset = ($pagina_atual - 1) * $questoes_por_pagina;

$total_questoes_sql = "SELECT COUNT(*) AS total FROM $tabela";
$total_questoes_result = $conn->query($total_questoes_sql);
$total_questoes_row = $total_questoes_result->fetch_assoc();
$total_questoes = $total_questoes_row['total'];

$questao_sql = "SELECT id, enunciado, explicacao FROM $tabela LIMIT $offset, $questoes_por_pagina";
$questao_result = $conn->query($questao_sql);

$questoes_data = [];

if ($questao_result->num_rows > 0) {
    while ($questao = $questao_result->fetch_assoc()) {
        $questao_id = $questao['id'];
        $enunciado = $questao['enunciado'];
        $explicacao = $questao['explicacao'];
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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $questao_id = $_POST['questao_id'];
    $alternativa_id = $_POST['alternativa'];
    $nivel = $_POST['nivel'];  
    $correta = registrarTentativa($conn, $usuario_id, $questao_id, $alternativa_id, $nivel);

    if ($correta) {
  
        echo "<script>alert('Resposta correta!');</script>";
    } else {

        echo "<script>alert('Resposta incorreta!');</script>";
    }

    header("Location: tarefas.php?nivel={$nivel}&pagina={$pagina_atual}");
    exit();
}


$stmt->close();
$conn->close();


$total_paginas = ceil($total_questoes / $questoes_por_pagina);

?>
