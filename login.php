<?php
include("conexao.php");

if (isset($_POST['email']) && isset($_POST['senha'])) {

    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    if (strlen($email) == 0) {
        echo "Por favor, preencha o campo de email.";
    } 
    else if (strlen($senha) == 0) {
        echo "Por favor, preencha o campo de senha.";
    } 
    else {
        $email = $conn->real_escape_string($email);
        $senha = $conn->real_escape_string($senha);

        // Verifica se o email e senha estão no banco de dados
        $sql_select = "SELECT * FROM usuario WHERE gmail='$email' AND senha='$senha'";
        $result = $conn->query($sql_select);

        if ($result->num_rows > 0) {
            echo "Login bem-sucedido!";
        } else {
            echo "Email ou senha incorretos.";
        }
    }
}
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylereg.css">
    <title>Login</title>
</head>
<body>
    <header>
        <h1>Física Online</h1>
    </header>
    <div class="login-caixa">
        <div class="esquerda">
            <h1>Sua Jornada<br>Começa Agora!</h1>
            <img src="img/estudos.svg" class="esquerda-imagem" alt="">
        </div>
        <div class="direita">
            <div class="card-login">
                <h1>LOGIN</h1>
                <form method="POST" action="">
                    <div class="campo-il">
                        <label for="email">Email:</label>
                        <input type="email" name="email" placeholder="Digite o seu email" required>
                    </div>
                    <div class="campo-il">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" placeholder="Digite a sua senha" required>
                    </div>
                    <button class="btn-login" type="submit">Logar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
