<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ondulatória – Ondas Estacionárias</title>
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
        <img id="avatar-imagem" src="<?php echo htmlspecialchars('../' . $imagemPerfil); ?>" alt="Avatar" width="35px" height="35px" class="ml-3">
        <p class="m-0 ml-2"><span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span></p>
        </a>
      </div>
  </header>

  <div class="voltar-container mb-4">
      <a href="../conteudos3.php" class="custom-link">
        <i class="fa-solid fa-circle-arrow-left"></i> <span>Voltar</span>
      </a>
  </div>

  <main>
    <div class="container">
      <div class="card mb-4 mx-auto">
        <div class="card-body">
          <h2 class="text-dark">Ondulatória – Ondas Estacionárias</h2>

          <h3 class="text-dark"><b>O que são as Ondas Estacionárias?</b></h3>
          <p class="text-dark">As <b>ondas estacionárias</b> são formadas pela superposição de duas ondas que se propagam em direções opostas. Essas ondas interferem entre si de tal forma que as partículas do meio não se movem livremente, mas permanecem em posições fixas chamadas de <i>nós</i> e <i>ventres</i>.</p>

          <p class="text-dark">Ao contrário das ondas viajantes, que transportam energia de um ponto a outro, as ondas estacionárias não transferem energia de um local a outro, mas sim criam padrões de vibração no meio.</p>

          <h3 class="text-dark"><b>Formação das Ondas Estacionárias</b></h3>
          <p class="text-dark">As ondas estacionárias surgem a partir da interferência construtiva e destrutiva de duas ondas com a mesma frequência e amplitude, que se propagam em sentidos opostos. A interferência construtiva ocorre quando as cristas de uma onda coincidem com as cristas da outra, e a interferência destrutiva ocorre quando uma crista se encontra com um vale da outra onda.</p>

          <h3 class="text-dark"><b>Características das Ondas Estacionárias</b></h3>
          <ul class="text-dark">
            <li><b>Nós:</b> São os pontos onde a amplitude da onda é zero, ou seja, onde as partículas do meio permanecem em repouso.</li>
            <li><b>Ventre:</b> São os pontos onde a amplitude da onda é máxima, ou seja, onde as partículas do meio se movem com maior intensidade.</li>
            <li><b>Frequência:</b> A frequência das ondas estacionárias depende das condições de contorno do meio e da frequência das ondas que interferem.</li>
            <li><b>Comprimento de Onda:</b> O comprimento de onda das ondas estacionárias está relacionado ao comprimento total do meio e ao número de ventres que podem ser formados.</li>
          </ul>

          <h3 class="text-dark"><b>Exemplo de Formação: Cordas Vibrantes</b></h3>
          <p class="text-dark">Um exemplo clássico de ondas estacionárias ocorre quando uma corda é vibrada. Quando a corda é fixada em ambas as extremidades e é excitada por uma força periódica, uma onda estacionária se forma, com nós nas extremidades fixas e ventres no meio. Esse tipo de onda é a base de instrumentos musicais de corda, como violões e guitarras.</p>

          <h3 class="text-dark"><b>Aplicações das Ondas Estacionárias</b></h3>
          <ul class="text-dark">
            <li><b>Instrumentos Musicais:</b> A vibração de cordas em instrumentos como violões, guitarras e pianos gera ondas estacionárias que produzem sons. O comprimento da corda e a tensão aplicada afetam a frequência da onda estacionária, determinando a altura do som.</li>
            <li><b>Ressonância:</b> A ressonância ocorre quando um sistema é forçado a vibrar com a mesma frequência de suas ondas naturais. Isso pode resultar em uma amplificação da amplitude da onda estacionária, como em alguns tipos de instrumentos musicais e estruturas acústicas.</li>
            <li><b>Antenas de Rádio:</b> As antenas de rádio utilizam ondas estacionárias para transmitir e receber sinais. A formação de ondas estacionárias na antena permite a transmissão eficiente de ondas eletromagnéticas.</li>
          </ul>

          <h3 class="text-dark"><b>Equação das Ondas Estacionárias</b></h3>
          <p class="text-dark">A equação geral para uma onda estacionária em uma corda é dada por:</p>
          <p class="text-dark"><i>y(x,t) = 2A sin(kx) cos(wt)</i></p>
          <p class="text-dark">Onde:</p>
          <ul class="text-dark">
            <li><i>A</i> é a amplitude máxima das ondas;</li>
            <li><i>k</i> é o número de onda, relacionado ao comprimento de onda;</li>
            <li><i>w</i> é a frequência angular da onda;</li>
            <li><i>t</i> é o tempo;</li>
            <li><i>x</i> é a posição ao longo da corda.</li>
          </ul>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">As ondas estacionárias são um fenômeno importante na física, com diversas aplicações práticas, especialmente em acústica e na música. Elas são formadas pela interferência de ondas de mesma frequência, criando padrões de vibração que podem ser usados para gerar sons e para estudar o comportamento de sistemas vibratórios. Compreender as ondas estacionárias é essencial para entender fenômenos como a ressonância e as características acústicas de instrumentos musicais.</p>

        </div>
      </div>
    </div>
  </main>

  <footer class="text-center py-4">
    <p>&copy; 2024 - Todos os direitos reservados</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <script src="../js/mecanica.js"></script>
</body>
</html>
