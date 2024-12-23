<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Primeira Lei da Termodinâmica</title>
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
          <h2 class="text-dark">Primeira Lei da Termodinâmica</h2>

          <h3 class="text-dark"><b>O que é a Primeira Lei da Termodinâmica?</b></h3>
          <p class="text-dark">A Primeira Lei da Termodinâmica, também conhecida como Lei da Conservação de Energia, afirma que a energia total de um sistema isolado é constante. Ou seja, a energia não pode ser criada nem destruída, apenas transformada de uma forma para outra. Em termos práticos, isso significa que a quantidade de energia em um sistema fechado permanece a mesma, embora ela possa ser convertida entre calor, trabalho e outras formas de energia.</p>

          <h3 class="text-dark"><b>Formulação Matemática</b></h3>
          <p class="text-dark">A equação que representa a Primeira Lei da Termodinâmica é:</p>
          <p class="text-dark">
            <b>ΔU = Q - W</b>
          </p>
          <p class="text-dark">
            Onde:
            <ul>
              <li><b>ΔU</b>: A variação da energia interna do sistema;</li>
              <li><b>Q</b>: A quantidade de calor trocada pelo sistema;</li>
              <li><b>W</b>: O trabalho realizado pelo sistema sobre seu entorno.</li>
            </ul>
          </p>
          <p class="text-dark">Essa equação descreve como a energia interna de um sistema muda com a adição de calor ou a realização de trabalho. Se o sistema recebe calor (Q positivo), a sua energia interna aumenta. Por outro lado, se o sistema realiza trabalho (W positivo), a sua energia interna diminui.</p>

          <h3 class="text-dark"><b>Como funciona na prática?</b></h3>
          <p class="text-dark">Em um exemplo simples, imagine um gás confinado dentro de um pistão. Quando o gás é aquecido (Q positivo), ele se expande e realiza trabalho (W positivo) empurrando o pistão. De acordo com a Primeira Lei da Termodinâmica, a energia fornecida como calor se converte em trabalho. A quantidade de energia interna do gás varia de acordo com essas trocas de energia.</p>

          <h4 class="text-dark"><b>Exemplo Prático</b></h4>
          <p class="text-dark">Suponha que temos um sistema que recebe 100 J de calor (Q = 100 J) e realiza 40 J de trabalho (W = 40 J). A variação da energia interna do sistema seria:</p>
          <p class="text-dark">
            <b>ΔU = Q - W = 100 J - 40 J = 60 J</b>
          </p>
          <p class="text-dark">Portanto, a energia interna do sistema aumentou em 60 J.</p>

          <h3 class="text-dark"><b>Implicações da Primeira Lei</b></h3>
          <p class="text-dark">A Primeira Lei da Termodinâmica tem várias implicações importantes, como:</p>
          <ul class="text-dark">
            <li><b>Conservação de energia:</b> A energia não pode ser criada ou destruída, apenas transformada entre diferentes formas;</li>
            <li><b>Eficiência dos sistemas:</b> A eficiência de máquinas térmicas, como motores a combustão, depende de como a energia térmica é convertida em trabalho;</li>
            <li><b>Processos reversíveis e irreversíveis:</b> Em processos irreversíveis, parte da energia é desperdiçada na forma de calor indesejado, o que limita a eficiência do processo.</li>
          </ul>

          <h3 class="text-dark"><b>Aplicações da Primeira Lei</b></h3>
          <p class="text-dark">A Primeira Lei da Termodinâmica tem inúmeras aplicações práticas, desde motores a combustão até sistemas de refrigeração e até mesmo no funcionamento do corpo humano. Em motores de automóveis, por exemplo, a energia química do combustível é convertida em calor e trabalho. Da mesma forma, no corpo humano, a energia dos alimentos é convertida em trabalho e calor.</p>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">A Primeira Lei da Termodinâmica é fundamental para entender como os sistemas de energia funcionam. Ela nos ensina que a energia em um sistema isolado permanece constante e pode ser convertida entre formas diferentes, mas não pode ser criada ou destruída. Essa lei é aplicada em uma grande variedade de sistemas, desde motores até processos biológicos e tecnológicos, sendo um princípio essencial na engenharia, física e muitas outras áreas.</p>

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
