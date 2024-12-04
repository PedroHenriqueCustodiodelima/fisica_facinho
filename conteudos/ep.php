<?php
// Usar caminho absoluto para evitar erros
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trabalho, Energia e Potência</title>
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
            <h2 class="text-dark">Trabalho, Energia e Potência</h2>
            <p class="text-dark">Os conceitos de trabalho, energia e potência são fundamentais para entender o funcionamento de máquinas, dispositivos e diversos sistemas físicos que envolvem movimento e interação de forças. Vamos explorar esses conceitos mais profundamente.</p>

            <h3 class="text-dark">Trabalho</h3>
            <p class="text-dark">O trabalho é realizado quando uma força é aplicada sobre um objeto e esse objeto se desloca na direção da força. A fórmula para calcular o trabalho é:</p>
            <p class="text-dark"><b>W = F * d * cos(θ)</b></p>
            <p class="text-dark">Onde:</p>
            <ul class="text-dark">
                <li><b>W:</b> Trabalho (em joules)</li>
                <li><b>F:</b> Força aplicada (em newtons)</li>
                <li><b>d:</b> Deslocamento do objeto (em metros)</li>
                <li><b>θ:</b> Ângulo entre a direção da força e a direção do deslocamento</li>
            </ul>
            <p class="text-dark">Se a força for aplicada na mesma direção do movimento, o ângulo θ é igual a 0° e o cos(θ) é igual a 1. Portanto, o trabalho é maximizado quando a força é aplicada na direção do movimento.</p>

            <h3 class="text-dark">Energia</h3>
            <p class="text-dark">A energia é a capacidade de um sistema realizar trabalho. Ela pode ser armazenada ou transferida. Existem vários tipos de energia, sendo os mais comuns a energia cinética e a energia potencial.</p>
            
            <h4 class="text-dark">Energia Cinética</h4>
            <p class="text-dark">A energia cinética é a energia associada ao movimento de um objeto. A fórmula para calcular a energia cinética é:</p>
            <p class="text-dark"><b>Ec = (1/2) * m * v²</b></p>
            <p class="text-dark">Onde:</p>
            <ul class="text-dark">
                <li><b>Ec:</b> Energia cinética (em joules)</li>
                <li><b>m:</b> Massa do objeto (em quilogramas)</li>
                <li><b>v:</b> Velocidade do objeto (em metros por segundo)</li>
            </ul>
            <p class="text-dark">Quanto maior a massa ou a velocidade de um objeto, maior será a sua energia cinética. Em outras palavras, um objeto mais rápido ou mais pesado terá mais energia devido ao seu movimento.</p>

            <h4 class="text-dark">Energia Potencial</h4>
            <p class="text-dark">A energia potencial é a energia armazenada em um objeto devido à sua posição ou configuração. Um exemplo clássico é a energia potencial gravitacional, que é a energia de um objeto em relação à sua altura em relação à superfície da Terra. A fórmula para a energia potencial gravitacional é:</p>
            <p class="text-dark"><b>Ep = m * g * h</b></p>
            <p class="text-dark">Onde:</p>
            <ul class="text-dark">
                <li><b>Ep:</b> Energia potencial (em joules)</li>
                <li><b>m:</b> Massa do objeto (em quilogramas)</li>
                <li><b>g:</b> Aceleração da gravidade (aproximadamente 9,8 m/s²)</li>
                <li><b>h:</b> Altura do objeto em relação ao solo (em metros)</li>
            </ul>
            <p class="text-dark">Se um objeto é elevado a uma certa altura, ele acumula energia potencial. Essa energia é liberada quando o objeto cai, transformando-se em energia cinética.</p>

            <h3 class="text-dark">Potência</h3>
            <p class="text-dark">A potência é a taxa de variação do trabalho realizado em um determinado tempo. Em outras palavras, é a quantidade de trabalho feito por unidade de tempo. A fórmula para calcular a potência é:</p>
            <p class="text-dark"><b>P = W / t</b></p>
            <p class="text-dark">Onde:</p>
            <ul class="text-dark">
                <li><b>P:</b> Potência (em watts)</li>
                <li><b>W:</b> Trabalho realizado (em joules)</li>
                <li><b>t:</b> Tempo em que o trabalho é realizado (em segundos)</li>
            </ul>
            <p class="text-dark">A unidade de potência é o watt (W), que é equivalente a um joule por segundo. Quando um trabalho é realizado mais rapidamente, a potência é maior.</p>

            <h3 class="text-dark">Exemplo Prático: Subindo uma Escada</h3>
            <p class="text-dark">Imagine que você suba uma escada. Você realiza trabalho ao aplicar uma força para superar a força gravitacional e deslocar-se para cima. Se a sua massa for 70 kg e a altura da escada for 10 metros, a energia potencial que você adquiriu ao subir é dada por:</p>
            <p class="text-dark"><b>Ep = m * g * h = 70 * 9,8 * 10 = 6860 joules</b></p>
            <p class="text-dark">Se o tempo que você levou para subir foi de 20 segundos, a potência média que você desenvolveu é:</p>
            <p class="text-dark"><b>P = W / t = 6860 / 20 = 343 watts</b></p>

            <h3 class="text-dark">Lei da Conservação de Energia</h3>
            <p class="text-dark">A Lei da Conservação de Energia afirma que a energia não pode ser criada nem destruída, apenas transformada de uma forma para outra. Assim, em um sistema isolado, a energia total permanece constante. Por exemplo, a energia potencial de um objeto em altura será convertida em energia cinética quando o objeto cair.</p>

            <h3 class="text-dark">Conclusão</h3>
            <p class="text-dark">Os conceitos de trabalho, energia e potência são essenciais para entender o comportamento físico dos sistemas em movimento. Esses conceitos têm aplicações em várias áreas, desde o design de máquinas e dispositivos até a compreensão de fenômenos naturais, como a queda de objetos ou o movimento dos corpos celestes.</p>

            <p class="text-dark">Para mais informações sobre Trabalho, Energia e Potência, consulte o artigo do <a href="https://brasilescola.uol.com.br/fisica/trabalho.htm" target="_blank" rel="noopener noreferrer">Brasil Escola</a>.</p>
        </div>
    </div>
</div>

</main>

  <footer>
    <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-3d"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="../js/sweetalert2.all.min.js"></script>
</body>
</html>
