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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="css/inicio.css">
  <link rel="icon" type="img/png" href="img/cara.png">
  <script src="js/inicio.js"></script>
</head>
<body>
  <div class="page-container">
    <main class="container">
      <div class="container mt-5">
      <div class="row justify-content-between align-items-center mb-4">
        <div class="col-md-10">
          <i class="fa-solid fa-arrow-up-a-z" id="sort-icon"></i>
        </div>
      </div>

        <div class="row justify-content-center">
          <div class="col-md-4 mb-3">
            <a href="conteudos.php" class="card-link">
              <div class="card conteudos-card">
                <div class="icon-part">
                  <i class="fa-solid fa-book" style="font-size: 2rem;"></i>
                </div>
                <div class="text-part">
                  <h5 class="card-title">Conteúdos</h5>
                  <p class="card-text">Veja seus conteúdos.</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-4 mb-3">
            <a href="tarefas.php" class="card-link">
              <div class="card tarefas-card">
                <div class="icon-part">
                  <i class="fa-solid fa-list-check" style="font-size: 2rem;"></i>
                </div>
                <div class="text-part">
                  <h5 class="card-title">Tarefas</h5>
                  <p class="card-text">Gerencie suas tarefas.</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-4 mb-3">
            <a href="concurso.php" class="card-link">
              <div class="card videos-card">
                <div class="icon-part">
                  <i class="fa-solid fa-video" style="font-size: 2rem;"></i>
                </div>
                <div class="text-part">
                  <h5 class="card-title">Concursos</h5>
                  <p class="card-text">Veja questões de concursos</p>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="row justify-content-center">
          <!-- Linha 2: Cards de Desempenho, Ranking e Relatório -->
          <div class="col-md-4 mb-3">
            <a href="desempenho.php" class="card-link">
              <div class="card desempenho-card">
                <div class="icon-part">
                  <i class="fa-solid fa-chart-simple" style="font-size: 2rem;"></i>
                </div>
                <div class="text-part">
                  <h5 class="card-title">Desempenho</h5>
                  <p class="card-text">Acompanhe seu desempenho.</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-4 mb-3">
            <a href="rank.php" class="card-link">
              <div class="card rank-card">
                <div class="icon-part">
                  <i class="fa-solid fa-trophy" style="font-size: 2rem;"></i>
                </div>
                <div class="text-part">
                  <h5 class="card-title">Ranking</h5>
                  <p class="card-text">Veja sua posição no ranking.</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-4 mb-3">
            <a href="missoes.php" class="card-link">
              <div class="card missoes-card">
                <div class="icon-part">
                  <i class="fa-solid fa-flag-checkered" style="font-size: 2rem;"></i>
                </div>
                <div class="text-part">
                  <h5 class="card-title">Missões</h5>
                  <p class="card-text">Complete suas missões.</p>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="row justify-content-center">
          <!-- Linha 3: Cards de Ajuda, Configurações e Sair -->
          <div class="col-md-4 mb-3">
            <a href="suporte.php" class="card-link">
              <div class="card suporte-card">
                <div class="icon-part">
                  <i class="fa-solid fa-headset" style="font-size: 2rem;"></i>
                </div>
                <div class="text-part">
                  <h5 class="card-title">Ajuda</h5>
                  <p class="card-text">Obtenha ajuda e suporte.</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-4 mb-3">
              <a href="configuracoes.php" class="card-link">
                <div class="card configuracoes-card">
                  <div class="icon-part">
                    <i class="fa-solid fa-user" style="font-size: 2rem;"></i>
                  </div>
                  <div class="text-part">
                    <h5 class="card-title">Perfil</h5> 
                    <p class="card-text">Ajuste seu perfil.</p> 
                  </div>
                </div>
              </a>
          </div>
          <div class="col-md-4 mb-3">
            <a href="desafios.php" class="card-link">
              <div class="card sair-card">
                <div class="icon-part">
                  <i class="fa-solid fa-gamepad" style="font-size: 2rem;" title="Desafios"></i>
                </div>
                <div class="text-part">
                  <h5 class="card-title">Desafios</h5>
                  <p class="card-text">desafios diários.</p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </main>
    <footer>
      <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
    </footer>
  </div>
</body>
</html>
