<?php
include("funcoes_php/funcoes_inicio.php");
include "header.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Configurações</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="css/assunto.css">
</head>
<body>
<div class="page-container">
    <main class="container">
      <div class="container mt-5">
        <div class="voltar-container mb-4">
          <a href="tarefas.php" class="custom-link" style="color: #001A4E;">
              <i class="fa-solid fa-circle-arrow-left" style="color: #001A4E;"></i> 
              <span style="color: #001A4E;">Voltar</span>
          </a>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Atividades</h2>
            <div class="d-flex align-items-center">
                <div class="input-group mr-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1" style="background-color: #FFC100;">
                            <i class="fa fa-search" style="color: #001A4E;"></i>
                        </span>
                    </div>
                    <input type="text" id="search-bar" class="form-control" placeholder="Pesquisar atividades..." style="width: 200px; ">
                </div>


                <!-- Ícone de ordenação -->
                <i class="fa-solid fa-arrow-up-a-z" id="sort-icon" style="font-size: 2rem; cursor: pointer;"></i>
            </div>
        </div>
    </div>
        <div class="row justify-content-center" id="card-container">
          <?php
          $cards = [
            "Temperatura e escalas de medida" => ["icon" => "fa-thermometer-half", "color" => "#001A4E", "page" => "atividades/temperatura_escalas.php"],
            "Dilatação térmica" => ["icon" => "fa-expand", "color" => "#001A4E", "page" => "atividades/dilatacao_termica.php"],
            "Calor" => ["icon" => "fa-fire", "color" => "#001A4E", "page" => "atividades/calor.php"],
            "Processos de propagação de calor" => ["icon" => "fa-arrow-right", "color" => "#001A4E", "page" => "atividades/propagacao_calor.php"],
            "Termodinâmica e revolução industrial" => ["icon" => "fa-cogs", "color" => "#001A4E", "page" => "atividades/termodinamica_revolucao.php"],
            "Primeira Lei da Termodinâmica" => ["icon" => "fa-arrow-right", "color" => "#001A4E", "page" => "atividades/primeira_lei.php"],
            "Segunda Lei da Termodinâmica" => ["icon" => "fa-random", "color" => "#001A4E", "page" => "atividades/segunda_lei.php"],
            "Entropia" => ["icon" => "fa-arrow-down", "color" => "#001A4E", "page" => "atividades/entropia.php"],
            "Ondas mecânicas" => ["icon" => "fa-wave-square", "color" => "#001A4E", "page" => "atividades/ondas_mecanicas.php"],
            "Interferência e difração de ondas mecânicas" => ["icon" => "fa-broadcast-tower", "color" => "#001A4E", "page" => "atividades/interferencia_difracao.php"],
            "Acústica" => ["icon" => "fa-volume-up", "color" => "#001A4E", "page" => "atividades/acustica.php"],
            "Reflexão da luz" => ["icon" => "fa-lightbulb", "color" => "#001A4E", "page" => "atividades/reflexao_luz.php"],
            "Refração da luz" => ["icon" => "fa-prism", "color" => "#001A4E", "page" => "atividades/reflexao_luz.php"]
          ];

          foreach ($cards as $title => $cardDetails) {
            echo '
            <div class="col-md-4 mb-3 card-item" data-title="' . $title . '">
              <a href="' . $cardDetails['page'] . '" class="card-link">
                <div class="card" style="background-color: ' . $cardDetails['color'] . ';">
                  <div class="icon-part">
                    <i class="fa-solid ' . $cardDetails['icon'] . '" style="font-size: 2rem;"></i>
                  </div>
                  <div class="text-part">
                    <h5 class="card-title text-white">' . $title . '</h5>
                  </div>
                </div>
              </a>
            </div>';
          }
          ?>
        </div>
      </div>
    </main>

    <footer>
      <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
    </footer>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const sortIcon = document.getElementById("sort-icon");
      const cardContainer = document.getElementById("card-container");
      const searchBar = document.getElementById("search-bar");
      let ascending = true;

      // Função para filtrar as atividades com base na pesquisa
      searchBar.addEventListener("input", function () {
        const searchQuery = searchBar.value.toLowerCase();
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

      // Função de ordenação das atividades
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
          sortIcon.classList.add("fa-arrow-up-a-z");
          sortIcon.classList.remove("fa-arrow-down-a-z");
        } else {
          sortIcon.classList.add("fa-arrow-down-a-z");
          sortIcon.classList.remove("fa-arrow-up-a-z");
        }
      });
    });
  </script>
</body>
</html>
