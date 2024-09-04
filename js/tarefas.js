document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.question-form');
    const btnResolucao = document.getElementById('btn-resolucao');
    const resolucao = document.getElementById('resolucao');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(form);
        fetch('responder_questao.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            const button = document.querySelector('.btn-responder');

            if (data.status === 'success') {
                button.style.backgroundColor = 'lightgreen';  // Muda a cor de fundo do botão para verde
                button.innerText = 'Resposta correta!';
            } else {
                button.style.backgroundColor = 'lightcoral';  // Muda a cor de fundo do botão para vermelho
                button.innerText = 'Resposta incorreta!';
            }

            setTimeout(() => {
                button.style.backgroundColor = '';  // Remove a cor de fundo após 2 segundos
                button.innerText = 'Responder';
            }, 2000);
        })
        .catch(error => console.error('Erro:', error));
    });

    btnResolucao.addEventListener('click', function() {
        if (resolucao.style.display === 'none') {
            resolucao.style.display = 'block';
            btnResolucao.innerText = 'Ocultar Resolução';
        } else {
            resolucao.style.display = 'none';
            btnResolucao.innerText = 'Ver Resolução';
        }
    });
});