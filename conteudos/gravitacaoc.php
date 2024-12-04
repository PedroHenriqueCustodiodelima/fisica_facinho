<?php
// Usar caminho absoluto para evitar erros
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gravitação Universal</title>
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
            <h2 class="text-dark">Gravitação Universal</h2>
            <p class="text-dark">A Lei da Gravitação Universal, proposta por Isaac Newton em 1687, descreve a atração gravitacional entre dois corpos. A força gravitacional é uma das forças fundamentais da natureza, responsável pela atração entre massas.</p>

            <h3 class="text-dark">A Lei da Gravitação Universal</h3>
            <p class="text-dark">A força gravitacional entre dois corpos é diretamente proporcional ao produto das suas massas e inversamente proporcional ao quadrado da distância entre eles. A equação que descreve essa força é:</p>
            <p class="text-dark"><b>F = G * (m₁ * m₂) / r²</b></p>
            <p class="text-dark">Onde:</p>
            <ul class="text-dark">
                <li><b>F:</b> Força gravitacional entre os dois corpos (em newtons)</li>
                <li><b>G:</b> Constante gravitacional universal (aproximadamente 6,674 × 10⁻¹¹ N·m²/kg²)</li>
                <li><b>m₁ e m₂:</b> Massas dos dois corpos (em kg)</li>
                <li><b>r:</b> Distância entre os centros dos dois corpos (em metros)</li>
            </ul>
            <p class="text-dark">A constante gravitacional <b>G</b> é a mesma para todos os pares de corpos no universo. Isso significa que a força gravitacional é a mesma entre todos os objetos com massa, independentemente de sua natureza ou localização.</p>

            <h3 class="text-dark">Exemplo de Aplicação da Lei da Gravitação Universal</h3>
            <p class="text-dark">Vamos calcular a força gravitacional entre a Terra e a Lua. A massa da Terra é de aproximadamente 5,972 × 10²⁴ kg, e a massa da Lua é de aproximadamente 7,348 × 10²² kg. A distância média entre a Terra e a Lua é de 384.400 km (ou 3,844 × 10⁸ metros).</p>
            <p class="text-dark">Substituindo esses valores na equação da gravitação universal, temos:</p>
            <p class="text-dark"><b>F = (6,674 × 10⁻¹¹) * (5,972 × 10²⁴ * 7,348 × 10²²) / (3,844 × 10⁸)²</b></p>
            <p class="text-dark">A força gravitacional resultante será:</p>
            <p class="text-dark"><b>F ≈ 1,98 × 10²⁰ N</b></p>
            <p class="text-dark">Portanto, a força gravitacional entre a Terra e a Lua é aproximadamente 1,98 × 10²⁰ newtons.</p>

            <h3 class="text-dark">Implicações da Lei da Gravitação Universal</h3>
            <p class="text-dark">A Lei da Gravitação Universal tem várias implicações importantes no nosso entendimento do universo:</p>
            <ul class="text-dark">
                <li><b>Órbitas dos planetas:</b> A gravidade é responsável pelas órbitas dos planetas ao redor do Sol. A força gravitacional do Sol mantém os planetas em suas órbitas.</li>
                <li><b>Movimento das luas:</b> A gravidade da Terra mantém a Lua em órbita ao seu redor. O mesmo acontece com as luas de outros planetas.</li>
                <li><b>Satélites artificiais:</b> Satélites em órbita ao redor da Terra são mantidos por forças gravitacionais. A gravidade é essencial para o funcionamento de satélites de comunicação, GPS, entre outros.</li>
                <li><b>Atraso gravitacional:</b> A presença de grandes massas pode alterar o espaço-tempo, provocando o que é conhecido como "distorção gravitacional", um efeito descrito pela teoria da relatividade geral de Einstein.</li>
            </ul>

            <h3 class="text-dark">Gravitação em Escalas Menores e Maiores</h3>
            <p class="text-dark">Embora a Lei da Gravitação Universal seja extremamente útil para descrever o movimento de planetas e estrelas, ela também pode ser aplicada em escalas menores, como no caso de objetos na superfície da Terra.</p>
            <p class="text-dark">Na Terra, a aceleração devida à gravidade é aproximadamente 9,8 m/s². Essa aceleração é a mesma para todos os corpos, independentemente de sua massa, o que significa que dois objetos de massas diferentes cairão com a mesma aceleração (ignorando a resistência do ar). Isso foi comprovado por Galileu Galilei em suas experiências.</p>

            <h3 class="text-dark">Constante Gravitacional Universal</h3>
            <p class="text-dark">A constante gravitacional <b>G</b> foi determinada experimentalmente por Henry Cavendish em 1798, e seu valor é um dos parâmetros fundamentais da física moderna. O valor exato é:</p>
            <p class="text-dark"><b>G = 6,674 × 10⁻¹¹ N·m²/kg²</b></p>

            <h3 class="text-dark">Conclusão</h3>
            <p class="text-dark">A Lei da Gravitação Universal é um pilar fundamental da física, permitindo-nos entender a interação gravitacional entre corpos e prever o movimento de objetos em escalas que variam desde pequenas partículas até grandes galáxias. Seu impacto na ciência e na tecnologia é imensurável, influenciando desde o lançamento de satélites até a compreensão das forças que governam o universo.</p>

            <p class="text-dark">Para mais informações sobre Gravitação Universal, consulte o artigo do <a href="https://www.educacao.uol.com.br/disciplinas/fisica/lei-da-gravitacao-universal.htm" target="_blank" rel="noopener noreferrer">UOL Educação</a>.</p>
        </div>
    </div>
</div>

</main>

  <footer>
    <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-3d"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="../js/sweetalert2.all.min.js"></script>
</body>
</html>
