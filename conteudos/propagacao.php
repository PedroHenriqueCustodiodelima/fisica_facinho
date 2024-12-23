<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Processos de Propagação de Calor</title>
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
          <h2 class="text-dark">Processos de Propagação de Calor</h2>

          <h3 class="text-dark"><b>O que são os Processos de Propagação de Calor?</b></h3>
          <p class="text-dark">Os processos de propagação de calor são os mecanismos pelos quais o calor se transfere de um corpo para outro. Eles ocorrem de três formas principais: condução, convecção e radiação.</p>

          <h4 class="text-dark"><b>1. Condução</b></h4>
          <p class="text-dark">A condução é a transferência de calor através de um material, sem que haja o movimento do próprio material. Esse processo ocorre devido à interação das partículas do corpo. Em sólidos, as partículas (átomos ou moléculas) vibram com maior intensidade quando aquecidas, transmitindo essa energia térmica para as partículas vizinhas.</p>
          <p class="text-dark"><b>Exemplo:</b> Se uma extremidade de uma barra de metal for aquecida, a outra extremidade também se aquece.</p>
          <p class="text-dark"><b>Fórmula:</b> A taxa de transferência de calor por condução é dada pela Lei de Fourier:</p>
          <pre class="text-dark">Q = -k * A * ΔT / L</pre>
          <p class="text-dark">Onde:</p>
          <ul class="text-dark">
            <li><b>Q</b> é a quantidade de calor transferido (Joules).</li>
            <li><b>k</b> é a condutividade térmica do material (W/m°C).</li>
            <li><b>A</b> é a área da seção transversal (m²).</li>
            <li><b>ΔT</b> é a diferença de temperatura (°C).</li>
            <li><b>L</b> é o comprimento do material (m).</li>
          </ul>

          <h4 class="text-dark"><b>2. Convecção</b></h4>
          <p class="text-dark">A convecção ocorre em fluidos (líquidos e gases) devido ao movimento das partículas do fluido. Quando uma parte do fluido é aquecida, ela se expande, tornando-se menos densa e ascendendo, enquanto a parte mais fria desce, criando um ciclo de movimentação do fluido.</p>
          <p class="text-dark"><b>Exemplo:</b> Em um aquecedor de água, a água aquecida na parte inferior sobe, enquanto a água fria desce, criando uma circulação de calor.</p>
          <p class="text-dark"><b>Fórmula:</b> A taxa de transferência de calor por convecção é dada por:</p>
          <pre class="text-dark">Q = h * A * ΔT</pre>
          <p class="text-dark">Onde:</p>
          <ul class="text-dark">
            <li><b>Q</b> é a quantidade de calor transferido (Joules).</li>
            <li><b>h</b> é o coeficiente de transferência de calor por convecção (W/m²°C).</li>
            <li><b>A</b> é a área da superfície de contato (m²).</li>
            <li><b>ΔT</b> é a diferença de temperatura (°C).</li>
          </ul>

          <h4 class="text-dark"><b>3. Radiação</b></h4>
          <p class="text-dark">A radiação é a transferência de calor por meio de ondas eletromagnéticas, geralmente na forma de radiação infravermelha. Diferentemente da condução e convecção, a radiação pode ocorrer no vácuo.</p>
          <p class="text-dark"><b>Exemplo:</b> O calor do Sol chega até nós por radiação, aquecendo nosso corpo quando exposto à luz solar direta.</p>
          <p class="text-dark"><b>Fórmula:</b> A quantidade de calor transferido por radiação é dada pela Lei de Stefan-Boltzmann:</p>
          <pre class="text-dark">Q = σ * A * ε * (T⁴ - T₀⁴)</pre>
          <p class="text-dark">Onde:</p>
          <ul class="text-dark">
            <li><b>Q</b> é a quantidade de calor transferido (Joules).</li>
            <li><b>σ</b> é a constante de Stefan-Boltzmann (5,67 × 10⁻⁸ W/m²K⁴).</li>
            <li><b>A</b> é a área da superfície (m²).</li>
            <li><b>ε</b> é a emissividade do material (adimensional).</li>
            <li><b>T</b> é a temperatura da superfície (K).</li>
            <li><b>T₀</b> é a temperatura do ambiente (K).</li>
          </ul>

          <h3 class="text-dark"><b>Comparação entre os Processos</b></h3>
          <table class="table table-bordered text-dark">
            <thead>
              <tr>
                <th>Processo</th>
                <th>Meio Necessário</th>
                <th>Velocidade de Propagação</th>
                <th>Exemplos Cotidianos</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Condução</td>
                <td>Sólido</td>
                <td>Relativamente lenta</td>
                <td>Ferro aquecido, panela no fogo</td>
              </tr>
              <tr>
                <td>Convecção</td>
                <td>Líquido e gasoso</td>
                <td>Relativamente rápida</td>
                <td>Circulação de ar, aquecimento de água</td>
              </tr>
              <tr>
                <td>Radiação</td>
                <td>Nenhum (vácuo)</td>
                <td>Muito rápida</td>
                <td>Calor do Sol, fogueira</td>
              </tr>
            </tbody>
          </table>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">Os três processos de propagação de calor são fundamentais para entender como o calor se move no universo e em sistemas cotidianos. Cada processo tem sua importância dependendo do contexto, e em muitas situações, mais de um processo pode ocorrer simultaneamente.</p>

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
