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

        $sql_check = "SELECT * FROM usuarios WHERE email='$email'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows > 0) {
            $message = "O e-mail já está registrado. Por favor, use um e-mail diferente.";
        } else {
            $data_criacao = date('Y-m-d H:i:s'); 
            $sql_insert = "INSERT INTO usuarios (nome, email, senha, data_criacao) VALUES ('$nome', '$email', '$senha', '$data_criacao')";

            if ($conn->query($sql_insert) === TRUE) {

                $usuarioId = $conn->insert_id;

                $_SESSION['usuario_id'] = $usuarioId;
                $_SESSION['nome'] = $nome;
                function enviarEmailConfirmacao($email, $nome) {
                    $mail = new PHPMailer(true);
                    try {
                        $mail->isSMTP();
                        $mail->Host       = 'smtp.gmail.com'; 
                        $mail->SMTPAuth   = true;
                        $mail->Username   = 'fisicafacinho@gmail.com';
                        $mail->Password   = 'klwr ccgp eoia ustb';
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                        $mail->Port       = 465;
                        $mail->setFrom('fisicafacinho@gmail.com', 'Fisica facinho');
                        $mail->addAddress($email, $nome);

                        $mail->isHTML(true);
                        $mail->Subject = 'Registro de Usuário';
                        $body = "Mensagem do Fisica online <br>
                                 Nome: ". $nome."<br>
                                 E-mail: ". $email."<br>";
                        $mail->Body    = $body;
                        $mail->send();
                    } catch (Exception $e) {
                        echo "A mensagem não pode ser enviada. Erro: {$mail->ErrorInfo}";
                    }
                }
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