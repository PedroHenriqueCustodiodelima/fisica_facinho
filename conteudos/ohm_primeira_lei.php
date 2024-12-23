<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eletricidade – Eletrodinâmica – Primeira Lei de Ohm</title>
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
          <h2 class="text-dark">Eletricidade – Eletrodinâmica – Primeira Lei de Ohm</h2>

          <h3 class="text-dark"><b>O que é a Primeira Lei de Ohm?</b></h3>
          <p class="text-dark">A Primeira Lei de Ohm, proposta por Georg Simon Ohm, estabelece que a corrente elétrica que passa por um condutor é diretamente proporcional à tensão (voltagem) aplicada e inversamente proporcional à resistência do condutor. Em outras palavras, a corrente é maior quando a tensão é alta ou quando a resistência é baixa, e menor quando a tensão é baixa ou a resistência é alta.</p>

          <h3 class="text-dark"><b>Formulação da Primeira Lei de Ohm</b></h3>
          <p class="text-dark">A equação da Primeira Lei de Ohm pode ser expressa como:</p>
          <p class="text-dark"><b>V = I × R</b></p>
          <p class="text-dark">Onde:</p>
          <ul class="text-dark">
            <li><b>V</b> é a tensão (ou voltagem) em volts (V), que é a diferença de potencial entre dois pontos do condutor.</li>
            <li><b>I</b> é a corrente elétrica em amperes (A), que é o fluxo de carga elétrica através do condutor.</li>
            <li><b>R</b> é a resistência do condutor em ohms (Ω), que é a oposição ao fluxo de corrente.</li>
          </ul>

          <h3 class="text-dark"><b>Aplicações da Primeira Lei de Ohm</b></h3>
          <p class="text-dark">A Lei de Ohm é fundamental para o entendimento do comportamento de circuitos elétricos simples e é amplamente utilizada em diversos campos da engenharia elétrica e eletrônica. Algumas de suas principais aplicações incluem:</p>
          <ul class="text-dark">
            <li><b>Dimensionamento de circuitos:</b> A Lei de Ohm é usada para calcular os valores de resistência necessários para controlar a corrente em circuitos elétricos.</li>
            <li><b>Determinação de correntes em circuitos:</b> Com a tensão conhecida e a resistência do condutor, é possível calcular a corrente que passa por ele.</li>
            <li><b>Proteção de circuitos:</b> A Lei de Ohm ajuda a determinar os valores de fusíveis ou disjuntores a serem usados em circuitos para proteger contra sobrecarga de corrente.</li>
          </ul>

          <h3 class="text-dark"><b>Exemplo Prático</b></h3>
          <p class="text-dark">Considere um circuito com uma fonte de tensão de 12 V e um resistor de 4 Ω. A corrente que passará pelo resistor pode ser calculada usando a Primeira Lei de Ohm:</p>
          <p class="text-dark"><b>I = V / R = 12 V / 4 Ω = 3 A</b></p>
          <p class="text-dark">Portanto, a corrente elétrica no circuito será de 3 amperes.</p>

          <h3 class="text-dark"><b>Gráficos da Primeira Lei de Ohm</b></h3>
          <p class="text-dark">A relação entre corrente, tensão e resistência é frequentemente representada graficamente. Se a resistência for constante, a corrente será diretamente proporcional à tensão. O gráfico de \( V \) versus \( I \) será uma linha reta, indicando que a corrente aumenta com o aumento da tensão. A inclinação da reta é dada pela resistência do resistor.</p>
          <p class="text-dark">Se a tensão for mantida constante, o gráfico de \( I \) versus \( R \) será uma linha decrescente, indicando que a corrente diminui com o aumento da resistência.</p>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">A Primeira Lei de Ohm é uma das leis mais importantes da eletricidade, pois descreve o comportamento fundamental dos circuitos elétricos. Ela fornece uma relação simples, mas poderosa, entre a tensão, a corrente e a resistência. Compreender essa lei é essencial para o design e análise de circuitos elétricos em diversas aplicações tecnológicas.</p>
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
