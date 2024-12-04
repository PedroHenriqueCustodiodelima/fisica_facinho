<?php
// Usar caminho absoluto para evitar erros
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movimento Retilíneo Uniforme (MRU)</title>
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
    <div class="card mb-4 mx-auto" style="max-width: 800px; width: 95%;">
        <div class="card-body">
            <h2 class="text-dark">Movimento Retilíneo Uniforme (MRU)</h2>
            <p class="text-dark">O Movimento Retilíneo Uniforme (MRU) é um tipo de movimento em que um objeto se desloca ao longo de uma linha reta com velocidade constante. Em outras palavras, a velocidade não varia durante o movimento, e o objeto percorre distâncias iguais em intervalos de tempo iguais.</p>

            <h3 class="text-dark">Características do MRU</h3>
            <ul class="text-dark">
                <li><b>Velocidade constante:</b> A velocidade não sofre alterações durante o movimento.</li>
                <li><b>Trajetória reta:</b> O objeto se move sempre ao longo de uma linha reta.</li>
                <li><b>Equação do MRU:</b> s = s₀ + vt, onde:</li>
                <ul class="text-dark">
                    <li><b>s:</b> posição do objeto no instante t.</li>
                    <li><b>s₀:</b> posição inicial do objeto.</li>
                    <li><b>v:</b> velocidade constante.</li>
                    <li><b>t:</b> tempo decorrido.</li>
                </ul>
            </ul>

            <h3 class="text-dark">Exemplo de MRU</h3>
            <p class="text-dark">Imagine que um carro se move a uma velocidade constante de 60 km/h. Sabemos que a posição do carro varia com o tempo de forma linear. Por exemplo, após 1 hora, o carro estará a 60 km de sua posição inicial; após 2 horas, estará a 120 km, e assim por diante.</p>

            <h3 class="text-dark">Gráfico do MRU</h3>
            <p class="text-dark">No gráfico de posição (s) versus tempo (t), o MRU é representado por uma linha reta com inclinação constante. Isso indica que a posição do objeto aumenta de forma constante com o tempo, refletindo a velocidade constante do movimento.</p>

            <h3 class="text-dark">Exemplo Prático: Deslocamento de um Carro</h3>
            <p class="text-dark">Se um carro parte da posição inicial s₀ = 0 e se move com uma velocidade constante de 80 km/h, podemos calcular sua posição em qualquer instante de tempo t usando a equação do MRU.</p>
            <ul class="text-dark">
                <li><b>Equação:</b> s = 0 + 80t</li>
                <li><b>Após 2 horas:</b> s = 80 × 2 = 160 km</li>
                <li><b>Após 3 horas:</b> s = 80 × 3 = 240 km</li>
            </ul>

            <h3 class="text-dark">Como Calcular o Tempo e a Distância no MRU</h3>
            <p class="text-dark">Para calcular a distância percorrida ou o tempo gasto em um movimento retilíneo uniforme, basta usar a equação do MRU (s = s₀ + vt) e isolar a variável desejada.</p>
            <ul class="text-dark">
                <li><b>Para calcular a distância:</b> s = s₀ + vt</li>
                <li><b>Para calcular o tempo:</b> t = (s - s₀) / v</li>
            </ul>

            <h3 class="text-dark">Exemplo de Cálculo de Tempo</h3>
            <p class="text-dark">Se um carro percorre uma distância de 180 km a uma velocidade constante de 90 km/h, podemos calcular o tempo que ele leva para percorrer essa distância:</p>
            <ul class="text-dark">
                <li><b>Equação:</b> t = (s - s₀) / v</li>
                <li><b>Substituindo valores:</b> t = (180 - 0) / 90 = 2 horas</li>
            </ul>

            <h3 class="text-dark">Aplicações do MRU</h3>
            <p class="text-dark">O MRU é um modelo simplificado, mas muito útil para descrever o movimento de objetos que se movem a uma velocidade constante, como carros em rodovias, trens em trilhos retos, e até mesmo a luz em certos contextos.</p>

            <h3 class="text-dark">Exemplo de Aplicação no Cotidiano</h3>
            <p class="text-dark">Imagine um trem se movendo a uma velocidade constante de 100 km/h em uma linha reta. Com o conhecimento da equação do MRU, podemos prever onde o trem estará a qualquer instante de tempo, desde que a velocidade seja constante e a trajetória reta.</p>

            <p class="text-dark">Para mais informações sobre o Movimento Retilíneo Uniforme, acesse o artigo do <a href="https://brasilescola.uol.com.br/fisica/movimento-retilineo-uniforme.htm" target="_blank" rel="noopener noreferrer">Brasil Escola</a>.</p>
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
