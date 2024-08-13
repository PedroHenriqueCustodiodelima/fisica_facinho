<?php
session_start();
if (!isset($_SESSION['nome'])) {
    header("Location: login.php"); // Redireciona para a página de login se não estiver logado
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Bem-vindo! <?php echo htmlspecialchars($_SESSION['nome']); ?> <!-- Exibe o nome do usuário -->
    <p><a href="logout.php">Sair</a></p>
</body>
</html>
