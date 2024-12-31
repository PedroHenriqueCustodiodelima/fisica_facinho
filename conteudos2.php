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
            <h2 class="text-black">Segundo ano</h2>
          </div>
        </div>
      <div class="row justify-content-center" id="conteudos-lista">
        <?php
          $conteudos = [
              ["titulo" => "Temperatura e escalas de medida", "descricao" => "Compreenda as escalas de temperatura e sua aplicação.", "cor" => "#001A4E", "icone" => "fas fa-thermometer-half", "url" => "conteudos/te.php"],
              ["titulo" => "Dilatação térmica", "descricao" => "Entenda como os materiais se expandem com o aumento da temperatura.", "cor" => "#001A4E", "icone" => "fas fa-expand-arrows-alt", "url" => "conteudos/dt.php"],
              ["titulo" => "Calor", "descricao" => "Explore os conceitos de calor e sua transferência.", "cor" => "#001A4E", "icone" => "fas fa-fire", "url" => "conteudos/calor.php"],
              ["titulo" => "Processos de propagação de calor", "descricao" => "Estude os métodos de propagação do calor.", "cor" => "#001A4E", "icone" => "fas fa-temperature-high", "url" => "conteudos/propagacao.php"],
              ["titulo" => "Termodinâmica e revolução industrial", "descricao" => "Entenda a relação entre termodinâmica e a revolução industrial.", "cor" => "#001A4E", "icone" => "fas fa-industry", "url" => "conteudos/termo_revolucao.php"],
              ["titulo" => "Primeira Lei da Termodinâmica", "descricao" => "Estude a conservação da energia no sistema termodinâmico.", "cor" => "#001A4E", "icone" => "fas fa-arrow-right", "url" => "conteudos/primeiralei.php"],
              ["titulo" => "Segunda Lei da Termodinâmica", "descricao" => "Compreenda a direção da transferência de calor nos sistemas.", "cor" => "#001A4E", "icone" => "fas fa-random", "url" => "conteudos/segundaLei.php"],
              ["titulo" => "Entropia", "descricao" => "Explore o conceito de entropia e a irreversibilidade dos processos.", "cor" => "#001A4E", "icone" => "fas fa-random", "url" => "conteudos/entropia.php"],
              ["titulo" => "Ondas mecânicas", "descricao" => "Estude as propriedades das ondas mecânicas.", "cor" => "#001A4E", "icone" => "fas fa-wave-square", "url" => "conteudos/ondas.php"],
              ["titulo" => "Interferência e difração de ondas mecânicas", "descricao" => "Entenda os fenômenos de interferência e difração das ondas.", "cor" => "#001A4E", "icone" => "fas fa-project-diagram", "url" => "conteudos/interferencia.php"],
              ["titulo" => "Acústica", "descricao" => "Estude a propagação do som e suas propriedades.", "cor" => "#001A4E", "icone" => "fas fa-volume-up", "url" => "conteudos/acustica.php"],
              ["titulo" => "Reflexão da luz", "descricao" => "Explore os fenômenos de reflexão da luz.", "cor" => "#001A4E", "icone" => "fas fa-mirror", "url" => "conteudos/reflexao.php"],
              ["titulo" => "Refração da luz", "descricao" => "Entenda como a luz se refrata ao passar por diferentes meios.", "cor" => "#001A4E", "icone" => "fas fa-lightbulb", "url" => "conteudos/reflexao.php"]
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
