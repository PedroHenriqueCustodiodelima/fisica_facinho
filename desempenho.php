<?php
include("funcoes_php/funcoes_desempenho.php");

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
  <link rel="stylesheet" href="css/desempenho.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="js/desempenho.js"></script>
</head>
<body>
  <header class="d-flex justify-content-between align-items-center">
    <a href="inicio.php">
        <img src="img/logo.png" width="200px" alt="Logo">
    </a>
    <div class="perfil-header d-flex align-items-center">
        <a href="configuracoes.php" class="d-flex align-items-center" style="text-decoration: none;">
          <img id="avatar-imagem" src="<?php echo htmlspecialchars($imagemPerfil); ?>" alt="Avatar" width="50px" height="50px" class="ml-3">
          <p class="m-0 ml-2" ><span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span></p>
        </a>
      </div>
  </header>

  <div class="container">
    <main>
      <a href="inicio.php" class="custom-link mb-3">
        <i class="fa-solid fa-circle-arrow-left"></i> <span>Voltar</span>
      </a>
      <h2 class="text-center">Desempenho das tarefas</h2>

      <div class="row text-center mb-4">
        <div class="col-md-4 d-flex justify-content-center">
          <div class="card" style="background-color: rgba(34, 93, 59, 0.8); border: none;"> 
            <div class="card-header text-white">
              <i class="fas fa-tasks icon"></i> Tentativas
            </div>
            <div class="card-body">
              <h5 class="card-title"><?php echo htmlspecialchars(array_sum(array_column($dados_questoes, 'total_tentativas'))); ?></h5>
              <p class="card-text"></p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex justify-content-center">
          <div class="card" style="background-color: rgba(26, 13, 171, 1); border: none;"> 
            <div class="card-header text-white">
              <i class="fas fa-check-circle icon"></i> Acertos
            </div>
            <div class="card-body">
              <h5 class="card-title"><?php echo htmlspecialchars(array_sum(array_column($dados_questoes, 'total_acertos'))); ?></h5>
              <p class="card-text"></p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex justify-content-center">
          <div class="card" style="background-color: rgba(186, 12, 47, 1); border: none;"> 
            <div class="card-header text-white">
              <i class="fas fa-times-circle icon"></i> Erros
            </div>
            <div class="card-body">
              <h5 class="card-title"><?php echo htmlspecialchars(array_sum(array_column($dados_questoes, 'total_erros'))); ?></h5>
              <p class="card-text"></p>
            </div>
          </div>
        </div>
      </div>


<div class="row mb-4">
  <div class="col-md-6">
    <canvas id="myBarChart"></canvas>
  </div>
  <div class="col-md-6">
    <canvas id="myLineChart"></canvas>
  </div>
</div>

<script>
  var labels = <?php echo json_encode(array_column($dados_questoes, 'mes_ano')); ?>;  
  var totalTentativas = <?php echo json_encode(array_column($dados_questoes, 'total_tentativas')); ?>; 
  var totalAcertos = <?php echo json_encode(array_column($dados_questoes, 'total_acertos')); ?>; 
  var totalErros = <?php echo json_encode(array_column($dados_questoes, 'total_erros')); ?>;  
  var ctxBar = document.getElementById('myBarChart').getContext('2d');
  var barChart = new Chart(ctxBar, {
    type: 'bar',  
    data: {
      labels: labels,  
      datasets: [{
        label: 'Total de Tentativas',
        data: totalTentativas,  
        backgroundColor: 'rgba(34, 93, 59, 0.8)',  
        borderColor: 'rgba(34, 93, 59, 1)',  
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        x: {
          title: {
            display: true,
            text: 'Mês/Ano'
          }
        },
        y: {
          title: {
            display: true,
            text: 'Total de Tentativas'
          }
        }
      }
    }
  });
  var ctxLine = document.getElementById('myLineChart').getContext('2d');
  var lineChart = new Chart(ctxLine, {
    type: 'line', 
    data: {
      labels: labels,  
      datasets: [{
        label: 'Total de Acertos',
        data: totalAcertos,  
        borderColor: 'rgba(26, 13, 171, 1)',  
        fill: false,
        tension: 0.1  
      }, {
        label: 'Total de Erros',
        data: totalErros,  
        borderColor: 'rgba(186, 12, 47, 1)',  
        fill: false,
        tension: 0.1 
      }]
    },
    options: {
      scales: {
        x: {
          title: {
            display: true,
            text: 'Mês/Ano'
          }
        },
        y: {
          title: {
            display: true,
            text: 'Total'
          }
        }
      }
    }
  });
</script>

</div>

  <footer>
    <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-3d"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="js/inicio.js"></script>
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

</body>
</html>
