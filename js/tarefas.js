document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('.question-form');

    forms.forEach((form, index) => {
        const btnResolucao = document.getElementById(`btn-resolucao-${index}`);
        const resolucao = document.getElementById(`resolucao-${index}`);
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(form);
            fetch('responder_questao.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const button = form.querySelector('.btn-responder');

                if (data.status === 'success') {
                    button.style.backgroundColor = 'lightgreen'; 
                    button.innerText = 'Resposta correta!';
                    if (typeof confetti === 'function') {
                        confetti({
                            particleCount: 100,
                            spread: 70,
                            origin: { y: 0.6 }
                        });
                    } else {
                        console.error('Função confetti não encontrada.');
                    }

                } else {
                    button.style.backgroundColor = 'lightcoral';  
                    button.innerText = 'Resposta incorreta!';
                }

                setTimeout(() => {
                    button.style.backgroundColor = '';  
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
});
