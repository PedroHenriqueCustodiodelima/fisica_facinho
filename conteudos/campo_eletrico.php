<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eletricidade – Eletrostática – Campo Elétrico</title>
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
          <h2 class="text-dark">Eletricidade – Eletrostática – Campo Elétrico</h2>

          <h3 class="text-dark"><b>Campo Elétrico</b></h3>
          <p class="text-dark">O <b>campo elétrico</b> é uma grandeza física que descreve a influência de uma carga elétrica sobre o espaço ao seu redor e sobre outras cargas elétricas. Ele é gerado por cargas elétricas e exerce uma força sobre outras cargas presentes nesse campo. O campo elétrico é um conceito fundamental em eletrostática e é responsável por várias interações elétricas que observamos no cotidiano.</p>

          <h3 class="text-dark"><b>Definição de Campo Elétrico</b></h3>
          <p class="text-dark">Um campo elétrico é gerado por uma carga elétrica e pode ser descrito como a força que uma carga de teste positiva experimentaria se colocada em determinado ponto no espaço. A intensidade do campo elétrico em um ponto é definida como a força por unidade de carga que atuaria sobre uma carga de teste positiva colocada nesse ponto.</p>

          <h3 class="text-dark"><b>Intensidade do Campo Elétrico</b></h3>
          <p class="text-dark">A intensidade do campo elétrico gerado por uma carga puntiforme é dada pela seguinte fórmula:</p>
          <div class="text-dark">
            <b>E = F / q</b>
          </div>
          <p class="text-dark">Onde:</p>
          <ul class="text-dark">
            <li><b>E</b> = intensidade do campo elétrico (em Newtons por Coulomb, N/C)</li>
            <li><b>F</b> = força experimentada pela carga de teste (em Newtons, N)</li>
            <li><b>q</b> = carga de teste (em Coulombs, C)</li>
          </ul>
          <p class="text-dark">Ou, de maneira alternativa, o campo elétrico também pode ser expresso pela fórmula:</p>
          <div class="text-dark">
            <b>E = k * |Q| / r²</b>
          </div>
          <p class="text-dark">Onde:</p>
          <ul class="text-dark">
            <li><b>k</b> = constante eletrostática, aproximadamente <b>8,99 x 10^9 N·m²/C²</b> no vácuo</li>
            <li><b>Q</b> = carga que gera o campo (em Coulombs, C)</li>
            <li><b>r</b> = distância entre a carga que gera o campo e o ponto onde o campo é calculado (em metros, m)</li>
          </ul>
          
          <h3 class="text-dark"><b>Exemplo de Cálculo do Campo Elétrico</b></h3>
          <p class="text-dark">Vamos considerar uma carga de +3 µC (microcoulombs) e queremos calcular a intensidade do campo elétrico a uma distância de 2 metros dessa carga. Usando a fórmula:</p>
          <div class="text-dark">
            <b>E = (8,99 x 10^9 N·m²/C²) * |3 x 10^-6 C| / (2 m)²</b>
          </div>
          <p class="text-dark">A intensidade do campo elétrico seria:</p>
          <div class="text-dark">
            <b>E = (8,99 x 10^9) * (3 x 10^-6) / 4</b>
          </div>
          <p class="text-dark">Resolvendo, encontramos a intensidade do campo elétrico gerado pela carga a 2 metros de distância.</p>

          <h3 class="text-dark"><b>Linhas de Campo Elétrico</b></h3>
          <p class="text-dark">As linhas de campo elétrico são representações gráficas que ajudam a visualizar a direção e o comportamento do campo elétrico. Elas sempre saem das cargas positivas e entram nas cargas negativas. A densidade das linhas de campo indica a intensidade do campo – quanto mais próximas as linhas, maior a intensidade do campo.</p>
          <ul class="text-dark">
            <li>As linhas de campo nunca se cruzam.</li>
            <li>As linhas de campo se afastam de cargas positivas e se aproximam de cargas negativas.</li>
            <li>A direção do campo em um ponto é tangente à linha de campo naquele ponto.</li>
          </ul>

          <h3 class="text-dark"><b>Exemplo de Representação das Linhas de Campo</b></h3>
          <p class="text-dark">Imagine uma carga positiva. As linhas de campo partem dessa carga e se estendem em todas as direções, afastando-se dela. Se houver uma carga negativa, as linhas de campo se aproximam dela. O padrão de linhas de campo pode ser desenhado para representar a interação entre as cargas e a intensidade do campo.</p>

          <h3 class="text-dark"><b>Princípio de Superposição</b></h3>
          <p class="text-dark">O princípio de superposição afirma que o campo elétrico resultante de várias cargas é a soma vetorial dos campos elétricos individuais gerados por cada carga. Ou seja, para calcular o campo elétrico total em um ponto, basta somar os campos elétricos de todas as cargas presentes, considerando a direção e a intensidade de cada um deles.</p>

          <h3 class="text-dark"><b>Campo Elétrico de Distribuições Contínuas de Carga</b></h3>
          <p class="text-dark">Quando temos uma distribuição contínua de cargas (como uma linha ou uma superfície carregada), o cálculo do campo elétrico pode ser mais complexo, mas segue o mesmo princípio de somar os campos de cada elemento de carga diferencial. A integral deve ser utilizada para calcular o campo elétrico resultante em pontos fora da distribuição de carga.</p>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">O campo elétrico é uma grandeza fundamental que descreve a interação de cargas elétricas e influencia a movimentação de partículas carregadas no espaço. Compreender o campo elétrico e suas propriedades é essencial para entender fenômenos eletrostáticos e para aplicações práticas em diversas áreas, como física, engenharia elétrica e eletrônica.</p>

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
