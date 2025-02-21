$(document).ready(function () {
  $('.responder-btn').click(function () {
    const questaoId = $(this).data('questao-id');
    const form = $(`.questao-form[data-questao-id='${questaoId}']`);
    const resposta = form.find('input[name="resposta"]:checked').val();
    if (!resposta) {
      Swal.fire('Erro', 'Selecione uma alternativa antes de responder.', 'error');
      return;
    }
    $.ajax({
      url: '', 
      method: 'POST',
      data: {
        id_questao: questaoId,
        resposta: resposta
      },
      dataType: 'json',
      success: function (response) {
        if (response.status === 'success') {
          Swal.fire('Sucesso', response.message, 'success');
        } else {
          Swal.fire('Erro', response.message, 'error');
        }
      },
      error: function () {
        Swal.fire('Erro', 'Houve um problema ao processar sua resposta. Tente novamente.', 'error');
      }
    });
  });
});
function filterByYear(ano) {
  var input = document.getElementById("searchEnunciado");
  var filter = input.value.toLowerCase(); // Filtro do enunciado
  var questoes = document.querySelectorAll(".questao"); // Pega todas as questões, não apenas da página atual

  questoes.forEach(function (questao) {
    var questaoAno = questao.getAttribute("data-ano");
    var enunciadoElem = questao.querySelector(".enunciado");
    var materiaElem = questao.querySelector(".materia");
    var enunciado = enunciadoElem ? enunciadoElem.textContent.toLowerCase() : "";
    var materia = materiaElem ? materiaElem.textContent.toLowerCase() : "";

    // Aplica o filtro: verifica o ano e se o enunciado ou a matéria correspondem
    if ((questaoAno == ano || !ano) && (enunciado.includes(filter) || materia.includes(filter))) {
      questao.style.display = ""; // Exibe a questão
    } else {
      questao.style.display = "none"; // Oculta a questão
    }
  });
}

function filterByText() {
  var input = document.getElementById("searchEnunciado");
  var filter = input.value.toLowerCase();
  var questoes = document.querySelectorAll(".questao"); // Pega todas as questões

  questoes.forEach(function (questao) {
    var enunciadoElem = questao.querySelector(".enunciado");
    var materiaElem = questao.querySelector(".materia");
    var enunciado = enunciadoElem ? enunciadoElem.textContent.toLowerCase() : "";
    var materia = materiaElem ? materiaElem.textContent.toLowerCase() : "";

    // Aplica o filtro de texto (enunciado ou matéria)
    if (enunciado.includes(filter) || materia.includes(filter)) {
      questao.style.display = ""; // Exibe a questão
    } else {
      questao.style.display = "none"; // Oculta a questão
    }
  });
}


function mostrarResolucao(id) {
var resolucao = document.getElementById("resolucao-" + id);
if (resolucao.style.display === "none" || resolucao.style.display === "") {
  resolucao.style.display = "block";
} else {
  resolucao.style.display = "none";
}
}

function verVideo(id) {
var videoDiv = document.getElementById("video-" + id);
if (videoDiv.style.display === "none" || videoDiv.style.display === "") {
  videoDiv.style.display = "block";
} else {
  videoDiv.style.display = "none";
}
}
