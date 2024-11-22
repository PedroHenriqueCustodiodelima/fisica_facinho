<?php
// Usar caminho absoluto para evitar erros
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movimento Retilíneo Uniforme Variado (MRUV)</title>
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
            <h2 class="text-dark">Movimento Retilíneo Uniforme Variado (MRUV)</h2>
            <p class="text-dark">O Movimento Retilíneo Uniforme Variado (MRUV) é um tipo de movimento onde a velocidade do objeto não é constante, ou seja, o objeto acelera ou desacelera ao longo do tempo, mas sua trajetória é reta. Diferente do Movimento Retilíneo Uniforme (MRU), onde a velocidade é constante, no MRUV a aceleração é variável.</p>

            <h3 class="text-dark">Características do MRUV</h3>
            <ul class="text-dark">
                <li><b>Velocidade variável:</b> A velocidade do objeto muda ao longo do tempo devido à aceleração ou desaceleração.</li>
                <li><b>Trajetória reta:</b> O objeto se move em uma linha reta.</li>
                <li><b>Aceleração variável:</b> A aceleração pode ser constante ou variar ao longo do tempo, dependendo do tipo de movimento.</li>
                <li><b>Equação do MRUV:</b> As equações principais para o MRUV são:</li>
                <ul class="text-dark">
                    <li><b>Velocidade final:</b> v = v₀ + at</li>
                    <li><b>Posição final:</b> s = s₀ + v₀t + (1/2)at²</li>
                </ul>
            </ul>

            <h3 class="text-dark">Exemplo de MRUV</h3>
            <p class="text-dark">Imagine um carro que parte do repouso (velocidade inicial v₀ = 0) e acelera a uma taxa de 2 m/s². Se o carro mantém essa aceleração por 5 segundos, podemos calcular sua velocidade final e a distância percorrida.</p>

            <ul class="text-dark">
                <li><b>Velocidade final:</b> v = v₀ + at = 0 + 2(5) = 10 m/s</li>
                <li><b>Distância percorrida:</b> s = s₀ + v₀t + (1/2)at² = 0 + 0(5) + (1/2)(2)(5)² = 25 metros</li>
            </ul>

            <h3 class="text-dark">Gráfico do MRUV</h3>
            <p class="text-dark">No gráfico de posição (s) versus tempo (t) de um MRUV, a curva não é reta, mas sim uma parábola. Isso indica que a posição do objeto varia de forma não linear, ou seja, o objeto está acelerando ou desacelerando.</p>

            <h3 class="text-dark">Exemplo Prático: Deslocamento com Aceleração Constante</h3>
            <p class="text-dark">Se um trem parte da posição inicial s₀ = 0 e acelera a uma taxa constante de 1,5 m/s², podemos calcular sua posição após 4 segundos e sua velocidade ao final desse tempo.</p>
            <ul class="text-dark">
                <li><b>Velocidade após 4 segundos:</b> v = v₀ + at = 0 + 1,5(4) = 6 m/s</li>
                <li><b>Posição após 4 segundos:</b> s = s₀ + v₀t + (1/2)at² = 0 + 0(4) + (1/2)(1,5)(4)² = 24 metros</li>
            </ul>

            <h3 class="text-dark">Como Calcular o Tempo e a Distância no MRUV</h3>
            <p class="text-dark">Para calcular o tempo ou a distância em um movimento retilíneo uniforme variado, usamos as equações do MRUV e isolamos as variáveis desejadas.</p>
            <ul class="text-dark">
                <li><b>Para calcular a distância:</b> s = s₀ + v₀t + (1/2)at²</li>
                <li><b>Para calcular o tempo:</b> t = (v - v₀) / a</li>
            </ul>

            <h3 class="text-dark">Exemplo de Cálculo de Tempo</h3>
            <p class="text-dark">Se um objeto parte do repouso e alcança uma velocidade de 30 m/s com uma aceleração de 5 m/s², podemos calcular o tempo necessário para atingir essa velocidade:</p>
            <ul class="text-dark">
                <li><b>Equação:</b> t = (v - v₀) / a = (30 - 0) / 5 = 6 segundos</li>
            </ul>

            <h3 class="text-dark">Aplicações do MRUV</h3>
            <p class="text-dark">O MRUV é usado para descrever movimentos que envolvem aceleração ou desaceleração, como carros que aceleram em uma estrada, foguetes que aumentam sua velocidade ao decolar, ou objetos caindo sob a ação da gravidade.</p>

            <h3 class="text-dark">Exemplo de Aplicação no Cotidiano</h3>
            <p class="text-dark">Imagine que um carro começa a acelerar a partir de uma velocidade inicial de 10 m/s, com uma aceleração constante de 2 m/s². Podemos prever a velocidade do carro em qualquer momento, bem como a distância percorrida, usando as equações do MRUV.</p>

            <p class="text-dark">Para mais informações sobre o Movimento Retilíneo Uniforme Variado, acesse o artigo do <a href="https://brasilescola.uol.com.br/fisica/movimento-retilineo-uniforme-variado.htm" target="_blank" rel="noopener noreferrer">Brasil Escola</a>.</p>
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
