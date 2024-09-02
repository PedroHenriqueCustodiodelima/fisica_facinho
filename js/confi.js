document.getElementById('upload-imagem').addEventListener('change', function(event) {
    const reader = new FileReader();
    reader.onload = function() {
        const output = document.getElementById('preview-imagem');
        output.src = reader.result;
        const avatar = document.getElementById('avatar-imagem-main');
        avatar.src = reader.result;
    }
        reader.readAsDataURL(event.target.files[0]);
    });
    document.getElementById('preview-imagem').addEventListener('click', function() {
    document.getElementById('upload-imagem').click();
});


document.addEventListener('DOMContentLoaded', function () {
    var ctxEsquerda = document.getElementById('grafico-esquerda').getContext('2d');
    var graficoEsquerda = new Chart(ctxEsquerda, {
        type: 'pie', 
        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'], 
            datasets: [{
                label: 'Exemplo de Dados',
                data: [12, 19, 3, 5, 2, 3], 
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ], 
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ], 
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top', 
                },
                tooltip: {
                    callbacks: {
                        label: function (tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                },
                datalabels: {
                    display: false 
                },
                rotation: {
                    angle: 0 
                },
                perspective: {
                    enabled: true, 
                    depth: 0.3 
                }
            }
        }
    });
});
