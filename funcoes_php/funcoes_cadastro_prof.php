<?php
include("conexao.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php'; // Autoload do Composer

session_start();

$message = ''; 

date_default_timezone_set('America/Sao_Paulo');

if (isset($_POST['nome']) && isset($_POST['data_nasc']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['confirmar_senha'])) {

    $nome = trim($_POST['nome']);
    $data_nasc = trim($_POST['data_nasc']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $confirmar_senha = trim($_POST['confirmar_senha']);

    // Validação básica dos campos
    if (strlen($nome) == 0) {
        $message = "Por favor, preencha o campo de nome.";
    } 
    else if (strlen($data_nasc) == 0) {
        $message = "Por favor, preencha o campo de data de nascimento.";
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
        // Protege contra SQL Injection
        $email = $conn->real_escape_string($email);
        $senha = password_hash($conn->real_escape_string($senha), PASSWORD_BCRYPT);
        $nome = $conn->real_escape_string($nome);
        $data_nasc = $conn->real_escape_string($data_nasc);

        // Verifica se o e-mail já está registrado
        $sql_check = "SELECT * FROM professores WHERE email='$email'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows > 0) {
            $message = "O e-mail já está registrado. Por favor, use um e-mail diferente.";
        } else {
            // Insere o novo professor na tabela
            $sql_insert = "INSERT INTO professores (nome, data_nasc, email, senha) VALUES ('$nome', '$data_nasc', '$email', '$senha')";

            if ($conn->query($sql_insert) === TRUE) {
                // Recupera o ID do novo professor
                $professorId = $conn->insert_id;

                // Armazena o ID e o nome do professor na sessão
                $_SESSION['professor_id'] = $professorId;
                $_SESSION['nome'] = $nome;

                // Função para enviar o e-mail de confirmação
                function enviarEmailConfirmacao($email, $nome) {
                    $mail = new PHPMailer(true);
                    try {
                        $mail->isSMTP();
                        $mail->Host       = 'smtp.gmail.com'; 
                        $mail->SMTPAuth   = true;
                        $mail->Username   = 'fisicafacinho@gmail.com'; // Altere para o seu e-mail
                        $mail->Password   = 'klwr ccgp eoia ustb'; // Altere para a sua senha (use senhas de app no Gmail)
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                        $mail->Port       = 465;

                        // Define o remetente e o destinatário
                        $mail->setFrom('fisicafacinho@gmail.com', 'Fisica facinho');
                        $mail->addAddress($email, $nome);

                        // Define o conteúdo do e-mail
                        $mail->isHTML(true);
                        $mail->Subject = 'Registro de Professor';
                        $mail->Body    = "Olá, $nome!<br>Seu registro foi realizado com sucesso.<br>";

                        // Envia o e-mail
                        $mail->send();
                    } catch (Exception $e) {
                        echo "A mensagem não pode ser enviada. Erro: {$mail->ErrorInfo}";
                    }
                }

                // Envia o e-mail de confirmação
                enviarEmailConfirmacao($email, $nome);

                // Redireciona para a página inicial após o cadastro
                header("Location: inicio.php");
                exit(); // Termina o script para evitar a execução adicional de código
            } else {
                $message = "Erro ao inserir os dados: " . $conn->error;
            }
        }
    }
}
?>
