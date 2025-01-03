<?php
session_start();
require_once('../conexao.php');

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$imagemPerfil = '/img/default-avatar.png';
$nomeUsuario = 'Usuário';

// Buscar dados do usuário
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

// Paginação
$tabela = 'tarefas'; 
$questoes_por_pagina = 1;

$pagina_atual = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
$pagina_atual = ($pagina_atual > 0) ? $pagina_atual : 1;

$offset = ($pagina_atual - 1) * $questoes_por_pagina;

// Total de questões
$total_questoes_sql = "SELECT COUNT(*) AS total FROM $tabela WHERE materia = 'grandezas'";
$total_questoes_result = $conn->query($total_questoes_sql);
$total_questoes_row = $total_questoes_result->fetch_assoc();
$total_questoes = $total_questoes_row['total'];

// Buscar as questões com paginação
$questao_sql = "SELECT id, enunciado, resolucao, foto_enunciado, materia, ano, dificuldade FROM $tabela WHERE materia = 'grandezas' LIMIT $questoes_por_pagina OFFSET $offset";
$questao_result = $conn->query($questao_sql);

$questoes_data = [];

if ($questao_result->num_rows > 0) {
    while ($questao = $questao_result->fetch_assoc()) {
        $questao_id = $questao['id'];
        $enunciado = $questao['enunciado'];
        $resolucao = $questao['resolucao'];
        $foto_enunciado = $questao['foto_enunciado'];
        $materia = $questao['materia']; // Matéria da questão
        $ano = $questao['ano'];         // Ano da questão
        $dificuldade = $questao['dificuldade']; // Dificuldade da questão

        // Buscando as alternativas relacionadas à questão
        $alternativas_sql = "SELECT id, texto, correta FROM alternativas WHERE questao_id = $questao_id";
        $alternativas_result = $conn->query($alternativas_sql);

        $questao_data = [
            'id' => $questao_id,
            'enunciado' => $enunciado,
            'resolucao' => $resolucao,
            'foto_enunciado' => $foto_enunciado,
            'materia' => $materia,  // Adicionando a matéria
            'ano' => $ano,          // Adicionando o ano
            'dificuldade' => $dificuldade,  // Adicionando a dificuldade
            'alternativas' => []
        ];

        while ($alternativa = $alternativas_result->fetch_assoc()) {
            $questao_data['alternativas'][] = $alternativa;
        }

        $questoes_data[] = $questao_data;
    }
}



// Responder uma questão
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'responder') {
    $id_usuario = $usuario_id;
    $id_questao = intval($_POST['questao_id']);
    $id_alternativa = intval($_POST['alternativa_id']);
    
    // Verificar se a alternativa é correta
    $query = "SELECT correta FROM alternativas WHERE id = ? AND questao_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $id_alternativa, $id_questao);
    $stmt->execute();
    $result = $stmt->get_result();
    $alternativa = $result->fetch_assoc();

    if ($alternativa) {
        $correta = $alternativa['correta'] == 1;
        
        // Inserir tentativa no banco
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

$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : '';
$filtro_ano = isset($_GET['filtro_ano']) ? $_GET['filtro_ano'] : '';
$filtro_dificuldade = isset($_GET['filtro_dificuldade']) ? $_GET['filtro_dificuldade'] : '';

// Filtra as questões de acordo com os parâmetros recebidos
$questoes_data = array_filter($questoes_data, function($questao) use ($filtro, $filtro_ano, $filtro_dificuldade) {
    $enunciado = strtolower($questao['enunciado']);
    $ano = $questao['ano'];
    $dificuldade = $questao['dificuldade'];

    return (
        (empty($filtro) || strpos($enunciado, strtolower($filtro)) !== false) &&
        (empty($filtro_ano) || $ano == $filtro_ano) &&
        (empty($filtro_dificuldade) || $dificuldade == $filtro_dificuldade)
    );
});

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas - Física</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../css/atividades.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/canvas-confetti/1.5.1/confetti.min.js"></script>
</head>
<body>
<div class="page-container">
    <header class="d-flex justify-content-between align-items-center">
        <a href="../inicio.php">
            <img src="../img/logo.png" width="150px" alt="Logo">
        </a>
        <div class="perfil-header d-flex align-items-center">
            <a href="./configuracoes.php" class="d-flex align-items-center" style="text-decoration: none;">
                <img id="avatar-imagem" src="<?php echo htmlspecialchars('../' . $imagemPerfil); ?>" alt="Avatar" width="50px" height="50px" class="ml-3">
                <p class="m-0 ml-2">Olá, <span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span>!</p>
            </a>
        </div>
    </header>

    <main class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="font-weight-bold">Grandezas e vetores</h3>
        <a href="../assunto_p1.php" class="btn btn-secondary d-flex align-items-center">
            <i class="fa-solid fa-circle-arrow-left"></i> Voltar
        </a>
    </div>

    <!-- Filtro de questões -->
    <!-- Filtro de questões -->
<div class="mb-4 text-center d-flex justify-content-end ml-auto">
    <form method="GET" action="introducao_fisica.php" class="d-flex">
        <input type="text" id="filtro" name="filtro" class="form-control filtro mb-2 mr-2" placeholder="Filtrar questões..." value="<?php echo isset($_GET['filtro']) ? htmlspecialchars($_GET['filtro']) : ''; ?>" style="width: 200px;" onkeyup="this.form.submit()">
        
        <!-- Filtro de ano -->
        <select id="filtro-ano" name="filtro_ano" class="form-control mb-2 mr-2" onchange="this.form.submit()" style="width: 120px;">
            <option value="">Filtrar por ano</option>
            <?php
                // Popula o filtro de ano com os anos existentes nas questões
                $anos = array_unique(array_column($questoes_data, 'ano'));
                sort($anos);
                foreach ($anos as $ano) {
                    $selected = (isset($_GET['filtro_ano']) && $_GET['filtro_ano'] == $ano) ? 'selected' : '';
                    echo "<option value=\"$ano\" $selected>$ano</option>";
                }
            ?>
        </select>

        <!-- Filtro de dificuldade -->
        <select id="filtro-dificuldade" name="filtro_dificuldade" class="form-control mb-2" onchange="this.form.submit()" style="width: 120px;">
            <option value="">Filtrar por dificuldade</option>
            <option value="Fácil" <?php echo (isset($_GET['filtro_dificuldade']) && $_GET['filtro_dificuldade'] == 'Fácil') ? 'selected' : ''; ?>>Fácil</option>
            <option value="Médio" <?php echo (isset($_GET['filtro_dificuldade']) && $_GET['filtro_dificuldade'] == 'Médio') ? 'selected' : ''; ?>>Médio</option>
            <option value="Difícil" <?php echo (isset($_GET['filtro_dificuldade']) && $_GET['filtro_dificuldade'] == 'Difícil') ? 'selected' : ''; ?>>Difícil</option>
        </select>
    </form>
</div>


    <div class="questoes-container">
        <?php foreach ($questoes_data as $questao): ?>
            <div class="questao card p-4 mb-3 container-fluid" data-ano="<?php echo htmlspecialchars($questao['ano']); ?>" data-dificuldade="<?php echo htmlspecialchars($questao['dificuldade']); ?>">
                <p class="font-weight-bold text-muted">Q<?php echo htmlspecialchars($questao['id']); ?></p>
                <!-- Linha com matéria, ano e dificuldade -->
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <span class="badge badge-dark py-2 px-3 mr-2"><?php echo htmlspecialchars($questao['materia']); ?></span>
                        <span class="badge badge-dark py-2 px-3"><?php echo htmlspecialchars($questao['ano']); ?></span>
                    </div>

                    <div>
                        <?php 
                            $dificuldade = htmlspecialchars($questao['dificuldade']);
                            if ($dificuldade == 'Fácil') {
                                $badge_class = 'badge-success'; // Verde
                            } elseif ($dificuldade == 'Médio') {
                                $badge_class = 'badge-warning'; // Amarelo
                            } elseif ($dificuldade == 'Difícil') {
                                $badge_class = 'badge-danger'; // Vermelho
                            } else {
                                $badge_class = 'badge-secondary'; // Para qualquer outro valor
                            }
                        ?>
                        <span class="badge <?php echo $badge_class; ?> py-2 px-3"><?php echo $dificuldade; ?></span>
                    </div>
                </div>
                <hr class="my-3 hr-dark">
                <h6 class="font-weight-bold mb-3 text-dark"><?php echo htmlspecialchars($questao['enunciado']); ?></h6>

                <form class="responder-form" method="POST" action="javascript:void(0);">
                    <input type="hidden" name="questao_id" value="<?php echo $questao['id']; ?>">
                    <ul class="list-unstyled">
                        <?php foreach ($questao['alternativas'] as $key => $alternativa): ?>
                            <li class="mb-2">
                                <label>
                                    <input type="radio" name="alternativa" value="<?php echo $alternativa['id']; ?>" required>
                                    <strong><?php echo chr(65 + $key); ?>.</strong> <?php echo htmlspecialchars($alternativa['texto']); ?>
                                </label>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary btn-sm">Responder</button>
                        <button class="btn btn-info btn-sm btn-resolucao" data-questao-id="<?php echo $questao['id']; ?>">Ver Resolução</button>
                    </div>
                </form>
                
                <p class="explicacao mt-3" style="display: none;"><?php echo htmlspecialchars($questao['resolucao']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if ($total_questoes > $questoes_por_pagina): ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= ceil($total_questoes / $questoes_por_pagina); $i++): ?>
                    <li class="page-item <?php echo $i == $pagina_atual ? 'active' : ''; ?>">
                        <a class="page-link" href="introducao_fisica.php?pagina=<?php echo $i; ?>&filtro=<?php echo $filtro; ?>&filtro_ano=<?php echo $filtro_ano; ?>&filtro_dificuldade=<?php echo $filtro_dificuldade; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    <?php endif; ?>
</main>

<script>
    function filtrarQuestoes() {
        var filtroTexto = document.getElementById('filtro').value.toLowerCase(); 
        var filtroAno = document.getElementById('filtro-ano').value; 
        var filtroDificuldade = document.getElementById('filtro-dificuldade').value; 
        var questoes = document.querySelectorAll('.questao'); 

        console.log("Filtro de Texto:", filtroTexto);
        console.log("Filtro de Ano:", filtroAno);
        console.log("Filtro de Dificuldade:", filtroDificuldade);

        questoes.forEach(function(questao) {
            var enunciado = questao.querySelector('h6').textContent.toLowerCase(); 
            var ano = questao.getAttribute('data-ano'); 
            var dificuldade = questao.getAttribute('data-dificuldade'); 

            console.log("Enunciado:", enunciado, "Ano:", ano, "Dificuldade:", dificuldade);
            if (
                (enunciado.includes(filtroTexto)) &&  
                (filtroAno === '' || ano === filtroAno) && 
                (filtroDificuldade === '' || dificuldade === filtroDificuldade) 
            ) {
                questao.style.display = 'block'; 
            } else {
                questao.style.display = 'none'; 
            }
        });
    }
</script>

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