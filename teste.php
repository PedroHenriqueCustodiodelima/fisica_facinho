<?php
include("funcoes_php/funcoes_teste.php");

$enunciadoFiltro = isset($_GET['enunciado']) ? $_GET['enunciado'] : '';
$anoFiltro = isset($_GET['ano']) ? $_GET['ano'] : '';
$dificuldadeFiltro = isset($_GET['dificuldade']) ? $_GET['dificuldade'] : '';

$pagina_atual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

$questoes_por_pagina = 1;
$offset = ($pagina_atual - 1) * $questoes_por_pagina;

$count_sql = "SELECT COUNT(*) AS total FROM $tabela WHERE materia = 'grandezas'";

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
                FROM $tabela WHERE materia = 'grandezas'";

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
    <link rel="stylesheet" href="./css/atividades.css">
</head>
<body>
<div class="page-container">
    <main class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="../assunto_p1.php" class="btn btn-voltar d-flex align-items-center">
                <i class="fa-solid fa-circle-arrow-left"></i> Voltar
            </a>
            <h3 class="font-weight-bold">Introdução a Física</h3>
        </div>

        <div class="filters-container mb-4">
            <form method="GET" action="">
                <div class="form-row justify-content-end">
                    <!-- Filtro Enunciado -->
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
                                <option value="2024" <?php echo ($anoFiltro == '2024') ? 'selected' : ''; ?>>2024</option>
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
