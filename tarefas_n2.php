<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

$imagemPerfil = 'img/default-avatar.png';
$nomeUsuario = 'Usuário';

$stmt = $conn->prepare("SELECT email FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$email = $result->fetch_assoc()['email'] ?? '';

if (strpos($email, 'edu.br') !== false) {
    $stmt = $conn->prepare("SELECT foto, nome FROM professores WHERE id = ?");
} else {
    $stmt = $conn->prepare("SELECT foto, nome FROM usuarios WHERE id = ?");
}

$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

if ($usuario) {
    $imagemPerfil = $usuario['foto'] ?? $imagemPerfil;
    $nomeUsuario = $usuario['nome'] ?? $nomeUsuario;
}

function registrarTentativa($conn, $usuario_id, $questao_id, $alternativa_id, $nivel) {
    $stmt = $conn->prepare("SELECT correta FROM alternativas WHERE id = ?");
    $stmt->bind_param("i", $alternativa_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $alternativa = $result->fetch_assoc();

    $correta = $alternativa['correta'] ? 1 : 0;

    $stmt = $conn->prepare("
        INSERT INTO tentativas_usuarios (id_usuario, id_questao, id_alternativa, correta, nivel, data_tentativa) 
        VALUES (?, ?, ?, ?, ?, NOW())
    ");
    $stmt->bind_param("iiiis", $usuario_id, $questao_id, $alternativa_id, $correta, $nivel);

    if ($stmt->execute()) {
        return $correta; 
    } else {
        return false; 
    }
}

// Define o nível como 2
$nivel = 2;
$tabela = 'questoes_nivel2';
$questoes_por_pagina = 3;

$pagina_atual = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
$pagina_atual = ($pagina_atual > 0) ? $pagina_atual : 1;

$offset = ($pagina_atual - 1) * $questoes_por_pagina;

// Contar o total de questões no nível 2
$total_questoes_sql = "SELECT COUNT(*) AS total FROM $tabela";
$total_questoes_result = $conn->query($total_questoes_sql);
$total_questoes_row = $total_questoes_result->fetch_assoc();
$total_questoes = $total_questoes_row['total'];

// Verificar se o total de questões é maior que zero
if ($total_questoes > 0) {
    // Selecionar questões do nível 2
    $questao_sql = "SELECT id, enunciado, explicacao FROM $tabela LIMIT $offset, $questoes_por_pagina";
    $questao_result = $conn->query($questao_sql);

    $questoes_data = [];

    if ($questao_result->num_rows > 0) {
        while ($questao = $questao_result->fetch_assoc()) {
            $questao_id = $questao['id'];
            $enunciado = $questao['enunciado'];
            $explicacao = $questao['explicacao'];
            $alternativas_sql = "SELECT id, texto, correta FROM alternativas WHERE questao_id = $questao_id";
            $alternativas_result = $conn->query($alternativas_sql);

            $questao_data = [
                'id' => $questao_id,
                'enunciado' => $enunciado,
                'explicacao' => $explicacao,
                'alternativas' => []
            ];

            while ($alternativa = $alternativas_result->fetch_assoc()) {
                $questao_data['alternativas'][] = $alternativa;
            }

            $questoes_data[] = $questao_data;
        }
    }
} else {
    $questoes_data = []; // Nenhuma questão encontrada
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $questao_id = $_POST['questao_id'];
    $alternativa_id = $_POST['alternativa'];
    $correta = registrarTentativa($conn, $usuario_id, $questao_id, $alternativa_id, $nivel);

    if ($correta) {
        echo "<script>alert('Resposta correta!');</script>";
    } else {
        echo "<script>alert('Resposta incorreta!');</script>";
    }

    header("Location: tarefas.php?pagina={$pagina_atual}");
    exit();
}

$stmt->close();
$conn->close();

$total_paginas = ceil($total_questoes / $questoes_por_pagina);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Configurações</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="css/tarefas.css">
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
    <div class="voltar-container mb-4">
        <a href="tarefas.php" class="custom-link">
            <i class="fa-solid fa-circle-arrow-left"></i> <span>Voltar</span>
        </a>
    </div>
    
    <main>
        <?php if (!empty($questoes_data)): ?>
            <?php $index = 1; ?>
            <?php foreach ($questoes_data as $questao_data): ?>
                <form action="tarefas.php?pagina=<?php echo $pagina_atual; ?>" method="post" class="question-form">
                    <div class="question-container">
                        <h3>Questão <?php echo $index; ?>: <?php echo $questao_data['enunciado']; ?></h3>
                        <ul>
                            <?php foreach ($questao_data['alternativas'] as $alternativa): ?>
                                <li>
                                    <input type="radio" name="alternativa" value="<?php echo $alternativa['id']; ?>" id="q2<?php echo $alternativa['id']; ?>">
                                    <label for="q2<?php echo $alternativa['id']; ?>"><?php echo $alternativa['texto']; ?></label>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <input type="hidden" name="questao_id" value="<?php echo $questao_data['id']; ?>">
                        <input type="hidden" name="nivel" value="<?php echo $nivel; ?>">
                        <button type="submit" class="btn-responder">Responder</button>
                    </div>
                </form>
                <?php $index++; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="question-container">Nenhuma questão encontrada.</div>
        <?php endif; ?>

        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item <?php if ($pagina_atual <= 1) echo 'disabled'; ?>">
                    <a class="page-link" href="?nivel=<?php echo $nivel; ?>&pagina=<?php echo $pagina_atual - 1; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                    <li class="page-item <?php if ($i == $pagina_atual) echo 'active'; ?>">
                        <a class="page-link" href="?nivel=<?php echo $nivel; ?>&pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?php if ($pagina_atual >= $total_paginas) echo 'disabled'; ?>">
                    <a class="page-link" href="?nivel=<?php echo $nivel; ?>&pagina=<?php echo $pagina_atual + 1; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </main>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</body>
</html>
