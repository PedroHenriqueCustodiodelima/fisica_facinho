<?php
include("conexao.php");

session_start();

$message = ''; 

// Define o fuso horário para São Paulo (horário de Brasília)
date_default_timezone_set('America/Sao_Paulo');

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['confirmar_senha'])) {

    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $confirmar_senha = trim($_POST['confirmar_senha']);

    if (strlen($nome) == 0) {
        $message = "Por favor, preencha o campo de nome.";
    } 
    else if (strlen($email) == 0) {
        $message = "Por favor, preencha o campo de email.";
    } 
    else if (strlen($senha) == 0) {
        $message = "Por favor, preencha o campo de senha.";
    } 
    else if ($senha !== $confirmar_senha) {
        $message = "As senhas não coincidem.";
    } 
    else {
        $email = $conn->real_escape_string($email);
        $senha = $conn->real_escape_string($senha);
        $nome = $conn->real_escape_string($nome);

        // Verifica se o e-mail já está registrado
        $sql_check = "SELECT * FROM usuarios WHERE email='$email'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows > 0) {
            $message = "O e-mail já está registrado. Por favor, use um e-mail diferente.";
        } else {
            // Insere o novo usuário na tabela com a senha em texto simples
            $data_criacao = date('Y-m-d H:i:s'); // Data e hora atual
            $sql_insert = "INSERT INTO usuarios (nome, email, senha, data_criacao) VALUES ('$nome', '$email', '$senha', '$data_criacao')";

            if ($conn->query($sql_insert) === TRUE) {
                // Recupera o ID do novo usuário
                $usuarioId = $conn->insert_id;
                
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
                $_SESSION['nome'] = $nome;

                // Redireciona para a página inicial
                header("Location: inicio.php");
                exit(); // Termina o script para evitar a execução adicional de código
            } else {
                $message = "Erro ao inserir os dados: " . $conn->error;
            }
        }
    }
}
?>