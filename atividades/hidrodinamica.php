<?php
session_start();
require_once('../conexao.php');

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$imagemPerfil = '../img/default-avatar.png';
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
    $imagemPerfil = !empty($usuario['foto']) && file_exists($_SERVER['DOCUMENT_ROOT'] . '../img/' . $usuario['foto'])
        ? '../img/' . $usuario['foto']
        : '../img/default-avatar.png';
    $nomeUsuario = $usuario['nome'] ?? $nomeUsuario;
}
$primeiroNome = isset($nomeUsuario) ? explode(' ', $nomeUsuario)[0] : 'Usuário';
$imagemPerfil = '../foto_usuario/default-avatar.png'; 

if (isset($usuario['foto'])) {
    $nomeImagem = $usuario['foto'];
    $caminhoImagem = $_SERVER['DOCUMENT_ROOT'] . '../foto_usuario/' . $nomeImagem;
    if (file_exists($caminhoImagem)) {
        $imagemPerfil = '../foto_usuario/' . $nomeImagem; 
    } else {
        $imagemPerfil = '../foto_usuario/default-avatar.png';
    }
}
$tabela = 'tarefas'; 
$questoes_por_pagina = 1;
$pagina_atual = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
$pagina_atual = ($pagina_atual > 0) ? $pagina_atual : 1;
$offset = ($pagina_atual - 1) * $questoes_por_pagina;

$total_questoes_sql = "SELECT COUNT(*) AS total FROM $tabela WHERE materia = 'Hidrodinâmica'";

$total_questoes_result = $conn->query($total_questoes_sql);
$total_questoes_row = $total_questoes_result->fetch_assoc();
$total_questoes = $total_questoes_row['total'];
$total_paginas = ceil($total_questoes / $questoes_por_pagina);

$questao_sql = "SELECT id, enunciado, resolucao, foto_enunciado, materia, ano, dificuldade FROM $tabela WHERE materia = 'Hidrodinâmica' LIMIT $questoes_por_pagina OFFSET $offset";

$questao_result = $conn->query($questao_sql);
$questoes_data = [];
if ($questao_result->num_rows > 0) {
    while ($questao = $questao_result->fetch_assoc()) {
        $questao_id = $questao['id'];
        $enunciado = $questao['enunciado'];
        $resolucao = $questao['resolucao'];
        $foto_enunciado = $questao['foto_enunciado'];
        $materia = $questao['materia']; 
        $ano = $questao['ano']; 
        $dificuldade = $questao['dificuldade']; 
        $alternativas_sql = "SELECT id, texto, correta FROM alternativas WHERE questao_id = $questao_id";
        $alternativas_result = $conn->query($alternativas_sql);
        $questao_data = [
            'id' => $questao_id,
            'enunciado' => $enunciado,
            'resolucao' => $resolucao,
            'foto_enunciado' => $foto_enunciado,
            'materia' => $materia,  
            'ano' => $ano,          
            'dificuldade' => $dificuldade,  
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
$enunciadoFiltro = isset($_GET['enunciado']) ? $_GET['enunciado'] : '';
$anoFiltro = isset($_GET['ano']) ? $_GET['ano'] : '';
$dificuldadeFiltro = isset($_GET['dificuldade']) ? $_GET['dificuldade'] : '';
$pagina_atual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$questoes_por_pagina = 1;
$offset = ($pagina_atual - 1) * $questoes_por_pagina;
$count_sql = "SELECT COUNT(*) AS total FROM $tabela WHERE materia = 'Hidrodinâmica'";

$conditions = [];
if ($enunciadoFiltro) {
    $conditions[] = "enunciado LIKE '%" . $conn->real_escape_string($enunciadoFiltro) . "%'";
}
if ($anoFiltro) {
    $conditions[] = "ano = '" . $conn->real_escape_string($anoFiltro) . "'";
}
if ($dificuldadeFiltro) {
    $conditions[] = "dificuldade = '" . $conn->real_escape_string($dificuldadeFiltro) . "'";
}

if (count($conditions) > 0) {
    $count_sql .= " AND " . implode(" AND ", $conditions);
}
$count_result = $conn->query($count_sql);
$total_questoes = $count_result->fetch_assoc()['total'];

$total_paginas = ceil($total_questoes / $questoes_por_pagina);

$questao_sql = "SELECT id, enunciado, resolucao, foto_enunciado, materia, ano, dificuldade
    FROM $tabela WHERE materia = 'Hidrodinâmica'";

if (count($conditions) > 0) {
    $questao_sql .= " AND " . implode(" AND ", $conditions);
}
$questao_sql .= " LIMIT $questoes_por_pagina OFFSET $offset";
$questao_result = $conn->query($questao_sql);
$questoes_data = [];
while ($questao = $questao_result->fetch_assoc()) {
    $alternativas_sql = "SELECT id, texto FROM alternativas WHERE questao_id = " . $questao['id'];
    $alternativas_result = $conn->query($alternativas_sql);
    
    $alternativas = [];
    while ($alternativa = $alternativas_result->fetch_assoc()) {
        $alternativas[] = $alternativa;
    }
    
    $questao['alternativas'] = $alternativas;
    $questoes_data[] = $questao;
}
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
</head>
<body>
<header class="d-flex justify-content-between align-items-center">
    <a href="../inicio.php">
        <img src="../img/logo.png" width="200px" alt="Logo">
    </a>
    <div class="perfil-header d-flex align-items-center">
        <a href="../configuracoes.php" class="d-flex align-items-center" style="text-decoration: none; color: white;">
            <img src="<?php echo htmlspecialchars($imagemPerfil); ?>" alt="Avatar" width="35px" height="35px" class="ml-3">
            <p class="m-0 ml-2"><span id="usuario-nome"><?php echo htmlspecialchars($primeiroNome); ?></span></p>
        </a>
        <a href="logout.php" title="Sair" class="d-flex align-items-center ml-3">
            <i class="fas fa-sign-out-alt" style="font-size: 20px; color: #FFD700;" title="Sair"></i>
        </a>
    </div>
</header>
<div class="page-container">
    <main class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="../assunto_p1.php" class="btn btn-voltar d-flex align-items-center">
                <i class="fa-solid fa-circle-arrow-left"></i> Voltar
            </a>
            <h3 class="font-weight-bold">Hidrodinâmica</h3>
        </div>

        <div class="filters-container mb-4">
            <form method="GET" action="">
                <div class="form-row justify-content-end">
                    <div class="form-group col-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="background-color: #001A4E; color: white; border: 0;"><i class="fa-solid fa-filter" style="color: #FFC100;"></i></span>
                            </div>
                            <input type="text" class="form-control rounded-0" id="enunciado" name="enunciado" value="<?php echo htmlspecialchars($enunciadoFiltro); ?>" placeholder="Filtrar por enunciado">
                        </div>
                    </div>


                    <div class="form-group col-md-2 d-flex align-items-center">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="background-color: #001A4E;  color: white; border: 0;"><i class="fa-solid fa-calendar" style="color: #FFC100;"></i></span>
                            </div>
                            <select class="form-control rounded-0" id="ano" name="ano">
                                <option value="">Ano</option>
                                <option value="2025" <?php echo ($anoFiltro == '2025') ? 'selected' : ''; ?>>2025</option>
                                <option value="2023" <?php echo ($anoFiltro == '2023') ? 'selected' : ''; ?>>2023</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-2 d-flex align-items-center">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="background-color: #001A4E; color:  white; border: 0;"><i class="fa-solid fa-chart-line" style="color: #FFC100;"></i></span>
                            </div>
                            <select class="form-control rounded-0" id="dificuldade" name="dificuldade">
                                <option value="">Dificuldade</option>
                                <option value="Fácil" <?php echo ($dificuldadeFiltro == 'Fácil') ? 'selected' : ''; ?>>Fácil</option>
                                <option value="Médio" <?php echo ($dificuldadeFiltro == 'Médio') ? 'selected' : ''; ?>>Médio</option>
                                <option value="Difícil" <?php echo ($dificuldadeFiltro == 'Difícil') ? 'selected' : ''; ?>>Difícil</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-sm" style="background-color: #001A4E; color: white; border: none;">Filtrar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="questoes-container">
            <?php foreach ($questoes_data as $questao): ?>
                <div class="questao card p-4 mb-3 container-fluid" data-ano="<?php echo htmlspecialchars($questao['ano']); ?>" data-dificuldade="<?php echo htmlspecialchars($questao['dificuldade']); ?>" data-enunciado="<?php echo htmlspecialchars($questao['enunciado']); ?>">
                    <p class="font-weight-bold text-muted">Q<?php echo htmlspecialchars($questao['id']); ?></p>
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <span class="badge badge-dark py-2 px-3 mr-2"><?php echo htmlspecialchars($questao['materia']); ?></span>
                            <span class="badge badge-dark py-2 px-3"><?php echo htmlspecialchars($questao['ano']); ?></span>
                        </div>
                        <div>
                            <?php 
                                $dificuldade = htmlspecialchars($questao['dificuldade']);
                                if ($dificuldade == 'Fácil') {
                                    $badge_class = 'badge-success';
                                } elseif ($dificuldade == 'Médio') {
                                    $badge_class = 'badge-warning';
                                } elseif ($dificuldade == 'Difícil') {
                                    $badge_class = 'badge-danger';
                                } else {
                                    $badge_class = 'badge-secondary';
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
                        <button type="submit" class="btn btn-sm btn-responder">Responder</button>

                            <button class="btn btn-info btn-sm btn-resolucao" data-questao-id="<?php echo $questao['id']; ?>">Ver Resolução</button>
                        </div>
                    </form>
                    
                    <p class="explicacao mt-3" style="display: none;"><?php echo htmlspecialchars($questao['resolucao']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <nav>
          <ul class="pagination justify-content-center">
              <li class="page-item <?php if ($pagina_atual <= 1) echo 'disabled'; ?>">
                  <a class="page-link" href="?pagina=1<?php echo $enunciadoFiltro ? '&enunciado=' . urlencode($enunciadoFiltro) : ''; ?>&ano=<?php echo urlencode($anoFiltro); ?>&dificuldade=<?php echo urlencode($dificuldadeFiltro); ?>" tabindex="-1" style="background-color: #001A4E; border-color: #001A4E; color: white;">
                      <i class="fa-solid fa-chevron-left" style="color: white;"></i>
                  </a>
              </li>
              <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                  <li class="page-item <?php if ($i == $pagina_atual) echo 'active'; ?>" style="background-color: #001A4E; border-color: #001A4E;">
                      <a class="page-link" href="?pagina=<?php echo $i; ?>&enunciado=<?php echo urlencode($enunciadoFiltro); ?>&ano=<?php echo urlencode($anoFiltro); ?>&dificuldade=<?php echo urlencode($dificuldadeFiltro); ?>" style="color: #001A4E;">
                          <?php echo $i; ?>
                      </a>
                  </li>
              <?php endfor; ?>
              <li class="page-item <?php if ($pagina_atual >= $total_paginas) echo 'disabled'; ?>">
                  <a class="page-link" href="?pagina=<?php echo $total_paginas; ?>&enunciado=<?php echo urlencode($enunciadoFiltro); ?>&ano=<?php echo urlencode($anoFiltro); ?>&dificuldade=<?php echo urlencode($dificuldadeFiltro); ?>" style="background-color: #001A4E; border-color: #001A4E; color: white;">
                      <i class="fa-solid fa-chevron-right" style="color: white;"></i>
                  </a>
              </li>
          </ul>
      </nav>
    </main>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
<script src="js/teste.js"></script>

<script>
    $(document).ready(function() {
    function filtrarQuestoes() {
        var filtroTexto = $('#filtro').val().toLowerCase(); 
        var filtroAno = $('#filtro-ano').val(); 
        var filtroDificuldade = $('#filtro-dificuldade').val(); 
        var questoes = $('.questao'); 

        console.log("Filtro de Texto:", filtroTexto);
        console.log("Filtro de Ano:", filtroAno);
        console.log("Filtro de Dificuldade:", filtroDificuldade);

        questoes.each(function() {
            var questao = $(this);
            var enunciado = questao.find('h6').text().toLowerCase(); 
            var ano = questao.data('ano'); 
            var dificuldade = questao.data('dificuldade'); 

            console.log("Enunciado:", enunciado, "Ano:", ano, "Dificuldade:", dificuldade);
            if (
                enunciado.includes(filtroTexto) &&  
                (filtroAno === '' || ano == filtroAno) && 
                (filtroDificuldade === '' || dificuldade == filtroDificuldade) 
            ) {
                questao.show(); 
            } else {
                questao.hide(); 
            }
        });
    }
    $('#filtro, #filtro-ano, #filtro-dificuldade').on('input change', function(event) {
        event.preventDefault();  
        filtrarQuestoes();
    });
    $(".btn-resolucao").click(function(event) {
        event.preventDefault();
        $(this).closest('.questao').find('.explicacao').toggle();
    });
    $(".responder-form").submit(function(event) {
        event.preventDefault();
        var form = $(this);
        var questaoId = form.find("input[name='questao_id']").val();
        var alternativaId = form.find("input[name='alternativa']:checked").val();

        if (!alternativaId) {
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
                questao_id: questaoId,
                alternativa_id: alternativaId
            },
            success: function(response) {
                var data = JSON.parse(response || "{}");
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
            },
            error: function() {
                Swal.fire({
                    title: "Erro inesperado!",
                    icon: "error",
                });
            }
        });
    });
    filtrarQuestoes();
});

    $(document).ready(function () {
        $('input, select').on('keypress', function (e) {
            if (e.which == 13) {  
                $(this).closest('form').submit(); 
            }
        });
    });
</script>

</body>
</html>
