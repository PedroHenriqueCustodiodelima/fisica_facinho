<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ondulatória – Efeito Doppler</title>
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
          <h2 class="text-dark">Ondulatória – Efeito Doppler</h2>

          <h3 class="text-dark"><b>O que é o Efeito Doppler?</b></h3>
          <p class="text-dark">O <b>efeito Doppler</b> descreve a variação na frequência ou comprimento de onda de uma onda em relação a um observador que se move em relação à fonte da onda. Esse fenômeno é comum em ondas sonoras, luminosas e eletromagnéticas, e é frequentemente associado ao som de um veículo em movimento, como uma ambulância passando com a sirene ligada.</p>

          <h3 class="text-dark"><b>Como Funciona?</b></h3>
          <p class="text-dark">Quando uma fonte de onda se move em direção a um observador, as ondas sonoras ou luminosas são comprimidas, resultando em uma frequência maior e, portanto, um som ou luz mais agudos (frequência aumentada). Por outro lado, quando a fonte se afasta do observador, as ondas são esticadas, resultando em uma frequência menor e, portanto, um som ou luz mais grave (frequência diminuída).</p>

          <h3 class="text-dark"><b>Fórmula do Efeito Doppler</b></h3>
          <p class="text-dark">A fórmula para o efeito Doppler no som é dada por:</p>
          <div class="text-dark">
            <b>f' = f (v ± vo) / (v ± vs)</b>
          </div>
          <p class="text-dark">Onde:</p>
          <ul class="text-dark">
            <li><b>f'</b> = frequência observada pelo receptor</li>
            <li><b>f</b> = frequência emitida pela fonte</li>
            <li><b>v</b> = velocidade do som no meio (geralmente ar)</li>
            <li><b>vo</b> = velocidade do observador em relação ao meio (positivo se o observador se aproxima da fonte)</li>
            <li><b>vs</b> = velocidade da fonte em relação ao meio (positiva se a fonte se afasta do observador)</li>
          </ul>
          <p class="text-dark">Essa fórmula pode ser adaptada para diferentes tipos de ondas (sonoras, luminosas, etc.).</p>

          <h3 class="text-dark"><b>Exemplo do Efeito Doppler</b></h3>
          <p class="text-dark">Imagine um carro se aproximando de um pedestre. À medida que o carro se aproxima, o som do motor se torna mais agudo devido ao aumento da frequência das ondas sonoras. Após o carro passar e começar a se afastar, o som do motor se torna mais grave devido à diminuição da frequência das ondas. Esse fenômeno é o Efeito Doppler em ação.</p>

          <h3 class="text-dark"><b>Aplicações do Efeito Doppler</b></h3>
          <p class="text-dark">O efeito Doppler tem várias aplicações práticas em diferentes áreas, como:</p>
          <ul class="text-dark">
            <li><b>Radar de velocidade:</b> Medição da velocidade de objetos em movimento, como carros e aeronaves.</li>
            <li><b>Ecografia Doppler:</b> Usada na medicina para examinar o fluxo sanguíneo e a circulação.</li>
            <li><b>Observação astronômica:</b> Determinação da velocidade de aproximação ou afastamento de estrelas e galáxias com base no desvio para o azul (quando se aproximam) ou para o vermelho (quando se afastam).</li>
            <li><b>Sonar:</b> Utilizado para detectar a presença de objetos subaquáticos, como submarinos e peixes, e medir sua velocidade.</li>
          </ul>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">O efeito Doppler é um fenômeno físico fascinante que ocorre quando há movimento relativo entre uma fonte de ondas e um observador. Ele tem implicações importantes em várias áreas, desde a medicina até a astronomia, e é fundamental para a compreensão das ondas em movimento. Ao observar o Efeito Doppler, podemos aprender muito sobre o movimento de objetos e como eles interagem com as ondas ao seu redor.</p>

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
