<?php
session_start();
require_once 'conexao.php';

if (isset($_SESSION['session_id'])) {
    $sessionId = $_SESSION['session_id'];
    
    $stmt = $conn->prepare("UPDATE sessoes SET data_fim = NOW() WHERE id = ?");
    $stmt->bind_param("i", $sessionId);
    $stmt->execute();
    $stmt->close();

    session_unset();
    session_destroy();
}

header("Location: login.php");
exit();
?>
