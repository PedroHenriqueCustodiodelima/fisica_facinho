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

$tabela = 'questoes_nivel1';
$questoes_por_pagina = 3;

$pagina_atual = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
$pagina_atual = ($pagina_atual > 0) ? $pagina_atual : 1;

$offset = ($pagina_atual - 1) * $questoes_por_pagina;

$total_questoes_sql = "SELECT COUNT(*) AS total FROM $tabela WHERE materia = 'Movimentos sob ação da gravidade'";
$total_questoes_result = $conn->query($total_questoes_sql);
$total_questoes_row = $total_questoes_result->fetch_assoc();
$total_questoes = $total_questoes_row['total'];

$questao_sql = "SELECT id, enunciado, explicacao FROM $tabela WHERE materia = 'Movimentos sob ação da gravidade' LIMIT $offset, $questoes_por_pagina";
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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'responder') {
    $id_usuario = $usuario_id;
    $id_questao = intval($_POST['questao_id']);
    $id_alternativa = intval($_POST['alternativa_id']);
    $query = "SELECT correta FROM alternativas WHERE id = ? AND questao_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $id_alternativa, $id_questao);
    $stmt->execute();
    $result = $stmt->get_result();
    $alternativa = $result->fetch_assoc();

    if ($alternativa) {
        $correta = $alternativa['correta'] == 1;
        $query_inserir = "INSERT INTO tentativas_usuarios (id_usuario, id_questao, id_alternativa, correta, data_tentativa) 
                          VALUES (?, ?, ?, ?, NOW())";
        $stmt_inserir = $conn->prepare($query_inserir);
        $stmt_inserir->bind_param("iiii", $id_usuario, $id_questao, $id_alternativa, $correta);

        if ($stmt_inserir->execute()) {
            echo json_encode([
                'status' => 'success',
                'correct' => $correta,
                'message' => $correta ? 'Resposta correta!' : 'Resposta incorreta!',
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Erro ao salvar a tentativa: ' . $stmt_inserir->error,
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Alternativa inválida ou questão não encontrada.',
        ]);
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas - Introdução à Física</title>
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

        <h1 class="mt-4 mb-4">Atividades de Movimentos sob ação da gravidade</h1>

        <?php
        $mensagem = $mensagem ?? null; 
        ?>
        <div class="questoes-container">
            <?php foreach ($questoes_data as $questao): ?>
                <div class="questao mb-4 card">
                    <h5><?php echo htmlspecialchars($questao['enunciado']); ?></h5>
                    <form class="responder-form" method="POST" action="javascript:void(0);">
                        <input type="hidden" name="questao_id" value="<?php echo $questao['id']; ?>">
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
                        <button type="submit" class="btn btn-primary btn-responder">Responder</button>
                    </form>
                    <p class="explicacao mt-2" style="display: none;"><?php echo htmlspecialchars($questao['explicacao']); ?></p>
                    <button class="btn btn-info btn-resolucao" data-questao-id="<?php echo $questao['id']; ?>">Ver Resolução</button>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if ($total_questoes > $questoes_por_pagina): ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= ceil($total_questoes / $questoes_por_pagina); $i++): ?>
                        <li class="page-item <?php echo $i == $pagina_atual ? 'active' : ''; ?>">
                            <a class="page-link" href="grandeza_vetores.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        <?php endif; ?>
    </main>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(".btn-resolucao").click(function() {
        var questaoId = $(this).data('questao-id');
        var explicacao = $(this).closest('.questao').find('.explicacao');
        explicacao.toggle();
    });
    $(".responder-form").submit(function (event) {
        event.preventDefault(); 

        var form = $(this);
        var questao_id = form.find("input[name='questao_id']").val();
        var alternativa_id = form.find("input[name='alternativa']:checked").val();

        if (!alternativa_id) {
            Swal.fire({
                title: 'Selecione uma alternativa!',
                icon: 'warning',
            });
            return;
        }
        $.ajax({
            url: "", 
            method: "POST",
            data: {
                action: "responder",
                questao_id: questao_id,
                alternativa_id: alternativa_id
            },
            success: function (response) {
                try {
                    var data = JSON.parse(response); 
                    if (data.status === "success") {
                        Swal.fire({
                            title: data.message,
                            icon: data.correct ? "success" : "error", 
                        });
                    } else {
                        Swal.fire({
                            title: "Erro ao registrar resposta.",
                            icon: "error",
                        });
                    }
                } catch (e) {
                    Swal.fire({
                        title: "Erro inesperado!",
                        icon: "error",
                    });
                }
            },
            error: function () {
                Swal.fire({
                    title: "Erro na comunicação com o servidor.",
                    icon: "error",
                });
            }
        });
    });
</script>
</body>
</html>
