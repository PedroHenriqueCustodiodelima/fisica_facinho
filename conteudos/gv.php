<?php
// Usar caminho absoluto para evitar erros
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grandezas e Vetores</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="../css/mecanica.css">
</head>
<body>

  <header class="d-flex justify-content-between align-items-center">
    <a href="../inicio.php">
      <img src="../img/logo.png" width="200px" alt="Logo">
    </a>
    <div class="perfil-header d-flex align-items-center">
      <img id="avatar-imagem" src="<?php echo htmlspecialchars('../' . $imagemPerfil); ?>" alt="Avatar" width="50px" height="50px" class="ml-3">
      <p class="m-0 ml-2">Olá, <span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span>!</p>
    </div>
  </header>
  <div class="voltar-container mb-4">
      <a href="../conteudos1.php" class="custom-link">
        <i class="fa-solid fa-circle-arrow-left"></i> <span>Voltar</span>
      </a>
    </div>
    <main>
    <div class="container">
    <div class="card mb-4 mx-auto" style="max-width: 800px; width: 95%;">
        <div class="card-body">
            <h2 class="text-dark">Grandezas e Vetores</h2>
            <p class="text-dark">Grandezas físicas são características ou propriedades dos corpos ou fenômenos que podem ser medidas ou quantificadas. Em Física, as grandezas são classificadas em duas categorias principais:</p>
            <ul class="text-dark">
                <li><b>Grandezas escalares:</b> possuem apenas módulo (valor numérico) e unidade de medida. Exemplos: massa, temperatura, tempo, comprimento, energia.</li>
                <li><b>Grandezas vetoriais:</b> possuem módulo, direção e sentido. Exemplos: força, velocidade, aceleração, campo elétrico, deslocamento.</li>
            </ul>
            <h3 class="text-dark">Vetores</h3>
            <p class="text-dark">Os vetores são representações matemáticas usadas para descrever grandezas vetoriais. Cada vetor é caracterizado por:</p>
            <ul class="text-dark">
                <li><b>Módulo:</b> a intensidade ou valor da grandeza representada.</li>
                <li><b>Direção:</b> a linha ou orientação ao longo da qual o vetor atua.</li>
                <li><b>Sentido:</b> a indicação para onde o vetor aponta (para frente, para trás, para cima, para baixo, etc.).</li>
            </ul>
            <p class="text-dark">A soma de vetores é realizada pelo método do paralelogramo ou pelo método do polígono. A decomposição vetorial é frequentemente usada para separar um vetor em componentes ortogonais, facilitando a análise em planos cartesianos.</p>
            <h3 class="text-dark">Aplicações de Grandezas e Vetores</h3>
            <p class="text-dark">O estudo de grandezas e vetores é fundamental em várias áreas da Física, como:</p>
            <ul class="text-dark">
                <li><b>Cinemática:</b> análise de deslocamentos e velocidades.</li>
                <li><b>Dinâmica:</b> cálculo de forças e acelerações.</li>
                <li><b>Eletromagnetismo:</b> representação de campos elétricos e magnéticos.</li>
                <li><b>Estática:</b> equilíbrio de forças em estruturas.</li>
            </ul>
            <p class="text-dark">Para mais informações sobre grandezas e vetores, visite o artigo do <a href="https://brasilescola.uol.com.br/fisica/grandezas-vetores.htm" target="_blank" rel="noopener noreferrer">Brasil Escola</a>.</p>
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
  <script src="../js/inicio.js"></script>
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

</body>
</html>
