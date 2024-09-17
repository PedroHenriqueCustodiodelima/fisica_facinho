
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
  <img id="avatar-imagem" src="<?php echo htmlspecialchars($imagemPerfil); ?>" alt="Avatar" width="50px" height="50px" class="ml-3">
  <p class="m-0 ml-2">Olá, <span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span>!</p>
</div>

  </header>

  <div class="container">
    <aside>
      <nav>
        <ul>
          <li><i class="fa-solid fa-chart-simple" style="color: white; width: 30px; height: 30px;"></i><a href="desempenho.php">Desempenho</a></li>
          <li><i class="fa-solid fa-book" style="color: white; width: 30px; height: 30px;"></i><a href="conteudos.php">Conteúdos</a></li>
          <li><i class="fa-solid fa-list-check" style="color: white; width: 30px; height: 30px;"></i><a href="tarefas.php">Tarefas</a></li>
          <li><i class="fa-solid fa-clipboard" style="color: white; width: 30px; height: 30px;"></i><a href="missoes.php">Missões</a></li>
          <li><i class="fa-solid fa-gear" style="color: white; width: 30px; height: 30px;"></i><a href="configuracoes.php">Configurações</a></li>
          <li><i class="fa-solid fa-arrow-right-from-bracket" style="color: white; width: 30px; height: 30px;"></i><a href="logout.php">Sair</a></li>
        </ul>
      </nav>
    </aside>

    <main>
    <h2 style="text-align: center;">Desempenho do Usuário</h2>
    <?php if ($dados_questoes): ?>
        <table>
            <thead>
                <tr>
                    <th>Questão</th>
                    <th>Total de Tentativas</th>
                    <th>Total de Acertos</th>
                    <th>Total de Erros</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($dados_questoes as $questao): ?>
                <tr>
                    <td><?php echo htmlspecialchars($questao['id_questao']); ?></td>
                    <td><?php echo htmlspecialchars($questao['total_tentativas']); ?></td>
                    <td><?php echo htmlspecialchars($questao['total_acertos']); ?></td>
                    <td><?php echo htmlspecialchars($questao['total_erros']); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="text-align: center;">Nenhuma tentativa encontrada para o usuário.</p>
    <?php endif; ?>
    <div style="width: 80%; margin: 30px auto;">
        <canvas id="myBarChart"></canvas>
    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const questoes = <?php echo json_encode(array_column($dados_questoes, 'id_questao')); ?>;
        const tentativas = <?php echo json_encode(array_column($dados_questoes, 'total_tentativas')); ?>;
        const acertos = <?php echo json_encode(array_column($dados_questoes, 'total_acertos')); ?>;
        const erros = <?php echo json_encode(array_column($dados_questoes, 'total_erros')); ?>;
        const ctx = document.getElementById('myBarChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: questoes,
                datasets: [
                    {
                        label: 'Tentativas',
                        data: tentativas,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Acertos',
                        data: acertos,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Erros',
                        data: erros,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.dataset.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true,
                        beginAtZero: true
                    }
                }
            }
        });
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
