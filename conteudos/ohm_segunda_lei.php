<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eletricidade – Eletrodinâmica – Segunda Lei de Ohm</title>
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
          <h2 class="text-dark">Eletricidade – Eletrodinâmica – Segunda Lei de Ohm</h2>

          <h3 class="text-dark"><b>O que é a Segunda Lei de Ohm?</b></h3>
          <p class="text-dark">A Segunda Lei de Ohm, também conhecida como Lei de Ohm para materiais condutores, estabelece que a resistência elétrica de um material depende da sua resistividade (\( \rho \)), do comprimento do condutor (\( L \)) e da área da seção transversal (\( A \)) do material. A fórmula é a seguinte:</p>

          <p class="text-dark"><b>R = ρ × (L / A)</b></p>
          <p class="text-dark">Onde:</p>
          <ul class="text-dark">
            <li><b>R</b> é a resistência do condutor em ohms (Ω).</li>
            <li><b>ρ</b> é a resistividade do material em ohm-metros (Ω·m), uma constante que depende do material do condutor.</li>
            <li><b>L</b> é o comprimento do condutor em metros (m).</li>
            <li><b>A</b> é a área da seção transversal do condutor em metros quadrados (m²).</li>
          </ul>

          <h3 class="text-dark"><b>Compreendendo a Segunda Lei de Ohm</b></h3>
          <p class="text-dark">A Segunda Lei de Ohm é usada para descrever a resistência de condutores em função de suas propriedades físicas. Ela mostra que a resistência aumenta com o comprimento do condutor e diminui com o aumento da área da seção transversal. Além disso, a resistência de um material é uma propriedade fundamental que depende da sua resistividade, que é uma constante material.</p>

          <h3 class="text-dark"><b>Fatores que afetam a resistência</b></h3>
          <ul class="text-dark">
            <li><b>Resistividade:</b> Cada material tem uma resistividade característica. Condutores como cobre e prata possuem baixa resistividade, enquanto materiais como borracha e vidro possuem alta resistividade.</li>
            <li><b>Comprimento do condutor:</b> Quanto maior o comprimento do condutor, maior será sua resistência, pois os elétrons têm mais dificuldade para se mover através de um condutor mais longo.</li>
            <li><b>Área da seção transversal:</b> A resistência diminui quando a área da seção transversal aumenta, pois há mais espaço para os elétrons fluírem.</li>
          </ul>

          <h3 class="text-dark"><b>Exemplo Prático</b></h3>
          <p class="text-dark">Considerando um fio de cobre com resistividade de \( \rho = 1.68 \times 10^{-8} \, \Omega \cdot m \), comprimento de \( L = 2 \, m \) e área da seção transversal de \( A = 1 \times 10^{-6} \, m^2 \), podemos calcular a resistência utilizando a fórmula da Segunda Lei de Ohm:</p>
          <p class="text-dark"><b>R = ρ × (L / A) = (1.68 × 10⁻⁸ Ω·m) × (2 m / 1 × 10⁻⁶ m²) = 0.0336 Ω</b></p>
          <p class="text-dark">Portanto, a resistência do fio de cobre será de \( 0.0336 \, \Omega \).</p>

          <h3 class="text-dark"><b>Aplicações da Segunda Lei de Ohm</b></h3>
          <p class="text-dark">A Segunda Lei de Ohm tem diversas aplicações práticas, principalmente no design e análise de condutores e circuitos. Ela é usada para:</p>
          <ul class="text-dark">
            <li><b>Dimensionamento de fios e cabos:</b> Ao calcular a resistência de fios, pode-se determinar as dimensões necessárias para evitar perdas de energia e superaquecimento.</li>
            <li><b>Escolha de materiais condutores:</b> Ao selecionar materiais para cabos elétricos, a resistividade é uma consideração importante para garantir eficiência.</li>
            <li><b>Análise de circuitos:</b> A resistência dos condutores e a resistividade do material influenciam o comportamento de circuitos elétricos e a escolha de componentes como resistores.</li>
          </ul>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">A Segunda Lei de Ohm é essencial para entender como as propriedades físicas de um material afetam sua resistência elétrica. Ela fornece uma relação simples e útil que permite calcular a resistência com base nas características do material, como comprimento, área da seção transversal e resistividade.</p>
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
