<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ondulatória – Qualidades Fisiológicas do Som</title>
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
          <h2 class="text-dark">Ondulatória – Qualidades Fisiológicas do Som</h2>

          <h3 class="text-dark"><b>O que são as Qualidades Fisiológicas do Som?</b></h3>
          <p class="text-dark">As <b>qualidades fisiológicas do som</b> referem-se aos aspectos que determinam a percepção do som pelo ouvido humano. As principais qualidades fisiológicas do som são <b>altura</b>, <b>intensidade</b> e <b>timbre</b>.</p>

          <h3 class="text-dark"><b>1. Altura (ou Frequência)</b></h3>
          <p class="text-dark">A altura do som está relacionada à frequência das ondas sonoras. Sons com frequências altas são percebidos como agudos, enquanto sons com frequências baixas são percebidos como graves. A frequência é medida em hertz (Hz), onde 1 Hz corresponde a 1 ciclo por segundo. O ouvido humano é capaz de ouvir sons em uma faixa de aproximadamente 20 Hz a 20.000 Hz.</p>
          <p class="text-dark">Exemplo:</p>
          <ul class="text-dark">
            <li><b>Som agudo:</b> Frequências altas, como o som de um apito.</li>
            <li><b>Som grave:</b> Frequências baixas, como o som de um trovão.</li>
          </ul>

          <h3 class="text-dark"><b>2. Intensidade (ou Amplitude)</b></h3>
          <p class="text-dark">A intensidade do som está relacionada à amplitude das ondas sonoras. Quanto maior a amplitude das ondas, mais forte será o som, e quanto menor a amplitude, mais fraco será o som. A intensidade é medida em decibéis (dB), que indicam o nível de pressão sonora. O ouvido humano pode perceber uma ampla faixa de intensidades, desde sons muito baixos (como o som de um sussurro) até sons muito altos (como um foguete decolando).</p>
          <p class="text-dark">Exemplo:</p>
          <ul class="text-dark">
            <li><b>Som forte:</b> Som de um carro passando perto.</li>
            <li><b>Som fraco:</b> Som de um sussurro.</li>
          </ul>

          <h3 class="text-dark"><b>3. Timbre</b></h3>
          <p class="text-dark">O timbre é a qualidade do som que nos permite distinguir sons de fontes diferentes, mesmo que tenham a mesma altura e intensidade. O timbre é influenciado por várias características, como a forma da onda, a presença de harmônicos e a forma como o som é produzido. A percepção do timbre nos permite, por exemplo, distinguir um violão de um piano, mesmo que ambos toquem a mesma nota na mesma intensidade.</p>
          <p class="text-dark">Exemplo:</p>
          <ul class="text-dark">
            <li><b>Som do violão:</b> Possui um timbre característico, com harmônicos suaves.</li>
            <li><b>Som do piano:</b> Possui um timbre mais cheio e brilhante.</li>
          </ul>

          <h3 class="text-dark"><b>Fatores que Influenciam a Percepção do Som</b></h3>
          <p class="text-dark">Além das características do som em si, a percepção também pode ser influenciada por fatores como:</p>
          <ul class="text-dark">
            <li><b>Ambiente:</b> Sons podem ser percebidos de maneira diferente dependendo do local onde são ouvidos, como em um espaço aberto ou fechado.</li>
            <li><b>Interferência de outros sons:</b> Sons simultâneos podem alterar a percepção do som, fazendo com que ele pareça mais fraco ou mais forte, dependendo da intensidade dos outros sons.</li>
            <li><b>Capacidade auditiva:</b> A audição humana pode variar de pessoa para pessoa. Com o tempo, a capacidade de perceber certas frequências pode diminuir, especialmente em frequências mais altas.</li>
          </ul>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">As qualidades fisiológicas do som são fundamentais para compreendermos como percebemos os sons ao nosso redor. A altura, intensidade e timbre são características que nos permitem diferenciar os sons e nos dar informações sobre as fontes sonoras. A compreensão dessas qualidades é essencial em diversas áreas, como na música, acústica, engenharia de som e até mesmo em tratamentos médicos relacionados à audição.</p>

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
