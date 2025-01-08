<?php
include("funcoes_php/funcoes_enem.php");
include 'header.php';
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>concurso</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="css/atividades.css">
</head>
<body>

<div class="page-container">
    <main class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="concurso.php" class="btn btn-voltar d-flex align-items-center">
                <i class="fa-solid fa-circle-arrow-left"></i> Voltar
            </a>
            <h3 class="font-weight-bold">ENEM</h3>
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
                                <span class="input-group-text" style="background-color: #001A4E; color: white; border: 0;"><i class="fa-solid fa-calendar" style="color: #FFC100;"></i></span>
                            </div>
                            <select class="form-control rounded-0" id="ano" name="ano">
                                <option value="">Ano</option>
                                <?php
                                foreach ($anos_distinct as $ano) {
                                    echo '<option value="' . $ano . '"' . ($anoFiltro == $ano ? ' selected' : '') . '>' . $ano . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-2 d-flex align-items-center">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="background-color: #001A4E; color: white; border: 0;"><i class="fa-solid fa-book" style="color: #FFC100;"></i></span>
                            </div>
                            <select class="form-control rounded-0" id="materia" name="materia">
                                <option value="">Matéria</option>
                                <?php
                                foreach ($materias_distinct as $materia) {
                                    echo '<option value="' . htmlspecialchars($materia) . '"' . ($materiaFiltro == $materia ? ' selected' : '') . '>' . htmlspecialchars($materia) . '</option>';
                                }
                                ?>
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
                <div class="questao card p-4 mb-3 container-fluid" data-ano="<?php echo htmlspecialchars($questao['ano']); ?>" data-enunciado="<?php echo htmlspecialchars($questao['enunciado']); ?>">
                    <p class="font-weight-bold text-muted">Q<?php echo htmlspecialchars($questao['id']); ?></p>
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <span class="badge badge-dark py-2 px-3 mr-2"><?php echo htmlspecialchars($questao['materia']); ?></span>
                            <span class="badge badge-dark py-2 px-3"><?php echo htmlspecialchars($questao['ano']); ?></span>
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
                    <a class="page-link" href="?pagina=1<?php echo $enunciadoFiltro ? '&enunciado=' . urlencode($enunciadoFiltro) : ''; ?>&ano=<?php echo urlencode($anoFiltro); ?>" tabindex="-1" style="background-color: #001A4E; border-color: #001A4E; color: white;">
                        <i class="fa-solid fa-chevron-left" style="color: white;"></i>
                    </a>
                </li>
                
                <?php
                $pagina_inicio = max(1, $pagina_atual - 5);
                $pagina_fim = min($total_paginas, $pagina_atual + 4);
                for ($i = $pagina_inicio; $i <= $pagina_fim; $i++):
                ?>
                    <li class="page-item <?php if ($i == $pagina_atual) echo 'active'; ?>" style="background-color: #001A4E; border-color: #001A4E;">
                        <a class="page-link" href="?pagina=<?php echo $i; ?>&enunciado=<?php echo urlencode($enunciadoFiltro); ?>&ano=<?php echo urlencode($anoFiltro); ?>" style="color: #001A4E;">
                            <?php echo $i; ?>
                        </a>
                    </li>
                <?php endfor; ?>

                <li class="page-item <?php if ($pagina_atual >= $total_paginas) echo 'disabled'; ?>">
                    <a class="page-link" href="?pagina=<?php echo $total_paginas; ?>&enunciado=<?php echo urlencode($enunciadoFiltro); ?>&ano=<?php echo urlencode($anoFiltro); ?>" style="background-color: #001A4E; border-color: #001A4E; color: white;">
                        <i class="fa-solid fa-chevron-right" style="color: white;"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </main>
</div>
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
    $(document).ready(function() {
    $(".responder-form").submit(function(event) {
        event.preventDefault();  // Previne o envio do formulário padrão
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
            url: "funcoes_enem.php",
            method: "POST",
            data: {
                action: "responder",
                questao_id: questaoId,
                alternativa: alternativaId
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
<script src="js/teste.js"></script>
</body>
</html>
