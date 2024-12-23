<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eletricidade – Eletromagnetismo – Campo Magnético</title>
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
          <h2 class="text-dark">Eletricidade – Eletromagnetismo – Campo Magnético</h2>

          <h3 class="text-dark"><b>O que é um Campo Magnético?</b></h3>
          <p class="text-dark">Um campo magnético é uma região do espaço onde uma força magnética pode ser observada. Ele é gerado por cargas elétricas em movimento, como correntes elétricas, ou por materiais magnéticos como ímãs. O campo magnético afeta partículas carregadas que se movem dentro dele, provocando uma força que pode mudar a direção ou a velocidade dessas partículas.</p>

          <h3 class="text-dark"><b>Como o Campo Magnético é Gerado?</b></h3>
          <p class="text-dark">O campo magnético é gerado por cargas elétricas em movimento, ou seja, correntes elétricas. Uma corrente elétrica, ao passar por um condutor, cria um campo magnético ao seu redor. Esse fenômeno foi descoberto por Hans Christian Oersted em 1820. O campo magnético pode também ser gerado por ímãs, que possuem dipolos magnéticos em sua estrutura.</p>

          <h3 class="text-dark"><b>Linhas de Campo Magnético</b></h3>
          <p class="text-dark">As linhas de campo magnético são representações visuais que mostram a direção e a intensidade do campo. Elas saem do pólo norte do ímã e entram no pólo sul. Dentro do ímã, as linhas seguem da região sul para a região norte. As linhas de campo magnético nunca se cruzam e são mais próximas umas das outras onde o campo é mais forte.</p>

          <h3 class="text-dark"><b>Direção e Sentido do Campo Magnético</b></h3>
          <p class="text-dark">A direção de um campo magnético é dada pela orientação das linhas de campo, que vão do pólo norte para o pólo sul do ímã. O sentido do campo magnético é dado pela direção da força que ele exerce sobre uma carga positiva em movimento.</p>

          <h3 class="text-dark"><b>Unidade de Medida do Campo Magnético</b></h3>
          <p class="text-dark">A unidade de medida do campo magnético no Sistema Internacional de Unidades (SI) é o Tesla (T). Outra unidade usada é o Gauss (G), sendo que 1 T = 10<sup>4</sup> G. O campo magnético é representado pelo símbolo <b>B</b>.</p>

          <h3 class="text-dark"><b>Fórmula da Força Magnética</b></h3>
          <p class="text-dark">A força magnética que age sobre uma carga elétrica em movimento no interior de um campo magnético pode ser calculada pela fórmula:</p>
          <p class="text-dark"><b>F = q * v * B * sen(θ)</b></p>
          <p class="text-dark">Onde:
            <ul>
              <li><b>F</b> é a força magnética em newtons (N).</li>
              <li><b>q</b> é a carga elétrica em coulombs (C).</li>
              <li><b>v</b> é a velocidade da carga em metros por segundo (m/s).</li>
              <li><b>B</b> é a intensidade do campo magnético em teslas (T).</li>
              <li><b>θ</b> é o ângulo entre a direção da velocidade da carga e a direção do campo magnético.</li>
            </ul>
          </p>

          <h3 class="text-dark"><b>Lei de Ampère</b></h3>
          <p class="text-dark">A Lei de Ampère relaciona a intensidade do campo magnético ao redor de um condutor com a corrente elétrica que circula por ele. A fórmula da Lei de Ampère para um condutor reto é:</p>
          <p class="text-dark"><b>B = μ₀ * I / (2 * π * r)</b></p>
          <p class="text-dark">Onde:
            <ul>
              <li><b>B</b> é o campo magnético em teslas (T).</li>
              <li><b>μ₀</b> é a permeabilidade magnética no vácuo (μ₀ = 4π × 10<sup>-7</sup> T·m/A).</li>
              <li><b>I</b> é a corrente elétrica em amperes (A).</li>
              <li><b>r</b> é a distância do ponto de medição à linha do condutor em metros (m).</li>
            </ul>
          </p>

          <h3 class="text-dark"><b>Campo Magnético de um Ímã</b></h3>
          <p class="text-dark">Um ímã cria um campo magnético em seu entorno, com linhas de campo saindo do pólo norte e entrando no pólo sul. O campo magnético de um ímã pode ser visualizado usando limalha de ferro, que se orienta ao longo das linhas de campo. A intensidade do campo é maior nas extremidades do ímã, onde estão localizados os pólos.</p>

          <h3 class="text-dark"><b>Força Magnética entre Dois Ímãs</b></h3>
          <p class="text-dark">A força magnética entre dois ímãs depende da distância entre eles, da intensidade dos campos magnéticos gerados por cada ímã e da orientação dos pólos magnéticos. Os ímãs se atraem quando os pólos opostos estão próximos e se repelem quando os pólos iguais estão próximos.</p>

          <h3 class="text-dark"><b>Aplicações do Campo Magnético</b></h3>
          <p class="text-dark">Os campos magnéticos têm várias aplicações importantes na tecnologia e na ciência, incluindo:</p>
          <ul>
            <li><b>Geradores e Motores Elétricos:</b> O princípio do funcionamento de geradores e motores elétricos é baseado na interação entre campos magnéticos e correntes elétricas.</li>
            <li><b>Ressonância Magnética (RM):</b> Utiliza campos magnéticos para gerar imagens detalhadas do interior do corpo humano.</li>
            <li><b>Dispositivos Eletrônicos:</b> Como memórias magnéticas e sensores de movimento.</li>
          </ul>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">O campo magnético é um fenômeno fundamental no estudo da eletricidade e do magnetismo, com uma ampla gama de aplicações práticas. Seu comportamento é influenciado por cargas em movimento e por materiais magnéticos, e sua compreensão é essencial para o desenvolvimento de tecnologias modernas.</p>
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
