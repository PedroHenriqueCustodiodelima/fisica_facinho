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
      <p class="m-0 ml-2"><span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span></p>
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

    <div class="missao-container">
        <?php
        // Definindo as metas de questões para as missões
        $metasMissao = [10, 30, 50, 70, 90, 110, 130, 150, 170, 190, 210, 300];
        
        // Nomes para as missões
        $nomesMissao = [
            "Missão Iniciante", "Missão Básica", "Missão Intermediária", "Missão Avançada", 
            "Missão Desafio", "Missão Expert", "Missão Mestre", "Missão Elite", 
            "Missão Suprema", "Missão Pro", "Missão Titã", "Missão Lendária"
        ];

        // Separando as missões entre valores de 10 a 200
        $metasFiltradas = array_filter($metasMissao, function($meta) {
            return $meta >= 10 && $meta <= 300;
        });

        // Ordenando as metas de forma crescente
        sort($metasFiltradas);

        // Gerando missões ordenadas
        foreach ($metasFiltradas as $index => $meta) {
            $missaoId = $index + 1; // Identificador da missão (1 a 12)
            echo "
                <div class='missao'>
                    <h3>{$nomesMissao[$index]} - Acertar $meta Questões</h3>
                    <progress id='missao$missaoId' value='0' max='$meta'></progress>
                    <p id='progresso$missaoId'>0/$meta Concluído</p>
                </div>
            ";
        }
        ?>
    </div>
</section>

    </main>

    <script>
        // Dados obtidos do PHP (total de acertos)
        const totalAcertos = <?php echo $dadosMissoes['total_acertos']; ?>;

        // Função para atualizar as missões
        function atualizarMissoes(acertosTotais) {
            // Definindo as metas de acertos das missões
            const metasMissao = [10, 30, 50, 70, 90, 110, 130, 150, 170, 190, 210, 300];

            // Atualizando as missões com base nos acertos
            metasMissao.forEach((meta, index) => {
                const progressoElement = document.getElementById(`missao${index + 1}`);
                const progressoTexto = document.getElementById(`progresso${index + 1}`);
                
                // A cada missão, limitamos os acertos ao máximo da missão
                const progresso = Math.min(acertosTotais, meta);
                
                progressoElement.value = progresso;
                progressoTexto.textContent = `${progresso}/${meta} Concluído`;
            });
        }

        // Atualiza as missões com os dados de acertos
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
