<!-- incluindo todas as funções da pagina de funções -->
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

  <!-- cabeçalho do nosso site -->
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
    <!-- menu lateral padrão -->
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

    <!-- parte do gráfico e das caixas de erros e acertos nas configurações -->
    <main>
    <?php
    // Gera o HTML para a questão e alternativas
    if (!empty($questao_data)) {
        $enunciado = $questao_data['enunciado'];
        $explicacao = $questao_data['explicacao'];
        $alternativas = $questao_data['alternativas'];

        echo "<form action='responder_questao.php' method='post' class='question-form'>";
        echo "<div class='question-container'>";
        echo "<h3>Questão: $enunciado</h3>";
        echo "<ul>";

        foreach ($alternativas as $alternativa) {
            $alt_id = $alternativa['id'];
            $alt_texto = $alternativa['texto'];
            echo "<li><input type='radio' name='alternativa' value='$alt_id' id='q1$alt_id'><label for='q1$alt_id'>$alt_texto</label></li>";
        }

        echo "</ul>";
        echo "<button type='submit' class='btn-responder'>Responder</button>";
        echo "<button type='button' id='btn-resolucao' class='btn-resolucao'>Ver Resolução</button>";
        echo "<div id='resolucao' class='resolucao' style='display: none;'><p><strong>Resolução:</strong> $explicacao</p></div>";
        echo "</div>";
        echo "</form>";
    } else {
        echo "<div class='question-container'>Nenhuma questão encontrada.</div>";
    }
    ?>
</main>


  </div>
  
  <!-- footer -->
  <footer>
    <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
  </footer>

  <!-- caminhos de bibliotecas ou para a pagina js para pegar os códigos em javascript -->
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-3d"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="js/tarefas.js"></script>
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

</body>
</html>
