<?php
session_start();

// Inclui o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Verifica se o usuário está logado
if (isset($_SESSION['session_id'])) {
    // Obtém o ID da sessão do usuário
    $sessionId = $_SESSION['session_id'];
    
    // Atualiza a data de fim da sessão específica
    $stmt = $conn->prepare("UPDATE sessoes SET data_fim = NOW() WHERE id = ?");
    $stmt->bind_param("i", $sessionId);
    $stmt->execute();
    $stmt->close();

    // Limpa a sessão
    session_unset();
    session_destroy();
}

header("Location: login.php");
exit();
?>
