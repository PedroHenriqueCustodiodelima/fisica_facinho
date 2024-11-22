<?php
// Usar caminho absoluto para evitar erros
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Impulso e Quantidade de Movimento</title>
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
            <h2 class="text-dark">Impulso e Quantidade de Movimento</h2>
            <p class="text-dark">Impulso e quantidade de movimento são conceitos fundamentais na física que descrevem o comportamento dos corpos em movimento. Eles estão inter-relacionados e são usados para entender fenômenos como colisões e movimentos em sistemas dinâmicos.</p>

            <h3 class="text-dark">Quantidade de Movimento</h3>
            <p class="text-dark">A quantidade de movimento (ou momento linear) de um corpo é dada pelo produto da sua massa pela sua velocidade. A fórmula é:</p>
            <p class="text-dark"><b>p = m * v</b></p>
            <p class="text-dark">Onde:</p>
            <ul class="text-dark">
                <li><b>p:</b> Quantidade de movimento (em kg·m/s)</li>
                <li><b>m:</b> Massa do corpo (em kg)</li>
                <li><b>v:</b> Velocidade do corpo (em m/s)</li>
            </ul>
            <p class="text-dark">A quantidade de movimento é uma grandeza vetorial, o que significa que ela possui direção e sentido. Quanto maior a massa e/ou velocidade de um objeto, maior será a sua quantidade de movimento.</p>

            <h3 class="text-dark">Impulso</h3>
            <p class="text-dark">O impulso é a mudança na quantidade de movimento de um objeto. Ele é gerado quando uma força é aplicada sobre um corpo durante um intervalo de tempo. A fórmula para calcular o impulso é:</p>
            <p class="text-dark"><b>J = F * Δt</b></p>
            <p class="text-dark">Onde:</p>
            <ul class="text-dark">
                <li><b>J:</b> Impulso (em N·s)</li>
                <li><b>F:</b> Força aplicada (em newtons)</li>
                <li><b>Δt:</b> Intervalo de tempo durante o qual a força é aplicada (em segundos)</li>
            </ul>
            <p class="text-dark">O impulso também é uma grandeza vetorial, e sua direção é a mesma da força aplicada. O impulso é responsável por modificar a quantidade de movimento de um objeto. A relação entre impulso e quantidade de movimento é dada pela seguinte equação:</p>
            <p class="text-dark"><b>J = Δp</b></p>
            <p class="text-dark">Ou seja, o impulso é igual à variação da quantidade de movimento do corpo.</p>

            <h3 class="text-dark">Princípio da Conservação da Quantidade de Movimento</h3>
            <p class="text-dark">O princípio da conservação da quantidade de movimento afirma que, em um sistema isolado, a quantidade total de movimento antes de uma interação (como uma colisão) é igual à quantidade total de movimento após a interação, desde que nenhuma força externa atue sobre o sistema. Esse princípio é muito utilizado para analisar colisões.</p>

            <h3 class="text-dark">Exemplo de Colisão</h3>
            <p class="text-dark">Considere duas bolas de bilhar em um jogo. A primeira bola (com massa m₁ e velocidade v₁) colide com a segunda bola (com massa m₂ e velocidade v₂). Antes da colisão, o sistema tem uma certa quantidade de movimento total, dada por:</p>
            <p class="text-dark"><b>p₁ + p₂ = m₁ * v₁ + m₂ * v₂</b></p>
            <p class="text-dark">Após a colisão, a quantidade de movimento total será a soma das quantidades de movimento de ambas as bolas após o impacto:</p>
            <p class="text-dark"><b>p₁' + p₂' = m₁ * v₁' + m₂ * v₂'</b></p>
            <p class="text-dark">De acordo com a conservação da quantidade de movimento, a quantidade de movimento antes e depois da colisão será a mesma, desde que não haja forças externas agindo sobre as bolas.</p>

            <h3 class="text-dark">Exemplo Prático: Carro em Movimento</h3>
            <p class="text-dark">Imagine um carro de 1000 kg viajando a 20 m/s. Sua quantidade de movimento inicial é dada por:</p>
            <p class="text-dark"><b>p = m * v = 1000 * 20 = 20.000 kg·m/s</b></p>
            <p class="text-dark">Se o carro frear e sua velocidade reduzir para 0 m/s, sua quantidade de movimento final será 0. A mudança na quantidade de movimento (impulso) é de:</p>
            <p class="text-dark"><b>Δp = p final - p inicial = 0 - 20.000 = -20.000 kg·m/s</b></p>
            <p class="text-dark">Esse impulso é fornecido pelas forças de frenagem do carro, que atuam durante o intervalo de tempo em que o carro está desacelerando.</p>

            <h3 class="text-dark">Conclusão</h3>
            <p class="text-dark">Impulso e quantidade de movimento são conceitos fundamentais para descrever como os corpos interagem em movimento. O princípio da conservação da quantidade de movimento é especialmente importante em situações de colisões e interações entre objetos, sendo amplamente utilizado na física e na engenharia.</p>

            <p class="text-dark">Para mais informações sobre Impulso e Quantidade de Movimento, consulte o artigo do <a href="https://brasilescola.uol.com.br/fisica/impulso.htm" target="_blank" rel="noopener noreferrer">Brasil Escola</a>.</p>
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
