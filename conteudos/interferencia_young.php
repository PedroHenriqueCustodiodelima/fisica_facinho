<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ondulatória – Interferência Luminosa – Experimento de Young</title>
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
          <h2 class="text-dark">Ondulatória – Interferência Luminosa – Experimento de Young</h2>

          <h3 class="text-dark"><b>O que é a Interferência Luminosa?</b></h3>
          <p class="text-dark">A interferência luminosa é um fenômeno ondulatório que ocorre quando duas ondas de luz se encontram, podendo se reforçar ou se anular dependendo da fase em que estão. Esse fenômeno é um dos pilares da teoria ondulatória da luz e foi demonstrado de forma clássica pelo físico Thomas Young.</p>

          <h3 class="text-dark"><b>O Experimento de Young</b></h3>
          <p class="text-dark">O experimento de Young, realizado em 1801, foi crucial para a comprovação de que a luz se comporta como uma onda. Young utilizou uma fonte de luz monocromática (luz de uma única cor) e a passou por uma fenda, que dividiu a luz em duas partes. Essas duas partes foram então direcionadas para uma tela, onde foram observadas franjas luminosas alternadas.</p>

          <h3 class="text-dark"><b>Como o Experimento de Young Demonstra a Interferência</b></h3>
          <p class="text-dark">Quando a luz passa pelas duas fendas, as ondas provenientes de cada fenda se propagam e se encontram na tela. Se as ondas estiverem em fase (crista com crista e vale com vale), elas se somam, gerando uma região de máxima intensidade luminosa (franjas brilhantes). Caso as ondas estejam em desfasagem, elas se anulam, formando regiões de mínima intensidade (franjas escuras).</p>

          <h3 class="text-dark"><b>As Franjas de Interferência</b></h3>
          <p class="text-dark">As franjas de interferência observadas no experimento de Young são formadas por regiões alternadas de luz intensa e luz fraca. Essas franjas são um resultado direto do fenômeno de interferência construtiva e destrutiva. A distância entre as franjas depende de vários fatores, como o comprimento de onda da luz, a distância entre as fendas e a tela de observação.</p>

          <h3 class="text-dark"><b>Fórmula para o Cálculo da Distância entre as Franjas</b></h3>
          <p class="text-dark">A distância entre as franjas de interferência, denotada por \( \Delta y \), pode ser calculada usando a fórmula:</p>
          <p class="text-dark"><b>\(\Delta y = \dfrac{\lambda \cdot L}{d}\)</b></p>
          <p class="text-dark">Onde:</p>
          <ul>
            <li><b>\(\lambda\)</b> é o comprimento de onda da luz;</li>
            <li><b>L</b> é a distância entre as fendas e a tela;</li>
            <li><b>d</b> é a distância entre as duas fendas.</li>
          </ul>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">O experimento de Young foi fundamental para a aceitação da teoria ondulatória da luz e para o entendimento de fenômenos como a interferência luminosa. A observação das franjas de interferência não só comprovou a natureza ondulatória da luz, mas também revelou a capacidade das ondas de se combinarem de maneira construtiva ou destrutiva, gerando padrões visíveis em diferentes condições experimentais.</p>

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
