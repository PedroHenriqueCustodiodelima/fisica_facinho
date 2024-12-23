<?php
include(__DIR__ . '/../funcoes_php/funcoes_inicio.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Segunda Lei da Termodinâmica</title>
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
      <a href="../conteudos2.php" class="custom-link">
        <i class="fa-solid fa-circle-arrow-left"></i> <span>Voltar</span>
      </a>
  </div>

  <main>
    <div class="container">
      <div class="card mb-4 mx-auto">
        <div class="card-body">
          <h2 class="text-dark">Segunda Lei da Termodinâmica</h2>

          <h3 class="text-dark"><b>O que é a Segunda Lei da Termodinâmica?</b></h3>
          <p class="text-dark">A Segunda Lei da Termodinâmica estabelece que, em qualquer processo natural, a entropia total do universo (sistema + entorno) tende a aumentar. A entropia é uma medida da desordem ou aleatoriedade de um sistema, e a Segunda Lei afirma que a direção natural dos processos é de aumento dessa desordem, ou seja, processos espontâneos aumentam a entropia do sistema e do entorno.</p>

          <h3 class="text-dark"><b>Formulação Matemática</b></h3>
          <p class="text-dark">A Segunda Lei da Termodinâmica pode ser expressa por meio da seguinte fórmula:</p>
          <p class="text-dark">
            <b>ΔS ≥ Q / T</b>
          </p>
          <p class="text-dark">
            Onde:
            <ul>
              <li><b>ΔS</b>: A variação da entropia do sistema;</li>
              <li><b>Q</b>: A quantidade de calor trocada pelo sistema;</li>
              <li><b>T</b>: A temperatura do sistema.</li>
            </ul>
          </p>
          <p class="text-dark">Essa fórmula diz que, para um processo espontâneo, a variação de entropia (ΔS) deve ser maior ou igual à razão entre o calor trocado (Q) e a temperatura (T) do sistema.</p>

          <h3 class="text-dark"><b>Implicações da Segunda Lei</b></h3>
          <p class="text-dark">A Segunda Lei da Termodinâmica tem várias implicações importantes, como:</p>
          <ul class="text-dark">
            <li><b>Irreversibilidade dos processos naturais:</b> A maioria dos processos naturais é irreversível, ou seja, eles não podem voltar ao seu estado original sem a realização de trabalho externo;</li>
            <li><b>Máxima eficiência dos motores térmicos:</b> Nenhum motor térmico pode ser 100% eficiente. Sempre haverá alguma perda de energia na forma de calor, e isso está relacionado ao aumento de entropia;</li>
            <li><b>Processos espontâneos e a direção do tempo:</b> A Segunda Lei da Termodinâmica nos mostra que o tempo avança na direção do aumento da entropia. Em sistemas isolados, isso significa que a desordem aumenta com o tempo.</li>
          </ul>

          <h3 class="text-dark"><b>Exemplo de Aplicação</b></h3>
          <p class="text-dark">Considere um processo de troca de calor entre dois corpos a temperaturas diferentes. O calor flui espontaneamente do corpo mais quente para o corpo mais frio. Durante esse processo, a entropia do sistema aumenta, uma vez que a energia se distribui de forma mais desordenada entre os dois corpos.</p>

          <h4 class="text-dark"><b>Exemplo Prático</b></h4>
          <p class="text-dark">Se 100 J de calor são transferidos de um corpo a 300 K para outro a 250 K, a variação de entropia pode ser calculada da seguinte forma:</p>
          <p class="text-dark">
            ΔS = Q / T
          </p>
          <p class="text-dark">
            Para o corpo quente: ΔS₁ = -100 J / 300 K = -0,33 J/K
          </p>
          <p class="text-dark">
            Para o corpo frio: ΔS₂ = 100 J / 250 K = 0,40 J/K
          </p>
          <p class="text-dark">
            A variação total de entropia: ΔS = ΔS₁ + ΔS₂ = -0,33 J/K + 0,40 J/K = 0,07 J/K
          </p>
          <p class="text-dark">Esse aumento na entropia é uma característica do processo espontâneo, que não pode ser revertido sem trabalho externo.</p>

          <h3 class="text-dark"><b>Máquinas Térmicas e a Segunda Lei</b></h3>
          <p class="text-dark">A Segunda Lei da Termodinâmica tem grande importância para os motores térmicos, como os encontrados em carros e usinas de energia. Nenhuma máquina térmica pode converter todo o calor em trabalho. Parte do calor sempre será dissipado, aumentando a entropia do sistema e do ambiente, o que limita a eficiência das máquinas térmicas.</p>

          <h3 class="text-dark"><b>Conclusão</b></h3>
          <p class="text-dark">A Segunda Lei da Termodinâmica é fundamental para a compreensão dos processos naturais e dos limites da eficiência dos sistemas térmicos. Ela nos ensina que a entropia tende a aumentar e que os processos naturais são irreversíveis. Isso implica que, em qualquer transformação de energia, sempre haverá uma dispersão de energia, dificultando a reversibilidade total do processo.</p>

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
