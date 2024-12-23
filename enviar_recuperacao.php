<?php
// Enviar link de recuperação
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Conectar ao banco de dados
    include 'conexao.php'; // Aqui você inclui a conexão com o banco

    // Verificar se o e-mail existe no banco de dados
    $sql = "SELECT id, nome FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // O e-mail existe, gerar o token
        $usuario = $result->fetch_assoc();
        $token = bin2hex(random_bytes(50)); // Gera um token aleatório

        // Armazenar o token na tabela de usuários
        $sql = "UPDATE usuarios SET token_recuperacao = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();

        // Gerar o link de recuperação de senha (dinâmico)
        $urlBase = ($_SERVER['SERVER_NAME'] === 'localhost') ? 'http://localhost/seuprojeto' : 'http://seusite.com';
        $link = $urlBase . "/recuperar_senha_form.php?token=" . $token;

        // Assunto e mensagem do e-mail
        $assunto = "Recuperação de Senha";
        $mensagem = "Clique no link para redefinir sua senha: " . $link;
        $cabecalhos = "From: no-reply@seusite.com\r\n";

        // Enviar o e-mail
        if (mail($email, $assunto, $mensagem, $cabecalhos)) {
            echo "Enviamos um e-mail com as instruções para redefinir sua senha.";
        } else {
            echo "Erro ao enviar e-mail.";
        }
    } else {
        echo "Este e-mail não está registrado.";
    }

    $conn->close();
}
?>
