<?php
session_start();
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $senha = trim($_POST['password']);

    if (empty($email) || empty($senha)) {
        $_SESSION['loginErro'] = "Email e senha são obrigatórios.";
        header("Location: login_suporte.php");
        exit();
    }

    // Verifica na tabela `suporte`
    $stmt = $conn->prepare("SELECT id, suporte_id, especialidade, senha FROM suporte WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($usuarioId, $suporteId, $especialidade, $senhaBD);
        $stmt->fetch();
        if ($senha == $senhaBD) {  // Verifica a senha diretamente
            $token = bin2hex(random_bytes(16));
            $ipUsuario = $_SERVER['REMOTE_ADDR'];
            $navegador = $_SERVER['HTTP_USER_AGENT'];

            $stmt = $conn->prepare("INSERT INTO sessoes (id_usuario, token_sessao, data_inicio, ip_address, user_agent) VALUES (?, ?, NOW(), ?, ?)");
            $stmt->bind_param("isss", $usuarioId, $token, $ipUsuario, $navegador);
            $stmt->execute();
            $sessionId = $stmt->insert_id;
            $stmt->close();

            $_SESSION['usuario_id'] = $usuarioId;
            $_SESSION['session_id'] = $sessionId;
            $_SESSION['suporte_id'] = $suporteId;
            $_SESSION['especialidade'] = $especialidade;

            header("Location: ajudar_usuario.php");
            exit();
        } else {
            $_SESSION['loginErro'] = "Senha inválida.";
            header("Location: login_suporte.php");
            exit();
        }
    } else {
        $_SESSION['loginErro'] = "Email ou senha inválidos.";
        header("Location: login_suporte.php");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Simples</title>
    <link rel="stylesheet" href="css/login.css">
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
        <div class="login-form">
            <h2>Faça seu login para começar a sua aventura de aprendizado na física</h2>
            <form action="login_suporte.php" method="POST">
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

            <button class="google-login" id="googleSignInBtn">
                <i class="fa-brands fa-google"></i>
                Entrar com o Google
            </button>

            <p class="register-link">Não tem uma conta? <a href="index.php">Cadastre-se</a></p>
            <!-- <p class="forgot-password"><a href="recuperar_senha.php">Esqueceu sua senha?</a></p> -->
        </div>
    </main>

    <!-- footer -->
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

            gapi.load('auth2', function() {
                console.log('Google API loaded'); 
                const auth2 = gapi.auth2.init({
                    client_id: '795836589716-3avdsmk6r53a0sed11kh6jujj667ho1v.apps.googleusercontent.com',
                });

                const googleSignInBtn = document.getElementById('googleSignInBtn');
                googleSignInBtn.addEventListener('click', function() {
                    console.log('Google Sign-In button clicked'); 
                    auth2.signIn().then(function(googleUser) {
                        const id_token = googleUser.getAuthResponse().id_token;

                        fetch('verify_google_token.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: 'id_token=' + id_token,
                        }).then(response => response.json())
                          .then(data => {
                              if (data.success) {
                                  window.location.href = 'inicio.php'; 
                              } else {
                                  Swal.fire({
                                      title: 'Erro',
                                      text: 'Não foi possível fazer login com o Google.',
                                      icon: 'error',
                                      confirmButtonText: 'OK'
                                  });
                              }
                          });
                    }).catch(error => {
                        console.error('Erro ao autenticar com o Google', error); 
                    });
                });
            });
        });
    </script>
</body>
</html>
