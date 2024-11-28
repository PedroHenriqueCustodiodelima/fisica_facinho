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
  <link rel="stylesheet" href="css/conteudos.css">
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
    <div class="voltar-container mb-4">
        <a href="inicio.php" class="custom-link">
            <i class="fa-solid fa-circle-arrow-left"></i> <span>Voltar</span>
        </a>
    </div>
    <div class="container mt-5"> 
    <h1>Conteúdos</h1>
    <div class="row justify-content-center">
      <div class="col-md-4 mb-3">
        <a href="conteudos1.php" class="card-link">
          <div class="card primeiro-ano-card">
            <div class="icon-part">
              <i class="fa-solid fa-graduation-cap"></i>
            </div>
            <div>
              <h5 class="card-title">1º Ano</h5>
              <p class="card-text">conteúdos de física para o 1º ano.</p>
            </div>
          </div>
        </a>
    </div>
    <div class="col-md-4 mb-3">
      <a href="conteudos2.php" class="card-link">
        <div class="card segundo-ano-card">
          <div class="icon-part">
            <i class="fa-solid fa-book-open"></i>
          </div>
          <div>
            <h5 class="card-title">2º Ano</h5>
            <p class="card-text">conteúdos de física para o 2º ano.</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-4 mb-3">
      <a href="conteudos3.php" class="card-link">
        <div class="card terceiro-ano-card">
          <div class="icon-part">
            <i class="fa-solid fa-lightbulb"></i>
          </div>
          <div>
            <h5 class="card-title">3º Ano</h5>
            <p class="card-text">conteúdos de física para o 3º ano.</p>
          </div>
        </div>
      </a>
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
