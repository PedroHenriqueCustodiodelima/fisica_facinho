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
          <i class="fa-solid fa-arrow-up-a-z" id="sort-icon" style="font-size: 2rem; cursor: pointer;"></i> <!-- Ícone atualizado e maior -->
        </div>

        <div class="row justify-content-center" id="card-container">
          <?php
          $cards = [
            "Introdução à Física" => ["icon" => "fa-lightbulb", "color" => "bg-warning", "page" => "atividades/introducao_fisica.php"],
            "Grandezas e vetores" => ["icon" => "fa-ruler", "color" => "bg-info", "page" => "atividades/grandezas_vetores.php"],
            "Cinemática – conceitos básicos" => ["icon" => "fa-play", "color" => "bg-primary", "page" => "atividades/cinematica_conceitos.php"],
            "Cinemática – identificando os movimentos" => ["icon" => "fa-arrow-right", "color" => "bg-success", "page" => "atividades/cinematica_identificando.php"],
            "Movimento retilíneo uniforme (MRU)" => ["icon" => "fa-arrow-right", "color" => "bg-danger", "page" => "atividades/mru.php"],
            "Movimento retilíneo uniformemente variado (MRUV)" => ["icon" => "fa-random", "color" => "bg-secondary", "page" => "atividades/mruv.php"],
            "Movimentos sob ação da gravidade" => ["icon" => "fa-arrow-down", "color" => "bg-dark", "page" => "atividades/gravidade.php"],
            "As Leis de Newton e suas aplicações" => ["icon" => "fa-balance-scale", "color" => "bg-warning", "page" => "atividades/leis_newton.php"],
            "Movimento Circular Uniforme" => ["icon" => "fa-sync-alt", "color" => "bg-primary", "page" => "atividades/movimento_circular.php"],
            "Dinâmica do movimento circular" => ["icon" => "fa-circle", "color" => "bg-info", "page" => "atividades/dinamica_circular.php"],
            "Trabalho energia potência" => ["icon" => "fa-bolt", "color" => "bg-danger", "page" => "atividades/trabalho_energia.php"],
            "Impulso e Quantidade de Movimento" => ["icon" => "fa-tachometer-alt", "color" => "bg-success", "page" => "atividades/impulso_quantidade.php"],
            "Gravitação Universal" => ["icon" => "fa-globe", "color" => "bg-dark", "page" => "atividades/gravitação_universal.php"],
            "Estática" => ["icon" => "fa-equals", "color" => "bg-secondary", "page" => "atividades/estatica.php"],
            "Hidrostática" => ["icon" => "fa-water", "color" => "bg-info", "page" => "atividades/hidrostática.php"],
            "Hidrodinâmica" => ["icon" => "fa-tint", "color" => "bg-primary", "page" => "atividades/hidrodinamica.php"]
          ];

          foreach ($cards as $title => $cardDetails) {
            echo '
            <div class="col-md-6 mb-3 card-item" data-title="' . $title . '">
              <a href="' . $cardDetails['page'] . '" class="card-link">
                <div class="card ' . $cardDetails['color'] . '">
                  <div class="icon-part">
                    <i class="fa-solid ' . $cardDetails['icon'] . '" style="font-size: 2rem;"></i>
                  </div>
                  <div class="text-part">
                    <h5 class="card-title text-white">' . $title . '</h5>
                    <p class="card-text text-white">Atividades relacionadas a ' . $title . '.</p>
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
      let ascending = true;

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
