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
  <script src="js/conteudos.js"></script>
  <link rel="stylesheet" href="css/conteudos1.css">

</head>
<body>
  <div class="container">
    <div class="voltar-container mb-4">
      <a href="conteudos.php" class="custom-link mb-3">
        <i class="fa-solid fa-circle-arrow-left" style="color: #001A4E;"></i> 
        <span style="color: #001A4E;">Voltar</span>
      </a>
    </div>
    
    <main>
      <div class="header-content">
      <div class="search-container">
      <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">
          <i class="fas fa-search"></i>
        </span>
      </div>
      <input type="text" id="searchInput" class="form-control" placeholder="Pesquisar conteúdo...">
    </div>

        <span class="sort-icon" onclick="sortCards()">
          <i class="fa-solid fa-sort-alpha-down" id="sort-icon"></i>
        </span>
        </div>
          <div class="title-container">
            <h2 class="text-black">Primeiro ano</h2>
          </div>
        </div>
      <div class="row justify-content-center" id="conteudos-lista">
        <?php
          $conteudos = [
            ["titulo" => "Introdução à Física", "descricao" => "Compreenda os fundamentos e conceitos iniciais da física.", "cor" => "#001A4E", "icone" => "fas fa-book", "url" => "conteudos/if.php"],
            ["titulo" => "Grandezas e Vetores", "descricao" => "Aprenda sobre grandezas físicas e a representação vetorial.", "cor" => "#001A4E", "icone" => "fas fa-vector-square", "url" => "conteudos/gv.php"],
            ["titulo" => "Cinemática – conceitos básicos", "descricao" => "Entenda os conceitos iniciais da cinemática.", "cor" => "#001A4E", "icone" => "fas fa-arrows-alt", "url" => "conteudos/cb.php"],
            ["titulo" => "Cinemática – identificando os movimentos", "descricao" => "Classifique e analise diferentes tipos de movimentos.", "cor" => "#001A4E", "icone" => "fas fa-shoe-prints", "url" => "conteudos/cm.php"],
            ["titulo" => "Movimento retilíneo uniforme (MRU)", "descricao" => "Estude os movimentos retilíneos uniformes.", "cor" => "#001A4E", "icone" => "fas fa-ruler-horizontal", "url" => "conteudos/mruc.php"],
            ["titulo" => "Movimento retilíneo uniformemente variado (MRUV)", "descricao" => "Explore os movimentos uniformemente variados.", "cor" => "#001A4E", "icone" => "fas fa-wave-square", "url" => "conteudos/mruvc.php"],
            ["titulo" => "Movimentos sob ação da gravidade", "descricao" => "Analise os movimentos causados pela gravidade.", "cor" => "#001A4E", "icone" => "fas fa-feather-alt", "url" => "conteudos/gc.php"],
            ["titulo" => "As Leis de Newton e suas aplicações", "descricao" => "Entenda as leis fundamentais da mecânica.", "cor" => "#001A4E", "icone" => "fas fa-balance-scale", "url" => "conteudos/ln.php"],
            ["titulo" => "Movimento Circular Uniforme", "descricao" => "Estude movimentos circulares com velocidade constante.", "cor" => "#001A4E", "icone" => "fas fa-sync-alt", "url" => "conteudos/mc.php"],
            ["titulo" => "Dinâmica do movimento circular", "descricao" => "Explore as forças que agem em movimentos circulares.", "cor" => "#001A4E", "icone" => "fas fa-compact-disc", "url" => "conteudos/dc.php"],
            ["titulo" => "Trabalho energia potência", "descricao" => "Compreenda os conceitos de trabalho, energia e potência.", "cor" => "#001A4E", "icone" => "fas fa-plug", "url" => "conteudos/ep.php"],
            ["titulo" => "Impulso e Quantidade de Movimento", "descricao" => "Analise o impacto de forças e o movimento dos corpos.", "cor" => "#001A4E", "icone" => "fas fa-forward", "url" => "conteudos/im.php"],
            ["titulo" => "Gravitação Universal", "descricao" => "Estude as interações gravitacionais entre os corpos.", "cor" => "#001A4E", "icone" => "fas fa-globe", "url" => "conteudos/gravitacaoc.php"],
            ["titulo" => "Estática", "descricao" => "Entenda o equilíbrio dos corpos em repouso.", "cor" => "#001A4E", "icone" => "fas fa-anchor", "url" => "conteudos/estaticac.php"],
            ["titulo" => "Hidrostática", "descricao" => "Explore a mecânica dos fluidos em repouso.", "cor" => "#001A4E", "icone" => "fas fa-water", "url" => "conteudos/hidrostaticac.php"],
            ["titulo" => "Hidrodinâmica", "descricao" => "Estude o comportamento dos fluidos em movimento.", "cor" => "#001A4E", "icone" => "fas fa-tint", "url" => "conteudos/hidrodinamicac.php"],
        ];
        

          foreach ($conteudos as $conteudo) {
            echo '
            <div class="col-md-4 mb-3 card-item" data-title="' . $conteudo['titulo'] . '">
              <a href="' . $conteudo['url'] . '" class="card-link">
                <div class="card" style="background-color: ' . $conteudo['cor'] . ';">
                  <div class="icon-part">
                    <i class="' . $conteudo['icone'] . '" style="font-size: 2rem;"></i>
                  </div>
                  <div class="text-part">
                    <h5 class="card-title text-white">' . $conteudo['titulo'] . '</h5>
                    <p class="card-text text-white">' . $conteudo['descricao'] . '</p>
                  </div>
                </div>
              </a>
            </div>';
          }
        ?>
      </div>
    </main>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const sortIcon = document.getElementById("sort-icon");
      const cardContainer = document.getElementById("conteudos-lista");
      const searchInput = document.getElementById("searchInput");
      let ascending = true;

      // Função para filtrar os conteúdos com base na pesquisa
      searchInput.addEventListener("input", function () {
        const searchQuery = searchInput.value.toLowerCase();
        const cards = Array.from(cardContainer.getElementsByClassName("card-item"));
        
        cards.forEach(card => {
          const title = card.getAttribute("data-title").toLowerCase();
          if (title.includes(searchQuery)) {
            card.style.display = "";
          } else {
            card.style.display = "none";
          }
        });
      });

      // Função de ordenação dos conteúdos
      sortIcon.addEventListener("click", function () {
        const cards = Array.from(cardContainer.getElementsByClassName("card-item"));
        cards.sort((a, b) => {
          const titleA = a.getAttribute("data-title").toLowerCase();
          const titleB = b.getAttribute("data-title").toLowerCase();
          return ascending ? titleA.localeCompare(titleB) : titleB.localeCompare(titleA);
        });

        cards.forEach(card => cardContainer.appendChild(card));
        ascending = !ascending;

        // Alternando entre as classes do ícone
        if (ascending) {
          sortIcon.classList.add("fa-sort-alpha-down");
          sortIcon.classList.remove("fa-sort-alpha-up");
        } else {
          sortIcon.classList.add("fa-sort-alpha-up");
          sortIcon.classList.remove("fa-sort-alpha-down");
        }
      });
    });
  </script>
</body>
</html>
