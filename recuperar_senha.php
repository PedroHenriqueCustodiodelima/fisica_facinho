<?php
// Incluindo o autoload do Composer para carregar as classes do PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Caminho para o autoload do PHPMailer

// Verifica se o formulário foi enviado
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

        // Função para enviar o e-mail usando o PHPMailer
        function enviarEmailRecuperacao($email, $nome, $token) {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com'; 
                $mail->SMTPAuth   = true;
                $mail->Username   = 'fisicafacinho@gmail.com';
                $mail->Password   = 'klwr ccgp eoia ustb'; // Use variáveis de ambiente para segurança
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;
                $mail->setFrom('fisicafacinho@gmail.com', 'Física Facinho');
                $mail->addAddress($email, $nome);

                $mail->isHTML(true);
                $mail->Subject = 'Recuperação de Senha - Física Facinho';
                $linkRecuperacao = "http://seusite.com/recuperar_senha_form.php?token=" . $token;
                $body = "
                    <html>
                        <head>
                            <title>Recuperação de Senha</title>
                        </head>
                        <body>
                            <h2>Recuperação de Senha - Física Facinho</h2>
                            <p>Olá, $nome!</p>
                            <p>Para redefinir sua senha, clique no link abaixo:</p>
                            <p><a href='$linkRecuperacao'>$linkRecuperacao</a></p>
                            <p>Se você não solicitou a recuperação de senha, ignore este e-mail.</p>
                        </body>
                    </html>
                ";
                $mail->Body = $body;

                // Enviar o e-mail
                $mail->send();
                echo "Enviamos um e-mail com as instruções para redefinir sua senha.";
            } catch (Exception $e) {
                echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
            }
        }

        // Enviar o e-mail de recuperação
        enviarEmailRecuperacao($email, $usuario['nome'], $token);
    } else {
        echo "Este e-mail não está registrado.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperação de Senha</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <header>
        <a href="portfolio.php">
            <img src="img/logo.png" alt="Logo">
        </a>
    </header>
    <main>
        <div class="login-form">
            <h2>Recuperação de Senha</h2>
            <form action="recuperar_senha.php" method="POST">
                <div class="input-group">
                    <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
                    <i class="fa-solid fa-envelope"></i>
                </div>

                <button class="login-button" type="submit">Recuperar Senha</button>
            </form>
            <p><a href="login.php">Voltar ao login</a></p>
        </div>
    </main>

    <!-- footer -->
    <footer>
        <p>IFRN CAMPUS NATAL CENTRAL</p>
    </footer>
</body>
</html>
