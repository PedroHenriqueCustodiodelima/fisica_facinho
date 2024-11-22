<?php
// Usar caminho absoluto para evitar erros
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dinâmica do Movimento Circular</title>
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
            <h2 class="text-dark">Dinâmica do Movimento Circular</h2>
            <p class="text-dark">A dinâmica do movimento circular trata das forças e aceleracões que agem sobre um objeto que se move ao longo de uma trajetória circular. Em um movimento circular, mesmo que a velocidade do objeto seja constante em módulo, a direção da velocidade está sempre mudando, o que implica a presença de uma aceleração centrípeta.</p>

            <h3 class="text-dark">Força Centrífuga e Força Centrípeta</h3>
            <p class="text-dark">Em um movimento circular, a principal força que mantém o objeto na trajetória circular é a força centrípeta. Esta força é sempre dirigida para o centro da trajetória circular, fazendo com que o objeto siga a curva. Em termos mais simples, a força centrípeta "puxa" o objeto em direção ao centro da trajetória.</p>

            <p class="text-dark">A fórmula para a força centrípeta é dada por:</p>
            <p class="text-dark"><b>Fc = m * ac</b></p>
            <p class="text-dark">Onde:</p>
            <ul class="text-dark">
                <li><b>Fc:</b> Força centrípeta (em Newtons)</li>
                <li><b>m:</b> Massa do objeto (em kg)</li>
                <li><b>ac:</b> Aceleração centrípeta (em m/s²)</li>
            </ul>

            <p class="text-dark">Além disso, a aceleração centrípeta é dada pela fórmula:</p>
            <p class="text-dark"><b>ac = v² / r</b></p>
            <p class="text-dark">Ou, substituindo a expressão de velocidade:</p>
            <p class="text-dark"><b>ac = (2πr / T)² / r = 4π²r / T²</b></p>

            <h3 class="text-dark">Exemplo Prático: Carro em Curva</h3>
            <p class="text-dark">Imagine um carro que faz uma curva em uma estrada. Para manter o carro na trajetória curva, uma força centrípeta é necessária, que é fornecida pela força de atrito entre os pneus e a estrada. Se essa força não for suficientemente grande, o carro poderá derrapar para fora da curva. Esse é um exemplo claro de como a dinâmica do movimento circular se aplica no cotidiano.</p>

            <h3 class="text-dark">Aceleração no Movimento Circular</h3>
            <p class="text-dark">Embora a velocidade do objeto no movimento circular seja constante em módulo, a aceleração não é zero, pois a direção da velocidade está mudando. A aceleração no movimento circular é sempre centrípeta, ou seja, está sempre dirigida para o centro da trajetória circular.</p>

            <h3 class="text-dark">Fórmulas para o Movimento Circular</h3>
            <p class="text-dark">A aceleração centrípeta é uma das principais variáveis que descrevem o movimento circular. No entanto, além dela, outras grandezas também são importantes:</p>
            <ul class="text-dark">
                <li><b>Velocidade Tangencial:</b> v = 2πr / T</li>
                <li><b>Aceleração Centrípeta:</b> ac = v² / r</li>
                <li><b>Força Centrífuga:</b> Fc = m * ac</li>
            </ul>

            <h3 class="text-dark">Forças Adicionais em Movimento Circular</h3>
            <p class="text-dark">Além da força centrípeta, o movimento circular também pode ser afetado por outras forças, dependendo da situação. Por exemplo:</p>
            <ul class="text-dark">
                <li>Em um satélite em órbita, a força gravitacional é a responsável por manter o movimento circular.</li>
                <li>Em uma corda giratória, a tensão na corda é a responsável pela força centrípeta.</li>
                <li>Em carros que fazem curvas, a força de atrito é a responsável pela força centrípeta.</li>
            </ul>

            <h3 class="text-dark">Exemplo: Aceleração de uma Bola em Movimento Circular</h3>
            <p class="text-dark">Imagine uma bola presa a uma corda e girando em círculos. A aceleração centrípeta que mantém a bola em movimento circular é dada pela fórmula:</p>
            <p class="text-dark"><b>ac = v² / r</b></p>
            <p class="text-dark">Neste caso, a força centrípeta será fornecida pela tensão na corda, que pode ser calculada com a fórmula:</p>
            <p class="text-dark"><b>Fc = m * ac</b></p>

            <h3 class="text-dark">Conclusão</h3>
            <p class="text-dark">A dinâmica do movimento circular é fundamental para compreender uma série de fenômenos do cotidiano e aplicações tecnológicas, como o movimento de satélites, carros em curvas e partículas em aceleradores. A compreensão das forças centrípetas e as acelerações envolvidas nesse tipo de movimento é essencial para a física e suas aplicações práticas.</p>

            <p class="text-dark">Para mais informações sobre Dinâmica do Movimento Circular, consulte o artigo do <a href="https://brasilescola.uol.com.br/fisica/movimento-circular-uniforme.htm" target="_blank" rel="noopener noreferrer">Brasil Escola</a>.</p>
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
