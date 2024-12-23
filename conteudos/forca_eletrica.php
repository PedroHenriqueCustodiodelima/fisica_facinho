<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eletricidade – Eletrostática – Força Elétrica</title>
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
          <h2 class="text-dark">Eletricidade – Eletrostática – Força Elétrica</h2>

          <h3 class="text-dark"><b>Força Elétrica</b></h3>
          <p class="text-dark">A força elétrica é a interação entre duas cargas elétricas. Ela é uma das quatro forças fundamentais da natureza e é descrita pela <b>Lei de Coulomb</b>, que quantifica a força entre as cargas elétricas. Essa força pode ser de atração ou repulsão, dependendo do sinal das cargas envolvidas. Cargas de sinais opostos se atraem, enquanto cargas de sinais iguais se repelem.</p>

          <h3 class="text-dark"><b>Lei de Coulomb</b></h3>
          <p class="text-dark">A Lei de Coulomb descreve a magnitude da força elétrica entre duas cargas puntiformes. Ela é expressa pela fórmula:</p>
          <div class="text-dark">
            <b>F = k * (q1 * q2) / r²</b>
          </div>
          <p class="text-dark">Onde:</p>
          <ul class="text-dark">
            <li><b>F</b> = força elétrica entre as cargas (em Newtons, N)</li>
            <li><b>k</b> = constante eletrostática (aproximadamente 8,99 x 10^9 N·m²/C²)</li>
            <li><b>q1 e q2</b> = as cargas elétricas (em Coulombs, C)</li>
            <li><b>r</b> = distância entre as cargas (em metros, m)</li>
          </ul>
          <p class="text-dark">A constante <b>k</b> é chamada de constante eletrostática, e sua grandeza depende do meio em que as cargas se encontram. No vácuo ou no ar, seu valor é de aproximadamente 8,99 x 10^9 N·m²/C².</p>

          <h3 class="text-dark"><b>Força Atraente ou Repulsiva</b></h3>
          <p class="text-dark">A força elétrica pode ser de atração ou de repulsão entre as cargas:</p>
          <ul class="text-dark">
            <li><b>Atração:</b> Quando as cargas são de sinais opostos (uma positiva e a outra negativa), elas se atraem.</li>
            <li><b>Repulsão:</b> Quando as cargas têm o mesmo sinal (ambas positivas ou ambas negativas), elas se repelem.</li>
          </ul>

          <h3 class="text-dark"><b>Unidade de Carga Elétrica</b></h3>
          <p class="text-dark">A unidade de carga elétrica no Sistema Internacional de Unidades (SI) é o <b>Coulomb (C)</b>. A carga de um elétron é aproximadamente <b>-1,6 x 10^-19 C</b> e a carga de um próton é de <b>+1,6 x 10^-19 C</b>. Quando falamos sobre as interações entre as cargas elétricas, é importante notar que essas interações ocorrem entre múltiplas partículas carregadas e podem ser descritas por suas magnitudes e sinais.</p>

          <h3 class="text-dark"><b>Exemplo de Aplicação da Lei de Coulomb</b></h3>
          <p class="text-dark">Vamos imaginar duas cargas: uma carga positiva de +3 µC (microcoulombs) e uma carga negativa de -2 µC. Se a distância entre essas cargas for de 0,5 metros, podemos calcular a força entre elas utilizando a Lei de Coulomb.</p>
          <div class="text-dark">
            <b>F = (8,99 x 10^9 N·m²/C²) * (3 x 10^-6 C * -2 x 10^-6 C) / (0,5 m)²</b>
          </div>
          <p class="text-dark">Ao resolver essa equação, obtemos o valor da força, que será de atração, pois as cargas têm sinais opostos. A magnitude dessa força pode ser calculada numericamente.</p>

          <h3 class="text-dark"><b>Campo Elétrico</b></h3>
          <p class="text-dark">O campo elétrico é uma grandeza física que descreve a influência de uma carga elétrica sobre o espaço ao seu redor. O campo elétrico é gerado por uma carga elétrica e exerce uma força sobre outras cargas no seu interior.</p>
          <p class="text-dark">A intensidade do campo elétrico gerado por uma carga puntiforme é dada pela fórmula:</p>
          <div class="text-dark">
            <b>E = F / q</b>
          </div>
          <p class="text-dark">Onde:</p>
          <ul class="text-dark">
            <li><b>E</b> = intensidade do campo elétrico (em Newtons por Coulomb, N/C)</li>
            <li><b>F</b> = força experimentada pela carga de teste (em Newtons, N)</li>
            <li><b>q</b> = carga de teste (em Coulombs, C)</li>
          </ul>

          <h3 class="text-dark"><b>Exemplo de Campo Elétrico</b></h3>
          <p class="text-dark">Imagine que temos uma carga de 5 µC e queremos saber a intensidade do campo elétrico que ela gera a uma distância de 1 metro. Suponhamos que a força experimentada por uma carga de teste de 1 µC seja de 10 N. Podemos calcular o campo elétrico usando a fórmula:</p>
          <div class="text-dark">
            <b>E = 10 N / 1 µC = 10 N / 1 x 10^-6 C = 10^7 N/C</b>
          </div>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">A força elétrica é um dos fenômenos fundamentais da natureza e está diretamente relacionada à interação entre cargas elétricas. A Lei de Coulomb fornece uma descrição matemática precisa dessa força, que pode ser de atração ou repulsão dependendo das cargas envolvidas. A compreensão dessa força é essencial para entender muitos outros fenômenos da eletrostática e para várias aplicações tecnológicas e científicas.</p>

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
