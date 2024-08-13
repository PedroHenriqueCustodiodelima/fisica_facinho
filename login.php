<?php
session_start();
include("conexao.php");

// Inicializa variáveis de sessão para manter os valores dos campos
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$senha = isset($_POST['senha']) ? trim($_POST['senha']) : '';

if (isset($_POST['email']) && isset($_POST['senha'])) {

    if (strlen($email) == 0) {
        $_SESSION['loginErro'] = 'Por favor, preencha o campo de email.';
    } 
    else if (strlen($senha) == 0) {
        $_SESSION['loginErro'] = 'Por favor, preencha o campo de senha.';
    } 
    else {
        $email = $conn->real_escape_string($email);
        $senha = $conn->real_escape_string($senha);

        $sql_select = "SELECT * FROM usuario WHERE gmail='$email' AND senha='$senha'";
        $result = $conn->query($sql_select);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['nome'] = $user['nome']; 
            unset($_SESSION['loginErro']); 

            header("Location: inicio.php");
            exit();
        } else {
            $_SESSION['loginErro'] = 'Email ou senha incorretos.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <header>
        <h1>Física Online</h1>
    </header>
    <div class="login-caixa">
        <div class="esquerda">
            <h1>Sua Jornada<br>Começa Agora!</h1>
            <img src="img/people creating robot-rafiki 1.png" class="esquerda-imagem" alt="">
        </div>
        <div class="direita">
            <div class="card-login">
                <h1>LOGIN</h1>
                <form method="POST" action="">
                    <div class="campo-il">
                        <label for="email">Email:</label>
                        <input type="email" name="email" placeholder="Digite o seu email" value="<?php echo htmlspecialchars($email, ENT_QUOTES); ?>" required>
                    </div>
                    <div class="campo-il">
                        <label for="senha">Senha:</label>
                        <input type="password" id="senha" name="senha" placeholder="Digite a sua senha" value="<?php echo htmlspecialchars($senha, ENT_QUOTES); ?>" required>
                        <svg id="toggleSenha" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="#ffffff" d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                    </div>
                    <button class="btn-login" type="submit">Logar</button>
                </form>
            </div>
        </div>
    </div>
    <div id="errorModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p><?php echo isset($_SESSION['loginErro']) ? $_SESSION['loginErro'] : ''; ?></p>
        </div>
    </div>

    <script>
        window.onload = function() {
            const modal = document.getElementById('errorModal');
            const span = document.getElementsByClassName('close')[0];
            
            <?php if (isset($_SESSION['loginErro'])): ?>
                modal.style.display = "block";
                <?php unset($_SESSION['loginErro']); ?>
            <?php endif; ?>
            span.onclick = function() {
                modal.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        }
        const toggleSenha = document.getElementById('toggleSenha');
        const senhaInput = document.getElementById('senha');
        toggleSenha.addEventListener('click', function() {
            const tipo = senhaInput.getAttribute('type') === 'password' ? 'text' : 'password';
            senhaInput.setAttribute('type', tipo);
            this.style.fill = tipo === 'text' ? '#ffcc00' : '#ffffff';
        });
    </script>
</body>
</html>
