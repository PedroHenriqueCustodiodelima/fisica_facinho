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
  <link rel="stylesheet" href="css/configuracoes.css">
  <style>



  </style>
</head>
<body>
  <header>
    <div class="conteudo-cabecalho d-flex justify-content-between align-items-center">
      <h1><img src="img/fisicon.svg" width="200px"></h1>
    </div>
  </header>

  <div class="container">
    <aside>
      <div class="perfil_aside">
        <img id="avatar-imagem" src="<?php echo htmlspecialchars($usuario['foto']); ?>" alt="Avatar" width="200px" height="200px">
        <p>Olá, <span id="usuario-nome"><?php echo htmlspecialchars($usuario['nome']); ?></span>!</p>
      </div>
      <nav>
        <ul>
          <li><img src="img/livro.png" alt="" width="30px"><a href="#">Desempenho</a></li>
          <li><img src="img/livro.png" alt="" width="30px"><a href="#">Conteúdos</a></li>
          <li><img src="livro.png" alt="" width="30px"><a href="#">Tarefas</a></li>
          <li><img src="img/livro.png" alt="" width="30px"><a href="#">Missões</a></li>
          <li><img src="img/livro.png" alt="" width="30px"><a href="#">Configurações</a></li>
          <li><img src="img/livro.png" alt="" width="30px"><a href="logout.php">Sair</a></li>
        </ul>
      </nav>
    </aside>

    <main>
  <div class="container-opcao">
    <div class="perfil">
      <img id="avatar-imagem-main" src="<?php echo htmlspecialchars($usuario['foto']); ?>" alt="Avatar">
      <p><span id="usuario-nome-main"><?php echo htmlspecialchars($usuario['nome']); ?></span></p>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarPerfilModal">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" style="width: 24px; height: 24px;">
          <path fill="#ffffff" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l293.1 0c-3.1-8.8-3.7-18.4-1.4-27.8l15-60.1c2.8-11.3 8.6-21.5 16.8-29.7l40.3-40.3c-32.1-31-75.7-50.1-123.9-50.1l-91.4 0zm435.5-68.3c-15.6-15.6-40.9-15.6-56.6 0l-29.4 29.4 71 71 29.4-29.4c15.6-15.6 15.6-40.9 0-56.6l-14.4-14.4zM375.9 417c-4.1 4.1-7 9.2-8.4 14.9l-15 60.1c-1.4 5.5 .2 11.2 4.2 15.2s9.7 5.6 15.2 4.2l60.1-15c5.6-1.4 10.8-4.3 14.9-8.4L576.1 358.7l-71-71L375.9 417z"/>
        </svg>
      </button>
    </div>
    <hr class="linha-separadora">
    <div class="caixas">
      <div class="caixa caixa-esquerda"></div>
      <div class="caixa caixa-direita">

      </div>
    </div>
  </div>
</main>



  </div>
  

<div class="modal fade" id="editarPerfilModal" tabindex="-1" role="dialog" aria-labelledby="editarPerfilModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarPerfilModalLabel">Editar Perfil</h5>
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
          <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
      </div>
    </div>
  </div>
</div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    document.getElementById('upload-imagem').addEventListener('change', function(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('preview-imagem');
            output.src = reader.result;

            const avatar = document.getElementById('avatar-imagem-main');
            avatar.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    });

    document.getElementById('preview-imagem').addEventListener('click', function() {
        document.getElementById('upload-imagem').click();
    });
  </script>

  <footer>
    <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
  </footer>
</body>
</html>
