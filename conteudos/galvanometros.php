<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eletricidade – Eletrodinâmica – Galvanômetros</title>
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
          <h2 class="text-dark">Eletricidade – Eletrodinâmica – Galvanômetros</h2>

          <h3 class="text-dark"><b>O que é um Galvanômetro?</b></h3>
          <p class="text-dark">Um galvanômetro é um instrumento de medição utilizado para detectar e medir a intensidade da corrente elétrica. Ele é sensível a pequenas correntes elétricas e é amplamente utilizado em experimentos de laboratório, na calibração de outros instrumentos e no estudo de circuitos elétricos.</p>

          <h3 class="text-dark"><b>Princípio de Funcionamento do Galvanômetro</b></h3>
          <p class="text-dark">O funcionamento do galvanômetro baseia-se no princípio de que uma corrente elétrica que passa por um condutor em um campo magnético gera uma força que faz com que o condutor se mova. Em um galvanômetro, esse movimento é amplificado para ser detectado por um ponteiro ou por um display digital.</p>

          <h4 class="text-dark"><b>Estrutura do Galvanômetro</b></h4>
          <p class="text-dark">Um galvanômetro é composto principalmente por um bobina de fio condutor, que é colocada em um campo magnético. Quando uma corrente elétrica passa pela bobina, ela sofre uma deflexão (movimento) devido à interação com o campo magnético. Essa deflexão é proporcional à intensidade da corrente que passa pela bobina.</p>

          <h3 class="text-dark"><b>Componentes do Galvanômetro</b></h3>
          <ul>
            <li><b>Bobina:</b> Fio condutor enrolado em espiral onde a corrente elétrica passa.</li>
            <li><b>Ímã permanente:</b> Cria o campo magnético em que a bobina é inserida.</li>
            <li><b>Ponteiro ou Display:</b> Indica a deflexão da bobina, representando a corrente elétrica medida.</li>
            <li><b>Escala de Medição:</b> Mostra a correspondência entre a deflexão do ponteiro e a intensidade da corrente elétrica.</li>
          </ul>

          <h3 class="text-dark"><b>Tipos de Galvanômetro</b></h3>
          
          <h4 class="text-dark"><b>1. Galvanômetro de Agulha</b></h4>
          <p class="text-dark">O galvanômetro de agulha é um dos modelos mais tradicionais, onde a corrente elétrica faz com que uma agulha se desloque sobre uma escala graduada. Ele é utilizado para medições diretas de correntes pequenas.</p>

          <h4 class="text-dark"><b>2. Galvanômetro Digital</b></h4>
          <p class="text-dark">Os galvanômetros digitais utilizam tecnologia moderna, onde a deflexão da bobina é convertida em um valor digital exibido em um display. Esses dispositivos são mais precisos e fáceis de ler.</p>

          <h4 class="text-dark"><b>3. Galvanômetro de Ponteira</b></h4>
          <p class="text-dark">Esse tipo de galvanômetro é utilizado principalmente em experimentos de laboratório, sendo mais sensível e com maior precisão. Sua ponteira se movimenta para indicar as pequenas variações de corrente.</p>

          <h3 class="text-dark"><b>Usos e Aplicações</b></h3>
          <p class="text-dark">Os galvanômetros têm diversas aplicações, sendo usados principalmente para medir a intensidade de correntes elétricas fracas em circuitos de precisão. Alguns dos usos incluem:</p>
          <ul>
            <li><b>Laboratórios:</b> Para medir pequenas correntes em experimentos de física e eletrônica.</li>
            <li><b>Calibração:</b> Para calibrar outros instrumentos de medição de corrente elétrica, como amperímetros.</li>
            <li><b>Indústria:</b> Para monitorar a corrente em processos industriais que exigem medições precisas.</li>
          </ul>

          <h3 class="text-dark"><b>Galvanômetro e Amperímetro</b></h3>
          <p class="text-dark">O galvanômetro, em sua forma original, é um dispositivo muito sensível, adequado para medições de correntes muito pequenas. No entanto, quando é necessário medir correntes maiores, ele é combinado com um resistor de baixa resistência (shunt) para transformá-lo em um amperímetro. Isso permite que o galvanômetro seja usado em uma gama mais ampla de correntes.</p>

          <h3 class="text-dark"><b>Calibração de Galvanômetro</b></h3>
          <p class="text-dark">A calibração de um galvanômetro é fundamental para garantir medições precisas. A calibração envolve ajustar a escala do dispositivo de modo que a deflexão do ponteiro corresponda corretamente à corrente elétrica medida. Essa calibração pode ser feita com o uso de fontes de corrente conhecidas ou com instrumentos de medição de referência.</p>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">O galvanômetro é um instrumento fundamental para medições precisas de corrente elétrica em uma ampla gama de aplicações. Ele é especialmente útil em ambientes de laboratório, onde são necessárias medições de correntes muito pequenas. Compreender seu funcionamento e suas aplicações é crucial para quem trabalha com eletricidade e instrumentação de precisão.</p>
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
