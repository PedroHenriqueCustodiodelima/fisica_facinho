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
            <h2 class="text-black">Terceiro ano</h2>
          </div>
        </div>

      <div class="row justify-content-center" id="conteudos-lista">
        <?php
          $conteudos = [
            ["titulo" => "Ondulatória – Conceitos e definições", "descricao" => "Entenda os conceitos e definições das ondas.", "cor" => "#001A4E", "icone" => "fas fa-wave-square", "url" => "conteudos/ondulatoria_conceitos.php"],
            ["titulo" => "Ondulatória – Equação de Onda", "descricao" => "Estude a equação que descreve o comportamento das ondas.", "cor" => "#001A4E", "icone" => "fas fa-wave-square", "url" => "conteudos/ondulatoria_equacao.php"],
            ["titulo" => "Ondulatória – Reflexão e refração de ondas", "descricao" => "Explore os fenômenos de reflexão e refração das ondas.", "cor" => "#001A4E", "icone" => "fas fa-mirror", "url" => "conteudos/reflexao_reflexao.php"],
            ["titulo" => "Ondulatória – Interferência de Ondas", "descricao" => "Compreenda como as ondas podem interferir umas com as outras.", "cor" => "#001A4E", "icone" => "fas fa-random", "url" => "conteudos/ondulatoria_interferencia.php"],
            ["titulo" => "Ondulatória – Interferência luminosa – experimento de Young", "descricao" => "Estude a interferência de luz no experimento de Young.", "cor" => "#001A4E", "icone" => "fas fa-lightbulb", "url" => "conteudos/interferencia_young.php"],
            ["titulo" => "Ondulatória – Difração e dispersão", "descricao" => "Compreenda os fenômenos de difração e dispersão das ondas.", "cor" => "#001A4E", "icone" => "fas fa-project-diagram", "url" => "conteudos/difracao_dispersao.php"],
            ["titulo" => "Ondulatória – Polarização e ressonância", "descricao" => "Estude os fenômenos de polarização e ressonância das ondas.", "cor" => "#001A4E", "icone" => "fas fa-random", "url" => "conteudos/polarizacao_resonancia.php"],
            ["titulo" => "Ondulatória – Ondas sonoras", "descricao" => "Explore o comportamento das ondas sonoras.", "cor" => "#001A4E", "icone" => "fas fa-volume-up", "url" => "conteudos/ondas_sonoras.php"],
            ["titulo" => "Ondulatória – Ondas estacionárias", "descricao" => "Estude as ondas estacionárias e suas propriedades.", "cor" => "#001A4E", "icone" => "fas fa-wave-square", "url" => "conteudos/ondas_estacionarias.php"],
            ["titulo" => "Ondulatória – Cordas vibrantes", "descricao" => "Compreenda o comportamento das ondas em cordas vibrantes.", "cor" => "#001A4E", "icone" => "fas fa-guitar", "url" => "conteudos/cordas_vibrantes.php"],
            ["titulo" => "Ondulatória – Qualidades fisiológicas do som", "descricao" => "Estude como o som afeta a percepção humana.", "cor" => "#001A4E", "icone" => "fas fa-headphones", "url" => "conteudos/qualidades_fisiologicas.php"],
            ["titulo" => "Ondulatória – Efeito Doppler", "descricao" => "Entenda o efeito Doppler e suas implicações nas ondas.", "cor" => "#001A4E", "icone" => "fas fa-random", "url" => "conteudos/efeito_doppler.php"],
            ["titulo" => "Ondulatória – Tubos sonoros", "descricao" => "Estude o comportamento do som em tubos sonoros.", "cor" => "#001A4E", "icone" => "fas fa-microphone", "url" => "conteudos/tubos_sonoros.php"],
            ["titulo" => "Eletricidade – Eletrostática – Carga elétrica e processos de eletrização", "descricao" => "Estude a carga elétrica e os processos de eletrização.", "cor" => "#001A4E", "icone" => "fas fa-bolt", "url" => "conteudos/carga_eletrica.php"],
            ["titulo" => "Eletricidade – Eletrostática – Força elétrica", "descricao" => "Compreenda a força elétrica e sua aplicação.", "cor" => "#001A4E", "icone" => "fas fa-bolt", "url" => "conteudos/forca_eletrica.php"],
            ["titulo" => "Eletricidade – Eletrostática – Campo elétrico", "descricao" => "Estude o conceito de campo elétrico.", "cor" => "#001A4E", "icone" => "fas fa-bolt", "url" => "conteudos/campo_eletrico.php"],
            ["titulo" => "Eletricidade – Eletrostática – Potencial eletrostático", "descricao" => "Explore o conceito de potencial eletrostático.", "cor" => "#001A4E", "icone" => "fas fa-bolt", "url" => "conteudos/potencial_eletrico.php"],
            ["titulo" => "Eletricidade – Eletrostática – Superfícies eletrostáticas", "descricao" => "Estude as superfícies eletrostáticas e suas características.", "cor" => "#001A4E", "icone" => "fas fa-bolt", "url" => "conteudos/superficies_eletrostaticas.php"],
            ["titulo" => "Eletricidade – Eletrostática – Condutor em equilíbrio eletrostático", "descricao" => "Compreenda o equilíbrio eletrostático em condutores.", "cor" => "#001A4E", "icone" => "fas fa-bolt", "url" => "conteudos/condutor_equilibrio.php"],
            ["titulo" => "Eletricidade – Eletrodinâmica – Corrente elétrica", "descricao" => "Estude o conceito de corrente elétrica.", "cor" => "#001A4E", "icone" => "fas fa-bolt", "url" => "conteudos/corrente_eletrica.php"],
            ["titulo" => "Eletricidade – Eletrodinâmica – Potência elétrica", "descricao" => "Entenda o conceito de potência elétrica.", "cor" => "#001A4E", "icone" => "fas fa-bolt", "url" => "conteudos/potencia_eletrica.php"],
            ["titulo" => "Eletricidade – Eletrodinâmica – Primeira Lei de Ohm", "descricao" => "Compreenda a primeira Lei de Ohm.", "cor" => "#001A4E", "icone" => "fas fa-bolt", "url" => "conteudos/ohm_primeira_lei.php"],
            ["titulo" => "Eletricidade – Eletrodinâmica – Segunda Lei de Ohm", "descricao" => "Estude a segunda Lei de Ohm.", "cor" => "#001A4E", "icone" => "fas fa-bolt", "url" => "conteudos/ohm_segunda_lei.php"],
            ["titulo" => "Eletricidade – Eletrodinâmica – Resistor equivalente", "descricao" => "Estude o conceito de resistor equivalente.", "cor" => "#001A4E", "icone" => "fas fa-plug", "url" => "conteudos/resistor_equivalente.php"],
            ["titulo" => "Eletricidade – Eletrodinâmica – Geradores", "descricao" => "Entenda os geradores de corrente elétrica.", "cor" => "#001A4E", "icone" => "fas fa-plug", "url" => "conteudos/geradores.php"],
            ["titulo" => "Eletricidade – Eletrodinâmica – Receptores", "descricao" => "Compreenda o funcionamento dos receptores de corrente elétrica.", "cor" => "#001A4E", "icone" => "fas fa-plug", "url" => "conteudos/receptores.php"],
            ["titulo" => "Eletricidade – Eletrodinâmica – Galvanômetros", "descricao" => "Estude o funcionamento dos galvanômetros.", "cor" => "#001A4E", "icone" => "fas fa-plug", "url" => "conteudos/galvanometros.php"],
            ["titulo" => "Eletricidade – Eletrodinâmica – Circuitos compostos", "descricao" => "Entenda os circuitos compostos.", "cor" => "#001A4E", "icone" => "fas fa-plug", "url" => "conteudos/circuitos_compostos.php"],
            ["titulo" => "Eletricidade – Eletrodinâmica – Capacitores", "descricao" => "Estude o conceito de capacitores.", "cor" => "#001A4E", "icone" => "fas fa-plug", "url" => "conteudos/capacitores.php"],
            ["titulo" => "Eletricidade – Eletromagnetismo – Campo magnético", "descricao" => "Estude o campo magnético.", "cor" => "#001A4E", "icone" => "fas fa-magnet", "url" => "conteudos/campo_magnetico.php"]
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
