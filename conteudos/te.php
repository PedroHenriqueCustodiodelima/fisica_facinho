<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Temperatura e Escalas de Medida</title>
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
          <h2 class="text-dark">Temperatura e Escalas de Medida</h2>
          <p class="text-dark">A temperatura é uma grandeza física que expressa o nível de calor ou frio de um corpo. Ela está relacionada à energia cinética das partículas que compõem a matéria, sendo medida por meio de escalas específicas que permitem comparar as temperaturas em diferentes sistemas.</p>

          <h3 class="text-dark"><b>Escalas de Temperatura</b></h3>
          <p class="text-dark">Existem várias escalas para medir a temperatura, sendo as mais comuns a Celsius, Fahrenheit e Kelvin. Cada uma dessas escalas tem um ponto de referência e uma unidade de medida específica.</p>

          <h4 class="text-dark"><b>Escala Celsius (°C)</b></h4>
          <p class="text-dark">A escala Celsius é a mais utilizada no Brasil e em grande parte do mundo. O ponto de congelamento da água é 0°C, e o ponto de ebulição é 100°C, ambos sob pressão atmosférica normal.</p>

          <h4 class="text-dark"><b>Escala Fahrenheit (°F)</b></h4>
          <p class="text-dark">A escala Fahrenheit é mais utilizada nos Estados Unidos e em alguns outros países. O ponto de congelamento da água é 32°F e o ponto de ebulição é 212°F, também sob pressão atmosférica normal.</p>

          <h4 class="text-dark"><b>Escala Kelvin (K)</b></h4>
          <p class="text-dark">A escala Kelvin é utilizada principalmente em ciências e em experimentos de física. O ponto zero da escala Kelvin é conhecido como o zero absoluto, ou seja, a temperatura em que as partículas de um corpo teriam a menor energia cinética possível. O zero absoluto é igual a -273,15°C.</p>

          <h3 class="text-dark"><b>Conversão entre as Escalas</b></h3>
          <p class="text-dark">As escalas Celsius, Fahrenheit e Kelvin estão inter-relacionadas. Abaixo, veja as fórmulas para conversão entre elas:</p>
          <ul class="text-dark">
            <li>Celsius para Fahrenheit: <b>°F = (°C × 9/5) + 32</b></li>
            <li>Fahrenheit para Celsius: <b>°C = (°F - 32) × 5/9</b></li>
            <li>Celsius para Kelvin: <b>K = °C + 273,15</b></li>
            <li>Kelvin para Celsius: <b>°C = K - 273,15</b></li>
            <li>Fahrenheit para Kelvin: <b>K = (°F - 32) × 5/9 + 273,15</b></li>
            <li>Kelvin para Fahrenheit: <b>°F = (K - 273,15) × 9/5 + 32</b></li>
          </ul>

          <h3 class="text-dark"><b>Importância da Temperatura</b></h3>
          <p class="text-dark">A temperatura é uma grandeza fundamental para o estudo da física e da química, pois influencia o comportamento de diversos sistemas. Ela está presente em processos como mudanças de fase da matéria (como fusão, solidificação, evaporação, etc.) e em reações químicas que dependem da temperatura para ocorrerem.</p>
          
          <h3 class="text-dark"><b>Aplicações da Temperatura</b></h3>
          <ul class="text-dark">
            <li>Controle da temperatura em processos industriais.</li>
            <li>Medicação e diagnóstico médico.</li>
            <li>Estudo e monitoramento do clima e do meio ambiente.</li>
            <li>Ajuste de temperaturas em sistemas eletrônicos e computacionais.</li>
          </ul>

          <img class="col-12" src="../img/escala_temperatura.png" alt="Escalas de Temperatura">

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
