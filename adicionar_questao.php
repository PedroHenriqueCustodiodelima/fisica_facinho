<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

require_once 'conexao.php';  // Conexão com o banco de dados

$usuario_id = $_SESSION['usuario_id'];

// Dados do usuário
$imagemPerfil = 'img/default-avatar.png';
$nomeUsuario = 'Usuário';

// Pega os dados do usuário
$stmt = $conn->prepare("SELECT foto, nome FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

if ($usuario) {
    $imagemPerfil = $usuario['foto'] ?? $imagemPerfil;
    $nomeUsuario = $usuario['nome'] ?? $nomeUsuario;
}

// Processa o formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $enunciado = $_POST['enunciado'];
    $resolucao = $_POST['resolucao'];
    $ano = $_POST['ano'];
    $materia = $_POST['materia'];
    $alternativas = $_POST['alternativa'];  // Alternativas da questão
    $correta = $_POST['correta'];  // Índice da alternativa correta
    $foto_enunciado = ''; // Se você tiver a lógica para fazer upload de imagem, adicione-a aqui

    // Inserir a questão na tabela 'tarefas'
    $stmt = $conn->prepare("INSERT INTO tarefas (enunciado, resolucao, ano, materia, foto_enunciado) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Erro na preparação da consulta de tarefas: " . $conn->error);
    }
    $stmt->bind_param("ssiss", $enunciado, $resolucao, $ano, $materia, $foto_enunciado);
    $stmt->execute();
    $questao_id = $stmt->insert_id;  // Pega o ID da questão inserida

    // Inserir as alternativas na tabela 'alternativas'
    foreach ($alternativas as $indice => $texto_alternativa) {
        $correta_flag = ($indice == $correta) ? 1 : 0;  // Define se a alternativa é correta (1) ou errada (0)
        $stmt = $conn->prepare("INSERT INTO alternativas (questao_id, texto, correta) VALUES (?, ?, ?)");
        if (!$stmt) {
            die("Erro na preparação da consulta de alternativas: " . $conn->error);
        }
        $stmt->bind_param("isi", $questao_id, $texto_alternativa, $correta_flag);
        $stmt->execute();
    }

    $stmt->close();
    $conn->close();

    echo "Questão adicionada com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Nova Questão</title>
    <link rel="stylesheet" href="css/add.css">
</head>
<body>
<header class="d-flex justify-content-between align-items-center">
    <a href="inicio.php">
        <img src="img/logo.png" width="200px" alt="Logo">
    </a>
    <div class="perfil-header d-flex align-items-center">
        <img id="avatar-imagem" src="<?php echo htmlspecialchars($imagemPerfil); ?>" alt="Avatar" width="50px" height="50px" class="ml-3">
        <p class="m-0 ml-2">Olá, <span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span>!</p>
    </div>
</header>

<div class="container">
    <main>
        <h1>Adicionar Nova Questão</h1>
        <form action="adicionar_questao.php" method="POST">
            <label for="ano">Ano:</label><br>
            <input type="number" id="ano" name="ano" required><br><br>

            <label for="materia">Matéria:</label><br>
            <input type="text" id="materia" name="materia" required><br><br>

            <label for="enunciado">Enunciado da Questão:</label><br>
            <textarea id="enunciado" name="enunciado" rows="4" cols="50" required></textarea><br><br>

            <label for="resolucao">Resolução da Questão:</label><br>
            <textarea id="resolucao" name="resolucao" rows="4" cols="50" required></textarea><br><br>

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
    </main>
</div>

<footer>
    <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
</footer>
</body>
</html>
