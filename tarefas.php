
<?php
include("funcoes_php/funcoes_tarefas.php");
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
  <link rel="stylesheet" href="css/tarefas.css">
</head>
<body>

<header class="d-flex justify-content-between align-items-center">
    <a href="inicio.php">
        <img src="img/logo.png" width="200px" alt="Logo">
    </a>
<div class="perfil-header d-flex align-items-center">
  <img id="avatar-imagem" src="<?php echo htmlspecialchars($imagemPerfil); ?>" alt="Avatar" width="50px" height="50px" class="ml-3">
  <p class="m-0 ml-2">Olá, <span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span>!</p>
</div>

  </header>

  <div class="container">
    <aside>
      <div class="perfil_aside">
          <img id="avatar-imagem" src="<?php echo htmlspecialchars($imagemPerfil); ?>" alt="Avatar" width="200px" height="200px">
          <p>Olá, <span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span>!</p>
      </div>


      <nav>
        <ul>
          <li><i class="fa-solid fa-chart-simple" style="color: white; width: 30px; height: 30px;"></i><a href="desempenho.php">Desempenho</a></li>
          <li><i class="fa-solid fa-book" style="color: white; width: 30px; height: 30px;"></i><a href="conteudos.php">Conteúdos</a></li>
          <li><i class="fa-solid fa-list-check" style="color: white; width: 30px; height: 30px;"></i><a href="tarefas.php">Tarefas</a></li>
          <li><i class="fa-solid fa-clipboard" style="color: white; width: 30px; height: 30px;"></i><a href="missoes.php">Missões</a></li>
          <li><i class="fa-solid fa-gear" style="color: white; width: 30px; height: 30px;"></i><a href="configuracoes.php">Configurações</a></li>
          <li><i class="fa-solid fa-arrow-right-from-bracket" style="color: white; width: 30px; height: 30px;"></i><a href="logout.php">Sair</a></li>
        </ul>
      </nav>
    </aside>

    <main>

        <?php if (!empty($questoes_data)): ?>
            <?php $index = 1; ?>
            <?php foreach ($questoes_data as $questao_data): ?>
                <form action="tarefas.php?pagina=<?php echo $pagina_atual; ?>" method="post" class="question-form">
                    <div class="question-container">
                        <h3>Questão <?php echo $index; ?>: <?php echo $questao_data['enunciado']; ?></h3>
                        <ul>
                            <?php foreach ($questao_data['alternativas'] as $alternativa): ?>
                                <li>
                                    <input type="radio" name="alternativa" value="<?php echo $alternativa['id']; ?>" id="q1<?php echo $alternativa['id']; ?>">
                                    <label for="q1<?php echo $alternativa['id']; ?>"><?php echo $alternativa['texto']; ?></label>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <input type="hidden" name="questao_id" value="<?php echo $questao_data['id']; ?>">
                        <input type="hidden" name="nivel" value="<?php echo $nivel; ?>">
                        <button type="submit" class="btn-responder">Responder</button>
                    </div>
                </form>
                <?php $index++; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="question-container">Nenhuma questão encontrada.</div>
        <?php endif; ?>

        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item <?php if ($pagina_atual <= 1) echo 'disabled'; ?>">
                    <a class="page-link" href="?nivel=<?php echo $nivel; ?>&pagina=<?php echo $pagina_atual - 1; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                    <li class="page-item <?php if ($i == $pagina_atual) echo 'active'; ?>">
                        <a class="page-link" href="?nivel=<?php echo $nivel; ?>&pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?php if ($pagina_atual >= $total_paginas) echo 'disabled'; ?>">
                    <a class="page-link" href="?nivel=<?php echo $nivel; ?>&pagina=<?php echo $pagina_atual + 1; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </main>


  </div>
  
  <footer>
    <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-3d"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="js/tarefas.js"></script>
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>



</body>
</html>
