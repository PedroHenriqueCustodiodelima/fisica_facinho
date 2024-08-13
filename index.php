<?php
include("conexao.php");

$message = ''; 

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
        $sql_check = "SELECT * FROM usuario WHERE gmail='$email'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows > 0) {
            $message = "O e-mail já está registrado. Por favor, use um e-mail diferente.";
        } else {
            $sql_insert = "INSERT INTO usuario (nome, gmail, senha) VALUES ('$nome', '$email', '$senha')";
            if ($conn->query($sql_insert) === TRUE) {
                $message = "Dados inseridos com sucesso!";
            } else {
                $message = "Erro ao inserir os dados: " . $conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Cadastro</title>
</head>
<body>
    <header>
        <h1>Física Online</h1>
    </header>
    <div class="login-caixa">
        <div class="esquerda">
            <h1>Falta pouco para você inicar na sua jornada de aprendizado.<h1 class="coralt">Finalize o seu cadastro</h1></h1>
            <img src="img/Notebook-pana 1.png" class="esquerda-imagem" alt="">
        </div>
        <div class="direita">
            <div class="card-login">
                <h1>CADASTRO</h1>
                <form method="POST" action="">
                    <?php if (!empty($message)) : ?>
                        <div class="message-box">
                            <?php echo htmlspecialchars($message); ?>
                        </div>
                    <?php endif; ?>
                    <div class="campo-il">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" placeholder="Digite o seu nome" required>
                    </div>
                    <div class="campo-il">
                        <label for="email">Email:</label>
                        <input type="email" name="email" placeholder="Digite o seu email" required>
                    </div>
                    <div class="campo-il">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" placeholder="Digite a sua senha" required>
                    </div>
                    <div class="campo-il">
                        <label for="confirmar_senha">Confirmar Senha:</label>
                        <input type="password" name="confirmar_senha" placeholder="Confirme a sua senha" required>
                    </div>
                    <button class="btn-login" type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
