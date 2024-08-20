<?php
include("funcoes_php/funcoes_index.php");
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Cadastro</title>
</head>
<body>
    <header>
        <h1>Física Online</h1>
        <nav>
            <a href="login.php" class="nav-button">Login</a>
            <a href="index.php" class="nav-button">Cadastro</a>
        </nav>
    </header>
    <div class="login-caixa">
        <div class="esquerda">
            <h1>Falta pouco para você iniciar na sua jornada de aprendizado. Finalize o seu cadastro</h1>
            <img src="img/Notebook-pana 1.png" class="esquerda-imagem" alt="">
        </div>
        <div class="direita">
            <div class="card-login">
                <h1>CADASTRO</h1>
                <form method="POST" action="">
                    <?php if (!empty($message)) : ?>
                        <div id="popupMessage" class="popup <?php echo strpos($message, 'sucesso') !== false ? '' : 'error'; ?>">
                            <?php echo htmlspecialchars($message); ?>
                        </div>
                    <?php endif; ?>
                    <div class="campo-il">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" placeholder="Digite o seu nome" value="<?php echo isset($nome) ? htmlspecialchars($nome) : ''; ?>" required>
                    </div>
                    <div class="campo-il">
                        <label for="email">Email:</label>
                        <input type="email" name="email" placeholder="Digite o seu email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
                    </div>
                    <div class="campo-il">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" placeholder="Digite a sua senha" value="<?php echo isset($senha) ? htmlspecialchars($senha) : ''; ?>" required>
                    </div>
                    <div class="campo-il">
                        <label for="confirmar_senha">Confirmar Senha:</label>
                        <input type="password" name="confirmar_senha" placeholder="Confirme a sua senha" value="<?php echo isset($confirmar_senha) ? htmlspecialchars($confirmar_senha) : ''; ?>" required>
                    </div>
                    <button class="btn-login" type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        // JavaScript para exibir o pop-up e escondê-lo automaticamente
        window.onload = function() {
            const popup = document.getElementById('popupMessage');
            if (popup) {
                popup.classList.add('show');
                setTimeout(function() {
                    popup.classList.remove('show');
                }, 3000); // Tempo em milissegundos (3 segundos)
            }
        }
    </script>
</body>
</html>
