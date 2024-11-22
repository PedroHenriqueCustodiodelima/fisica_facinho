<?php
// Usar caminho absoluto para evitar erros
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movimento Circular Uniforme</title>
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
            <h2 class="text-dark">Movimento Circular Uniforme</h2>
            <p class="text-dark">O movimento circular uniforme (MCU) é um tipo de movimento no qual um objeto percorre uma trajetória circular com velocidade constante. Apesar da velocidade ser constante em módulo, a direção da velocidade está sempre mudando, pois o objeto está sempre mudando de direção ao longo da trajetória circular.</p>

            <h3 class="text-dark">Características do Movimento Circular Uniforme</h3>
            <p class="text-dark">As principais características do MCU são:</p>
            <ul class="text-dark">
                <li>O objeto se move ao longo de uma trajetória circular.</li>
                <li>A velocidade escalar (ou módulo da velocidade) é constante.</li>
                <li>A direção da velocidade está sempre tangente à trajetória circular.</li>
                <li>A aceleração do objeto é dirigida para o centro da trajetória circular, chamada de aceleração centrípeta.</li>
            </ul>

            <h3 class="text-dark">Fórmulas Importantes no MCU</h3>
            <p class="text-dark">A equação que descreve a velocidade no movimento circular uniforme é:</p>
            <p class="text-dark"><b>v = 2πr / T</b></p>
            <p class="text-dark">Onde:</p>
            <ul class="text-dark">
                <li><b>v:</b> Velocidade tangencial do objeto (em m/s)</li>
                <li><b>r:</b> Raio da trajetória circular (em metros)</li>
                <li><b>T:</b> Período de uma volta (em segundos)</li>
            </ul>

            <p class="text-dark">Além disso, a aceleração centrípeta, que é a aceleração que mantém o objeto em movimento circular, é dada pela fórmula:</p>
            <p class="text-dark"><b>ac = v² / r</b></p>
            <p class="text-dark">Ou, substituindo a expressão de velocidade:</p>
            <p class="text-dark"><b>ac = (2πr / T)² / r = 4π²r / T²</b></p>

            <h3 class="text-dark">Exemplo Prático: Movimento de um Carro em uma Curva</h3>
            <p class="text-dark">Imagine que um carro se mova em uma pista circular. Se o carro percorre a pista com velocidade constante, ele está realizando um movimento circular uniforme. A aceleração centrípeta é responsável por manter o carro na trajetória circular e é proporcionada pela força de atrito entre os pneus e a pista.</p>

            <h3 class="text-dark">Gráficos Relacionados ao MCU</h3>
            <p class="text-dark">O gráfico que descreve o movimento circular uniforme mostra a relação entre o tempo e a posição do objeto ao longo da trajetória circular. Como a velocidade é constante, a distância percorrida será proporcional ao tempo, resultando em um gráfico linear, mas em uma circunferência.</p>

            <h3 class="text-dark">Aplicações do Movimento Circular Uniforme</h3>
            <p class="text-dark">O movimento circular uniforme é importante para entender uma série de fenômenos do cotidiano e da engenharia, como:</p>
            <ul class="text-dark">
                <li>O movimento de satélites ao redor da Terra.</li>
                <li>O movimento das rodas de um carro.</li>
                <li>A rotação de discos rígidos de computadores.</li>
                <li>A movimentação das partículas em aceleradores de partículas.</li>
            </ul>

            <h3 class="text-dark">Forças no Movimento Circular Uniforme</h3>
            <p class="text-dark">No MCU, a força responsável por manter o objeto em movimento circular é chamada de força centrípeta. Essa força não é uma nova força, mas pode ser resultante de diversas forças, como:</p>
            <ul class="text-dark">
                <li>A força gravitacional (no caso de satélites em órbita).</li>
                <li>A força de atrito (no caso de carros fazendo curvas).</li>
                <li>A tensão em uma corda (no caso de uma pedra presa em uma corda e girando em círculos).</li>
            </ul>

            <h3 class="text-dark">Conclusão</h3>
            <p class="text-dark">O movimento circular uniforme é um tipo de movimento importante e muito utilizado para descrever uma grande variedade de fenômenos físicos. Apesar da velocidade ser constante em módulo, a mudança constante de direção do objeto exige a presença de uma aceleração centrípeta, que mantém o objeto na trajetória circular.</p>

            <p class="text-dark">Para mais informações sobre Movimento Circular Uniforme, acesse o artigo do <a href="https://brasilescola.uol.com.br/fisica/movimento-circular-uniforme.htm" target="_blank" rel="noopener noreferrer">Brasil Escola</a>.</p>
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
