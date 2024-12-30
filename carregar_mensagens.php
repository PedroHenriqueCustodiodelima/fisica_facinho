<?php
session_start();
require_once 'conexao.php';

$user_id = $_SESSION['usuario_id'];
$query = $conn->prepare("SELECT mensagem, remetente FROM chat_suporte WHERE user_id = ? ORDER BY data_envio ASC");
$query->bind_param("i", $user_id);
$query->execute();
$result = $query->get_result();

$mensagens = [];
while ($row = $result->fetch_assoc()) {
    $mensagens[] = $row;
}

echo json_encode($mensagens);
?>
