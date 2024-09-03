<!-- incluindo todas as funções da pagina de funções -->
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
</head>
<body>

  <!-- cabeçalho do nosso site -->
  <header>
    <div class="conteudo-cabecalho d-flex justify-content-between align-items-center">
      <h1><img src="img/logo.png" width="200px"></h1>
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
          <li><i class="fa-solid fa-list-check" style="color: white; width: 30px; height: 30px;"></i><a href="#">Tarefas</a></li>
          <li><i class="fa-solid fa-clipboard" style="color: white; width: 30px; height: 30px;"></i><a href="#">Missões</a></li>
          <li><i class="fa-solid fa-gear" style="color: white; width: 30px; height: 30px;"></i><a href="configuracoes.php">Configurações</a></li>
          <li><i class="fa-solid fa-arrow-right-from-bracket" style="color: white; width: 30px; height: 30px;"></i><a href="logout.php">Sair</a></li>
        </ul>
      </nav>
    </aside>

    <!-- parte do gráfico e das caixas de erros e acertos nas configurações -->
    <main>
      
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
  <script src="js/inicio.js"></script>
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

</body>
</html>
