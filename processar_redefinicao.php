<?php
// processar_redefinicao.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $token = $_POST['token'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    if ($senha != $confirmar_senha) {
        echo "As senhas não coincidem.";
        exit;
    }

    // Conectar ao banco de dados
    include 'conexao.php';

    // Verificar se o token é válido
    $sql = "SELECT id FROM usuarios WHERE id = ? AND token_recuperacao = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $id, $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Token válido, atualizar senha
        $nova_senha = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET senha = ?, token_recuperacao = NULL WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $nova_senha, $id);
        $stmt->execute();

        echo "Senha redefinida com sucesso!";
    } else {
        echo "Token inválido.";
    }

    $conn->close();
}
?>
