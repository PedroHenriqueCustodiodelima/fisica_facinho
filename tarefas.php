
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

  <header>
    <div class="conteudo-cabecalho d-flex justify-content-between align-items-center">
    <h1>
    <a href="inicio.php">
        <img src="img/logo.png" width="200px" alt="Logo">
    </a>
</h1>
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
          <li><i class="fa-solid fa-chart-simple" style="color: white; width: 30px; height: 30px;"></i><a href="#">Desempenho</a></li>
          <li><i class="fa-solid fa-book" style="color: white; width: 30px; height: 30px;"></i><a href="#">Conteúdos</a></li>
          <li><i class="fa-solid fa-list-check" style="color: white; width: 30px; height: 30px;"></i><a href="tarefas.php">Tarefas</a></li>
          <li><i class="fa-solid fa-clipboard" style="color: white; width: 30px; height: 30px;"></i><a href="#">Missões</a></li>
          <li><i class="fa-solid fa-gear" style="color: white; width: 30px; height: 30px;"></i><a href="configuracoes.php">Configurações</a></li>
          <li><i class="fa-solid fa-arrow-right-from-bracket" style="color: white; width: 30px; height: 30px;"></i><a href="logout.php">Sair</a></li>
        </ul>
      </nav>
    </aside>

    <main>
      <form action="tarefas.php" method="get" class="form-inline mb-4">
        <label for="nivel" class="mr-2">Filtrar por nível:</label>
        <select name="nivel" id="nivel" class="form-control mr-2">
          <option value="1" <?php if ($nivel == 1) echo 'selected'; ?>>Nível 1</option>
          <option value="2" <?php if ($nivel == 2) echo 'selected'; ?>>Nível 2</option>
          <option value="3" <?php if ($nivel == 3) echo 'selected'; ?>>Nível 3</option>
        </select>
        <button type="submit" class="btn btn-primary">Filtrar</button>
      </form>

      <?php
          if (!empty($questoes_data)) {
              foreach ($questoes_data as $index => $questao_data) {
                  $enunciado = $questao_data['enunciado'];
                  $explicacao = $questao_data['explicacao'];
                  $alternativas = $questao_data['alternativas'];

                  echo "<form action='responder_questao.php' method='post' class='question-form'>";
                  echo "<div class='question-container'>";
                  echo "<h3>Questão $index: $enunciado</h3>";
                  echo "<ul>";

                  foreach ($alternativas as $alternativa) {
                      $alt_id = $alternativa['id'];
                      $alt_texto = $alternativa['texto'];
                      echo "<li><input type='radio' name='alternativa' value='$alt_id' id='q1$alt_id'><label for='q1$alt_id'>$alt_texto</label></li>";
                  }

                  echo "</ul>";
                  echo "<button type='submit' class='btn-responder'>Responder</button>";
                  echo "<button type='button' id='btn-resolucao-$index' class='btn-resolucao'>Ver Resolução</button>";
                  echo "<div id='resolucao-$index' class='resolucao' style='display: none;'><p><strong>Resolução:</strong> $explicacao</p></div>";
                  echo "</div>";
                  echo "</form>";
              }
          } else {
              echo "<div class='question-container'>Nenhuma questão encontrada.</div>";
          }
      ?>

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
