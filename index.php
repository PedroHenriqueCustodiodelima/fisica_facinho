<?php
include("funcoes_php/funcoes_index.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
<body>
    <header>
        <a href="portfolio.php">
            <img src="img/logo.png" alt="Logo">
        </a>
    </header>
    
    <main>
        <div class="register-form">
            <h2>Crie sua conta para começar sua jornada de aprendizado</h2>
            <form action="" method="POST">
                <div class="input-group">
                    <input type="text" id="name" name="name" placeholder="Digite aqui seu Nome" required>
                    <i class="fa-solid fa-user"></i>
                </div>
                
                <div class="input-group">
                    <input type="email" id="email" name="email" placeholder="Digite aqui seu Email" required>
                    <i class="fa-solid fa-envelope"></i>
                </div>
                
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="Digite aqui sua senha" required>
                    <i class="fa-solid fa-eye" id="togglePassword"></i>
                    <i class="fa-solid fa-eye-slash" id="togglePasswordSlash" style="display: none;"></i>
                </div>
                <div class="password-requirements">
                    <ul>
                        <li id="length" class="invalid">Mínimo de 8 caracteres</li>
                        <li id="uppercase" class="invalid">Pelo menos uma letra maiúscula</li>
                        <li id="lowercase" class="invalid">Pelo menos uma letra minúscula</li>
                        <li id="number" class="invalid">Pelo menos um número</li>
                        <li id="special" class="invalid">Pelo menos um caractere especial</li>
                    </ul>
                </div>
                <div id="emailError" style="display:none; color: red;"></div>
                <div class="input-group">
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirme sua senha" required>
                    <i class="fa-solid fa-eye" id="toggleConfirmPassword"></i>
                    <i class="fa-solid fa-eye-slash" id="toggleConfirmPasswordSlash" style="display: none;"></i>
                </div>      
                <button class="register-button" type="submit">Cadastrar</button>

                <button class="google-login" id="googleSignInBtn">
                    <i class="fa-brands fa-google"></i>
                    Entrar com o Google
                </button>

            </form>
            <p class="login-link">Já tem uma conta? <a href="login.php">Faça login</a></p>
        </div>
    </main>
    <footer>
        <p>IFRN CAMPUS NATAL CENTRAL</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/validator@13.6.0/lib/index.min.js"></script>

    <script src="js/index.js"></script>
</body>
</html>
