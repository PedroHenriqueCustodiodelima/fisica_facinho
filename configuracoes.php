<?php

include("funcoes_php/funcoes_confi.php");


if (!isset($usuario)) {
    
    header('Location: login.php');
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['imagem'])) {
    $imagem = $_FILES['imagem'];
    $destino = 'caminho_para_salvar_imagem/' . basename($imagem['name']);
    
    // Verificação do tipo e tamanho do arquivo
    if ($imagem['size'] <= 5000000 && in_array($imagem['type'], ['image/jpeg', 'image/png', 'image/gif'])) {
        if (move_uploaded_file($imagem['tmp_name'], $destino)) {
        
        }
    } else {
        // Exibe uma mensagem de erro caso o arquivo não seja válido
        echo "Arquivo inválido ou muito grande.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Configurações</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="css/configuracoes.css">
</head>
<body class="d-flex flex-column" style="min-height: 100vh;"> <!-- Define a altura mínima da página -->

  <header class="d-flex justify-content-between align-items-center">
    <a href="inicio.php">
        <img src="img/logo.png" width="200px" alt="Logo">
    </a>
    <div class="perfil-header d-flex align-items-center">
      <img id="avatar-imagem" src="<?php echo htmlspecialchars($usuario['foto']); ?>" alt="Avatar" width="200px" height="200px">
      <p>Olá, <span id="usuario-nome"><?php echo htmlspecialchars($usuario['nome']); ?></span>!</p>
    </div>
  </header>

  <div class="col-8 voltar-container " style="margin: 20px;">
    <a href="inicio.php" class="custom-link" style="text-decoration: none;color: #001A4E; ">
        <i class="fa-solid fa-circle-arrow-left"></i> <span>Voltar</span>
    </a>
  </div>

  <main class="d-flex justify-content-center align-items-center ">
    <div class="container">
      <div class="row">
        <div class="col-12 container-opcao">
          <div class="col-12 perfil">
            <!-- Imagem do perfil com função de troca ao clicar -->
            <form id="troca-imagem-form" action="" method="post" enctype="multipart/form-data">
              <img id="preview-imagem" src="<?php echo htmlspecialchars($usuario['foto']); ?>" alt="Imagem" class="img-thumbnail" onclick="document.getElementById('upload-imagem').click()">
              <input type="file" id="upload-imagem" name="imagem" accept="image/*" style="display: none;" onchange="alterarImagemPerfil()">
            </form>
            <p>
              <span id="usuario-nome-main" class="usuario-nome-main"><?php echo htmlspecialchars($usuario['nome']); ?></span>
              <span class="data-criacao">Conosco desde <?php echo htmlspecialchars($usuario['data_criacao_formatada']); ?></span>
            </p>
          </div>
        </div>

        <!-- Formulário de edição de perfil -->
        <div class="col-12 editar-perfil-container mt-4">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="nome" style=" color: #001A4E;">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>">
            </div>
            <div class="form-group">
              <label for="email" style=" color: #001A4E;">E-mail</label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>">
            </div>
            <div class="form-group">
              <label for="senha" style=" color: #001A4E;">Senha</label>
              <input type="senha" class="form-control" id="senha" name="senha" value="<?php echo htmlspecialchars($usuario['']); ?>">
            </div>
            <button type="submit" class="btn " style="background-color: #001A4E; color:white;">Salvar</button>
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

  <script>
    function alterarImagemPerfil() {
      // Submete o formulário automaticamente ao selecionar uma nova imagem
      document.getElementById('troca-imagem-form').submit();
    }
  </script>

</body>
</html>
