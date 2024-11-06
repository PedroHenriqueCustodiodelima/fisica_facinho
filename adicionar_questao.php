<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

require_once 'conexao.php';

$usuario_id = $_SESSION['usuario_id'];

$imagemPerfil = 'img/default-avatar.png';
$nomeUsuario = 'Usuário';

$stmt = $conn->prepare("SELECT foto, nome FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

if ($usuario) {
    $imagemPerfil = $usuario['foto'] ?? $imagemPerfil;
    $nomeUsuario = $usuario['nome'] ?? $nomeUsuario;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nivel = $_POST['nivel'];
    $enunciado = $_POST['enunciado'];
    $explicacao = $_POST['explicacao'];
    $materia = $_POST['materia'];  // Novo campo de matéria
    $alternativas = $_POST['alternativa'];
    $correta = $_POST['correta'];

    $tabela_questoes = "questoes_nivel" . $nivel;
    $tabela_alternativas = "alternativas" . ($nivel > 1 ? "_$nivel" : '');

    if (!in_array($tabela_questoes, ['questoes_nivel1', 'questoes_nivel2', 'questoes_nivel3'])) {
        die("Tabela de questões inválida.");
    }

    if (!in_array($tabela_alternativas, ['alternativas', 'alternativas_2', 'alternativas_3'])) {
        die("Tabela de alternativas inválida.");
    }

    $stmt = $conn->prepare("INSERT INTO $tabela_questoes (enunciado, explicacao, materia) VALUES (?, ?, ?)");
    if (!$stmt) {
        die("Erro na preparação da consulta de questões: " . $conn->error);
    }
    $stmt->bind_param("sss", $enunciado, $explicacao, $materia);
    $stmt->execute();
    $questao_id = $stmt->insert_id;

    foreach ($alternativas as $indice => $texto_alternativa) {
        $correta_flag = ($indice == $correta) ? 1 : 0;
        $stmt = $conn->prepare("INSERT INTO $tabela_alternativas (questao_id, texto, correta) VALUES (?, ?, ?)");
        if (!$stmt) {
            die("Erro na preparação da consulta de alternativas: " . $conn->error);
        }
        $stmt->bind_param("isi", $questao_id, $texto_alternativa, $correta_flag);
        $stmt->execute();
    }

    $stmt->close();
    $conn->close();

    echo "Questão de Nível $nivel adicionada com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Questão</title>
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
            <label for="nivel">Escolha o Nível da Questão:</label><br>
            <select id="nivel" name="nivel" required>
                <option value="1">Nível 1</option>
                <option value="2">Nível 2</option>
                <option value="3">Nível 3</option>
            </select><br><br>

            <label for="materia">Escolha a Matéria:</label><br>
            <select id="materia" name="materia" required>
                <option value="Introdução à Física">Introdução à Física</option>
                <option value="Grandezas e vetores">Grandezas e vetores</option>
                <option value="Cinemática – conceitos básicos">Cinemática – conceitos básicos</option>
                <option value="Cinemática – identificando os movimentos">Cinemática – identificando os movimentos</option>
                <option value="Movimento retilíneo uniforme (MRU)">Movimento retilíneo uniforme (MRU)</option>
                <option value="Movimento retilíneo uniformemente variado (MRUV)">Movimento retilíneo uniformemente variado (MRUV)</option>
                <option value="Movimentos sob ação da gravidade">Movimentos sob ação da gravidade</option>
                <option value="As Leis de Newton e suas aplicações">As Leis de Newton e suas aplicações</option>
                <option value="Movimento Circular Uniforme">Movimento Circular Uniforme</option>
                <option value="Dinâmica do movimento circular">Dinâmica do movimento circular</option>
                <option value="Trabalho energia potência">Trabalho energia potência</option>
                <option value="Impulso e Quantidade de Movimento">Impulso e Quantidade de Movimento</option>
                <option value="Gravitação Universal">Gravitação Universal</option>
                <option value="Estática">Estática</option>
                <option value="Hidrostática">Hidrostática</option>
                <option value="Hidrodinâmica">Hidrodinâmica</option>
            </select><br><br>

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
    </main>
</div>
<footer>
    <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
</footer>
</body>
</html>
