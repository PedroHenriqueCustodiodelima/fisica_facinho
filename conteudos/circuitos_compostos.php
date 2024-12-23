<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eletricidade – Eletrodinâmica – Circuitos Compostos</title>
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
          <h2 class="text-dark">Eletricidade – Eletrodinâmica – Circuitos Compostos</h2>

          <h3 class="text-dark"><b>O que são Circuitos Compostos?</b></h3>
          <p class="text-dark">Os circuitos compostos são aqueles que apresentam resistores ou outros componentes ligados em série e/ou em paralelo, permitindo que a corrente elétrica seja distribuída de formas distintas. O estudo de circuitos compostos permite entender melhor o comportamento das correntes e tensões em diferentes configurações.</p>

          <h3 class="text-dark"><b>Características dos Circuitos Compostos</b></h3>
          <p class="text-dark">Em circuitos compostos, a combinação de componentes em série e paralelo resulta em diferentes valores de resistência equivalente, corrente e tensão. A principal vantagem desse tipo de circuito é que ele pode ser projetado para otimizar o uso de energia e melhorar a eficiência dos sistemas elétricos.</p>

          <h4 class="text-dark"><b>Componentes de Circuitos Compostos</b></h4>
          <p class="text-dark">Os circuitos compostos podem incluir diversos componentes, como:</p>
          <ul>
            <li><b>Resistores:</b> Controlam o fluxo de corrente elétrica.</li>
            <li><b>Fontes de Tensão:</b> Fornecem a energia elétrica necessária para o funcionamento do circuito.</li>
            <li><b>Interruptores:</b> Controlam o fluxo de corrente, ligando ou desligando o circuito.</li>
            <li><b>Condutores:</b> Permitem a passagem de corrente elétrica entre os componentes do circuito.</li>
          </ul>

          <h3 class="text-dark"><b>Resistores em Série e em Paralelo</b></h3>

          <h4 class="text-dark"><b>Resistores em Série</b></h4>
          <p class="text-dark">Em um circuito com resistores em série, a corrente que passa por cada resistor é a mesma, mas a tensão se divide entre os resistores. A resistência equivalente de resistores em série é a soma das resistências individuais:</p>
          <p class="text-dark"><b>R<sub>eq</sub> = R<sub>1</sub> + R<sub>2</sub> + ... + R<sub>n</sub></b></p>

          <h4 class="text-dark"><b>Resistores em Paralelo</b></h4>
          <p class="text-dark">Em um circuito com resistores em paralelo, a tensão nas extremidades de cada resistor é a mesma, mas a corrente se divide entre os resistores. A resistência equivalente de resistores em paralelo é dada pela fórmula:</p>
          <p class="text-dark"><b>1/R<sub>eq</sub> = 1/R<sub>1</sub> + 1/R<sub>2</sub> + ... + 1/R<sub>n</sub></b></p>

          <h3 class="text-dark"><b>Resistência Equivalente</b></h3>
          <p class="text-dark">A resistência equivalente de um circuito composto pode ser calculada com base nas combinações de resistores em série e paralelo. Para simplificar o cálculo, é necessário primeiro calcular a resistência equivalente de cada parte do circuito e depois somá-las ou aplicar a fórmula para resistores em paralelo.</p>

          <h3 class="text-dark"><b>Exemplo de Cálculo de Circuito Composto</b></h3>
          <p class="text-dark">Vamos supor que temos um circuito com três resistores: R<sub>1</sub> = 10 Ω, R<sub>2</sub> = 20 Ω, e R<sub>3</sub> = 30 Ω, sendo que R<sub>1</sub> e R<sub>2</sub> estão em série, e esse conjunto está em paralelo com R<sub>3</sub>.</p>
          <p class="text-dark">Primeiro, calculamos a resistência equivalente dos resistores em série:</p>
          <p class="text-dark"><b>R<sub>eq_série</sub> = R<sub>1</sub> + R<sub>2</sub> = 10 + 20 = 30 Ω</b></p>
          <p class="text-dark">Agora, calculamos a resistência equivalente de R<sub>eq_série</sub> em paralelo com R<sub>3</sub>:</p>
          <p class="text-dark"><b>1/R<sub>eq_paralelo</sub> = 1/R<sub>eq_série</sub> + 1/R<sub>3</sub> = 1/30 + 1/30 = 2/30</b></p>
          <p class="text-dark"><b>R<sub>eq_paralelo</sub> = 30/2 = 15 Ω</b></p>
          <p class="text-dark">Portanto, a resistência equivalente total do circuito é 15 Ω.</p>

          <h3 class="text-dark"><b>Lei de Kirchhoff</b></h3>
          <p class="text-dark">Para resolver circuitos compostos mais complexos, as Leis de Kirchhoff são fundamentais. Elas são divididas em:</p>
          <ul>
            <li><b>Lei das Correntes de Kirchhoff:</b> A soma das correntes que entram em um nó é igual à soma das correntes que saem do nó.</li>
            <li><b>Lei das Tensões de Kirchhoff:</b> A soma das tensões em qualquer laço fechado de um circuito é igual a zero.</li>
          </ul>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">Os circuitos compostos são uma parte essencial do estudo da eletrodinâmica, pois eles permitem entender melhor como os componentes interagem entre si. O cálculo da resistência equivalente e a aplicação das Leis de Kirchhoff são ferramentas cruciais para resolver problemas envolvendo esses tipos de circuitos.</p>
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
