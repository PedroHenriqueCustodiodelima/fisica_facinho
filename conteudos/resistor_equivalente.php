<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eletricidade – Eletrodinâmica – Resistor Equivalente</title>
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
          <h2 class="text-dark">Eletricidade – Eletrodinâmica – Resistor Equivalente</h2>

          <h3 class="text-dark"><b>O que é o Resistor Equivalente?</b></h3>
          <p class="text-dark">O resistor equivalente é um conceito utilizado para simplificar circuitos elétricos compostos por mais de um resistor. Ele representa a resistência total de um conjunto de resistores conectados em série ou em paralelo, podendo ser calculado de forma simples a partir da combinação das resistências individuais.</p>

          <h3 class="text-dark"><b>Resistores em Série</b></h3>
          <p class="text-dark">Quando os resistores estão conectados em série, a resistência total (equivalente) do circuito é dada pela soma das resistências individuais. A fórmula é a seguinte:</p>
          <p class="text-dark"><b>R<sub>eq</sub> = R<sub>1</sub> + R<sub>2</sub> + ... + R<sub>n</sub></b></p>
          <p class="text-dark">Ou seja, a resistência equivalente em um circuito em série é simplesmente a soma das resistências dos resistores presentes no circuito.</p>

          <h4 class="text-dark"><b>Exemplo:</b></h4>
          <p class="text-dark">Se tivermos três resistores em série com resistências de 2 Ω, 4 Ω e 6 Ω, a resistência equivalente será:</p>
          <p class="text-dark"><b>R<sub>eq</sub> = 2 Ω + 4 Ω + 6 Ω = 12 Ω</b></p>

          <h3 class="text-dark"><b>Resistores em Paralelo</b></h3>
          <p class="text-dark">Quando os resistores estão conectados em paralelo, a resistência equivalente é calculada pela fórmula:</p>
          <p class="text-dark"><b>1 / R<sub>eq</sub> = 1 / R<sub>1</sub> + 1 / R<sub>2</sub> + ... + 1 / R<sub>n</sub></b></p>
          <p class="text-dark">Ou seja, a inversa da resistência equivalente é igual à soma das inversas das resistências dos resistores individuais.</p>

          <h4 class="text-dark"><b>Exemplo:</b></h4>
          <p class="text-dark">Se tivermos três resistores em paralelo com resistências de 2 Ω, 4 Ω e 6 Ω, a resistência equivalente será:</p>
          <p class="text-dark"><b>1 / R<sub>eq</sub> = 1 / 2 Ω + 1 / 4 Ω + 1 / 6 Ω</b></p>
          <p class="text-dark"><b>1 / R<sub>eq</sub> = 0,5 + 0,25 + 0,1667 = 0,9167</b></p>
          <p class="text-dark"><b>R<sub>eq</sub> ≈ 1,09 Ω</b></p>

          <h3 class="text-dark"><b>Resistores em Série e Paralelo Combinados</b></h3>
          <p class="text-dark">Em circuitos mais complexos, podemos ter resistores em série e paralelo. Nesse caso, o procedimento é realizar as combinações de resistores em série e em paralelo separadamente e, depois, combinar os resultados até encontrar o valor do resistor equivalente total.</p>

          <h4 class="text-dark"><b>Exemplo:</b></h4>
          <p class="text-dark">Considere dois resistores de 4 Ω e 6 Ω em paralelo, conectados em série com um resistor de 10 Ω. O resistor equivalente seria calculado da seguinte maneira:</p>
          <p class="text-dark"><b>1 / R<sub>eq(paralelo)</sub> = 1 / 4 Ω + 1 / 6 Ω = 0,25 + 0,1667 = 0,4167</b></p>
          <p class="text-dark"><b>R<sub>eq(paralelo)</sub> ≈ 2,4 Ω</b></p>
          <p class="text-dark">Agora, somamos esse valor ao resistor em série:</p>
          <p class="text-dark"><b>R<sub>eq(total)</sub> = R<sub>eq(paralelo)</sub> + 10 Ω = 2,4 Ω + 10 Ω = 12,4 Ω</b></p>

          <h3 class="text-dark"><b>Importância do Resistor Equivalente</b></h3>
          <p class="text-dark">O resistor equivalente simplifica o cálculo e a análise de circuitos elétricos, permitindo que um circuito complexo seja substituído por um único resistor com a mesma resistência total. Essa simplificação é essencial no projeto de circuitos e na compreensão do comportamento dos mesmos.</p>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">O resistor equivalente é uma ferramenta fundamental para entender e resolver circuitos elétricos, seja em situações de resistores em série ou paralelo, ou em circuitos mais complexos. A aplicação das fórmulas de combinação de resistores em série e paralelo facilita a análise e o dimensionamento dos circuitos em diversas situações da eletrônica e da física elétrica.</p>
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
