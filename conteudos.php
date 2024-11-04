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
      border: none;
      color: white; /* Cor do texto em branco */
      transition: transform 0.3s ease, box-shadow 0.3s ease; /* Suaviza a transição */
      border-radius: 15px; /* Bordas arredondadas */
      max-width: 320px; /* Largura máxima do card */
      margin: 15px auto; /* Margem superior/inferior e centraliza o card */
      cursor: pointer; /* Muda o cursor ao passar o mouse */
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3); /* Sombra sutil */
    }

    .card:hover {
      transform: translateY(-5px); /* Eleva o card */
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5); /* Sombra mais intensa ao passar o mouse */
    }

    .card-title {
      font-size: 1.25rem; /* Tamanho do título */
      font-weight: bold; /* Negrito */
      margin-bottom: 10px; /* Margem abaixo do título */
    }

    .card-description {
      font-size: 1rem; /* Tamanho da descrição */
      opacity: 0.9; /* Levemente transparente para suavizar */
    }

    .footer {
      text-align: center;
      padding: 1rem 0;
      background-color: #f8f9fa;
    }
    h2{
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
      <div class="row justify-content-center"> <!-- Adiciona centralização -->
        <?php
        // Exemplo de dados de conteúdos teóricos de física com novas cores
        $conteudos = [
          [
            "titulo" => "Introdução à Mecânica Clássica",
            "descricao" => "Entenda os princípios que regem o movimento dos corpos.",
            "cor" => "#1F77B4", // Azul
            "url" => "mecanica_classica.php" // Atualiza a URL
          ],
          [
            "titulo" => "Leis de Newton",
            "descricao" => "Explore as três leis fundamentais da mecânica.",
            "cor" => "#FF7F0E", // Laranja
            "url" => "leis_newton.php" // Atualiza a URL
          ],
          [
            "titulo" => "Energia e Conservação",
            "descricao" => "Aprenda sobre a conservação da energia em sistemas físicos.",
            "cor" => "#2CA02C", // Verde
            "url" => "energia_conservacao.php" // Atualiza a URL
          ],
          [
            "titulo" => "Termodinâmica Básica",
            "descricao" => "Conheça as leis da termodinâmica e suas aplicações.",
            "cor" => "#D62728", // Vermelho
            "url" => "termodinamica.php" // Atualiza a URL
          ],
          [
            "titulo" => "Eletromagnetismo",
            "descricao" => "Estude as interações entre eletricidade e magnetismo.",
            "cor" => "#9467BD", // Roxo
            "url" => "eletromagnetismo.php" // Atualiza a URL
          ],
          [
            "titulo" => "Óptica: Luz e Lentes",
            "descricao" => "Descubra o comportamento da luz e suas aplicações.",
            "cor" => "#8C564B", // Marrom
            "url" => "optica.php" // Atualiza a URL
          ],
        ];

        foreach ($conteudos as $conteudo) {
          echo '<div class="col-md-4 mb-4 d-flex justify-content-center">'; // Centraliza os cards
          echo '  <a href="' . htmlspecialchars($conteudo["url"]) . '" style="text-decoration: none;">'; // Link para a nova página
          echo '    <div class="card" style="background-color: ' . htmlspecialchars($conteudo["cor"]) . ';">';
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
