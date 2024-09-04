<!-- incluindo todas as funções da pagina de funções -->
<?php
include("funcoes_php/funcoes_confi.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Configurações</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="css/configuracoes.css">
</head>
<body>

  <!-- cabeçalho do nosso site -->
  <header>
    <div class="conteudo-cabecalho d-flex justify-content-between align-items-center">
    <a href="inicio.php">
        <img src="img/logo.png" width="200px" alt="Logo">
    </a>
    </div>
  </header>

  <div class="container">
    <!-- menu lateral padrão -->
    <aside>
      <div class="perfil_aside">
        <img id="avatar-imagem" src="<?php echo htmlspecialchars($usuario['foto']); ?>" alt="Avatar" width="200px" height="200px">
        <p>Olá, <span id="usuario-nome"><?php echo htmlspecialchars($usuario['nome']); ?></span>!</p>
      </div>
      <nav>
        <ul>
          <li><i class="fa-solid fa-chart-simple" style="color: white; width: 30px; height: 30px;"></i><a href="#">Desempenho</a></li>
          <li><i class="fa-solid fa-book" style="color: white; width: 30px; height: 30px;"></i><a href="#">Conteúdos</a></li>
          <li><i class="fa-solid fa-list-check" style="color: white; width: 30px; height: 30px;"></i><a href="tarefas.php">Tarefas</a></li>
          <li><i class="fa-solid fa-clipboard" style="color: white; width: 30px; height: 30px;"></i><a href="#">Missões</a></li>
          <li><i class="fa-solid fa-gear" style="color: white; width: 30px; height: 30px;"></i><a href="#">Configurações</a></li>
          <li><i class="fa-solid fa-arrow-right-from-bracket" style="color: white; width: 30px; height: 30px;"></i><a href="logout.php">Sair</a></li>
        </ul>
      </nav>
    </aside>

    <!-- parte do gráfico e das caixas de erros e acertos nas configurações -->
    <main>
      <div class="container-opcao">
        <div class="perfil">
          <img id="avatar-imagem-main" src="<?php echo htmlspecialchars($usuario['foto']); ?>" alt="Avatar">
          <p>
            <span id="usuario-nome-main" class="usuario-nome-main"><?php echo htmlspecialchars($usuario['nome']); ?></span>
            <span class="data-criacao">Conosco desde <?php echo htmlspecialchars($usuario['data_criacao_formatada']); ?></span>
          </p>
        </div>
        <button type="button" class="editar" data-toggle="modal" data-target="#editarPerfilModal">
          <i class="fa-solid fa-pen" style="width: 24px; height: 24px; color: #ffffff;"></i>
        </button>
        <div class="caixas">
          <div class="caixa caixa-esquerda">
            <canvas id="grafico-esquerda"></canvas>
          </div>
          <div class="caixas-direita">
            <div class="caixa caixa-direita-superior">
              <div class="texto-centralizado">
                <span class="numero">50</span>
                <span class="descricao">Acertos</span>
              </div>
            </div>
            <div class="caixa caixa-direita-inferior">
              <div class="texto-centralizado">
                <span class="numero_1">50</span>
                <span class="descricao_1">Erradas</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
</div>
  

<!-- modal para editar os dados -->

<div class="modal fade" id="editarPerfilModal" tabindex="-1" role="dialog" aria-labelledby="editarPerfilModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-header-left">
          <img src="img/logo.png" alt="Logo" class="modal-logo">
          <h5 class="modal-title" id="editarPerfilModalLabel">Editar Perfil</h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="upload-imagem">Imagem de Perfil</label>
            <div class="imagem-perfil-container">
              <img id="preview-imagem" src="<?php echo htmlspecialchars($usuario['foto']); ?>" alt="Imagem" class="img-thumbnail">
              <input type="file" id="upload-imagem" name="imagem" accept="image/*" class="form-control-file mt-2" style="display: none;">
            </div>
          </div>
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>">
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>">
          </div>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- footer -->
<footer>
  <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
</footer>

<!-- caminhos de bibliotecas ou para a pagina js para pegar os codigo em javascript -->
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-3d"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/confi.js"></script>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

</body>
</html>
