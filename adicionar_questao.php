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
    $dificuldade = $_POST['dificuldade']; // Nível de dificuldade
    $foto_enunciado = ''; // Se você tiver a lógica para fazer upload de imagem, adicione-a aqui

    // Inserir a questão na tabela 'tarefas'
    $stmt = $conn->prepare("INSERT INTO tarefas (enunciado, resolucao, ano, materia, foto_enunciado, dificuldade) VALUES (?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Erro na preparação da consulta de tarefas: " . $conn->error);
    }
    $stmt->bind_param("ssisss", $enunciado, $resolucao, $ano, $materia, $foto_enunciado, $dificuldade);
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
            <select id="materia" name="materia" required>
                <!-- <option value="grandezas">Grandezas e vetores</option> -->
                <!-- <option value="cinematica_conceitos_basico">Cinemática – conceitos básicos</option> -->
                <!-- <option value="Cinemática – identificando os movimentos">Cinemática – identificando os movimentos</option> -->
                <!-- <option value="Movimento retilíneo uniforme (MRU)">Movimento retilíneo uniforme (MRU)</option> -->
                <!-- <option value="Movimento retilíneo uniformemente variado (MRUV)">Movimento retilíneo uniformemente variado (MRUV)</option> -->
                <!-- <option value="Movimentos sob ação da gravidade">Movimentos sob ação da gravidade</option> -->
                <!-- <option value="As Leis de Newton e suas aplicações">As Leis de Newton e suas aplicações</option> -->
                <!-- <option value="Movimento Circular Uniforme">Movimento Circular Uniforme</option> -->
                <!-- <option value="Dinâmica do movimento circular">Dinâmica do movimento circular</option> -->
                <!-- <option value="Trabalho energia potência">Trabalho energia potência</option> -->
                <option value="Impulso e Quantidade de Movimento">Impulso e Quantidade de Movimento</option>
                <option value="Gravitação Universal">Gravitação Universal</option>
                <option value="Estática">Estática</option>
                <option value="Hidrostática">Hidrostática</option>
                <option value="Hidrodinâmica">Hidrodinâmica</option>
                <option value="Temperatura e escalas de medida">Temperatura e escalas de medida</option>
                <option value="Dilatação térmica">Dilatação térmica</option>
                <option value="Calor">Calor</option>
                <option value="Processos de propagação de calor">Processos de propagação de calor</option>
                <option value="Termodinâmica e revolução industrial">Termodinâmica e revolução industrial</option>
                <option value="Primeira Lei da Termodinâmica">Primeira Lei da Termodinâmica</option>
                <option value="Segunda Lei da Termodinâmica">Segunda Lei da Termodinâmica</option>
                <option value="Entropia">Entropia</option>
                <option value="Ondas mecânicas">Ondas mecânicas</option>
                <option value="Interferência e difração de ondas mecânicas">Interferência e difração de ondas mecânicas</option>
                <option value="Acústica">Acústica</option>
                <option value="Reflexão da luz">Reflexão da luz</option>
                <option value="Refração da luz">Refração da luz</option>
                <option value="Ondulatória – Conceitos e definições">Ondulatória – Conceitos e definições</option>
                <option value="Ondulatória – Equação de Onda">Ondulatória – Equação de Onda</option>
                <option value="Ondulatória – Reflexão e refração de ondas">Ondulatória – Reflexão e refração de ondas</option>
                <option value="Ondulatória – Interferência de Ondas">Ondulatória – Interferência de Ondas</option>
                <option value="Ondulatória – Interferência luminosa – experimento de Young">Ondulatória – Interferência luminosa – experimento de Young</option>
                <option value="Ondulatória – Difração e dispersão">Ondulatória – Difração e dispersão</option>
                <option value="Ondulatória – Polarização e ressonância">Ondulatória – Polarização e ressonância</option>
                <option value="Ondulatória – Ondas sonoras">Ondulatória – Ondas sonoras</option>
                <option value="Ondulatória – Ondas estacionárias">Ondulatória – Ondas estacionárias</option>
                <option value="Ondulatória – Cordas vibrantes">Ondulatória – Cordas vibrantes</option>
                <option value="Ondulatória – Qualidades fisiológicas do som">Ondulatória – Qualidades fisiológicas do som</option>
                <option value="Ondulatória – Efeito Doppler">Ondulatória – Efeito Doppler</option>
                <option value="Ondulatória – Tubos sonoros">Ondulatória – Tubos sonoros</option>
                <option value="Eletricidade – Eletrostática – Carga elétrica e processos de eletrização">Eletricidade – Eletrostática – Carga elétrica e processos de eletrização</option>
                <option value="Eletricidade – Eletrostática – Força elétrica">Eletricidade – Eletrostática – Força elétrica</option>
                <option value="Eletricidade – Eletrostática – Campo elétrico">Eletricidade – Eletrostática – Campo elétrico</option>
                <option value="Eletricidade – Eletrostática – Potencial eletrostático">Eletricidade – Eletrostática – Potencial eletrostático</option>
                <option value="Eletricidade – Eletrostática – Superfícies eletrostáticas">Eletricidade – Eletrostática – Superfícies eletrostáticas</option>
                <option value="Eletricidade – Eletrostática – Condutor em equilíbrio eletrostático">Eletricidade – Eletrostática – Condutor em equilíbrio eletrostático</option>
                <option value="Eletricidade – Eletrodinâmica – Corrente elétrica">Eletricidade – Eletrodinâmica – Corrente elétrica</option>
                <option value="Eletricidade – Eletrodinâmica – Potência elétrica">Eletricidade – Eletrodinâmica – Potência elétrica</option>
                <option value="Eletricidade – Eletrodinâmica – Primeira Lei de Ohm">Eletricidade – Eletrodinâmica – Primeira Lei de Ohm</option>
                <option value="Eletricidade – Eletrodinâmica – Segunda Lei de Ohm">Eletricidade – Eletrodinâmica – Segunda Lei de Ohm</option>
                <option value="Eletricidade – Eletrodinâmica – Resistor equivalente">Eletricidade – Eletrodinâmica – Resistor equivalente</option>
                <option value="Eletricidade – Eletrodinâmica – Geradores">Eletricidade – Eletrodinâmica – Geradores</option>
                <option value="Eletricidade – Eletrodinâmica – Receptores">Eletricidade – Eletrodinâmica – Receptores</option>
                <option value="Eletricidade – Eletrodinâmica – Galvanômetros">Eletricidade – Eletrodinâmica – Galvanômetros</option>
                <option value="Eletricidade – Eletrodinâmica – Circuitos compostos">Eletricidade – Eletrodinâmica – Circuitos compostos</option>
                <option value="Eletricidade – Eletrodinâmica – Capacitores">Eletricidade – Eletrodinâmica – Capacitores</option>
                <option value="Eletricidade – Eletromagnetismo – Campo magnético">Eletricidade – Eletromagnetismo – Campo magnético</option>
            </select><br><br>


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

            <label for="dificuldade">Dificuldade:</label><br>
            <select id="dificuldade" name="dificuldade" required>
                <option value="Fácil">Fácil</option>
                <option value="Médio">Médio</option>
                <option value="Difícil">Difícil</option>
            </select><br><br>

            <input type="submit" value="Adicionar Questão">
        </form>
    </main>
</div>

<footer>
    <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
</footer>
</body>
</html>
