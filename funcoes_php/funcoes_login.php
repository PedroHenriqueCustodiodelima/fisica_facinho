<?php
session_start();
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $senha = trim($_POST['password']);

    if (empty($email) || empty($senha)) {
        $_SESSION['loginErro'] = "Email e senha são obrigatórios.";
        header("Location: login.php");
        exit();
    }

    // Verifica na tabela `usuarios`
    $stmt = $conn->prepare("SELECT id, nome, senha FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($usuarioId, $nome, $senhaHash);
        $stmt->fetch();

        // Verifica a senha usando password_verify
        if (password_verify($senha, $senhaHash)) {
            // Gera o token e registra a sessão
            $token = bin2hex(random_bytes(16));
            $ipUsuario = $_SERVER['REMOTE_ADDR'];
            $navegador = $_SERVER['HTTP_USER_AGENT'];

            $stmt = $conn->prepare("INSERT INTO sessoes (id_usuario, token_sessao, data_inicio, ip_address, user_agent) VALUES (?, ?, NOW(), ?, ?)");
            $stmt->bind_param("isss", $usuarioId, $token, $ipUsuario, $navegador);
            $stmt->execute();
            $sessionId = $stmt->insert_id;
            $stmt->close();

            // Configura as variáveis de sessão
            $_SESSION['usuario_id'] = $usuarioId;
            $_SESSION['session_id'] = $sessionId;
            $_SESSION['nome'] = $nome;

            header("Location: inicio.php");
            exit();
        } else {
            $_SESSION['loginErro'] = "Senha inválida.";
            header("Location: login.php");
            exit();
        }
    }

    // Verifica na tabela `professores`
    $stmt = $conn->prepare("SELECT id, nome, senha FROM professores WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($usuarioId, $nome, $senhaHash);
        $stmt->fetch();

        // Verifica a senha usando password_verify
        if (password_verify($senha, $senhaHash)) {
            $token = bin2hex(random_bytes(16));
            $ipUsuario = $_SERVER['REMOTE_ADDR'];
            $navegador = $_SERVER['HTTP_USER_AGENT'];

            $stmt = $conn->prepare("INSERT INTO sessoes (id_usuario, token_sessao, data_inicio, ip_address, user_agent) VALUES (?, ?, NOW(), ?, ?)");
            $stmt->bind_param("isss", $usuarioId, $token, $ipUsuario, $navegador);
            $stmt->execute();
            $sessionId = $stmt->insert_id;
            $stmt->close();

            $_SESSION['usuario_id'] = $usuarioId;
            $_SESSION['session_id'] = $sessionId;
            $_SESSION['nome'] = $nome;

            header("Location: inicio.php");
            exit();
        } else {
            $_SESSION['loginErro'] = "Senha inválida.";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['loginErro'] = "Email ou senha inválidos.";
        header("Location: login.php");
        exit();
    }
}
?>
