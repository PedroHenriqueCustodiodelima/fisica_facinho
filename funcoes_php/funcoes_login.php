<?php
session_start();

// Inclui o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifica as credenciais do usuário (exemplo simplificado)
    $stmt = $conn->prepare("SELECT id, nome FROM usuarios WHERE email = ? AND senha = ?");
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        // O usuário é válido
        $stmt->bind_result($usuarioId, $nome);
        $stmt->fetch();
        
        // Registra a nova sessão
        $token = bin2hex(random_bytes(16));
        $ipUsuario = $_SERVER['REMOTE_ADDR'];
        $navegador = $_SERVER['HTTP_USER_AGENT'];

        // Insere a nova sessão
        $stmt = $conn->prepare("INSERT INTO sessoes (id_usuario, token_sessao, data_inicio, ip_address, user_agent) VALUES (?, ?, NOW(), ?, ?)");
        $stmt->bind_param("isss", $usuarioId, $token, $ipUsuario, $navegador);
        $stmt->execute();
        $sessionId = $stmt->insert_id; // Obtém o ID da nova sessão
        $stmt->close();
        
        // Armazena o ID da sessão e o nome do usuário na variável de sessão
        $_SESSION['usuario_id'] = $usuarioId;
        $_SESSION['session_id'] = $sessionId;
        $_SESSION['nome'] = $nome; // Armazena o nome do usuário
        
        // Redireciona para a página inicial
        header("Location: inicio.php");
        exit();
    } else {
        // Credenciais inválidas
        $_SESSION['loginErro'] = "Email ou senha inválidos.";
    }
}
?>
