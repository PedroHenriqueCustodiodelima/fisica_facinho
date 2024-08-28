<?php
include("funcoes_php/funcoes_login.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Simples</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Adiciona o link para o SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
    <header>
        <img src="img/logo.png" alt="Logo">
    </header>

    <main>
        <div class="login-form">
            <h2>Faça seu login para começar a sua aventura de aprendizado na física</h2>
            <form action="login.php" method="POST">
                <div class="input-group">
                    <input type="email" id="email" name="email" placeholder="Digite aqui o seu Email" required>
                    <i class="fa-solid fa-envelope"></i>
                </div>
                
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="Digite aqui sua senha" required>
                    <i class="fa-solid fa-eye" id="togglePassword"></i>
                    <i class="fa-solid fa-eye-slash" id="togglePasswordSlash" style="display: none;"></i>
                </div>
                
                <button class="login-button" type="submit">Entrar</button>
            </form>
            <button class="google-login">
                <i class="fa-brands fa-google"></i>
                Entrar com o Google
            </button>
            <p class="register-link">Não tem uma conta? <a href="index.php">Cadastre-se</a></p>
        </div>
    </main>

    <footer>
        <p>IFRN CAMPUS NATAL CENTRAL</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('togglePassword');
            const eyeSlashIcon = document.getElementById('togglePasswordSlash');

            eyeIcon.addEventListener('click', function() {
                passwordField.type = 'text';
                eyeIcon.style.display = 'none';
                eyeSlashIcon.style.display = 'inline';
            });

            eyeSlashIcon.addEventListener('click', function() {
                passwordField.type = 'password';
                eyeIcon.style.display = 'inline';
                eyeSlashIcon.style.display = 'none';
            });

            // Verifica se há mensagem de erro para exibir
            <?php if (isset($_SESSION['loginErro'])): ?>
                Swal.fire({
                    title: 'Erro no login',
                    text: '<?php echo $_SESSION['loginErro']; ?>',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then(() => {
                    <?php unset($_SESSION['loginErro']); ?>
                });
            <?php endif; ?>
        });
    </script>
</body>
</html>
