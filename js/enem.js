document.addEventListener("DOMContentLoaded", function () {
    const forms = document.querySelectorAll("form");
    forms.forEach((form) => {
      form.addEventListener("submit", function (event) {
        event.preventDefault(); // Impede o envio padrão do formulário

        // Verifica se uma alternativa foi selecionada
        const alternativaSelecionada = form.querySelector('input[name="resposta"]:checked');
        if (!alternativaSelecionada) {
          Swal.fire({
            icon: "error",
            title: "Erro",
            text: "Por favor, selecione uma alternativa antes de responder.",
          });
          return; // Impede o envio do formulário
        }

        const formData = new FormData(form);
        fetch(form.action, {
          method: "POST",
          body: formData,
        })
          .then((response) => response.json())
          .then((data) => {
            if (data.status === "success") {
              Swal.fire({
                icon: "success",
                title: data.message,
                showConfirmButton: false,
                timer: 3000,
              });
            } else {
              Swal.fire({
                icon: "error",
                title: data.message,
                showConfirmButton: false,
                timer: 3000,
              });
            }
          })
          .catch((error) => {
            Swal.fire({
              icon: "error",
              title: "Erro ao enviar a resposta",
              text: error.message,
            });
          });
      });
    });

      filterByText();
      document.querySelector("#searchEnunciado").focus();
    });
    function mostrarResolucao(id) {
      var resolucao = document.getElementById('resolucao-' + id);
      resolucao.style.display = resolucao.style.display === 'none' ? 'block' : 'none';
    }
    function verVideo(id) {
      var videoDiv = document.getElementById('video-' + id);
      if (videoDiv.style.display === 'none') {
        videoDiv.style.display = 'block';
      } else {
        videoDiv.style.display = 'none';
      }
    }
    function filterByText() {
      var input = document.getElementById('searchEnunciado');
      var filter = input.value.toLowerCase();
      var questoes = document.querySelectorAll('.questao');
      questoes.forEach(function (questao) {
        var enunciado = questao.querySelector('.enunciado').textContent.toLowerCase();
        var materia = questao.querySelector('.materia').textContent.toLowerCase();
        
        if (enunciado.includes(filter) || materia.includes(filter)) {
          questao.style.display = '';
        } else {
          questao.style.display = 'none';
        }
      });
    }
    function filterByYear(ano) {
      var input = document.getElementById('searchEnunciado');
      var filter = input.value.toLowerCase();
      var questoes = document.querySelectorAll('.questao');
      questoes.forEach(function (questao) {
        var questaoAno = questao.getAttribute('data-ano');
        var enunciado = questao.querySelector('.enunciado').textContent.toLowerCase();
        var materia = questao.querySelector('.materia').textContent.toLowerCase();
        if ((questaoAno == ano) && (enunciado.includes(filter) || materia.includes(filter))) {
          questao.style.display = '';
        } else {
          questao.style.display = 'none';
        }
      });
    }