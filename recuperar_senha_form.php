<!-- recuperar_senha_form.php -->
<?php
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Conectar ao banco de dados
    include 'conexao.php';

    // Verificar se o token é válido
    $sql = "SELECT id FROM usuarios WHERE token_recuperacao = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Token válido, mostrar formulário de redefinição de senha
        $usuario = $result->fetch_assoc();
        $usuario_id = $usuario['id'];
    } else {
        echo "Token inválido ou expirado.";
        exit;
    }
} else {
    echo "Token não fornecido.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
</head>
<body>
    <h2>Redefinir Senha</h2>
    <form action="processar_redefinicao.php" method="post">
        <input type="hidden" name="id" value="<?php echo $usuario_id; ?>">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        
        <label for="senha">Nova Senha:</label>
        <input type="password" id="senha" name="senha" required>
        
        <label for="confirmar_senha">Confirmar Senha:</label>
        <input type="password" id="confirmar_senha" name="confirmar_senha" required>
        
        <button type="submit">Redefinir Senha</button>
    </form>
</body>
</html>
