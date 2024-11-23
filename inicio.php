<?php
include("funcoes_php/funcoes_inicio.php");
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
  <style>
    /* Estilo adicional para posicionar o ícone */
    #sort-icon {
      float: right; /* Posiciona o ícone à direita */
      cursor: pointer;
      font-size: 2rem;
    }
    .card {
      /* Garante que os cards tenham a mesma altura */
      height: 100%;
    }
  </style>
</head>
<body>
  <div class="page-container">
    <header class="d-flex justify-content-between align-items-center">
      <a href="inicio.php">
        <img src="img/logo.png" width="200px" alt="Logo">
      </a>
      <div class="perfil-header d-flex align-items-center">
        <img id="avatar-imagem" src="<?php echo htmlspecialchars($imagemPerfil); ?>" alt="Avatar" width="50px" height="50px" class="ml-3">
        <p class="m-0 ml-2"><span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span></p>
      </div>
    </header>

    <main class="container">
      <div class="container mt-5">
        <div class="row justify-content-between align-items-center mb-4">
          <div class="col-md-10">
            <!-- O ícone de ordenação agora está flutuando à direita -->
            <i class="fa-solid fa-arrow-up-a-z" id="sort-icon"></i>
          </div>
        </div>
        <div class="row justify-content-center">
          <!-- Linha 1: Cards de Conteúdo, Tarefas e Vídeos -->
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
                  <i class="fa-solid fa-gear" style="font-size: 2rem;"></i>
                </div>
                <div class="text-part">
                  <h5 class="card-title">Configurações</h5>
                  <p class="card-text">Ajuste suas configurações.</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-4 mb-3">
            <a href="logout.php" class="card-link">
              <div class="card sair-card">
                <div class="icon-part">
                  <i class="fa-solid fa-arrow-right-from-bracket" style="font-size: 2rem;"></i>
                </div>
                <div class="text-part">
                  <h5 class="card-title">Sair</h5>
                  <p class="card-text">Encerrar sessão.</p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </main>
    <script>
      document.getElementById('sort-icon').addEventListener('click', function() {
        // Obtém todos os cards
        const cards = Array.from(document.querySelectorAll('.card'));
        
        // Ordena os cards pelo título
        cards.sort((a, b) => {
            const titleA = a.querySelector('.card-title').textContent.toLowerCase();
            const titleB = b.querySelector('.card-title').textContent.toLowerCase();
            return titleA.localeCompare(titleB);
        });

        // Remove os cards do DOM e armazena na variável
        const container = document.querySelector('.container.mt-5 .row.justify-content-center');
        
        // Limpa o conteúdo atual
        container.innerHTML = ''; 

        // Reanexa os cards ordenados usando insertBefore
        cards.forEach(card => {
            container.appendChild(card); // Isso preserva a formatação original
        });
      });
    </script>
  </div>
</body>
</html>
