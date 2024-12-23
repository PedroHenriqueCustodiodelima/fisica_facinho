<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eletricidade – Eletrodinâmica – Capacitores</title>
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
          <h2 class="text-dark">Eletricidade – Eletrodinâmica – Capacitores</h2>

          <h3 class="text-dark"><b>O que é um Capacitor?</b></h3>
          <p class="text-dark">Um capacitor é um dispositivo eletrônico que armazena energia na forma de um campo elétrico. Ele consiste em dois condutores, chamados de placas, que são separados por um material isolante, chamado de dielétrico. O capacitor pode ser utilizado para armazenar cargas elétricas temporariamente e liberar essa energia sob demanda.</p>

          <h3 class="text-dark"><b>Como Funciona um Capacitor?</b></h3>
          <p class="text-dark">Quando um capacitor é conectado a uma fonte de tensão, as cargas elétricas se acumulam nas placas do capacitor. Uma vez que a tensão atinge um valor suficientemente alto, o capacitor está totalmente carregado e não permite mais o fluxo de corrente. O processo de carregamento do capacitor segue uma curva exponencial, e o tempo necessário para carregar completamente o capacitor depende da resistência e capacitância do circuito.</p>

          <h3 class="text-dark"><b>Capacitância</b></h3>
          <p class="text-dark">A capacitância (C) é a medida da capacidade de um capacitor de armazenar carga elétrica. A unidade de capacitância é o farad (F), que é definido como a quantidade de carga armazenada por unidade de tensão. A fórmula para calcular a capacitância é:</p>
          <p class="text-dark"><b>C = Q / V</b></p>
          <p class="text-dark">Onde:
            <ul>
              <li><b>C</b> é a capacitância em farads (F).</li>
              <li><b>Q</b> é a carga armazenada no capacitor em coulombs (C).</li>
              <li><b>V</b> é a tensão aplicada ao capacitor em volts (V).</li>
            </ul>
          </p>

          <h3 class="text-dark"><b>Fórmula para a Capacitância de um Capacitor</b></h3>
          <p class="text-dark">A capacitância de um capacitor depende das características do material isolante entre as placas e da área das placas. A fórmula que descreve a capacitância de um capacitor de placas paralelas é:</p>
          <p class="text-dark"><b>C = (ε₀ * A) / d</b></p>
          <p class="text-dark">Onde:
            <ul>
              <li><b>ε₀</b> é a permissividade do vácuo (8,85 × 10<sup>-12</sup> F/m).</li>
              <li><b>A</b> é a área da placa do capacitor em metros quadrados (m²).</li>
              <li><b>d</b> é a distância entre as placas do capacitor em metros (m).</li>
            </ul>
          </p>

          <h3 class="text-dark"><b>Tipos de Capacitores</b></h3>
          <p class="text-dark">Existem diversos tipos de capacitores, cada um com características específicas para aplicações particulares. Alguns dos principais tipos incluem:</p>
          <ul>
            <li><b>Capacitores cerâmicos:</b> São pequenos e de baixo custo, usados em circuitos de sinal e em dispositivos eletrônicos portáteis.</li>
            <li><b>Capacitores eletrolíticos:</b> Têm maior capacitância e são usados em circuitos de potência, como fontes de alimentação.</li>
            <li><b>Capacitores de filme:</b> São usados em circuitos de alta frequência e para filtragem em sistemas de áudio.</li>
          </ul>

          <h3 class="text-dark"><b>Capacitores em Série e em Paralelo</b></h3>

          <h4 class="text-dark"><b>Capacitores em Série</b></h4>
          <p class="text-dark">Quando os capacitores estão conectados em série, a capacitância equivalente diminui. A fórmula para calcular a capacitância equivalente de capacitores em série é:</p>
          <p class="text-dark"><b>1/C<sub>eq</sub> = 1/C<sub>1</sub> + 1/C<sub>2</sub> + ... + 1/C<sub>n</sub></b></p>

          <h4 class="text-dark"><b>Capacitores em Paralelo</b></h4>
          <p class="text-dark">Quando os capacitores estão conectados em paralelo, a capacitância equivalente aumenta. A fórmula para calcular a capacitância equivalente de capacitores em paralelo é:</p>
          <p class="text-dark"><b>C<sub>eq</sub> = C<sub>1</sub> + C<sub>2</sub> + ... + C<sub>n</sub></b></p>

          <h3 class="text-dark"><b>Armazenamento de Energia em um Capacitor</b></h3>
          <p class="text-dark">O capacitor também pode armazenar energia elétrica, que é dada pela fórmula:</p>
          <p class="text-dark"><b>U = (1/2) * C * V²</b></p>
          <p class="text-dark">Onde:
            <ul>
              <li><b>U</b> é a energia armazenada no capacitor em joules (J).</li>
              <li><b>C</b> é a capacitância em farads (F).</li>
              <li><b>V</b> é a tensão aplicada ao capacitor em volts (V).</li>
            </ul>
          </p>

          <h3 class="text-dark"><b>Exemplo de Cálculo</b></h3>
          <p class="text-dark">Suponhamos que temos um capacitor com capacitância de 10 μF (microfarads) e uma tensão de 20 V. A energia armazenada no capacitor seria:</p>
          <p class="text-dark"><b>U = (1/2) * 10 × 10<sup>-6</sup> * (20)<sup>2</sup> = 0,004 J</b></p>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">Os capacitores são componentes essenciais em circuitos eletrônicos e têm diversas aplicações, desde o armazenamento de energia até a filtragem de sinais. O entendimento da capacitância, tipos de capacitores, e suas conexões em série ou paralelo é crucial para o design e análise de circuitos elétricos.</p>
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
