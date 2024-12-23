<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eletricidade – Eletrodinâmica – Corrente Elétrica</title>
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
          <h2 class="text-dark">Eletricidade – Eletrodinâmica – Corrente Elétrica</h2>

          <h3 class="text-dark"><b>O que é Corrente Elétrica?</b></h3>
          <p class="text-dark">A <b>corrente elétrica</b> é o fluxo de cargas elétricas, geralmente elétrons, que se deslocam através de um condutor, como um fio metálico. Este fluxo é causado pela aplicação de uma diferença de potencial (ou voltagem) entre dois pontos do condutor, o que faz com que as cargas se movam. A intensidade da corrente elétrica é medida em amperes (A) e está diretamente relacionada ao número de cargas que passam por um ponto do condutor por unidade de tempo.</p>

          <h3 class="text-dark"><b>Lei de Ohm</b></h3>
          <p class="text-dark">A Lei de Ohm descreve a relação entre a corrente elétrica (I), a voltagem (V) e a resistência (R) de um condutor. Ela é expressa pela fórmula:</p>
          <p class="text-dark"><b>V = I × R</b></p>
          <p class="text-dark">Onde:</p>
          <ul class="text-dark">
            <li><b>V</b> é a tensão (voltagem) medida em volts (V).</li>
            <li><b>I</b> é a corrente elétrica medida em amperes (A).</li>
            <li><b>R</b> é a resistência do condutor medida em ohms (Ω).</li>
          </ul>
          <p class="text-dark">A Lei de Ohm nos mostra que a corrente é diretamente proporcional à tensão e inversamente proporcional à resistência. Ou seja, quanto maior a tensão, maior será a corrente, e quanto maior a resistência, menor será a corrente.</p>

          <h3 class="text-dark"><b>Corrente Contínua e Corrente Alternada</b></h3>
          <p class="text-dark"><b>Corrente Contínua (CC)</b>: Na corrente contínua, as cargas elétricas se movem sempre na mesma direção, ou seja, o fluxo de corrente é unidirecional. Exemplos de fontes de corrente contínua incluem baterias e pilhas.</p>
          <p class="text-dark"><b>Corrente Alternada (CA)</b>: Na corrente alternada, o fluxo de corrente inverte a direção periodicamente. Esse tipo de corrente é usado em sistemas de distribuição de energia elétrica em larga escala, como nas redes elétricas de cidades e países.</p>

          <h3 class="text-dark"><b>Fatores que Influenciam a Corrente Elétrica</b></h3>
          <p class="text-dark">A intensidade da corrente elétrica pode ser influenciada por vários fatores:</p>
          <ul class="text-dark">
            <li><b>Resistência do Condutor:</b> A resistência elétrica do material pelo qual as cargas se movem afeta a corrente. Materiais com baixa resistência, como os metais, permitem maior fluxo de corrente.</li>
            <li><b>Temperatura:</b> A resistência de um condutor pode aumentar com a temperatura, o que reduz a corrente em um circuito. Isso ocorre devido à maior agitação das partículas no condutor, que dificulta o movimento das cargas.</li>
            <li><b>Área da Seção Transversal do Condutor:</b> A corrente elétrica tende a ser maior em condutores com maior área de seção transversal, pois há mais espaço para as cargas fluírem.</li>
            <li><b>Tensão Aplicada:</b> Quanto maior a voltagem aplicada ao condutor, maior será a corrente, desde que a resistência do circuito permaneça constante.</li>
          </ul>

          <h3 class="text-dark"><b>Exemplo Prático: Um Circuito Elétrico Simples</b></h3>
          <p class="text-dark">Em um circuito simples com uma fonte de tensão (como uma bateria) e um resistor, a corrente elétrica será determinada pela resistência do resistor e pela voltagem da fonte de energia, de acordo com a Lei de Ohm. Se a resistência for de 10 Ω e a voltagem for de 20 V, a corrente será de:</p>
          <p class="text-dark"><b>I = V / R = 20 V / 10 Ω = 2 A</b></p>
          <p class="text-dark">Portanto, a corrente elétrica no circuito será de 2 amperes.</p>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">A corrente elétrica é um dos conceitos fundamentais da eletrodinâmica e é crucial para o funcionamento de dispositivos elétricos e eletrônicos. Entender como a corrente se comporta em um circuito, como a tensão e a resistência influenciam sua intensidade, é essencial para o desenvolvimento e o uso seguro de sistemas elétricos.</p>
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
