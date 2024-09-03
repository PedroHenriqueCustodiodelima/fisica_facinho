<?php
include("conexao.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php'; 

session_start();

$message = ''; 

date_default_timezone_set('America/Sao_Paulo');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = trim($_POST['name']);
    $cpf = trim($_POST['cpf']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['password']);
    $confirmar_senha = trim($_POST['confirmPassword']);


    $dominio_permitido = 'edu.br';

    if (strlen($nome) == 0) {
        $message = "Por favor, preencha o campo de nome.";
    } 
    else if (strlen($cpf) == 0) {
        $message = "Por favor, preencha o campo de CPF.";
    } 
    else if (strlen($email) == 0) {
        $message = "Por favor, preencha o campo de email.";
    } 
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "O e-mail fornecido não é válido.";
    }
    else if (!str_ends_with($email, $dominio_permitido)) {
        $message = "O e-mail deve ter o domínio '$dominio_permitido'.";
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
        $cpf = $conn->real_escape_string($cpf);

        
        $sql_check_email_professores = "SELECT * FROM professores WHERE email='$email'";
        $result_check_email_professores = $conn->query($sql_check_email_professores);

        $sql_check_email_usuarios = "SELECT * FROM usuarios WHERE email='$email'";
        $result_check_email_usuarios = $conn->query($sql_check_email_usuarios);

        $sql_check_cpf = "SELECT * FROM professores WHERE cpf='$cpf'";
        $result_check_cpf = $conn->query($sql_check_cpf);

        if ($result_check_email_professores->num_rows > 0 || $result_check_email_usuarios->num_rows > 0) {
            $message = "O e-mail já está registrado. Por favor, use um e-mail diferente.";
        } 
        else if ($result_check_cpf->num_rows > 0) {
            $message = "O CPF já está registrado. Por favor, use um CPF diferente.";
        } 
        else {
     
            $data_criacao = date('Y-m-d H:i:s');
            $sql_insert = "INSERT INTO professores (nome, cpf, email, senha, data_criacao) VALUES ('$nome', '$cpf', '$email', '$senha', '$data_criacao')";

            if ($conn->query($sql_insert) === TRUE) {
             
                $professorId = $conn->insert_id;

              
                $_SESSION['professor_id'] = $professorId;
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
                        $mail->Subject = 'Registro de Professor';
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

<!-- Mensagem de erro -->
<?php if (!empty($message)) : ?>
    <div class="error-message">
        <?php echo htmlspecialchars($message); ?>
    </div>
<?php endif; ?>
