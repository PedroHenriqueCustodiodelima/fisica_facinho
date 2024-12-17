<?php
include("funcoes_php/funcoes_inicio.php");
include "header.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FACINHO</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="css/conteudos1.css">
  <script src="js/conteudos.js"></script>
</head>
<body>

 

  <div class="container">
    <div class="voltar-container mb-4">
      <a href="conteudos.php" class="custom-link mb-3">
          <i class="fa-solid fa-circle-arrow-left"></i> <span>Voltar</span>
      </a>
    </div>
    <main>
      <h2 class="text-center mb-4 text-black">Terceiro ano</h2>

      <div class="text-center mb-4">
        <span class="sort-icon" onclick="sortCards()">
          <i class="fa-solid fa-sort-alpha-down" id="sort-icon"></i>
        </span>
      </div>

      <div class="row justify-content-center" id="conteudos-lista">
        <?php
          $conteudos = [
              ["titulo" => "Introdução à Física", "descricao" => "Compreenda os fundamentos e conceitos iniciais da física.", "cor" => "#1F77B4", "icone" => "fas fa-book", "url" => "conteudos/if.php"],
              ["titulo" => "Grandezas e Vetores", "descricao" => "Aprenda sobre grandezas físicas e a representação vetorial.", "cor" => "#FF7F0E", "icone" => "fas fa-vector-square", "url" => "conteudos/gv.php"],
              ["titulo" => "Cinemática – conceitos básicos", "descricao" => "Entenda os conceitos iniciais da cinemática.", "cor" => "#2CA02C", "icone" => "fas fa-arrows-alt", "url" => "conteudos/cb.php"],
              ["titulo" => "Cinemática – identificando os movimentos", "descricao" => "Classifique e analise diferentes tipos de movimentos.", "cor" => "#D62728", "icone" => "fas fa-shoe-prints", "url" => "conteudos/cm.php"],
              ["titulo" => "Movimento retilíneo uniforme (MRU)", "descricao" => "Estude os movimentos retilíneos uniformes.", "cor" => "#9467BD", "icone" => "fas fa-ruler-horizontal", "url" => "conteudos/mruc.php"],
              ["titulo" => "Movimento retilíneo uniformemente variado (MRUV)", "descricao" => "Explore os movimentos uniformemente variados.", "cor" => "#8C564B", "icone" => "fas fa-wave-square", "url" => "conteudos/mruvc.php"],
              ["titulo" => "Movimentos sob ação da gravidade", "descricao" => "Analise os movimentos causados pela gravidade.", "cor" => "#E377C2", "icone" => "fas fa-feather-alt", "url" => "conteudos/gc.php"],
              ["titulo" => "As Leis de Newton e suas aplicações", "descricao" => "Entenda as leis fundamentais da mecânica.", "cor" => "#7F7F7F", "icone" => "fas fa-balance-scale", "url" => "conteudos/ln.php"],
              ["titulo" => "Movimento Circular Uniforme", "descricao" => "Estude movimentos circulares com velocidade constante.", "cor" => "#BCBD22", "icone" => "fas fa-sync-alt", "url" => "conteudos/mc.php"],
              ["titulo" => "Dinâmica do movimento circular", "descricao" => "Explore as forças que agem em movimentos circulares.", "cor" => "#17BECF", "icone" => "fas fa-compact-disc", "url" => "conteudos/dc.php"],
              ["titulo" => "Trabalho energia potência", "descricao" => "Compreenda os conceitos de trabalho, energia e potência.", "cor" => "#FFA07A", "icone" => "fas fa-plug", "url" => "conteudos/ep.php"],
              ["titulo" => "Impulso e Quantidade de Movimento", "descricao" => "Analise o impacto de forças e o movimento dos corpos.", "cor" => "#CD5C5C", "icone" => "fas fa-forward", "url" => "conteudos/im.php"],
              ["titulo" => "Gravitação Universal", "descricao" => "Estude as interações gravitacionais entre os corpos.", "cor" => "#4682B4", "icone" => "fas fa-globe", "url" => "conteudos/gravitacaoc.php"],
              ["titulo" => "Estática", "descricao" => "Entenda o equilíbrio dos corpos em repouso.", "cor" => "#708090", "icone" => "fas fa-anchor", "url" => "conteudos/estaticac.php"],
              ["titulo" => "Hidrostática", "descricao" => "Explore a mecânica dos fluidos em repouso.", "cor" => "#00CED1", "icone" => "fas fa-water", "url" => "conteudos/hidrostaticac.php"],
              ["titulo" => "Hidrodinâmica", "descricao" => "Estude o comportamento dos fluidos em movimento.", "cor" => "#20B2AA", "icone" => "fas fa-tint", "url" => "conteudos/hidrodinamicac.php"],
          ];

          foreach ($conteudos as $conteudo) {
              echo '<div class="col-md-4 mb-4 d-flex justify-content-center conteudo-item">';
              echo '  <a href="' . htmlspecialchars($conteudo["url"]) . '" style="text-decoration: none;">';
              echo '    <div class="card" style="--cor: ' . htmlspecialchars($conteudo["cor"]) . ';">';
              echo '      <div class="card-body">';
              echo '        <i class="' . htmlspecialchars($conteudo["icone"]) . ' icon"></i>';
              echo '        <h5 class="card-title">' . htmlspecialchars($conteudo["titulo"]) . '</h5>';
              echo '        <p class="card-description">' . htmlspecialchars($conteudo["descricao"]) . '</p>';
              echo '      </div>';
              echo '    </div>';
              echo '  </a>';
              echo '</div>';
          }
        ?>
      </div>
    </main>
  </div>

</body>
</html>
