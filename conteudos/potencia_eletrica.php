<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eletricidade – Eletrodinâmica – Potência Elétrica</title>
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
          <h2 class="text-dark">Eletricidade – Eletrodinâmica – Potência Elétrica</h2>

          <h3 class="text-dark"><b>O que é Potência Elétrica?</b></h3>
          <p class="text-dark">A <b>potência elétrica</b> é a quantidade de energia elétrica que é convertida em outra forma de energia, como calor, luz ou movimento, por unidade de tempo. Em outras palavras, é a taxa com que a energia é fornecida ou consumida em um circuito elétrico. A potência elétrica é medida em watts (W) e está diretamente relacionada à corrente elétrica (I) e à voltagem (V).</p>

          <h3 class="text-dark"><b>Fórmula da Potência Elétrica</b></h3>
          <p class="text-dark">A potência elétrica pode ser calculada utilizando a fórmula:</p>
          <p class="text-dark"><b>P = V × I</b></p>
          <p class="text-dark">Onde:</p>
          <ul class="text-dark">
            <li><b>P</b> é a potência elétrica em watts (W).</li>
            <li><b>V</b> é a tensão (voltagem) em volts (V).</li>
            <li><b>I</b> é a corrente elétrica em amperes (A).</li>
          </ul>

          <h3 class="text-dark"><b>Potência em Função da Resistência</b></h3>
          <p class="text-dark">Em alguns casos, a potência elétrica também pode ser expressa em função da resistência do circuito, utilizando a Lei de Ohm. A partir da fórmula de Lei de Ohm (V = I × R), podemos substituir V na equação da potência e obter:</p>
          <p class="text-dark"><b>P = I² × R</b></p>
          <p class="text-dark">Ou, alternativamente:</p>
          <p class="text-dark"><b>P = V² / R</b></p>
          <p class="text-dark">Onde:</p>
          <ul class="text-dark">
            <li><b>I</b> é a corrente em amperes (A).</li>
            <li><b>R</b> é a resistência do condutor em ohms (Ω).</li>
            <li><b>V</b> é a tensão em volts (V).</li>
          </ul>

          <h3 class="text-dark"><b>Exemplo Prático: Cálculo de Potência</b></h3>
          <p class="text-dark">Em um circuito onde a tensão é de 120 V e a corrente é de 2 A, a potência elétrica consumida será:</p>
          <p class="text-dark"><b>P = V × I = 120 V × 2 A = 240 W</b></p>
          <p class="text-dark">Portanto, a potência elétrica consumida neste circuito é de 240 watts.</p>

          <h3 class="text-dark"><b>Potência em Corrente Alternada (CA)</b></h3>
          <p class="text-dark">Em sistemas de corrente alternada (CA), a potência elétrica também pode ser calculada, mas deve-se considerar o fator de potência (f.p.), que leva em conta a defasagem entre a corrente e a tensão. A fórmula para a potência em corrente alternada é:</p>
          <p class="text-dark"><b>P = V × I × f.p.</b></p>
          <p class="text-dark">Onde o fator de potência (f.p.) varia de 0 a 1 e depende do tipo de carga no circuito (resistiva, indutiva ou capacitiva).</p>

          <h3 class="text-dark"><b>Tipos de Potência em Corrente Alternada</b></h3>
          <ul class="text-dark">
            <li><b>Potência Ativa (P):</b> A energia efetivamente consumida pela carga. Medida em watts (W).</li>
            <li><b>Potência Reativa (Q):</b> A energia que circula entre a fonte e a carga sem ser consumida. Medida em volt-amperes reativos (VAR).</li>
            <li><b>Potência Aparente (S):</b> A potência total fornecida pela fonte. Medida em volt-amperes (VA).</li>
          </ul>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">A potência elétrica é um parâmetro fundamental na análise e no design de circuitos elétricos, pois ela nos informa sobre a quantidade de energia fornecida ou consumida por unidade de tempo. Compreender a relação entre a potência, a tensão, a corrente e a resistência é essencial para o correto dimensionamento de componentes em circuitos elétricos e para a eficiência energética em sistemas de eletricidade.</p>
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
