<?php
include("funcoes_php/funcoes_missoes.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Configurações</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="css/missoes.css">
</head>
<body>

  <header class="d-flex justify-content-between align-items-center">
    <a href="inicio.php">
        <img src="img/logo.png" width="200px" alt="Logo">
    </a>
    <div class="perfil-header d-flex align-items-center">
      <img id="avatar-imagem" src="<?php echo htmlspecialchars($imagemPerfil); ?>" alt="Avatar" width="50px" height="50px" class="ml-3">
      <p class="m-0 ml-2">Olá, <span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span>!</p>
    </div>
  </header>

  <div class="container">
  <div class="voltar-container mb-4">
        <a href="inicio.php" class="custom-link">
            <i class="fa-solid fa-circle-arrow-left"></i> <span>Voltar</span>
        </a>
    </div>
    <main>
        <section id="missoes">
            <h2>Missões</h2>

            <!-- Missão 1: Acertar 30 questões -->
            <div class="missao">
                <h3>Acertar 30 Questões</h3>
                <progress id="missao30" value="0" max="30"></progress>
                <p id="progresso30">0/30 Concluído</p>
            </div>

            <!-- Missão 2: Acertar 20 questões -->
            <div class="missao">
                <h3>Acertar 20 Questões</h3>
                <progress id="missao20" value="0" max="20"></progress>
                <p id="progresso20">0/20 Concluído</p>
            </div>
        </section>
    </main>

    <script>
        // Dados obtidos do PHP
        const totalAcertos = <?php echo $dadosMissoes['total_acertos']; ?>;

        // Função para atualizar as missões
        function atualizarMissoes(certas) {
            // Missão 30 questões
            const progresso30 = document.getElementById('missao30');
            const textoProgresso30 = document.getElementById('progresso30');
            progresso30.value = certas;
            textoProgresso30.textContent = `${certas}/30 Concluído`;

            // Missão 20 questões
            const progresso20 = document.getElementById('missao20');
            const textoProgresso20 = document.getElementById('progresso20');
            progresso20.value = Math.min(certas, 20); // Limita a 20 para essa missão
            textoProgresso20.textContent = `${Math.min(certas, 20)}/20 Concluído`;
        }

        // Atualiza com o número de respostas corretas
        atualizarMissoes(totalAcertos);
    </script>
  </div>

  <footer>
    <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-3d"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="js/inicio.js"></script>
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

</body>
</html>
