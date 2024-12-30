<?php
session_start();
require_once 'conexao.php';

$data = json_decode(file_get_contents("php://input"), true);
$mensagem = $data['mensagem'];
$user_id = $_SESSION['usuario_id'];

if (!empty($mensagem)) {
    $query = $conn->prepare("INSERT INTO chat_suporte (user_id, mensagem, remetente, data_envio) VALUES (?, ?, 'user', NOW())");
    $query->bind_param("is", $user_id, $mensagem);
    $query->execute();
}
?>
