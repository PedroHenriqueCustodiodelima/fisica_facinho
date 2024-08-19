<?php
session_start();

// Inclui o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Verifica se o usuário está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

// Recupera o ID do usuário da sessão
$usuario_id = $_SESSION['usuario_id'];

// Recupera o caminho da imagem de perfil do banco de dados
$stmt = $conn->prepare("SELECT foto FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();
$imagemPerfil = $usuario['foto'] ?? 'img/default-avatar.png'; // Caminho da imagem padrão se não houver imagem

// Fecha a conexão
$stmt->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Física Online</title>
  <link rel="stylesheet" href="css/inicio.css">
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
        <img src="<?php echo htmlspecialchars($imagemPerfil); ?>" alt="Avatar" width="200px" height="200px">
        <p>Olá, <?php echo htmlspecialchars($_SESSION['nome']); ?>!</p> 
      </div>
      <nav>
        <ul>
          <li>
            <img src="img/livro.png" alt="" width="30px">
            <a href="#">Desempenho</a>
          </li>
          <li>
            <img src="img/livro.png" alt="" width="30px">
            <a href="#">Conteúdos</a>
          </li>
          <li>
            <img src="livro.png" alt="" width="30px">
            <a href="#">Tarefas</a>
          </li>
          <li>
            <img src="img/livro.png" alt="" width="30px">
            <a href="#">Missões</a>
          </li>
          <li>
            <img src="img/livro.png" alt="" width="30px">
            <a href="configuracoes.php">Configurações</a>
        </li>
          <li>
            <img src="img/livro.png" alt="" width="30px">
            <a href="logout.php">Sair</a> 
          </li>
        </ul>
      </nav>
    </aside>

    <main>
      <h1>Por onde começamos?</h1>
      <a href="#">
        <div class="opcao-ano primeiro-ano">
          <h3>1º ANO</h3>
          <div class="desc">
            <p>No primeiro ano do ensino médio, você começará a desvendar os segredos que governam tudo ao nosso redor,
              desde os movimentos dos planetas até as pequenas partículas que compõem a matéria. </p>
          </div>
        </div>
      </a>
      <a href="#">
        <div class="opcao-ano segundo-ano">
          <h3>2º ANO</h3>
          <div class="desc">
            <p>No segundo ano do ensino médio, você continuará a explorar conceitos avançados e a aplicar o que aprendeu no primeiro ano. </p>
          </div>
        </div>
      </a>
      <a href="#">
        <div class="opcao-ano terceiro-ano">
          <h3>3º ANO</h3>
          <div class="desc">
            <p>No terceiro ano, você se preparará para exames e consolidará seu conhecimento em Física. </p>
          </div>
        </div>
      </a>
    </main>
  </div>

  <footer>
    <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
  </footer>
</body>
</html>
