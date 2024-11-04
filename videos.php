<?php
include("funcoes_php/funcoes_video.php");
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
  <link rel="stylesheet" href="css/missoes.css">
  <style>
    .card {
      border: none;
      background-color: #343a40; /* Cor de fundo mais escura */
      color: white; /* Cor do texto em branco */
      transition: transform 0.2s;
      max-width: 320px; /* Largura máxima do card */
      margin: 0 auto; /* Centraliza o card */
    }
    
    .card:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
    }
    
    .card-title {
      font-size: 1.25rem;
      font-weight: bold;
    }

    .card-description {
      font-size: 0.9rem;
      color: #ddd; /* Cor do texto descritivo */
    }

    iframe {
      border-radius: 0.5rem; /* Arredondar os cantos do iframe */
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
      <p class="m-0 ml-2">Olá, <span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span>!</p>
    </div>
  </header>

 
    <main>
    <div class="container">
    <div class="voltar-container mb-4">
        <a href="inicio.php" class="custom-link">
            <i class="fa-solid fa-circle-arrow-left"></i> <span>Voltar</span>
        </a>
    </div>
      <h2 class="text-center mb-4 text-white">Vídeos de Física</h2>
      <div class="row justify-content-center"> <!-- Adiciona centralização -->
        <?php
        // Exemplo de dados de vídeos de física (substitua por seus dados reais)
        $videos = [
          ["titulo" => "Introdução à Mecânica Clássica", "url" => "https://www.youtube.com/embed/VIDEO_ID_1", "descricao" => "Entenda os conceitos fundamentais da mecânica clássica."],
          ["titulo" => "Leis de Newton", "url" => "https://www.youtube.com/embed/VIDEO_ID_2", "descricao" => "Exploração das três leis de Newton e suas aplicações."],
          ["titulo" => "Energia e Conservação", "url" => "https://www.youtube.com/embed/VIDEO_ID_3", "descricao" => "Aprenda sobre a conservação de energia em sistemas físicos."],
          ["titulo" => "Termodinâmica Básica", "url" => "https://www.youtube.com/embed/VIDEO_ID_4", "descricao" => "Introdução aos princípios da termodinâmica."],
          ["titulo" => "Eletromagnetismo", "url" => "https://www.youtube.com/embed/VIDEO_ID_5", "descricao" => "Explore as leis do eletromagnetismo e suas aplicações."],
          ["titulo" => "Óptica: Luz e Lentes", "url" => "https://www.youtube.com/embed/VIDEO_ID_6", "descricao" => "Compreenda os princípios da óptica e o comportamento da luz."],
        ];

        foreach ($videos as $video) {
          echo '<div class="col-md-4 mb-4 d-flex justify-content-center">'; // Centraliza os cards
          echo '  <div class="card">';
          echo '    <div class="card-body">';
          echo '      <h5 class="card-title">' . htmlspecialchars($video["titulo"]) . '</h5>';
          echo '      <iframe width="100%" height="150" src="' . htmlspecialchars($video["url"]) . '" frameborder="0" allowfullscreen></iframe>'; // Ajusta a altura do iframe
          echo '      <p class="card-description mt-2">' . htmlspecialchars($video["descricao"]) . '</p>';
          echo '    </div>';
          echo '  </div>';
          echo '</div>';
        }
        ?>
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
