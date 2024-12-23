<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ondulatória – Polarização e Ressonância</title>
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
          <h2 class="text-dark">Ondulatória – Polarização e Ressonância</h2>

          <h3 class="text-dark"><b>Polarização</b></h3>
          <p class="text-dark">A <b>polarização</b> é um fenômeno que ocorre em ondas transversais, como a luz. Quando uma onda se propaga, ela vibra em várias direções perpendiculares à sua direção de propagação. No caso da luz, a polarização refere-se à orientação dessas vibrações. Em outras palavras, a luz não polarizada vibra em várias direções, enquanto a luz polarizada vibra em apenas uma direção específica.</p>

          <p class="text-dark">O fenômeno da polarização pode ser observado através de filtros polarizadores. Quando a luz não polarizada passa por um filtro polarizador, as ondas são restringidas a uma única direção de vibração, resultando em luz polarizada. Isso tem várias aplicações, como em óculos de sol polarizados, que ajudam a reduzir o brilho refletido, e em telas LCD, onde a luz é controlada e polarizada.</p>

          <p class="text-dark"><b>Exemplo de Polarização:</b> Um exemplo simples de polarização pode ser visto ao usar um par de óculos de sol polarizados. Quando você olha através deles, a luz refletida pela água ou pelo asfalto parece ser reduzida, porque os óculos bloqueiam as ondas de luz que são refletidas em determinadas direções.</p>

          <h3 class="text-dark"><b>Ressonância</b></h3>
          <p class="text-dark">A <b>ressonância</b> é o fenômeno que ocorre quando um sistema é submetido a uma força externa com uma frequência que corresponde à sua frequência natural de vibração. Quando isso acontece, a amplitude das vibrações do sistema aumenta significativamente, podendo até levar o sistema a um estado de grande oscilação.</p>

          <p class="text-dark">Em termos simples, ressonância ocorre quando uma onda externa, como som ou vibração, coincide com a frequência natural de um objeto ou sistema. Isso pode ser observado, por exemplo, quando um músico toca uma nota específica em um instrumento e um vidro quebra devido à ressonância. O vidro tem uma frequência natural de vibração, e quando a frequência da música coincide com a dessa frequência, o vidro começa a vibrar mais fortemente até quebrar.</p>

          <p class="text-dark"><b>Exemplo de Ressonância:</b> O exemplo mais clássico de ressonância ocorre em pontes e estruturas que, ao serem submetidas a uma vibração com a mesma frequência da sua frequência natural, podem entrar em colapso, como visto em alguns casos históricos, como a famosa queda da Ponte Tacoma Narrows, nos Estados Unidos, devido à ressonância com o vento.</p>

          <h3 class="text-dark"><b>Diferença entre Polarização e Ressonância</b></h3>
          <p class="text-dark">- A <b>polarização</b> refere-se à orientação das vibrações de uma onda, especialmente luz, enquanto a <b>ressonância</b> é a amplificação das vibrações de um sistema quando a frequência da força externa coincide com a frequência natural do sistema.</p>

          <p class="text-dark">- A polarização tem aplicações em ótica, enquanto a ressonância é mais comumente observada em sistemas mecânicos e acústicos.</p>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">A <b>polarização</b> e a <b>ressonância</b> são fenômenos distintos, mas ambos importantes para o estudo das ondas e sua interação com diferentes meios. A polarização é essencial para entender a luz e suas propriedades, enquanto a ressonância tem implicações significativas em diversas áreas, como engenharia, acústica e até na medicina.</p>

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
