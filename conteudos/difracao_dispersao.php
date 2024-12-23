<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ondulatória – Difração e Dispersão</title>
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
          <h2 class="text-dark">Ondulatória – Difração e Dispersão</h2>

          <h3 class="text-dark"><b>Difração</b></h3>
          <p class="text-dark">A <b>difração</b> é um fenômeno ondulatório que ocorre quando uma onda encontra um obstáculo ou uma fenda no seu caminho. Em vez de seguir sua trajetória reta, a onda se espalha ao redor do obstáculo ou passa pela fenda, criando uma nova distribuição de energia. A intensidade e o padrão de difração dependem de várias variáveis, como o tamanho da abertura em relação ao comprimento de onda da onda incidente.</p>

          <p class="text-dark">Esse fenômeno é mais evidente quando o tamanho do obstáculo ou da fenda é da ordem do comprimento de onda da onda. Por exemplo, a difração de luz visível pode ser observada ao passar luz através de uma fenda estreita, ou ao observar padrões criados por sombras. A difração também pode ser observada com ondas sonoras, ondas de rádio e outras formas de ondas.</p>

          <h3 class="text-dark"><b>Dispersão</b></h3>
          <p class="text-dark">A <b>dispersão</b> é o fenômeno em que diferentes componentes de uma onda se propagam a diferentes velocidades, dependendo de suas frequências. No contexto de luz, isso ocorre porque a luz branca (que é composta por várias cores ou frequências) é separada em um espectro de cores quando passa através de um meio como um prisma ou uma gota de água. Cada cor (ou comprimento de onda) da luz se propaga com uma velocidade diferente, o que resulta na separação das cores.</p>

          <p class="text-dark">A dispersão é a razão pela qual um arco-íris é formado após a chuva, quando a luz solar passa através das gotas de água na atmosfera. Diferentes cores de luz se separam devido à dispersão, criando o padrão de cores características. Em materiais óticos como prismas ou redes de difração, a dispersão é usada para separar e analisar a composição espectral de fontes de luz.</p>

          <h3 class="text-dark"><b>Diferença entre Difração e Dispersão</b></h3>
          <p class="text-dark">- <b>Difração</b> está relacionada ao comportamento das ondas quando elas encontram um obstáculo ou uma fenda. Esse fenômeno ocorre com todas as ondas, e seu efeito é observado principalmente em torno do obstáculo ou através da abertura.</p>

          <p class="text-dark">- <b>Dispersão</b>, por outro lado, envolve a separação de componentes de uma onda (geralmente luz) com base em suas diferentes frequências ou comprimentos de onda, geralmente em um meio específico como um prisma.</p>

          <h3 class="text-dark"><b>Exemplos de Difração e Dispersão no Cotidiano</b></h3>
          <p class="text-dark">- <b>Difração:</b> Um exemplo de difração pode ser observado ao ver a luz de um farol passando através de uma abertura estreita em uma parede. O padrão de difração será visível nas bordas da abertura.</p>

          <p class="text-dark">- <b>Dispersão:</b> Quando a luz branca passa por um prisma, ela se dispersa em um espectro de cores, criando o arco-íris de cores distintas.</p>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">Tanto a difração quanto a dispersão são fenômenos importantes na ondulatória e têm aplicações significativas em áreas como óptica, acústica e telecomunicações. Compreender como as ondas se comportam ao encontrar obstáculos ou ao passarem por meios materiais é essencial para entender uma série de fenômenos naturais e tecnológicos.</p>

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
