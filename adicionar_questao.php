<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

require_once 'conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $enunciado = $_POST['enunciado'];
    $explicacao = $_POST['explicacao'];
    $alternativas = $_POST['alternativa'];
    $correta = $_POST['correta']; // índice da alternativa correta

    // Insere a questão no banco de dados
    $stmt = $conn->prepare("INSERT INTO questoes_nivel1 (enunciado, explicacao) VALUES (?, ?)");
    $stmt->bind_param("ss", $enunciado, $explicacao);
    $stmt->execute();
    $questao_id = $stmt->insert_id; // Obtém o ID da nova questão inserida

    // Insere as alternativas no banco de dados
    foreach ($alternativas as $indice => $texto_alternativa) {
        $correta_flag = ($indice == $correta) ? 1 : 0; // Verifica se essa alternativa é a correta
        $stmt = $conn->prepare("INSERT INTO alternativas (questao_id, texto, correta) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $questao_id, $texto_alternativa, $correta_flag);
        $stmt->execute();
    }

    // Fecha a conexão
    $stmt->close();
    $conn->close();

    // Redireciona ou exibe uma mensagem de sucesso
    echo "Questão adicionada com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Questão</title>
</head>
<body>
    <h1>Adicionar Nova Questão</h1>
    <form action="adicionar_questao.php" method="POST">
        <label for="enunciado">Enunciado da Questão:</label><br>
        <textarea id="enunciado" name="enunciado" rows="4" cols="50" required></textarea><br><br>

        <label for="explicacao">Explicação da Questão:</label><br>
        <textarea id="explicacao" name="explicacao" rows="4" cols="50" required></textarea><br><br>

        <h3>Alternativas:</h3>

        <div>
            <label for="alternativa1">Alternativa 1:</label>
            <input type="text" id="alternativa1" name="alternativa[]" required><br>

            <label for="alternativa2">Alternativa 2:</label>
            <input type="text" id="alternativa2" name="alternativa[]" required><br>

            <label for="alternativa3">Alternativa 3:</label>
            <input type="text" id="alternativa3" name="alternativa[]" required><br>

            <label for="alternativa4">Alternativa 4:</label>
            <input type="text" id="alternativa4" name="alternativa[]" required><br>
        </div>

        <h3>Selecione a alternativa correta:</h3>
        <input type="radio" id="correta1" name="correta" value="0" required>
        <label for="correta1">Alternativa 1</label><br>

        <input type="radio" id="correta2" name="correta" value="1" required>
        <label for="correta2">Alternativa 2</label><br>

        <input type="radio" id="correta3" name="correta" value="2" required>
        <label for="correta3">Alternativa 3</label><br>

        <input type="radio" id="correta4" name="correta" value="3" required>
        <label for="correta4">Alternativa 4</label><br><br>

        <input type="submit" value="Adicionar Questão">
    </form>
</body>
</html>
