<?php
// Usar caminho absoluto para evitar erros
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cinemática - Conceitos Básicos</title>
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
            <h2 class="text-dark"> <b>  Cinemática -  </b> <p>  Conceitos Básicos</p></h2>
            <p class="text-dark">A cinemática é uma das áreas da física que estuda o movimento dos corpos sem se preocupar com as causas que os geram. Ela analisa como os objetos se deslocam no espaço e no tempo, focando principalmente nas grandezas que descrevem o movimento. As principais grandezas estudadas na cinemática são:</p>
            <ul class="text-dark">
                <li><b>Posição:</b> a localização de um objeto em um determinado instante de tempo.</li>
                <li><b>Deslocamento:</b> a mudança de posição de um objeto, definida como a diferença entre a posição final e inicial.</li>
                <li><b>Velocidade:</b> a taxa de variação do deslocamento em relação ao tempo. Pode ser média ou instantânea.</li>
                <li><b>Aceleração:</b> a taxa de variação da velocidade em relação ao tempo. Pode ser média ou instantânea.</li>
            </ul>
            <img class="col-12" src="../img/34278.jpg" style="margin: 10px;" alt="">
            <h3 class="text-dark">Equações da Cinemática</h3>
            <p class="text-dark">As equações da cinemática são utilizadas para descrever o movimento de um corpo em função do tempo. A principal equação utilizada no estudo do movimento retilíneo uniformemente acelerado (MRUA) é:</p>
            <ul class="text-dark">
                <li><b>V = V₀ + at</b> - Onde: <br> V é a velocidade final, V₀ é a velocidade inicial, a é a aceleração e t é o tempo.</li>
                <li><b>s = s₀ + V₀t + (1/2)at²</b> - Onde: <br> s é o deslocamento final, s₀ é o deslocamento inicial, V₀ é a velocidade inicial, a é a aceleração e t é o tempo.</li>
            </ul>
            <h3 class="text-dark">Tipos de Movimento</h3>
            <p class="text-dark">Existem diferentes tipos de movimento que são estudados na cinemática. Os principais são:</p>
            <ul class="text-dark">
                <li><b>Movimento Retilíneo Uniforme (MRU):</b> movimento ao longo de uma linha reta, com velocidade constante.</li>
                <li><b>Movimento Retilíneo Uniformemente Acelerado (MRUA):</b> movimento ao longo de uma linha reta, com aceleração constante.</li>
                <li><b>Movimento Circular:</b> movimento ao longo de uma trajetória circular, com ou sem aceleração.</li>
            </ul>
            <img class="col-12" src="../img/Captura de tela 2024-11-28 082810.png"  alt="">
            <p class="text-dark">Esses tipos de movimento são importantes para entender as diversas situações no estudo do movimento dos corpos. Por exemplo, o movimento de um carro em uma estrada (MRU) ou o movimento de uma bola lançada para cima (MRUA).</p>
            <h3 class="text-dark">Importância da Cinemática</h3>
            <p class="text-dark">A cinemática é fundamental para compreender a dinâmica dos corpos e é aplicada em muitas áreas da física, como:</p>
            <ul class="text-dark">
                <li><b>Engenharia:</b> projetos de sistemas de transporte, como carros e aviões.</li>
                <li><b>Astronomia:</b> estudo do movimento de planetas e satélites.</li>
                <li><b>Esportes:</b> análise de movimentos em diversas modalidades.</li>
            </ul>
            <p class="text-dark">Para mais informações sobre cinemática, acesse o artigo do <a href="https://brasilescola.uol.com.br/fisica/cinematica.htm" target="_blank" rel="noopener noreferrer">Brasil Escola</a>.</p>
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
