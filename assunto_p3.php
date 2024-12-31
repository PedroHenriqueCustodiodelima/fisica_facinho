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
          <a href="tarefas.php" class="custom-link">
              <i class="fa-solid fa-circle-arrow-left"></i> <span>Voltar</span>
          </a>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2>Atividades</h2>
          <div class="d-flex align-items-center">
            <!-- Barra de pesquisa -->
            <input type="text" id="search-bar" class="form-control mr-2" placeholder="Pesquisar atividades..." style="width: 200px;">
            <!-- Ícone de ordenação -->
            <i class="fa-solid fa-arrow-up-a-z" id="sort-icon" style="font-size: 2rem; cursor: pointer;"></i>
          </div>
        </div>

        <div class="row justify-content-center" id="card-container">
          <?php
          $cards = [
            "Ondulatória – Conceitos e definições" => ["icon" => "fa-wave-square", "color" => "bg-warning", "page" => "atividades/ondulatoria_conceitos.php"],
            "Ondulatória – Equação de Onda" => ["icon" => "fa-equals", "color" => "bg-info", "page" => "atividades/ondulatoria_equacao.php"],
            "Ondulatória – Reflexão e refração de ondas" => ["icon" => "fa-arrow-right", "color" => "bg-primary", "page" => "atividades/reflexao_reflexao.php"],
            "Ondulatória – Interferência de Ondas" => ["icon" => "fa-random", "color" => "bg-success", "page" => "atividades/interferencia_ondas.php"],
            "Ondulatória – Interferência luminosa – experimento de Young" => ["icon" => "fa-lightbulb", "color" => "bg-danger", "page" => "atividades/interferencia_luminosa.php"],
            "Ondulatória – Difração e dispersão" => ["icon" => "fa-expand-arrows-alt", "color" => "bg-secondary", "page" => "atividades/difracao_dispersao.php"],
            "Ondulatória – Polarização e ressonância" => ["icon" => "fa-arrow-right", "color" => "bg-dark", "page" => "atividades/polarizacao_ressonancia.php"],
            "Ondulatória – Ondas sonoras" => ["icon" => "fa-volume-up", "color" => "bg-warning", "page" => "atividades/ondas_sonoras.php"],
            "Ondulatória – Ondas estacionárias" => ["icon" => "fa-circle-notch", "color" => "bg-primary", "page" => "atividades/ondas_estacionarias.php"],
            "Ondulatória – Cordas vibrantes" => ["icon" => "fa-guitar", "color" => "bg-info", "page" => "atividades/corda_vibrante.php"],
            "Ondulatória – Qualidades fisiológicas do som" => ["icon" => "fa-headphones", "color" => "bg-danger", "page" => "atividades/qualidades_som.php"],
            "Ondulatória – Efeito Doppler" => ["icon" => "fa-random", "color" => "bg-success", "page" => "atividades/efeito_doppler.php"],
            "Ondulatória – Tubos sonoros" => ["icon" => "fa-bell", "color" => "bg-secondary", "page" => "atividades/tubos_sonoros.php"],
            "Eletricidade – Eletrostática – Carga elétrica e processos de eletrização" => ["icon" => "fa-bolt", "color" => "bg-warning", "page" => "atividades/carga_eletrica.php"],
            "Eletricidade – Eletrostática – Força elétrica" => ["icon" => "fa-charging-station", "color" => "bg-info", "page" => "atividades/forca_eletrica.php"],
            "Eletricidade – Eletrostática – Campo elétrico" => ["icon" => "fa-plug", "color" => "bg-primary", "page" => "atividades/campo_eletrico.php"],
            "Eletricidade – Eletrostática – Potencial eletrostático" => ["icon" => "fa-bolt", "color" => "bg-success", "page" => "atividades/potencial_eletrico.php"],
            "Eletricidade – Eletrostática – Superfícies eletrostáticas" => ["icon" => "fa-snowflake", "color" => "bg-danger", "page" => "atividades/superficies_eletricas.php"],
            "Eletricidade – Eletrostática – Condutor em equilíbrio eletrostático" => ["icon" => "fa-bolt", "color" => "bg-dark", "page" => "atividades/condutor_equilibrio.php"],
            "Eletricidade – Eletrodinâmica – Corrente elétrica" => ["icon" => "fa-plug", "color" => "bg-warning", "page" => "atividades/corrente_eletrica.php"],
            "Eletricidade – Eletrodinâmica – Potência elétrica" => ["icon" => "fa-lightning-bolt", "color" => "bg-info", "page" => "atividades/potencia_eletrica.php"],
            "Eletricidade – Eletrodinâmica – Primeira Lei de Ohm" => ["icon" => "fa-bolt", "color" => "bg-primary", "page" => "atividades/lei_ohm.php"],
            "Eletricidade – Eletrodinâmica – Segunda Lei de Ohm" => ["icon" => "fa-lightbulb", "color" => "bg-success", "page" => "atividades/segunda_lei_ohm.php"],
            "Eletricidade – Eletrodinâmica – Resistor equivalente" => ["icon" => "fa-plug", "color" => "bg-danger", "page" => "atividades/resistor_equivalente.php"],
            "Eletricidade – Eletrodinâmica – Geradores" => ["icon" => "fa-dynamo", "color" => "bg-secondary", "page" => "atividades/geradores.php"],
            "Eletricidade – Eletrodinâmica – Receptores" => ["icon" => "fa-plug", "color" => "bg-dark", "page" => "atividades/receptores.php"],
            "Eletricidade – Eletrodinâmica – Galvanômetros" => ["icon" => "fa-tachometer-alt", "color" => "bg-warning", "page" => "atividades/galvanometros.php"],
            "Eletricidade – Eletrodinâmica – Circuitos compostos" => ["icon" => "fa-cogs", "color" => "bg-info", "page" => "atividades/circuitos_compostos.php"],
            "Eletricidade – Eletrodinâmica – Capacitores" => ["icon" => "fa-bolt", "color" => "bg-success", "page" => "atividades/capacitores.php"],
            "Eletricidade – Eletromagnetismo – Campo magnético" => ["icon" => "fa-magnet", "color" => "bg-primary", "page" => "atividades/campo_magnetico.php"]
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
