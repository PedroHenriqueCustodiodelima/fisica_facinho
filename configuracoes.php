<?php
include("funcoes_php/funcoes_confi.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FACINHO</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="css/configuracoes.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body class="d-flex flex-column" style="min-height: 100vh;"> 

<header class="d-flex justify-content-between align-items-center">
    <a href="inicio.php">
        <img src="img/logo.png" width="200px" alt="Logo">
    </a>
    <div class="perfil-header d-flex align-items-center">
        <img id="avatar-imagem" src="<?php echo htmlspecialchars(empty($usuario['foto']) ? 'img/usuario_perfil.png' : $usuario['foto']); ?>" alt="Avatar" width="200px" height="200px">
        <p><span id="usuario-nome"><?php echo htmlspecialchars($usuario['nome']); ?></span></p>
    </div>
</header>

  <div class="col-8 voltar-container " style="margin: 20px;">
    <a href="inicio.php" class="custom-link" style="text-decoration: none;color: #001A4E; ">
        <i class="fa-solid fa-circle-arrow-left"></i> <span>Voltar</span>
    </a>
  </div>

  <div class="alert-container mt-4 text-center">
  <?php if (isset($sucesso) && $sucesso): ?>
    <div class="alert alert-success mt-4 text-center" role="alert" id="feedback-message" class="show">
      <i class="fa fa-check-circle"></i>
      <?php echo $sucesso; ?>
    </div>
  <?php elseif (isset($erroEmailExistente) && $erroEmailExistente): ?>
    <div class="alert alert-danger mt-2" role="alert" id="feedback-message-email-existente" class="show">
      <i class="fa fa-exclamation-circle"></i>
      <?php echo $erroEmailExistente; ?>
    </div>
  <?php elseif (isset($erroEmail) && $erroEmail): ?>
    <div class="alert alert-danger mt-2" role="alert" id="feedback-message-erro" class="show">
      <i class="fa fa-exclamation-circle"></i>
      <?php echo htmlspecialchars($erroEmail); ?>
    </div>
  <?php endif; ?>
</div>
<main class="d-flex justify-content-center align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-12 container-opcao">
      <div class="col-12 perfil">
        <form id="troca-imagem-form" action="" method="post" enctype="multipart/form-data">
          <!-- Container para a imagem e ícone de câmera -->
          <div class="img-container">
            <img id="preview-imagem" src="<?php echo htmlspecialchars(empty($usuario['foto']) ? 'img/usuario_perfil.png' : $usuario['foto']); ?>" alt="Imagem" class="img-thumbnail" onclick="document.getElementById('upload-imagem').click()">
            <!-- Ícone de câmera dentro do círculo -->
            <i class="fas fa-camera camera-icon" onclick="document.getElementById('upload-imagem').click()"></i>
          </div>
          <input type="file" id="upload-imagem" name="imagem" accept="image/*" style="display: none;" onchange="alterarImagemPerfil()">
        </form>
        <p>
          <span id="usuario-nome-main" class="usuario-nome-main"><?php echo htmlspecialchars($usuario['nome']); ?></span>
          <span class="data-criacao">Conosco desde <?php echo htmlspecialchars($usuario['data_criacao_formatada']); ?></span>
        </p>
      </div>


      </div>
      
      <div class="col-12 editar-perfil-container mt-4 form-container"> <!-- Adicionei a classe form-container aqui -->
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nome" style="color: #001A4E;">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>">
          </div>
          <div class="form-group">
            <label for="email" style="color: #001A4E;">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>">
          </div>
          <button type="submit" class="btn" style="background-color: #001A4E; color: white;">Salvar</button>
        </form>
      </div>
    </div>
  </div>
</main>

  <footer class="mt-auto text-white text-center py-3" style="background-color: #001A4E;">
    <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
  </footer>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="js/confi.js"></script>
</body>
</html>
