<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calor</title>
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
      <a href="../conteudos2.php" class="custom-link" >
        <i class="fa-solid fa-circle-arrow-left"></i> <span>Voltar</span>
      </a>
  </div>

  <main>
    <div class="container">
      <div class="card mb-4 mx-auto">
        <div class="card-body">
          <h2 class="text-dark">Calor</h2>
          <p class="text-dark">O calor é uma forma de energia que se transfere entre os corpos devido a uma diferença de temperatura. Quando dois corpos com temperaturas diferentes entram em contato, o calor flui do corpo mais quente para o mais frio até que ambos atinjam o equilíbrio térmico, ou seja, a mesma temperatura.</p>

          <h3 class="text-dark"><b>Temperatura e Calor</b></h3>
          <p class="text-dark">Embora temperatura e calor sejam conceitos relacionados, eles são diferentes. A temperatura é uma medida do grau de agitação das partículas de uma substância, enquanto o calor é a energia transferida entre os corpos em razão dessa diferença de temperatura.</p>

          <h3 class="text-dark"><b>Unidade de Calor</b></h3>
          <p class="text-dark">A unidade de medida do calor no Sistema Internacional de Unidades (SI) é o joule (J). No entanto, em alguns contextos, é comum o uso de outras unidades, como a caloria (cal), especialmente em calorimetria e na alimentação. A conversão entre joules e calorias é dada pela seguinte fórmula:</p>
          <ul class="text-dark">
            <li><b>1 cal = 4,18 J</b></li>
          </ul>

          <h3 class="text-dark"><b>Capacidade Térmica</b></h3>
          <p class="text-dark">A capacidade térmica de um corpo é a quantidade de calor necessária para que sua temperatura aumente em 1°C. A capacidade térmica depende da massa e da natureza do material. A fórmula para calcular a quantidade de calor (Q) necessária para aumentar a temperatura de uma substância é:</p>
          <ul class="text-dark">
            <li><b>Q = m × c × ΔT</b></li>
            <li>Onde:</li>
            <li><b>Q</b> é a quantidade de calor (Joules ou calorias)</li>
            <li><b>m</b> é a massa do corpo (kg ou g)</li>
            <li><b>c</b> é a capacidade térmica específica do material (J/kg°C ou cal/g°C)</li>
            <li><b>ΔT</b> é a variação de temperatura (°C)</li>
          </ul>

          <h3 class="text-dark"><b>Transferência de Calor</b></h3>
          <p class="text-dark">Existem três formas principais de transferência de calor:</p>
          <ul class="text-dark">
            <li><b>Condução:</b> É o processo de transferência de calor através de um material sólido, sem o movimento das partículas do material. O calor flui do corpo mais quente para o mais frio. Um exemplo é a transferência de calor em um fio de metal aquecido.</li>
            <li><b>Convecção:</b> Ocorre em líquidos e gases, onde o calor é transferido pelo movimento das partículas. Exemplos incluem a circulação de água quente em uma panela e a atmosfera aquecida pelo sol.</li>
            <li><b>Radiação:</b> É a transferência de calor na forma de ondas eletromagnéticas, como a luz infravermelha. Não requer meio material para ocorrer e é o tipo de transferência de calor do Sol para a Terra.</li>
          </ul>

          <h3 class="text-dark"><b>Exemplos do Cotidiano</b></h3>
          <ul class="text-dark">
            <li>O aquecimento de uma xícara de chá no micro-ondas.</li>
            <li>Aquecimento de um edifício com aquecedores.</li>
            <li>O resfriamento de um refrigerante em uma lata metálica.</li>
            <li>O derretimento do gelo em um copo de vidro.</li>
          </ul>

          <h3 class="text-dark"><b>Importância do Calor</b></h3>
          <p class="text-dark">O calor é fundamental em várias áreas, como na indústria, na biologia, na meteorologia e até em processos tecnológicos como o funcionamento de motores e sistemas de climatização. O estudo do calor e sua transferência é essencial para o desenvolvimento de tecnologias mais eficientes e sustentáveis.</p>
          
          <img class="col-12" src="../img/calor.png" alt="Transferência de Calor">

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
