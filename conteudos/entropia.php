<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Entropia - Conceitos e Importância</title>
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
      <a href="../conteudos2.php" class="custom-link">
        <i class="fa-solid fa-circle-arrow-left"></i> <span>Voltar</span>
      </a>
  </div>

  <main>
    <div class="container">
      <div class="card mb-4 mx-auto">
        <div class="card-body">
          <h2 class="text-dark">Entropia</h2>

          <h3 class="text-dark"><b>O que é Entropia?</b></h3>
          <p class="text-dark">A entropia é uma grandeza física usada na termodinâmica que mede a quantidade de desordem ou aleatoriedade de um sistema. Em termos simples, quanto maior a entropia de um sistema, mais desordenado ele está. A entropia também pode ser interpretada como uma medida da dispersão de energia em um sistema.</p>

          <h3 class="text-dark"><b>Formulação Matemática</b></h3>
          <p class="text-dark">A entropia (S) pode ser expressa pela seguinte fórmula:</p>
          <p class="text-dark">
            <b>dS = δQ / T</b>
          </p>
          <p class="text-dark">Onde:</p>
          <ul>
            <li><b>dS</b>: Variação da entropia do sistema;</li>
            <li><b>δQ</b>: Quantidade de calor trocada com o ambiente;</li>
            <li><b>T</b>: Temperatura do sistema.</li>
          </ul>
          <p class="text-dark">Essa fórmula indica que a entropia de um sistema aumenta quando o calor é transferido para ele, e a variação de entropia está diretamente relacionada à temperatura do sistema durante o processo.</p>

          <h3 class="text-dark"><b>Importância da Entropia</b></h3>
          <p class="text-dark">A entropia tem um papel central na Termodinâmica, sendo uma das principais grandezas que governam a direção dos processos naturais. A Segunda Lei da Termodinâmica, por exemplo, afirma que a entropia total de um sistema isolado tende a aumentar ao longo do tempo, o que implica que os processos naturais são irreversíveis e tendem a aumentar a desordem.</p>

          <h3 class="text-dark"><b>Exemplo de Aumento de Entropia</b></h3>
          <p class="text-dark">Um exemplo clássico de aumento de entropia ocorre quando você mistura dois líquidos a diferentes temperaturas. O calor flui do líquido mais quente para o mais frio, e a energia se distribui de forma mais desordenada, o que resulta em um aumento na entropia do sistema.</p>

          <h4 class="text-dark"><b>Exemplo Prático</b></h4>
          <p class="text-dark">Se 50 J de calor são transferidos de um corpo a 400 K para outro a 300 K, a variação de entropia pode ser calculada da seguinte forma:</p>
          <p class="text-dark">
            ΔS₁ = -50 J / 400 K = -0,125 J/K
          </p>
          <p class="text-dark">
            ΔS₂ = 50 J / 300 K = 0,167 J/K
          </p>
          <p class="text-dark">
            A variação total de entropia: ΔS = ΔS₁ + ΔS₂ = -0,125 J/K + 0,167 J/K = 0,042 J/K
          </p>
          <p class="text-dark">Esse aumento na entropia é uma consequência direta da transferência de calor entre os dois corpos a temperaturas diferentes.</p>

          <h3 class="text-dark"><b>Entropia e a Ordem do Universo</b></h3>
          <p class="text-dark">A entropia está relacionada ao grau de desordem do universo. O aumento da entropia é frequentemente interpretado como a tendência natural dos sistemas físicos em alcançar um estado de maior desordem. Isso pode ser observado em diversos processos naturais, como a mistura de substâncias ou a dispersão de energia de um sistema quente para um sistema frio.</p>

          <h3 class="text-dark"><b>Exemplos no Mundo Real</b></h3>
          <p class="text-dark">Em várias situações do cotidiano, a entropia pode ser observada de forma prática:</p>
          <ul class="text-dark">
            <li><b>Gelo derretendo:</b> Quando um pedaço de gelo é colocado em água quente, ele derrete, e a entropia do sistema aumenta à medida que a energia se dispersa.</li>
            <li><b>Difusão de substâncias:</b> Quando você dissolve açúcar em um copo de água, as moléculas de açúcar se dispersam pela água, aumentando a entropia do sistema.</li>
            <li><b>Processos de combustão:</b> A queima de combustível, como gasolina em um motor, também resulta em um aumento da entropia devido à dispersão de calor e gases.</li>
          </ul>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">A entropia é uma grandeza fundamental na física que nos ajuda a compreender a direção e a irreversibilidade dos processos naturais. O aumento da entropia é uma característica intrínseca da maioria dos processos, e está diretamente relacionado ao comportamento da energia em sistemas termodinâmicos. Ela é um conceito essencial para entender o funcionamento de motores térmicos, a evolução do universo e a eficiência de processos naturais e artificiais.</p>

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
