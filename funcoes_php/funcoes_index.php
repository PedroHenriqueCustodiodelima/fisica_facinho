<?php
include("conexao.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php'; // Autoload do Composer

session_start();

$message = '';

date_default_timezone_set('America/Sao_Paulo');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = trim($_POST['name']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['password']);
    $confirmar_senha = trim($_POST['confirmPassword']);

    // Validação dos campos
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
        $nome = $conn->real_escape_string($nome);
        
        // Verifica se o e-mail já está registrado
        $sql_check = "SELECT * FROM usuarios WHERE email='$email'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows > 0) {
            $message = "O e-mail já está registrado. Por favor, use um e-mail diferente.";
        } else {
            // Hash da senha
            $senha_hash = password_hash($senha, PASSWORD_BCRYPT);
            $data_criacao = date('Y-m-d H:i:s'); 
            $sql_insert = "INSERT INTO usuarios (nome, email, senha, data_criacao) VALUES ('$nome', '$email', '$senha_hash', '$data_criacao')";

            if ($conn->query($sql_insert) === TRUE) {
                $usuarioId = $conn->insert_id;

                $_SESSION['usuario_id'] = $usuarioId;
                $_SESSION['nome'] = $nome;

                // Função para enviar e-mail de confirmação
                function enviarEmailConfirmacao($email, $nome) {
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
                        $mail->Subject = 'Confirmação de Registro - Física Facinho';
                        $body = "
                            <html>
                                <head>
                                    <title>Bem-vindo ao Física Facinho</title>
                                    <style>
                                        body { font-family: Arial, sans-serif; color: #333; background-color: #f9f9f9; }
                                        .email-content { background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
                                        .email-header { background-color: #4CAF50; color: white; padding: 10px; text-align: center; border-radius: 8px 8px 0 0; }
                                        .email-footer { font-size: 12px; color: #777; text-align: center; margin-top: 20px; }
                                    </style>
                                </head>
                                <body>
                                    <div class='email-content'>
                                        <div class='email-header'>
                                            <h2>Bem-vindo ao Física Facinho, $nome!</h2>
                                        </div>
                                        <p>Parabéns pelo seu registro em nosso site! Estamos muito felizes em tê-lo(a) conosco.</p>
                                        <p>Agora você pode acessar todas as funcionalidades e conteúdos que preparamos para você.</p>
                                        <p>Se precisar de alguma ajuda, nossa equipe está à disposição. Não hesite em nos contatar.</p>
                                        <p>Atenciosamente,<br>Equipe Física Facinho</p>
                                        <div class='email-footer'>
                                            <p>&copy; 2024 Física Facinho | Todos os direitos reservados.</p>
                                        </div>
                                    </div>
                                </body>
                            </html>
                        ";
                        $mail->Body    = $body;

                        // Enviar o e-mail
                        $mail->send();
                    } catch (Exception $e) {
                        echo "A mensagem não pode ser enviada. Erro: {$mail->ErrorInfo}";
                    }
                }

                // Envia o e-mail de confirmação
                enviarEmailConfirmacao($email, $nome);
                header("Location: inicio.php");
                exit(); 
            } else {
                $message = "Erro ao inserir os dados: " . $conn->error;
            }
        }
    }
}
?>
