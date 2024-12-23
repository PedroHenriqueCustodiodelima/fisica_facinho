<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eletricidade – Eletrostática – Condutor em Equilíbrio Eletrostático</title>
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
          <h2 class="text-dark">Eletricidade – Eletrostática – Condutor em Equilíbrio Eletrostático</h2>

          <h3 class="text-dark"><b>O que é um Condutor em Equilíbrio Eletrostático?</b></h3>
          <p class="text-dark">Um <b>condutor em equilíbrio eletrostático</b> é aquele onde não há movimento líquido de cargas dentro do material. Ou seja, em um condutor em equilíbrio eletrostático, as cargas livres dentro do condutor se distribuem de maneira tal que não há variação de potencial em toda a superfície do condutor. Esse fenômeno ocorre porque as cargas livres no condutor se movimentam até que o campo elétrico dentro do condutor se anule, e isso leva a um estado de equilíbrio.</p>

          <h3 class="text-dark"><b>Propriedades de um Condutor em Equilíbrio Eletrostático</b></h3>
          <p class="text-dark">As principais propriedades de um condutor em equilíbrio eletrostático são:</p>
          <ul class="text-dark">
            <li><b>Campo Elétrico Interno:</b> O campo elétrico dentro de um condutor em equilíbrio eletrostático é igual a zero. Isso ocorre porque as cargas se distribuem na superfície do condutor de tal forma que o campo interno se anula.</li>
            <li><b>Distribuição de Carga:</b> As cargas livres dentro do condutor se distribuem na superfície externa do condutor. Se o condutor for esférico, por exemplo, as cargas se distribuem uniformemente pela superfície externa.</li>
            <li><b>Superfície Equipotencial:</b> A superfície de um condutor em equilíbrio eletrostático é uma superfície equipotencial, ou seja, todos os pontos da superfície do condutor têm o mesmo potencial elétrico.</li>
            <li><b>Campo Elétrico Externo:</b> O campo elétrico fora de um condutor carregado depende da carga e da forma do condutor. Em um condutor esférico, por exemplo, o campo externo é igual ao campo gerado por uma carga puntiforme de mesma carga.</li>
          </ul>

          <h3 class="text-dark"><b>Equilíbrio Eletrostático em Condutores Esféricos</b></h3>
          <p class="text-dark">Considerando um <b>condutor esférico</b> carregado, a distribuição de carga será tal que as cargas se distribuem uniformemente sobre a superfície externa do condutor. Dentro do condutor, o campo elétrico é zero, e as cargas se distribuem de maneira que o potencial seja o mesmo em toda a superfície. O campo elétrico fora do condutor é radial e tem a forma de um campo gerado por uma carga puntiforme, onde o potencial diminui com a distância da carga.</p>

          <h3 class="text-dark"><b>Exemplo Prático: Condutor Cilíndrico</b></h3>
          <p class="text-dark">Em um <b>condutor cilíndrico</b> em equilíbrio eletrostático, a distribuição de carga será tal que as cargas se acumulam na superfície externa do cilindro. O campo elétrico dentro do condutor é zero, enquanto fora do condutor, o campo elétrico pode ser calculado utilizando a Lei de Gauss. A forma do campo elétrico dependerá da geometria do condutor.</p>

          <h3 class="text-dark"><b>Comportamento de Condutores em Presença de Campo Elétrico Externo</b></h3>
          <p class="text-dark">Quando um condutor em equilíbrio eletrostático é colocado em um campo elétrico externo, as cargas livres no condutor se rearranjarão de modo a anular o efeito do campo elétrico externo dentro do condutor. Esse rearranjo de cargas é responsável pela formação de uma <b>carga induzida</b> na superfície do condutor, que gera um campo elétrico interno que compensa o campo externo. Esse fenômeno é um exemplo da <b>blindagem eletrostática</b>, que é a capacidade de um condutor de proteger o interior de um campo elétrico externo.</p>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">O estudo do condutor em equilíbrio eletrostático é fundamental para compreender como as cargas se distribuem e se comportam dentro de condutores. A ausência de campo elétrico dentro do condutor e a distribuição das cargas na superfície são características centrais deste fenômeno. Além disso, a blindagem eletrostática é um efeito importante que permite isolar o interior de um condutor dos efeitos de campos elétricos externos.</p>

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
