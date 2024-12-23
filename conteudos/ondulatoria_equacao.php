<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ondulatória – Equação de Onda</title>
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
          <h2 class="text-dark">Ondulatória – Equação de Onda</h2>

          <h3 class="text-dark"><b>O que é a Equação de Onda?</b></h3>
          <p class="text-dark">A equação de onda descreve a propagação de ondas através de um meio. Ela relaciona as variáveis que definem o comportamento de uma onda, como a amplitude, a velocidade, o comprimento de onda, entre outras. A equação de onda pode ser aplicada a diferentes tipos de ondas, incluindo ondas sonoras, ondas eletromagnéticas, e ondas mecânicas.</p>

          <h3 class="text-dark"><b>Forma Geral da Equação de Onda</b></h3>
          <p class="text-dark">A forma geral da equação de onda unidimensional é dada por:</p>
          <p class="text-dark"><b>y(x,t) = A * sen(kx - ωt + φ)</b></p>
          <p class="text-dark">Onde:</p>
          <ul class="text-dark">
            <li><b>y(x,t):</b> Deslocamento da onda no ponto x e tempo t.</li>
            <li><b>A:</b> Amplitude da onda, que determina a altura máxima da oscilação.</li>
            <li><b>k:</b> Número de onda, relacionado ao comprimento de onda λ (k = 2π/λ).</li>
            <li><b>ω:</b> Frequência angular, relacionada à frequência da onda (ω = 2πf).</li>
            <li><b>t:</b> Tempo em que a onda se propaga.</li>
            <li><b>φ:</b> Fase inicial da onda.</li>
          </ul>

          <h3 class="text-dark"><b>Equação de Onda para Ondas Transversais e Longitudinais</b></h3>
          <p class="text-dark">A equação de onda pode ser aplicada tanto para ondas transversais quanto longitudinais. Para ondas transversais, como as ondas em uma corda, o deslocamento das partículas do meio ocorre perpendicularmente à direção de propagação da onda. Para ondas longitudinais, como as ondas sonoras, o deslocamento das partículas é paralelo à direção de propagação.</p>

          <h3 class="text-dark"><b>Velocidade de Propagação</b></h3>
          <p class="text-dark">A velocidade de propagação de uma onda (v) é dada pela fórmula:</p>
          <p class="text-dark"><b>v = λ * f</b></p>
          <p class="text-dark">Onde:</p>
          <ul class="text-dark">
            <li><b>v:</b> Velocidade de propagação da onda.</li>
            <li><b>λ:</b> Comprimento de onda.</li>
            <li><b>f:</b> Frequência da onda.</li>
          </ul>

          <h3 class="text-dark"><b>Exemplo de Aplicação da Equação de Onda</b></h3>
          <p class="text-dark">Vamos considerar uma onda que se propaga em uma corda, com uma amplitude de 0,5 m, um comprimento de onda de 2 m, e uma frequência de 3 Hz. A equação da onda será dada por:</p>
          <p class="text-dark"><b>y(x,t) = 0,5 * sen(πx - 6πt)</b></p>
          <p class="text-dark">Onde a onda se propaga ao longo de uma corda com uma velocidade de 6 m/s. Podemos calcular os valores de deslocamento em diferentes pontos e tempos para entender como a onda se propaga.</p>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">A equação de onda é uma ferramenta poderosa para descrever e entender o comportamento das ondas. Ela é aplicável a muitos fenômenos da física, desde as ondas sonoras até as ondas eletromagnéticas que transportam luz e outras formas de radiação. O estudo dessas equações permite o avanço em tecnologias como a comunicação sem fio, imagens médicas e a análise de fenômenos naturais.</p>

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
