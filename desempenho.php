<?php
include("funcoes_php/funcoes_desempenho.php");
include "header.php";
$resultado = contarTentativasPorDia($usuario_id, $conn);
$tentativasPorDia = $resultado['diasSemana']; 
$mediaDiaria = $resultado['mediaDiaria']; 
$acertosPorHora = contarAcertosPorHora($usuario_id, $conn); 
$mediaAcertosPorHora = calcularMediaAcertosPorHora($acertosPorHora); 
$acertosPorHoraJson = json_encode($acertosPorHora);
$usuario_id = $_SESSION['usuario_id'];
$tentativasPorConcurso = contarTentativasPorConcurso($usuario_id, $conn);
$concursos = array_keys($tentativasPorConcurso); 
$tentativas = array_values($tentativasPorConcurso); 

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Configurações</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="css/desempenho.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="js/teste.js"></script>
</head>
<body>
<main class="container py-5">
    <h2 class="mb-5 text-center fw-bold">Desempenho</h2>
    <div class="row g-4">
        <div class="col-md-3">
            <div class="card shadow-lg h-100 border-0 rounded-4 p-4 bg-light">
                <div class="card-body d-flex flex-column align-items-start position-relative">
                    <i class="fas fa-list fa-lg text-muted position-absolute top-0 end-0 mt-2 me-2"></i>
                    <h6 class="fw-semibold text-muted mb-1">Questões Respondidas</h6>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-comment-dots fa-2x text-teal me-3"></i>
                        <h3 class="fw-bold text-dark mb-0">
                            <?php echo $respostas['corretas'] + $respostas['erradas']; ?>
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-lg h-100 border-0 rounded-4 p-4 bg-light">
                <div class="card-body d-flex flex-column align-items-start position-relative">
                    <i class="fas fa-list fa-lg text-muted position-absolute top-0 end-0 mt-2 me-2"></i>
                    <h6 class="fw-semibold text-muted mb-1">Acertos</h6>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-check-square fa-2x text-success me-3"></i>
                        <h3 class="fw-bold text-dark mb-0"><?php echo $respostas['corretas']; ?></h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-lg h-100 border-0 rounded-4 p-4 bg-light">
                <div class="card-body d-flex flex-column align-items-start position-relative">
                    <i class="fas fa-list fa-lg text-muted position-absolute top-0 end-0 mt-2 me-2"></i>
                    <h6 class="fw-semibold text-muted mb-1">Erros</h6>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-times-circle fa-2x text-danger me-3"></i>
                        <h3 class="fw-bold text-dark mb-0"><?php echo $respostas['erradas']; ?></h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-lg h-100 border-0 rounded-4 p-4 bg-light">
                <div class="card-body d-flex flex-column align-items-start position-relative">
                    <i class="fas fa-list fa-lg text-muted position-absolute top-0 end-0 mt-2 me-2"></i>
                    <h6 class="fw-semibold text-muted mb-1">Percentual de Acerto</h6>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-chart-pie fa-2x text-info me-3"></i>
                        <h3 class="fw-bold text-dark mb-0"><?php echo $percentualAcerto . '%'; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-4">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="fw-bold">Tentativas e média diária</h6>
                    <canvas id="tentativasChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="fw-bold">Acertos por hora</h6>
                    <canvas id="barrasChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-4 align-items-stretch">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h6 class="fw-bold">Tentativas por Concurso</h6>
                    <canvas id="desempenhoChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h6 class="fw-bold mb-4">Últimas Questões Respondidas</h6>
                    <canvas id="radarChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</main>

<footer>
    <p>2023 Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
</footer>

<script>
  const tentativasPorDia = <?php echo json_encode($tentativasPorDia); ?>;
  const totalTentativas = tentativasPorDia.reduce((a, b) => a + b, 0);
  const diasComTentativas = tentativasPorDia.filter(tentativas => tentativas > 0).length;
  const mediaDiaria = diasComTentativas > 0 ? totalTentativas / diasComTentativas : 0;
  const mediaDiariaArray = tentativasPorDia.map(tentativas => (tentativas > 0 ? mediaDiaria : 0));

  const ctx2 = document.getElementById('tentativasChart').getContext('2d');
  new Chart(ctx2, {
    type: 'line',
    data: {
      labels: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
      datasets: [
        {
          label: 'Tentativas',
          data: tentativasPorDia,
          backgroundColor: 'rgba(0, 26, 78, 0.2)',
          borderColor: 'rgba(0, 26, 78, 1)',
          borderWidth: 2,
          fill: true,
          tension: 0.4,
        },
        {
          label: 'Média Diária',
          data: mediaDiariaArray,
          backgroundColor: 'rgba(255, 193, 0, 0.2)',
          borderColor: 'rgba(255, 193, 0, 1)',
          borderWidth: 2,
          fill: false,
          tension: 0.4,
          borderDash: [5, 5],
        },
      ],
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });

  const acertosPorHora = <?php echo $acertosPorHoraJson; ?>;
  const mediaAcertosPorHora = <?php echo $mediaAcertosPorHora; ?>;

  const ctx = document.getElementById('barrasChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00'],
      datasets: [
        {
          label: 'Acertos por Hora',
          data: acertosPorHora,
          backgroundColor: 'rgba(0, 26, 78, 0.6)',
          borderColor: 'rgba(0, 26, 78, 1)',
          borderWidth: 1,
        },
        {
          label: 'Média de Acertos',
          data: Array(24).fill(mediaAcertosPorHora),
          type: 'line',
          fill: false,
          borderColor: 'rgba(255, 193, 0, 1)',
          borderWidth: 2,
          tension: 0.1,
        },
      ],
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
          title: {
            display: true,
            text: 'Quantidade de Acertos',
          },
        },
        x: {
          title: {
            display: true,
            text: 'Hora do Dia',
          },
        },
      },
      plugins: {
        legend: {
          position: 'top',
        },
      },
    },
  });

  var concursos = <?php echo json_encode($concursos); ?>;
  var tentativas = <?php echo json_encode($tentativas); ?>;

  function alternarCores(index) {
    return index % 2 === 0 ? '#001A4E' : '#FFC100';
  }

  function definirBorda(index) {
    return index % 2 !== 0 ? '#FFC100' : 'transparent';
  }

  var ctx1 = document.getElementById('desempenhoChart').getContext('2d');
  new Chart(ctx1, {
    type: 'bar',
    data: {
      labels: concursos,
      datasets: [
        {
          label: 'Tentativas por Concurso',
          data: tentativas,
          backgroundColor: function(context) {
            var index = context.dataIndex;
            return alternarCores(index);
          },
          borderColor: function(context) {
            var index = context.dataIndex;
            return definirBorda(index);
          },
          borderWidth: 2,
        },
      ],
    },
    options: {
      responsive: true,
      scales: {
        x: {
          title: {
            display: true,
            text: 'Concurso',
          },
          beginAtZero: true,
        },
        y: {
          title: {
            display: true,
            text: 'Quantidade de Tentativas',
          },
          beginAtZero: true,
        },
      },
    },
  });
  <?php
    $ultimasQuestoes = ultimas10Questoes($usuario_id, $conn);
    $acertos = 0;
    $erros = 0;
    foreach ($ultimasQuestoes as $questao) {
        if ($questao['correta'] == 'Certa') {
            $acertos++;
        } else {
            $erros++;
        }
    }
    echo "const acertos = $acertos;";
    echo "const erros = $erros;";
    ?>
    window.onload = function() {
        const ctx = document.getElementById('radarChart').getContext('2d');
        const radarChart = new Chart(ctx, {
            type: 'radar', 
            data: {
                labels: ['Acertos', 'Erros'], 
                datasets: [{
                    label: 'Últimas Questões Respondidas',
                    data: [acertos, erros], 
                    backgroundColor: 'rgba(0, 26, 78, 0.2)', 
                    borderColor: '#001A4E', 
                    borderWidth: 2,
                    pointBackgroundColor: '#001A4E', 
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4
                }, {
                    label: 'Erros',
                    data: [erros, 0], 
                    backgroundColor: 'rgba(255, 193, 0, 0.2)', 
                    borderColor: '#FFC100',
                    borderWidth: 2,
                    pointBackgroundColor: '#FFC100', 
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    r: {
                        angleLines: {
                            display: true, 
                        },
                        suggestedMin: 0, 
                        suggestedMax: 10, 
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    }
</script>
</body>
</html>
