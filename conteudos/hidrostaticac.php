<?php
// Usar caminho absoluto para evitar erros
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hidrostática</title>
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
        <img id="avatar-imagem" src="<?php echo htmlspecialchars('../' . $imagemPerfil); ?>" alt="Avatar" width="50px" height="50px" class="ml-3">
        <p class="m-0 ml-2">Olá, <span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span>!</p>
        </a>
      </div>
  </header>
  <div class="voltar-container mb-4">
      <a href="../conteudos1.php" class="custom-link">
        <i class="fa-solid fa-circle-arrow-left"></i> <span>Voltar</span>
      </a>
    </div>
    <main>
    <div class="container">
    <div class="card mb-4 mx-auto" style="max-width: 800px; width: 95%;">
        <div class="card-body">
            <h2 class="text-dark">Hidrostática</h2>
            <p class="text-dark">A Hidrostática é o ramo da Física que estuda os líquidos em repouso, ou seja, os líquidos que não estão em movimento. A principal preocupação da Hidrostática é analisar o comportamento dos líquidos em equilíbrio e entender as leis que governam sua pressão, densidade e as forças que atuam sobre eles.</p>

            <h3 class="text-dark">Pressão em Líquidos</h3>
            <p class="text-dark">A pressão em um fluido em repouso é dada pela fórmula:</p>
            <p class="text-dark"><b>p = ρ * g * h</b></p>
            <p class="text-dark">Onde:</p>
            <ul class="text-dark">
                <li><b>p:</b> Pressão do fluido (em pascal, Pa)</li>
                <li><b>ρ:</b> Densidade do fluido (em kg/m³)</li>
                <li><b>g:</b> Aceleração da gravidade (aproximadamente 9,8 m/s²)</li>
                <li><b>h:</b> Profundidade do ponto no fluido (em metros, m)</li>
            </ul>
            <p class="text-dark">A pressão em um fluido aumenta com a profundidade, pois a pressão é causada pelo peso da coluna de fluido acima do ponto considerado.</p>

            <h3 class="text-dark">Princípio de Pascal</h3>
            <p class="text-dark">O princípio de Pascal estabelece que, em um fluido em repouso, qualquer variação de pressão aplicada em qualquer ponto do fluido é transmitida igualmente para todos os pontos do fluido e nas paredes do recipiente. Esse princípio é fundamental para o funcionamento de máquinas hidráulicas, como freios hidráulicos e prensa hidráulica.</p>

            <h3 class="text-dark">Lei de Arquimedes</h3>
            <p class="text-dark">A lei de Arquimedes afirma que todo corpo imerso em um fluido experimenta uma força de empuxo para cima, que é igual ao peso do fluido deslocado pelo corpo. A fórmula para o empuxo é:</p>
            <p class="text-dark"><b>Fₑ = ρ * g * V</b></p>
            <p class="text-dark">Onde:</p>
            <ul class="text-dark">
                <li><b>Fₑ:</b> Força de empuxo (em newtons, N)</li>
                <li><b>ρ:</b> Densidade do fluido (em kg/m³)</li>
                <li><b>g:</b> Aceleração da gravidade (aproximadamente 9,8 m/s²)</li>
                <li><b>V:</b> Volume do fluido deslocado (em metros cúbicos, m³)</li>
            </ul>
            <p class="text-dark">O princípio de Arquimedes explica por que os objetos flutuam ou afundam em um fluido. Se a força de empuxo é maior que o peso do objeto, ele flutua. Caso contrário, ele afunda.</p>

            <h3 class="text-dark">Conceito de Densidade</h3>
            <p class="text-dark">A densidade de um líquido é uma grandeza física que representa a quantidade de massa por unidade de volume. A fórmula da densidade é:</p>
            <p class="text-dark"><b>ρ = m / V</b></p>
            <p class="text-dark">Onde:</p>
            <ul class="text-dark">
                <li><b>ρ:</b> Densidade do fluido (em kg/m³)</li>
                <li><b>m:</b> Massa do fluido (em quilogramas, kg)</li>
                <li><b>V:</b> Volume do fluido (em metros cúbicos, m³)</li>
            </ul>
            <p class="text-dark">A densidade é uma das propriedades mais importantes para entender o comportamento dos líquidos e a interação deles com objetos imersos.</p>

            <h3 class="text-dark">Exemplo de Hidrostática: Pressão em um Líquido</h3>
            <p class="text-dark">Imagine um tanque cheio de água com uma profundidade de 10 metros. A densidade da água é aproximadamente 1000 kg/m³, e a aceleração da gravidade é 9,8 m/s². A pressão na base do tanque pode ser calculada pela fórmula:</p>
            <p class="text-dark"><b>p = ρ * g * h</b></p>
            <p class="text-dark"><b>p = 1000 kg/m³ * 9,8 m/s² * 10 m</b></p>
            <p class="text-dark"><b>p = 98.000 Pa (Pascal)</b></p>
            <p class="text-dark">Portanto, a pressão na base do tanque é de 98.000 Pa, ou 98 kPa.</p>

            <h3 class="text-dark">Aplicações Práticas da Hidrostática</h3>
            <p class="text-dark">A Hidrostática tem diversas aplicações em nosso cotidiano e em áreas como engenharia, arquitetura e navegação:</p>
            <ul class="text-dark">
                <li><b>Embalagens de líquidos:</b> Cálculos de pressão para o design de recipientes de líquidos.</li>
                <li><b>Flutuação de navios e submarinos:</b> Determinação da flutuabilidade e estabilidade de embarcações.</li>
                <li><b>Prensa hidráulica:</b> Utilização do princípio de Pascal para amplificar a força aplicada em um fluido.</li>
                <li><b>Medidores de pressão:</b> Instrumentos que utilizam as propriedades dos fluidos para medir a pressão em sistemas industriais.</li>
            </ul>

            <h3 class="text-dark">Conclusão</h3>
            <p class="text-dark">A Hidrostática é fundamental para a compreensão do comportamento dos líquidos em repouso, desde a pressão gerada por líquidos até os princípios que explicam a flutuação e o empuxo. Suas aplicações são essenciais em várias áreas, como a engenharia, a navegação e o design de equipamentos hidráulicos.</p>

            <p class="text-dark">Para mais informações sobre Hidrostática, consulte o artigo da <a href="https://www.educacao.uol.com.br/disciplinas/fisica/hidrostatica.htm" target="_blank" rel="noopener noreferrer">UOL Educação</a>.</p>
        </div>
    </div>
</div>

</main>

  <footer>
    <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte (IFRN)</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
  <script src="../js/mecanica.js"></script>
</body>
</html>
