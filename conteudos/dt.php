<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dilatação Térmica</title>
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
          <h2 class="text-dark">Dilatação Térmica</h2>
          <p class="text-dark">A dilatação térmica é um fenômeno físico que ocorre quando a temperatura de um material sofre variação. A mudança de temperatura provoca a alteração do volume ou das dimensões lineares do corpo devido à variação da energia cinética das suas partículas.</p>

          <h3 class="text-dark"><b>Tipos de Dilatação Térmica</b></h3>
          <p class="text-dark">A dilatação térmica pode ser classificada em três tipos principais:</p>

          <h4 class="text-dark"><b>Dilatação Linear</b></h4>
          <p class="text-dark">A dilatação linear é a variação do comprimento de um corpo devido à variação de temperatura. Ela ocorre quando um corpo sólido, como uma barra metálica, se expande ou se contrai na direção de seu comprimento.</p>
          <p class="text-dark">Fórmula: <b>ΔL = L₀ × α × ΔT</b></p>
          <p class="text-dark">Onde:</p>
          <ul class="text-dark">
            <li>ΔL: Variação do comprimento</li>
            <li>L₀: Comprimento inicial</li>
            <li>α: Coeficiente de dilatação linear</li>
            <li>ΔT: Variação de temperatura</li>
          </ul>

          <h4 class="text-dark"><b>Dilatação Superficial</b></h4>
          <p class="text-dark">A dilatação superficial ocorre quando um corpo sofre uma variação de temperatura que altera sua área superficial. Esse tipo de dilatação é observado em objetos que têm uma área definida, como chapas metálicas.</p>
          <p class="text-dark">Fórmula: <b>ΔA = A₀ × β × ΔT</b></p>
          <p class="text-dark">Onde:</p>
          <ul class="text-dark">
            <li>ΔA: Variação da área</li>
            <li>A₀: Área inicial</li>
            <li>β: Coeficiente de dilatação superficial</li>
            <li>ΔT: Variação de temperatura</li>
          </ul>

          <h4 class="text-dark"><b>Dilatação Volumétrica</b></h4>
          <p class="text-dark">A dilatação volumétrica refere-se à variação no volume de um corpo quando sua temperatura é alterada. Esse tipo de dilatação é observado em líquidos e sólidos com volume bem definido, como esferas metálicas ou líquidos em termômetros.</p>
          <p class="text-dark">Fórmula: <b>ΔV = V₀ × γ × ΔT</b></p>
          <p class="text-dark">Onde:</p>
          <ul class="text-dark">
            <li>ΔV: Variação do volume</li>
            <li>V₀: Volume inicial</li>
            <li>γ: Coeficiente de dilatação volumétrica</li>
            <li>ΔT: Variação de temperatura</li>
          </ul>

          <h3 class="text-dark"><b>Coeficientes de Dilatação</b></h3>
          <p class="text-dark">Os coeficientes de dilatação (α, β e γ) dependem do material em questão e indicam a tendência do material a se expandir ou contrair quando sua temperatura é alterada. Os materiais sólidos, líquidos e gasosos possuem coeficientes de dilatação diferentes.</p>

          <h3 class="text-dark"><b>Importância da Dilatação Térmica</b></h3>
          <p class="text-dark">A dilatação térmica é importante para o entendimento de muitos fenômenos cotidianos e para a engenharia. Ela deve ser considerada em projetos de construção de pontes, trilhos de trem, dutos e outros materiais sujeitos a variações de temperatura, a fim de evitar danos estruturais.</p>

          <h3 class="text-dark"><b>Exemplos de Aplicações</b></h3>
          <ul class="text-dark">
            <li>Expansão dos trilhos ferroviários durante o calor.</li>
            <li>Funcionamento de termômetros e manômetros.</li>
            <li>Desafios na construção de estruturas como pontes e edifícios.</li>
            <li>Comportamento de líquidos em termômetros e balanças.</li>
          </ul>

          <img class="col-12" src="../img/dilatacao_termica.png" alt="Dilatação Térmica">

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
