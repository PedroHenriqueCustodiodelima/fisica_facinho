<?php
include("conexao.php");

session_start();

$message = ''; 

// Define o fuso horário para São Paulo (horário de Brasília)
date_default_timezone_set('America/Sao_Paulo');

$usuario_id = $_SESSION['usuario_id'];

// Verifica se o formulário de upload de imagem foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagem'])) {
    $imagem = $_FILES['imagem'];
    
    // Verifica se há erros no upload
    if ($imagem['error'] === UPLOAD_ERR_OK) {
        $imagemTmpName = $imagem['tmp_name'];
        $imagemNome = basename($imagem['name']);
        $imagemDestino = 'foto_usuario/' . $imagemNome;
        
        // Move o arquivo para o diretório de uploads
        if (move_uploaded_file($imagemTmpName, $imagemDestino)) {
            // Atualiza o caminho da imagem no banco de dados
            $stmt = $conn->prepare("UPDATE usuarios SET foto = ? WHERE id = ?");
            $stmt->bind_param("si", $imagemDestino, $usuario_id);
            $stmt->execute();
            $stmt->close();
            
            // Atualiza o caminho da imagem na variável de sessão para refletir a mudança
            $_SESSION['foto'] = $imagemDestino;
            $imagemPerfil = $imagemDestino;
        } else {
            $message = "Erro ao mover o arquivo para o diretório de uploads.";
        }
    } else {
        $message = "Erro no upload do arquivo.";
    }
}

// Recupera o caminho da imagem de perfil do usuário
$stmt = $conn->prepare("SELECT foto FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();
$imagemPerfil = $usuario['foto'] ?? 'img/default-avatar.png'; // Caminho da imagem padrão se não houver imagem

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Configurações</title>
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
        <img id="avatar-imagem" src="<?php echo htmlspecialchars($imagemPerfil); ?>" alt="Avatar" width="200px" height="200px">
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
                    <img id="preview-imagem" src="<?php echo htmlspecialchars($imagemPerfil); ?>" alt="Imagem" width="200px" height="200px" style="cursor: pointer;">
                </label>
                <input type="file" id="upload-imagem" name="imagem" accept="image/*" style="display: none;">
                <button type="submit">Salvar</button>
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

        // Atualiza o avatar também
        const avatar = document.getElementById('avatar-imagem');
        avatar.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
});
</script>

  <footer>
    <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
  </footer>
</body>
</html>
