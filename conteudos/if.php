<?php
include("../funcoes_php/funcoes_missoes.php");

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mecânica Clássica</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="../css/mecanica.css">
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
  <div class="voltar-container mb-4">
      <a href="conteudos.php" class="custom-link">
        <i class="fa-solid fa-circle-arrow-left"></i> <span>Voltar</span>
      </a>
    </div>
    <main>
    <div class="container">
    <div class="card mb-4 mx-auto" style="max-width: 800px; width: 95%;"> <!-- Card centralizado -->
        <div class="card-body">
            <p class="text-dark">A Mecânica Clássica é uma subárea da Mecânica voltada aos estudos dos movimentos dos corpos na Terra e imersos em fluidos abaixo da velocidade da luz e as causas desses movimentos. A Mecânica Clássica é dividida principalmente nas áreas de Cinemática, Dinâmica, Estática, Hidrostática e Hidrodinâmica. O estudo da Mecânica Clássica é de grande importância para uma enorme gama de profissões, além de ser o conteúdo de Física que é mais cobrado no Exame Nacional do Ensino Médio (Enem).</p>
            <p class="text-dark">Veja mais sobre "Mecânica Clássica" em: <a href="https://brasilescola.uol.com.br/fisica/mecanica-classica.htm" target="_blank" rel="noopener noreferrer">Brasil Escola</a></p>
            <p class="text-dark">Esta seção pode incluir tópicos como:</p>
            <ul class="text-dark">
                <li>Leis de Newton</li>
                <li>Movimento Retilíneo Uniforme (MRU)</li>
                <li>Movimento Retilíneo Uniformemente Acelerado (MRUA)</li>
                <li>Trabalho e Energia</li>
            </ul>
        </div>
    </div>
</div>

</main>




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
