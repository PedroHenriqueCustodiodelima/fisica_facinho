<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ondulatória – Cordas Vibrantes</title>
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
          <h2 class="text-dark">Ondulatória – Cordas Vibrantes</h2>

          <h3 class="text-dark"><b>O que são as Cordas Vibrantes?</b></h3>
          <p class="text-dark">As <b>cordas vibrantes</b> são um exemplo clássico de ondas estacionárias. Quando uma corda é fixada em ambas as extremidades e é excitada por uma força periódica, ela começa a vibrar, criando uma onda estacionária. Esse fenômeno é amplamente utilizado para a produção de sons em instrumentos musicais, como guitarras, violões, pianos e violinos.</p>

          <h3 class="text-dark"><b>Como as Cordas Vibrantes Funcionam?</b></h3>
          <p class="text-dark">Quando uma corda é tensionada e uma das extremidades é movimentada, a onda gerada viaja pela corda e se reflete na extremidade fixa. As ondas que se propagam e as ondas refletidas interferem entre si, resultando em uma onda estacionária. Dependendo da frequência da vibração, diferentes modos de vibração podem ocorrer, com a formação de <i>nós</i> e <i>ventres</i>.</p>

          <h3 class="text-dark"><b>Modos de Vibração</b></h3>
          <p class="text-dark">Em uma corda vibrante, os <i>nós</i> são os pontos onde a amplitude da onda é zero, enquanto os <i>ventres</i> são os pontos de maior amplitude. A quantidade de nós e ventres depende da frequência da onda e da tensão na corda. A fórmula que relaciona o comprimento da corda, a frequência e a velocidade de propagação das ondas na corda é dada por:</p>
          <p class="text-dark"><i>f = (n * v) / (2 * L)</i></p>
          <p class="text-dark">Onde:</p>
          <ul class="text-dark">
            <li><i>f</i> é a frequência da onda;</li>
            <li><i>n</i> é o número do modo de vibração (1, 2, 3...);</li>
            <li><i>v</i> é a velocidade de propagação da onda na corda;</li>
            <li><i>L</i> é o comprimento da corda.</li>
          </ul>

          <h3 class="text-dark"><b>Influência da Tensão e do Comprimento da Corda</b></h3>
          <p class="text-dark">A frequência das ondas vibrantes depende de alguns fatores, como a tensão na corda e o seu comprimento. Quanto maior a tensão, maior será a frequência das vibrações, pois a velocidade de propagação das ondas aumenta. Já o comprimento da corda também influencia diretamente a frequência: quanto menor o comprimento da corda, maior será a frequência das vibrações.</p>

          <h3 class="text-dark"><b>Exemplos Práticos de Cordas Vibrantes</b></h3>
          <ul class="text-dark">
            <li><b>Instrumentos Musicais de Corda:</b> Em instrumentos como guitarras, violões, pianos e violinos, as cordas vibrantes geram os sons. A tensão nas cordas e o comprimento delas são ajustados para criar diferentes notas musicais.</li>
            <li><b>Ondas de Som:</b> As vibrações das cordas são transmitidas ao ar como ondas sonoras, que depois são captadas pelo ouvido humano, permitindo a audição dos sons.</li>
            <li><b>Estudo de Modos de Vibração:</b> O estudo das cordas vibrantes é utilizado para compreender os fenômenos de ressonância e as propriedades de materiais tensionados.</li>
          </ul>

          <h3 class="text-dark"><b>Ressonância nas Cordas Vibrantes</b></h3>
          <p class="text-dark">Quando a frequência de uma corda vibrante coincide com a sua frequência natural de vibração, ocorre a <b>ressonância</b>, o que resulta em uma amplificação das vibrações. Esse fenômeno é observado quando uma corda é excitada com a mesma frequência de suas ondas estacionárias, produzindo um som mais intenso.</p>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">As cordas vibrantes são fundamentais tanto no estudo da mecânica das ondas quanto na produção de sons em instrumentos musicais. A compreensão dos princípios envolvidos na vibração das cordas permite que possamos explorar uma vasta gama de aplicações, desde a fabricação de instrumentos musicais até a análise de fenômenos acústicos e ressonância.</p>

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
