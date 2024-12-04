<?php
// Usar caminho absoluto para evitar erros
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cinemática - Identificando Movimentos</title>
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
        <a href="../configuracoes.php" class="d-flex align-items-center" style="text-decoration: none;">
        <img id="avatar-imagem" src="<?php echo htmlspecialchars('../' . $imagemPerfil); ?>" alt="Avatar" width="50px" height="50px" class="ml-3">
        <p class="m-0 ml-2">Olá, <span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span>!</p>
        </a>
      </div>
  </header>
  <div class="voltar-container mb-4">
      <a href="../conteudos1.php" class="custom-link">
        <i class="fa-solid fa-circle-arrow-left"></i> <span>Voltar</span>
      </a>
    </div>
    <main>
    <div class="container">
    <div class="card mb-4 mx-auto" >
        <div class="card-body">
            <h1 class="text-dark">Cinemática - Identificando Movimentos</h1>
            <p class="text-dark">Identificar o tipo de movimento de um objeto é fundamental para entender as leis que regem sua trajetória e as forças que atuam sobre ele. A cinemática estuda esses movimentos e nos ajuda a classificá-los em diferentes categorias. Abaixo, apresentamos os principais tipos de movimento:</p>
            
            <h3 class="text-dark"><b>  Movimento Retilíneo Uniforme (MRU)</b></h3>
            <p class="text-dark">No movimento retilíneo uniforme (MRU), o objeto se desloca ao longo de uma linha reta com velocidade constante, ou seja, a velocidade não varia com o tempo.</p>
            <ul class="text-dark">
                <li><b>Equação do MRU:</b> s = s₀ + vt</li>
                <li><b>Exemplo:</b> Um carro se movendo a 60 km/h em linha reta, sem aceleração.</li>
            </ul>
            <img class="col-8" src="../img/1613602850601-Oi5fl393JZ.png" alt="">

            <h3 class="text-dark"><b> Movimento Retilíneo Uniformemente Acelerado (MRUA)</b> </h3>
            <p class="text-dark">No movimento retilíneo uniformemente acelerado (MRUA), o objeto se move ao longo de uma linha reta, mas sua velocidade varia de maneira constante devido a uma aceleração constante.</p>
            <ul class="text-dark">
                <li><b>Equação do MRUA:</b> s = s₀ + V₀t + (1/2)at²</li>
                <li><b>Exemplo:</b> Um carro acelerando constantemente de 0 a 100 km/h.</li>
            </ul>

            <h3 class="text-dark"><b>  Movimento Circular</b></h3>
            <p class="text-dark">No movimento circular, um objeto se desloca ao longo de uma trajetória circular. Este tipo de movimento pode ser uniforme (com velocidade constante) ou acelerado (com aceleração centrípeta).</p>
            <ul class="text-dark">
                <li><b>Movimento Circular Uniforme (MCU):</b> O objeto se move ao longo de uma circunferência com velocidade constante.</li>
                <li><b>Movimento Circular Acelerado (MCA):</b> A velocidade do objeto varia com o tempo, gerando uma aceleração centrípeta.</li>
                <li><b>Exemplo:</b> A rotação de uma roda de bicicleta (MCU) ou o movimento de um satélite em órbita (MCA).</li>
            </ul>

            <h3 class="text-dark"><b> Movimento Oscilatório</b> </h3>
            <p class="text-dark">O movimento oscilatório é caracterizado por um objeto que se move repetidamente em torno de uma posição de equilíbrio. Esse movimento é frequente em sistemas com forças restauradoras, como a mola ou o pêndulo.</p>
            <ul class="text-dark">
            <img class="col-8" src="../img/Figura-2-Movimento-oscilatorio-constante-em-forma-de-sino-produzido-pelas-plataformas.png" alt="">
                <li><b>Exemplo:</b> O movimento de um pêndulo simples ou a vibração de uma corda de violão.</li>
            </ul>

            <h3 class="text-dark"><b>  Como Identificar o Tipo de Movimento?</b></h3>
            <p class="text-dark">Para identificar o tipo de movimento, é necessário analisar o gráfico de posição versus tempo do objeto, a variação da sua velocidade ao longo do tempo e as forças que atuam sobre ele. Aqui estão algumas dicas:</p>
            <ul class="text-dark">
                <li><b>MRU:</b> O gráfico de posição versus tempo é uma linha reta com inclinação constante.</li>
                <li><b>MRUA:</b> O gráfico de posição versus tempo é uma parábola, com aceleração constante.</li>
                <li><b>Movimento Circular:</b> O gráfico pode envolver ângulos ou variações de posição em coordenadas circulares.</li>
                <li><b>Movimento Oscilatório:</b> O gráfico de posição versus tempo tem formato de seno ou cosseno, com repetições periódicas.</li>
            </ul>
            <p class="text-dark">Com essas análises, você pode classificar os movimentos e entender melhor como os corpos se comportam nas mais variadas situações.</p>

            <h3 class="text-dark"><b> Exemplo de Identificação de Movimento </b></h3>
            <p class="text-dark">Imagine que você está observando um carro que acelera de 0 a 100 km/h em 10 segundos, e em seguida mantém essa velocidade constante por 20 segundos. Esse movimento pode ser classificado como:</p>
            <ul class="text-dark">
                <li><b>MRUA:</b> Durante a aceleração de 0 a 100 km/h.</li>
                <li><b>MRU:</b> Quando o carro mantém a velocidade constante após a aceleração.</li>
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
