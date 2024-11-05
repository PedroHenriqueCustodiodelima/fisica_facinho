<?php
include("funcoes_php/funcoes_inicio.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Conteúdos de Física</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="css/conteudos.css">
  <style>
    .card {
      border: 2px solid;
      border-radius: 15px;
      max-width: 320px;
      height: 150px;
      margin: 15px auto;
      cursor: pointer;
      box-shadow: none;
      transition: transform 0.3s ease;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card-title {
      font-size: 1.25rem;
      font-weight: bold;
      margin-bottom: 10px;
      color: black;
    }

    .card-description {
      font-size: 1rem;
      color: black;
    }

    .card[data-cor] {
      border-color: var(--cor);
    }

    .footer {
      text-align: center;
      padding: 1rem 0;
      background-color: #f8f9fa;
    }
    
    h2 {
      color: #001f3f;
    }
  </style>
</head>
<body>

  <header class="d-flex justify-content-between align-items-center">
    <a href="inicio.php">
        <img src="img/logo.png" width="200px" alt="Logo">
    </a>
    <div class="perfil-header d-flex align-items-center">
      <img id="avatar-imagem" src="<?php echo htmlspecialchars($imagemPerfil); ?>" alt="Avatar" width="50px" height="50px" class="ml-3">
      <p class="m-0 ml-2"><span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span></p>
    </div>
  </header>

  <div class="container">
    <div class="voltar-container mb-4">
      <a href="inicio.php" class="custom-link mb-3">
          <i class="fa-solid fa-circle-arrow-left"></i> <span>Voltar</span>
      </a>
    </div>
    <main>
      <h2 class="text-center mb-4 text-black">Conteúdos de Física</h2>
      <div class="row justify-content-center">
        <?php
        $conteudos = [
          [
            "titulo" => "Introdução à Mecânica Clássica",
            "descricao" => "Entenda os princípios que regem o movimento dos corpos.",
            "cor" => "#1F77B4",
            "url" => "mecanica_classica.php"
          ],
          [
            "titulo" => "Leis de Newton",
            "descricao" => "Explore as três leis fundamentais da mecânica.",
            "cor" => "#FF7F0E",
            "url" => "leis_newton.php"
          ],
          [
            "titulo" => "Energia e Conservação",
            "descricao" => "Aprenda sobre a conservação da energia em sistemas físicos.",
            "cor" => "#2CA02C",
            "url" => "energia_conservacao.php"
          ],
          [
            "titulo" => "Termodinâmica Básica",
            "descricao" => "Conheça as leis da termodinâmica e suas aplicações.",
            "cor" => "#D62728",
            "url" => "termodinamica.php"
          ],
          [
            "titulo" => "Eletromagnetismo",
            "descricao" => "Estude as interações entre eletricidade e magnetismo.",
            "cor" => "#9467BD",
            "url" => "eletromagnetismo.php"
          ],
          [
            "titulo" => "Óptica: Luz e Lentes",
            "descricao" => "Descubra o comportamento da luz e suas aplicações.",
            "cor" => "#8C564B",
            "url" => "optica.php"
          ],
        ];

        foreach ($conteudos as $conteudo) {
          echo '<div class="col-md-4 mb-4 d-flex justify-content-center">';
          echo '  <a href="' . htmlspecialchars($conteudo["url"]) . '" style="text-decoration: none;">';
          echo '    <div class="card" style="border-color: ' . htmlspecialchars($conteudo["cor"]) . ';">';
          echo '      <div class="card-body">';
          echo '        <h5 class="card-title">' . htmlspecialchars($conteudo["titulo"]) . '</h5>';
          echo '        <p class="card-description mt-2">' . htmlspecialchars($conteudo["descricao"]) . '</p>';
          echo '      </div>';
          echo '    </div>';
          echo '  </a>';
          echo '</div>';
        }
        ?>
      </div>
    </main>
  </div>
  
  <footer class="footer">
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
