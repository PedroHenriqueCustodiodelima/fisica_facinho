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
    $enunciado = $_POST['enunciado'];
    $ano = $_POST['ano'];
    $concurso = $_POST['concurso'];
    $materia = $_POST['materia'];
    $resolucao = $_POST['resolucao'];
    $alternativas = $_POST['alternativa'];
    $correta = $_POST['correta'];

    // Processar a foto do enunciado (se houver)
    $foto_enunciado = null;
    if (isset($_FILES['foto_enunciado']) && $_FILES['foto_enunciado']['error'] == 0) {
        $foto_tmp = $_FILES['foto_enunciado']['tmp_name'];
        $foto_nome = $_FILES['foto_enunciado']['name'];
        $foto_ext = pathinfo($foto_nome, PATHINFO_EXTENSION);
        
        // Defina um nome único para o arquivo
        $foto_nome_novo = uniqid('foto_', true) . '.' . $foto_ext;

        // Diretório onde a foto será salva
        $diretorio = 'uploads/';

        // Verifique se o diretório de upload existe, caso contrário, crie-o
        if (!file_exists($diretorio)) {
            mkdir($diretorio, 0777, true);
        }

        // Mova o arquivo para o diretório de upload
        if (move_uploaded_file($foto_tmp, $diretorio . $foto_nome_novo)) {
            $foto_enunciado = $diretorio . $foto_nome_novo;
        } else {
            echo "Erro ao enviar a foto do enunciado.";
        }
    }

    // Inserir questão na tabela questoes
    $stmt = $conn->prepare("INSERT INTO questoes (enunciado, ano, concurso, materia, resolucao, foto_enunciado) VALUES (?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Erro na preparação da consulta de questões: " . $conn->error);
    }
    $stmt->bind_param("ssssss", $enunciado, $ano, $concurso, $materia, $resolucao, $foto_enunciado);
    $stmt->execute();
    $questao_id = $stmt->insert_id;

    // Inserir alternativas na tabela alternativas_concurso
    foreach ($alternativas as $indice => $texto_alternativa) {
        $correta_flag = ($indice == $correta) ? 1 : 0;
        $stmt = $conn->prepare("INSERT INTO alternativas_concurso (id_questao, texto, correta) VALUES (?, ?, ?)");
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
    <title>Adicionar Questão de Concurso</title>
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
        <h1>Adicionar Nova Questão de Concurso</h1>
        <form action="adicionar_questao.php" method="POST" enctype="multipart/form-data">
            <label for="ano">Ano:</label><br>
            <input type="number" id="ano" name="ano" required><br><br>

            <label for="concurso">Nome do Concurso:</label><br>
            <input type="text" id="concurso" name="concurso" required><br><br>

            <label for="materia">Matéria:</label><br>
            <input type="text" id="materia" name="materia" required><br><br>

            <label for="enunciado">Enunciado da Questão:</label><br>
            <textarea id="enunciado" name="enunciado" rows="4" cols="50" required></textarea><br><br>

            <label for="resolucao">Resolução da Questão:</label><br>
            <textarea id="resolucao" name="resolucao" rows="4" cols="50" required></textarea><br><br>

            <label for="foto_enunciado">Foto do Enunciado:</label><br>
            <input type="file" id="foto_enunciado" name="foto_enunciado" accept="image/*"><br><br>

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

                <label for="alternativa5">Alternativa 5:</label>
                <input type="text" id="alternativa5" name="alternativa[]" required><br>
            </div>

            <h3>Selecione a alternativa correta:</h3>
            <input type="radio" id="correta1" name="correta" value="0" required>
            <label for="correta1">Alternativa 1</label><br>

            <input type="radio" id="correta2" name="correta" value="1" required>
            <label for="correta2">Alternativa 2</label><br>

            <input type="radio" id="correta3" name="correta" value="2" required>
            <label for="correta3">Alternativa 3</label><br>

            <input type="radio" id="correta4" name="correta" value="3" required>
            <label for="correta4">Alternativa 4</label><br>

            <input type="radio" id="correta5" name="correta" value="4" required>
            <label for="correta5">Alternativa 5</label><br><br>

            <input type="submit" value="Adicionar Questão">
        </form>
    </main>
</div>

<footer>
    <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
</footer>
</body>
</html>
