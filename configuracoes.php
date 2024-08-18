<?php
session_start();
require 'conexao.php'; // Assumindo que você tem um arquivo para conexão com o banco de dados

// Verifica se o usuário está logado
if (!isset($_SESSION['nome']) || !isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

$idUsuario = $_SESSION['id_usuario']; // Supondo que o ID do usuário é armazenado na sessão

// Define o caminho padrão para a imagem de perfil
$imagemPerfil = "img/usu.png";

// Verifica se uma imagem foi carregada via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagem'])) {
    $imagem = $_FILES['imagem']['tmp_name'];
    $imagemData = addslashes(file_get_contents($imagem)); // Convertendo a imagem para BLOB

    // Atualiza a imagem no banco de dados na coluna `foto`
    $query = "UPDATE usuario SET foto = '$imagemData' WHERE id = '$idUsuario'";
    mysqli_query($conexao, $query);
}

// Carrega a imagem do banco de dados
$query = "SELECT foto FROM usuario WHERE id = '$idUsuario'";
$result = mysqli_query($conexao, $query);

if ($row = mysqli_fetch_assoc($result)) {
    if ($row['foto']) {
        $imagemPerfil = 'data:image/jpeg;base64,' . base64_encode($row['foto']);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Física Online</title>
  <link rel="stylesheet" href="css/configuracoes.css">
</head>
<body>
  <header>
    <div class="conteudo-cabecalho">
      <h1><img src="img/fisicon.svg" width="200px"></h1>
    </div>
  </header>

  <div class="container">
    <aside>
      <div class="perfil">
        <img src="img/usuario.png" alt="Avatar">
        <p>Olá, <?php echo htmlspecialchars($_SESSION['nome']); ?>!</p> 
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
        <div class="opcao-imagem">
            <form action="" method="post" enctype="multipart/form-data">
                <label for="upload-imagem" class="imagem-label">
                    <img id="preview-imagem" src="<?php echo $imagemPerfil; ?>" alt="Imagem" width="200px" height="200px" style="cursor: pointer;">
                </label>
                <input type="file" id="upload-imagem" name="imagem" accept="image/*" style="display: none;">
                <button type="submit">Salvar Imagem</button>
            </form>
        </div>
        <div class="opcao-nome">
            <h2><?php echo htmlspecialchars($_SESSION['nome']); ?></h2>
        </div>
      </div>
    </main>
  </div>
  
  <script>
document.getElementById('upload-imagem').addEventListener('change', function(event) {
    const reader = new FileReader();
    reader.onload = function() {
        const output = document.getElementById('preview-imagem');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
});
</script>

  <footer>
    <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
  </footer>
</body>
</html>

