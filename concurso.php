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
    /* Estilo dos cards */
    .card {
      height: 100%;
      text-align: center;
      padding: 20px;
      color: #fff;
      border: none;
      border-radius: 8px;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .card:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }
    /* Cores específicas */
    .enem-card { background-color: #3498db; } /* Azul */
    .ita-card { background-color: #e74c3c; } /* Vermelho */
    .ime-card { background-color: #9b59b6; } /* Roxo */
    .eear-card { background-color: #2ecc71; } /* Verde */
    .fuvest-card { background-color: #f1c40f; } /* Amarelo */
    /* Estilo dos ícones */
    .icon-part {
      margin-bottom: 15px;
    }
    .icon-part i {
      font-size: 2.5rem;
    }
    /* Estilo do ícone de ordenação */
    #sort-icon {
      float: right;
      cursor: pointer;
      font-size: 2rem;
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
            <i class="fa-solid fa-arrow-up-a-z" id="sort-icon"></i>
          </div>
        </div>
        <div class="row justify-content-center">
          <!-- Linha 1: ENEM, ITA e IME -->
          <div class="col-md-4 mb-3">
            <a href="enem.php" class="card-link">
              <div class="card enem-card">
                <div class="icon-part">
                  <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <div class="text-part">
                  <h5 class="card-title">ENEM</h5>
                  <p class="card-text">Acompanhe informações sobre o ENEM.</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-4 mb-3">
            <a href="ita.php" class="card-link">
              <div class="card ita-card">
                <div class="icon-part">
                  <i class="fa-solid fa-rocket"></i>
                </div>
                <div class="text-part">
                  <h5 class="card-title">ITA</h5>
                  <p class="card-text">Detalhes e estudos para o ITA.</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-4 mb-3">
            <a href="ime.php" class="card-link">
              <div class="card ime-card">
                <div class="icon-part">
                  <i class="fa-solid fa-landmark"></i>
                </div>
                <div class="text-part">
                  <h5 class="card-title">IME</h5>
                  <p class="card-text">Recursos para o Instituto Militar de Engenharia.</p>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="row justify-content-center">
          <!-- Linha 2: EEAR e FUVEST -->
          <div class="col-md-4 mb-3">
            <a href="eear.php" class="card-link">
              <div class="card eear-card">
                <div class="icon-part">
                  <i class="fa-solid fa-plane"></i>
                </div>
                <div class="text-part">
                  <h5 class="card-title">EEAR</h5>
                  <p class="card-text">Prepare-se para a EEAR.</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-4 mb-3">
            <a href="fuvest.php" class="card-link">
              <div class="card fuvest-card">
                <div class="icon-part">
                  <i class="fa-solid fa-university"></i>
                </div>
                <div class="text-part">
                  <h5 class="card-title">FUVEST</h5>
                  <p class="card-text">Recursos e dicas para a FUVEST.</p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </main>
    <script>
      document.getElementById('sort-icon').addEventListener('click', function() {
        const cards = Array.from(document.querySelectorAll('.card'));
        cards.sort((a, b) => {
          const titleA = a.querySelector('.card-title').textContent.toLowerCase();
          const titleB = b.querySelector('.card-title').textContent.toLowerCase();
          return titleA.localeCompare(titleB);
        });

        const container = document.querySelector('.container.mt-5 .row.justify-content-center');
        container.innerHTML = ''; 
        cards.forEach(card => {
          container.appendChild(card);
        });
      });
    </script>
  </div>
</body>
</html>
