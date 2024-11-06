<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$questao_id = $_POST['questao_id'];
$alternativa_id = $_POST['alternativa'];
$nivel = $_POST['nivel'];

$stmt = $conn->prepare("SELECT correta FROM alternativas WHERE id = ?");
$stmt->bind_param("i", $alternativa_id);
$stmt->execute();
$result = $stmt->get_result();
$alternativa = $result->fetch_assoc();

$correta = $alternativa['correta']; // Aqui, espera-se que $correta seja 1 (certa) ou 0 (errada)

// Verifica se a resposta foi correta
$stmt = $conn->prepare("
    INSERT INTO tentativas_usuarios (id_usuario, id_questao, id_alternativa, correta, nivel, data_tentativa) 
    VALUES (?, ?, ?, ?, ?, NOW())
");
$stmt->bind_param("iiiis", $usuario_id, $questao_id, $alternativa_id, $correta, $nivel);
$stmt->execute();

$stmt->close();
$conn->close();

// Armazena a mensagem na sessão em vez de passar pela URL
$_SESSION['mensagem'] = $correta == 1 ? 'acertou' : 'errou';

// Redireciona para a página sem a mensagem na URL
header("Location: tarefas_n1.php?nivel={$nivel}&pagina={$_GET['pagina']}");
exit();
?>
