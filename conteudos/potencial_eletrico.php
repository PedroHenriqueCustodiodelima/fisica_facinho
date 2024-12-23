<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eletricidade – Eletrostática – Potencial Eletrostático</title>
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
          <h2 class="text-dark">Eletricidade – Eletrostática – Potencial Eletrostático</h2>

          <h3 class="text-dark"><b>Potencial Eletrostático</b></h3>
          <p class="text-dark">O <b>potencial eletrostático</b>, também conhecido como potencial elétrico, é uma grandeza física que descreve a energia potencial por unidade de carga em um ponto no espaço devido a um campo elétrico. Essa grandeza é importante porque permite determinar a energia que uma carga teria ao ser colocada em um determinado ponto do campo elétrico. O potencial é uma medida de quão forte ou fraco o campo elétrico está em um ponto específico.</p>

          <h3 class="text-dark"><b>Definição de Potencial Eletrostático</b></h3>
          <p class="text-dark">O <b>potencial eletrostático</b> é definido como a energia potencial elétrica por unidade de carga. Ele é uma grandeza escalar e é expresso em volts (V). A fórmula que relaciona o potencial \( V \) de uma carga \( Q \) a uma distância \( r \) de um ponto onde o potencial é zero (geralmente no infinito) é dada por:</p>
          <div class="text-dark">
            <b>V = k * Q / r</b>
          </div>
          <p class="text-dark">Onde:</p>
          <ul class="text-dark">
            <li><b>V</b> = Potencial elétrico (em volts, V)</li>
            <li><b>k</b> = Constante eletrostática, <b>8,99 × 10⁹ N·m²/C²</b> no vácuo</li>
            <li><b>Q</b> = Carga que gera o campo (em Coulombs, C)</li>
            <li><b>r</b> = Distância entre a carga e o ponto onde o potencial é calculado (em metros, m)</li>
          </ul>

          <h3 class="text-dark"><b>Potencial de uma Carga Puntiforme</b></h3>
          <p class="text-dark">Para uma carga puntiforme, ou seja, uma carga localizada em um ponto específico no espaço, o potencial em um ponto à distância \( r \) da carga é dado pela fórmula já apresentada acima. Se a carga for positiva, o potencial será positivo em todos os pontos ao seu redor, enquanto uma carga negativa gera um potencial negativo.</p>

          <h3 class="text-dark"><b>Potencial de um Sistema de Cargas</b></h3>
          <p class="text-dark">Quando temos um sistema de várias cargas elétricas, o potencial total em um ponto é a soma algébrica dos potenciais devido a cada carga individualmente. Isso é uma aplicação do princípio de superposição. Ou seja, se houver várias cargas \( Q_1, Q_2, Q_3, \dots \), o potencial total \( V_{total} \) no ponto \( P \) será dado por:</p>
          <div class="text-dark">
            <b>V_{total} = V_1 + V_2 + V_3 + \dots</b>
          </div>
          <p class="text-dark">Onde \( V_1, V_2, V_3, \dots \) são os potenciais individuais de cada carga, calculados com a fórmula mencionada anteriormente.</p>

          <h3 class="text-dark"><b>Diferença de Potencial</b></h3>
          <p class="text-dark">A <b>diferença de potencial</b> (ou tensão) entre dois pontos é a diferença no valor do potencial elétrico nesses dois pontos. A diferença de potencial entre dois pontos \( A \) e \( B \) em um campo elétrico é dada por:</p>
          <div class="text-dark">
            <b>ΔV = V_A - V_B</b>
          </div>
          <p class="text-dark">A diferença de potencial está diretamente relacionada à quantidade de energia necessária para mover uma carga de um ponto a outro dentro do campo elétrico. Uma diferença de potencial maior implica em uma maior capacidade de realizar trabalho.</p>

          <h3 class="text-dark"><b>Potencial Eletrostático e Trabalho</b></h3>
          <p class="text-dark">O potencial elétrico também está relacionado ao trabalho realizado por uma força elétrica ao mover uma carga dentro de um campo elétrico. O trabalho realizado \( W \) ao mover uma carga \( q \) entre dois pontos de potencial \( V_A \) e \( V_B \) é dado pela fórmula:</p>
          <div class="text-dark">
            <b>W = q * (V_A - V_B)</b>
          </div>
          <p class="text-dark">Esse trabalho é a energia necessária para mover a carga \( q \) de um ponto de menor potencial para um ponto de maior potencial. Quando a carga é movida contra o campo elétrico (de um ponto de menor potencial para um de maior potencial), o trabalho realizado é positivo, o que indica que energia foi fornecida ao sistema.</p>

          <h3 class="text-dark"><b>Exemplo de Cálculo do Potencial</b></h3>
          <p class="text-dark">Vamos calcular o potencial gerado por uma carga de +2 µC a uma distância de 3 metros. Usando a fórmula do potencial, temos:</p>
          <div class="text-dark">
            <b>V = (8,99 × 10⁹) * (2 × 10⁻⁶) / 3</b>
          </div>
          <p class="text-dark">Resolvendo, obtemos o valor do potencial em volts no ponto a 3 metros da carga.</p>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">O <b>potencial eletrostático</b> é uma grandeza fundamental que descreve a energia potencial elétrica por unidade de carga em um campo elétrico. Ele é crucial para entender o comportamento das cargas em um campo e para calcular a energia envolvida em interações eletrostáticas. Além disso, a diferença de potencial é a base para muitos dispositivos eletrônicos, como baterias e geradores de energia elétrica.</p>

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
