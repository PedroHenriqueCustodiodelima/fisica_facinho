<?php
// Inclua a conexão com o banco de dados e outras funções se necessário
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['password'];

    // Criptografar a senha
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // Inserir o novo usuário no banco de dados
    $stmt = $conn->prepare("INSERT INTO usuarios (email, senha) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $senhaHash);
    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        $erro = "Erro ao registrar o usuário.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <header>
        <img src="img/logo.png" alt="Logo">
    </header>

    <main>
        <div class="login-form">
            <h2>Crie sua conta</h2>
            <form action="cadastro.php" method="POST">
                <div class="input-group">
                    <input type="email" id="email" name="email" placeholder="Digite aqui o seu Email" required>
                </div>
                
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="Digite aqui sua senha" required>
                </div>
                
                <button class="login-button" type="submit">Cadastrar</button>
                <?php if (isset($erro)): ?>
                    <p class="error-message"><?php echo $erro; ?></p>
                <?php endif; ?>
            </form>
            <p class="register-link">Já tem uma conta? <a href="login.php">Faça login</a></p>
        </div>
    </main>

    <footer>
        <p>IFRN CAMPUS NATAL CENTRAL</p>
    </footer>
</body>
</html>
