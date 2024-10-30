<?php
include("funcoes_php/funcoes_inicio.php");
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
  <link rel="stylesheet" href="css/inicio.css">
</head>
<body>
  <div class="page-container">
    <header class="d-flex justify-content-between align-items-center">
      <a href="inicio.php">
        <img src="img/logo.png" width="200px" alt="Logo">
      </a>
      <div class="perfil-header d-flex align-items-center">
        <img id="avatar-imagem" src="<?php echo htmlspecialchars($imagemPerfil); ?>" alt="Avatar" width="50px" height="50px" class="ml-3">
        <p class="m-0 ml-2"><span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span></p>
      </div>
    </header>

    <main class="container">
    <div class="container mt-5">
    <div class="row justify-content-center">
      <!-- Card Desempenho -->
      <div class="col-md-4 mb-3">
        <a href="desempenho.php" class="card-link">
          <div class="card desempenho-card">
            <div class="icon-part">
              <i class="fa-solid fa-chart-simple" style="font-size: 2rem;"></i>
            </div>
            <div class="text-part">
              <h5 class="card-title">Desempenho</h5>
              <p class="card-text">Acompanhe seu desempenho.</p>
            </div>
          </div>
        </a>
      </div>
      <!-- Card Conteúdos -->
      <div class="col-md-4 mb-3">
        <a href="conteudos.php" class="card-link">
          <div class="card conteudos-card">
            <div class="icon-part">
              <i class="fa-solid fa-book" style="font-size: 2rem;"></i>
            </div>
            <div class="text-part">
              <h5 class="card-title">Conteúdos</h5>
              <p class="card-text">Veja seus conteúdos.</p>
            </div>
          </div>
        </a>
      </div>
      <!-- Card Tarefas -->
      <div class="col-md-4 mb-3">
        <a href="tarefas.php" class="card-link">
          <div class="card tarefas-card">
            <div class="icon-part">
              <i class="fa-solid fa-list-check" style="font-size: 2rem;"></i>
            </div>
            <div class="text-part">
              <h5 class="card-title">Tarefas</h5>
              <p class="card-text">Gerencie suas tarefas.</p>
            </div>
          </div>
        </a>
      </div>
      <!-- Card Missões -->
      <div class="col-md-4 mb-3">
        <a href="missoes.php" class="card-link">
          <div class="card missoes-card">
            <div class="icon-part">
              <i class="fa-solid fa-clipboard" style="font-size: 2rem;"></i>
            </div>
            <div class="text-part">
              <h5 class="card-title">Missões</h5>
              <p class="card-text">Complete suas missões.</p>
            </div>
          </div>
        </a>
      </div>
      <!-- Card Configurações -->
      <div class="col-md-4 mb-3">
        <a href="configuracoes.php" class="card-link">
          <div class="card configuracoes-card">
            <div class="icon-part">
              <i class="fa-solid fa-gear" style="font-size: 2rem;"></i>
            </div>
            <div class="text-part">
              <h5 class="card-title">Configurações</h5>
              <p class="card-text">Ajuste suas configurações.</p>
            </div>
          </div>
        </a>
      </div>
      <!-- Card Sair -->
      <div class="col-md-4 mb-3">
        <a href="logout.php" class="card-link">
          <div class="card sair-card">
            <div class="icon-part">
              <i class="fa-solid fa-arrow-right-from-bracket" style="font-size: 2rem;"></i>
            </div>
            <div class="text-part">
              <h5 class="card-title">Sair</h5>
              <p class="card-text">Encerrar sessão.</p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
    </main>

    <footer>
      <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
    </footer>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-3d"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="js/inicio.js"></script>
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

</body>
</html>
