$(document).ready(function() {
    // Filtro de questões
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

    // Filtros acionados pelo usuário
    $('#filtro, #filtro-ano, #filtro-dificuldade').on('input change', function(event) {
        event.preventDefault();  // Impede o comportamento padrão de envio de formulário
        filtrarQuestoes();
    });

    // Exibir/ocultar a explicação ao clicar no botão
    $(".btn-resolucao").click(function(event) {
        event.preventDefault();
        $(this).closest('.questao').find('.explicacao').toggle();
    });

    // Envio do formulário de resposta via AJAX
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
            url: "", // Substitua pelo seu URL de processamento
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
