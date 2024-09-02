<?php
include("funcoes_php/funcoes_cadastro_prof.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Professor</title>
    <link rel="stylesheet" href="css/tarefas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
<body>
    <header>
        <img src="img/logo.png" alt="Logo">
    </header>

    <main>
        <div class="register-form">
            <h2>Cadastrar novo professor</h2>
            <form action="funcoes_php/funcoes_cadastro_prof.php" method="POST">
                <div class="input-group">
                    <input type="text" id="name" name="name" placeholder="Digite o nome do professor" required>
                    <i class="fa-solid fa-user"></i>
                </div>

                <div class="input-group">
                    <input type="email" id="email" name="email" placeholder="Digite o email do professor" required>
                    <i class="fa-solid fa-envelope"></i>
                </div>

                <div class="input-group">
                    <input type="date" id="data_nascimento" name="data_nascimento" placeholder="Data de Nascimento" required>
                </div>

                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="Digite uma senha" required>
                    <i class="fa-solid fa-eye" id="togglePassword"></i>
                    <i class="fa-solid fa-eye-slash" id="togglePasswordSlash" style="display: none;"></i>
                </div>

                <div class="input-group">
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirme a senha" required>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordField = document.getElementById('password');
            const confirmPasswordField = document.getElementById('confirmPassword');
            const eyeIcon = document.getElementById('togglePassword');
            const eyeSlashIcon = document.getElementById('togglePasswordSlash');
            const eyeIconConfirm = document.getElementById('toggleConfirmPassword');
            const eyeSlashIconConfirm = document.getElementById('toggleConfirmPasswordSlash');

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

            eyeIconConfirm.addEventListener('click', function() {
                confirmPasswordField.type = 'text';
                eyeIconConfirm.style.display = 'none';
                eyeSlashIconConfirm.style.display = 'inline';
            });

            eyeSlashIconConfirm.addEventListener('click', function() {
                confirmPasswordField.type = 'password';
                eyeIconConfirm.style.display = 'inline';
                eyeSlashIconConfirm.style.display = 'none';
            });

            <?php if (!empty($message)): ?>
                Swal.fire({
                    title: 'Erro no cadastro',
                    text: '<?php echo $message; ?>',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            <?php endif; ?>

            gapi.load('auth2', function() {
                const auth2 = gapi.auth2.init({
                    client_id: '795836589716-3avdsmk6r53a0sed11kh6jujj667ho1v.apps.googleusercontent.com',
                });

                const googleSignInBtn = document.getElementById('googleSignInBtn');

                if (googleSignInBtn) {
                    googleSignInBtn.addEventListener('click', function() {
                        auth2.signIn().then(function(googleUser) {
                            const id_token = googleUser.getAuthResponse().id_token;

                            fetch('verify_google_token.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({ id_token: id_token })
                            }).then(response => response.json()).then(data => {
                                if (data.success) {
                                    window.location.href = 'inicio.php';
                                } else {
                                    Swal.fire({
                                        title: 'Erro',
                                        text: data.message,
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    });
                                }
                            }).catch(error => {
                                Swal.fire({
                                    title: 'Erro',
                                    text: 'Erro ao autenticar com Google. Tente novamente.',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            });
                        });
                    });
                }
            });
        });
    </script>
</body>
</html>
