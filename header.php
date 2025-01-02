<?php
include("funcoes_php/funcoes_header.php");
$primeiroNome = explode(" ", $nomeUsuario)[0];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FACINHO</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<header class="d-flex justify-content-between align-items-center">
    <a href="inicio.php">
        <img src="img/logo.png" width="200px" alt="Logo">
    </a>
    <div class="perfil-header d-flex align-items-center">
        <a href="configuracoes.php" class="d-flex align-items-center" style="text-decoration: none;">
            <img id="avatar-imagem" src="<?php echo htmlspecialchars($imagemPerfil); ?>" alt="Avatar" width="35px" height="35px" class="ml-3">
            <p class="m-0 ml-2"><span id="usuario-nome"><?php echo htmlspecialchars($primeiroNome); ?></span></p>
        </a>
        <a href="logout.php" title="Sair" class="d-flex align-items-center ml-3">
            <i class="fas fa-sign-out-alt" style="font-size: 20px; color: #FFD700;" title="Sair"></i>
        </a>
    </div>
</header>
</body>
</html>
