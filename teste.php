<?php
include("funcoes_php/funcoes_inicio.php");
include "header.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Configurações</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="css/teste.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="js/teste.js"></script>
  <style>
    /* Melhoria no estilo dos cards */
    .card-custom {
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      background-color: #fff;
    }
    .card-custom .card-body {
      padding: 20px;
    }
    .card-custom .card-title {
      font-size: 1.2rem;
      font-weight: bold;
    }
    .card-custom .card-text {
      font-size: 2rem;
      font-weight: bold;
      color: #333;
    }
    
    /* Garantindo que o gráfico tenha altura adequada */
    #tentativasChart {
      height: 250px; /* Altura ajustada para o gráfico */
    }
  </style>
</head>
<body>
  <main class="container mt-5">
    <h2 class="mb-4 text-center">Painel de Questões de Física</h2>

    <!-- Cards de Informações (Primeira linha) -->
    <div class="row">
        <div class="col-md-3 mb-3">
        <div class="card card-custom card-white">
            <div class="card-body">
            <div class="d-flex align-items-center">
                <i class="fas fa-check-circle fa-2x mr-3 text-success"></i>
                <div>
                <h5 class="card-title">Questões Respondidas</h5>
                <h3 class="card-text">45</h3>
                </div>
            </div>
            </div>
        </div>
        </div>

      <div class="col-md-3 mb-3">
        <div class="card card-custom">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <i class="fas fa-thumbs-up fa-2x mr-3 text-success"></i>
              <div>
                <h5 class="card-title">Acertos</h5>
                <h3 class="card-text">35</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card card-custom">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <i class="fas fa-thumbs-down fa-2x mr-3 text-danger"></i>
              <div>
                <h5 class="card-title">Erros</h5>
                <h3 class="card-text">10</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card card-custom">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <i class="fas fa-question-circle fa-2x mr-3 text-info"></i>
              <div>
                <h5 class="card-title">Questões Não Respondidas</h5>
                <h3 class="card-text">12</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Cards de Informações (Segunda linha, com gráfico de tentativas) -->
    <div class="row">
      <div class="col-md-6 mb-3">
        <div class="card card-custom">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <i class="fas fa-exchange-alt fa-2x mr-3 text-warning"></i>
              <div>
                <h5 class="card-title">Tentativas de Resposta</h5>
                <h3 class="card-text">50</h3>
              </div>
            </div>
            <!-- Canvas para o gráfico de tentativas -->
            <canvas id="tentativasChart"></canvas>
          </div>
        </div>
      </div>

      <div class="col-md-6 mb-3">
        <div class="card card-custom">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <i class="fas fa-clock fa-2x mr-3 text-dark"></i>
              <div>
                <h5 class="card-title">Tempo Médio</h5>
                <h3 class="card-text">1:30</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Gráficos de desempenho e últimas questões -->
    <div class="row">
      <div class="col-md-8 mb-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Desempenho nas Questões</h5>
            <canvas id="desempenhoChart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Últimas Questões Respondidas</h5>
            <ul class="list-group">
              <li class="list-group-item">Questão 1: Resposta correta</li>
              <li class="list-group-item">Questão 2: Resposta incorreta</li>
              <li class="list-group-item">Questão 3: Resposta correta</li>
              <li class="list-group-item">Questão 4: Resposta correta</li>
              <li class="list-group-item">Questão 5: Resposta incorreta</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </main>

  <footer class="text-center mt-5">
    <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
  </footer>

  <script>
    // Gráfico de tentativas
    var ctx2 = document.getElementById('tentativasChart').getContext('2d');
    var tentativasChart = new Chart(ctx2, {
      type: 'line',
      data: {
        labels: ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta'],
        datasets: [{
          label: 'Tentativas',
          data: [12, 15, 10, 20, 30],
          backgroundColor: 'rgba(255, 193, 7, 0.2)',
          borderColor: 'rgba(255, 193, 7, 1)',
          borderWidth: 2,
          fill: true
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            display: true,
            beginAtZero: true
          },
          x: {
            beginAtZero: true
          }
        },
        plugins: {
          legend: {
            display: false
          },
          tooltip: {
            enabled: false
          }
        }
      }
    });

    // Gráfico de desempenho
    var ctx1 = document.getElementById('desempenhoChart').getContext('2d');
    var desempenhoChart = new Chart(ctx1, {
      type: 'bar',
      data: {
        labels: ['Questão 1', 'Questão 2', 'Questão 3', 'Questão 4', 'Questão 5'],
        datasets: [{
          label: 'Desempenho',
          data: [1, 0, 1, 1, 0],
          backgroundColor: ['#28a745', '#dc3545', '#28a745', '#28a745', '#dc3545'],
          borderColor: ['#28a745', '#dc3545', '#28a745', '#28a745', '#dc3545'],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              stepSize: 1
            }
          }
        },
        plugins: {
          legend: {
            position: 'top',
          },
          tooltip: {
            callbacks: {
              label: function(tooltipItem) {
                return tooltipItem.label + ': ' + (tooltipItem.raw ? 'Acerto' : 'Erro');
              }
            }
          }
        }
      }
    });
  </script>
</body>
</html>
