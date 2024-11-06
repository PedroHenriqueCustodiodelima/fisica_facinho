<?php
session_start();
require_once('../conexao.php');

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$imagemPerfil = '/img/default-avatar.png';
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
    $imagemPerfil = !empty($usuario['foto']) && file_exists($_SERVER['DOCUMENT_ROOT'] . '/img/' . $usuario['foto'])
                    ? '/img/' . $usuario['foto']
                    : '/img/default-avatar.png';
    $nomeUsuario = $usuario['nome'] ?? $nomeUsuario;
}

$nivel = 1;
$tabela = 'questoes_nivel1';
$questoes_por_pagina = 3;

$pagina_atual = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
$pagina_atual = ($pagina_atual > 0) ? $pagina_atual : 1;

$offset = ($pagina_atual - 1) * $questoes_por_pagina;

// Modificar para a matéria "Impulso e Quantidade de Movimento"
$total_questoes_sql = "SELECT COUNT(*) AS total FROM $tabela WHERE materia = 'Impulso e Quantidade de Movimento'";
$total_questoes_result = $conn->query($total_questoes_sql);
$total_questoes_row = $total_questoes_result->fetch_assoc();
$total_questoes = $total_questoes_row['total'];

$questao_sql = "SELECT id, enunciado, explicacao FROM $tabela WHERE materia = 'Impulso e Quantidade de Movimento' LIMIT $offset, $questoes_por_pagina";
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
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas - Impulso e Quantidade de Movimento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../css/tarefas.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/canvas-confetti/1.5.1/confetti.min.js"></script>
</head>
<body>
<div class="page-container">
    <header class="d-flex justify-content-between align-items-center">
        <a href="../inicio.php">
            <img src="../img/logo.png" width="200px" alt="Logo">
        </a>
        <div class="perfil-header d-flex align-items-center">
            <img id="avatar-imagem" src="<?php echo htmlspecialchars($imagemPerfil); ?>" alt="Avatar" width="50px" height="50px" class="ml-3">
            <p class="m-0 ml-2"><span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span></p>
        </div>
    </header>

    <main class="container">
        <div class="voltar-container mb-4">
            <a href="../assunto_p1.php" class="custom-link">
                <i class="fa-solid fa-circle-arrow-left"></i> <span>Voltar</span>
            </a>
        </div>

        <h1 class="mt-4 mb-4">Atividades sobre Impulso e Quantidade de Movimento</h1>

        <div class="questoes-container">
            <?php foreach ($questoes_data as $questao): ?>
                <div class="questao mb-4 card">
                    <h5><?php echo htmlspecialchars($questao['enunciado']); ?></h5>
                    <form class="responder-form" method="POST" action="../responder_questao.php">
                        <input type="hidden" name="questao_id" value="<?php echo $questao['id']; ?>">
                        <input type="hidden" name="nivel" value="<?php echo $nivel; ?>">
                        <input type="hidden" name="pagina" value="tarefas_n1.php">
                        <ul>
                            <?php foreach ($questao['alternativas'] as $alternativa): ?>
                                <li>
                                    <label>
                                        <input type="radio" name="alternativa" value="<?php echo $alternativa['id']; ?>" required>
                                        <?php echo htmlspecialchars($alternativa['texto']); ?>
                                    </label>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <button type="submit" class="btn btn-primary">Responder</button>
                    </form>
                    <p class="explicacao mt-2" style="display: none;"><?php echo htmlspecialchars($questao['explicacao']); ?></p>
                    <button class="btn btn-info btn-resolucao" data-questao-id="<?php echo $questao['id']; ?>">Ver Resolução</button>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if ($total_questoes > $questoes_por_pagina): ?>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php for ($i = 1; $i <= ceil($total_questoes / $questoes_por_pagina); $i++): ?>
                        <li class="page-item <?php echo ($i == $pagina_atual) ? 'active' : ''; ?>">
                            <a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        <?php endif; ?>
    </main>

    <footer>
        <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
    </footer>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    <?php if (isset($_GET['mensagem'])): ?>
        let mensagem = "<?php echo $_GET['mensagem']; ?>";
        let titulo, texto;

        if (mensagem === 'acertou') {
            titulo = "Parabéns!";
            texto = "Você acertou a questão.";
        } else if (mensagem === 'errou') {
            titulo = "Infelizmente!";
            texto = "Você errou a questão.";
        }

        Swal.fire({
            title: titulo,
            text: texto,
            icon: mensagem === 'acertou' ? 'success' : 'error',
            confirmButtonText: 'OK'
        });
    <?php endif; ?>

    $('.btn-resolucao').on('click', function() {
        var questaoId = $(this).data('questao-id');
        var explicacao = $(this).closest('.questao').find('.explicacao');
        explicacao.toggle();
    });
});
</script>

</body>
</html>
