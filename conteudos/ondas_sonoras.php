<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ondulatória – Ondas Sonoras</title>
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
          <h2 class="text-dark">Ondulatória – Ondas Sonoras</h2>

          <h3 class="text-dark"><b>O que são as Ondas Sonoras?</b></h3>
          <p class="text-dark">As <b>ondas sonoras</b> são ondas mecânicas que se propagam através de meios materiais, como ar, água ou sólidos. Elas são causadas pela vibração de partículas no meio, que transferem energia de uma partícula para a outra. Ao contrário das ondas eletromagnéticas, que não precisam de um meio para se propagar, as ondas sonoras dependem de um meio material.</p>

          <p class="text-dark">As ondas sonoras são ondas longitudinais, o que significa que as partículas do meio se movem na mesma direção da propagação da onda. Quando uma partícula do ar, por exemplo, vibra, ela comprime e rarefaz as partículas adjacentes, gerando uma onda de compressões e rarefações que se desloca.</p>

          <h3 class="text-dark"><b>Características das Ondas Sonoras</b></h3>
          <ul class="text-dark">
            <li><b>Frequência:</b> A frequência de uma onda sonora determina o tom ou a altura do som. Quanto maior a frequência, mais agudo é o som, e quanto menor a frequência, mais grave é o som. A unidade de frequência é o Hertz (Hz).</li>
            <li><b>Amplitude:</b> A amplitude está relacionada à intensidade do som, ou seja, ao volume. Uma amplitude maior resulta em um som mais alto, enquanto uma amplitude menor resulta em um som mais baixo.</li>
            <li><b>Velocidade de propagação:</b> A velocidade com que o som se propaga depende do meio. No ar, por exemplo, a velocidade do som é de aproximadamente 340 metros por segundo a 20°C. A velocidade aumenta em meios mais densos, como água ou metais.</li>
            <li><b>Comprimento de onda:</b> O comprimento de onda é a distância entre dois pontos consecutivos em fase (como duas compressões ou duas rarefações). Ele está inversamente relacionado à frequência: quanto maior a frequência, menor o comprimento de onda.</li>
          </ul>

          <h3 class="text-dark"><b>Propagação do Som</b></h3>
          <p class="text-dark">A propagação do som ocorre quando as partículas de um meio (como ar, água ou sólidos) vibram e transferem energia para as partículas vizinhas. O som se propaga através do movimento de compressões e rarefações das partículas, gerando uma onda que se desloca no meio. O som pode se propagar por diferentes meios com velocidades distintas, sendo mais rápido em sólidos e mais lento em gases.</p>

          <p class="text-dark"><b>Exemplo de Propagação:</b> Quando você bate em um tambor, a vibração da membrana do tambor cria compressões e rarefações no ar ao redor. Essas ondas sonoras se propagam pelo ar até atingir nossos ouvidos, onde a sensação de som é percebida.</p>

          <h3 class="text-dark"><b>Reflexão, Refração e Difração do Som</b></h3>
          <ul class="text-dark">
            <li><b>Reflexão:</b> A reflexão do som ocorre quando as ondas sonoras encontram um obstáculo e voltam para o meio de onde vieram. Um exemplo disso é o eco, que ocorre quando o som se reflete em uma superfície distante e retorna aos nossos ouvidos.</li>
            <li><b>Refração:</b> A refração do som acontece quando as ondas sonoras mudam de direção ao passar de um meio para outro com propriedades físicas diferentes. A velocidade e o comprimento de onda do som podem mudar, causando essa alteração na direção da onda.</li>
            <li><b>Difração:</b> A difração é o fenômeno que ocorre quando as ondas sonoras contornam um obstáculo ou passam por uma abertura. O som pode ser ouvido mesmo quando não se está diretamente na linha de propagação da onda sonora.</li>
          </ul>

          <h3 class="text-dark"><b>Exemplo de Difração:</b></h3>
          <p class="text-dark">Um exemplo comum de difração do som é quando ouvimos uma conversa de uma sala ao lado, mesmo que a porta esteja fechada. O som contorna as paredes ou passa pelas aberturas, permitindo que ainda possamos escutá-lo.</p>

          <h3 class="text-dark"><b>Aplicações das Ondas Sonoras</b></h3>
          <p class="text-dark">As ondas sonoras têm uma ampla gama de aplicações em diferentes áreas:</p>
          <ul class="text-dark">
            <li><b>Medicina:</b> O ultrassom é uma aplicação de ondas sonoras de alta frequência que permite a visualização de estruturas internas do corpo, como fetos em desenvolvimento ou órgãos internos.</li>
            <li><b>Tecnologia:</b> As ondas sonoras também são usadas em tecnologia para gravações de som, como em CDs, DVDs e transmissões de áudio digital.</li>
            <li><b>Comunicação:</b> Em comunicações acústicas, como sistemas de alto-falantes e microfones, as ondas sonoras são essenciais para transmitir e captar áudio.</li>
          </ul>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">As ondas sonoras são um exemplo fascinante de como as ondas mecânicas podem ser usadas em diversas aplicações e como os fenômenos físicos associados a elas, como reflexão, refração e difração, afetam a forma como o som se propaga e é percebido. Desde a comunicação até as tecnologias médicas, as ondas sonoras desempenham um papel fundamental na nossa vida cotidiana.</p>

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
