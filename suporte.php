<?php
include("funcoes_php/funcoes_inicio.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajuda - Configurações</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="css/suporte.css">
</head>
<body>
  <div class="page-container">
    <header class="d-flex justify-content-between align-items-center">
      <a href="inicio.php">
        <img src="img/logo.png" width="200px" alt="Logo">
      </a>
      <div class="perfil-header d-flex align-items-center">
        <img id="avatar-imagem" src="<?php echo htmlspecialchars($imagemPerfil); ?>" alt="Avatar" width="50px" height="50px" class="ml-3">
        <p class="m-0 ml-2"><span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span></p>
      </div>
    </header>

    <main class="container mt-4">
      <h1>Central de Ajuda</h1>
      <p>Bem-vindo à central de ajuda. Aqui você pode encontrar respostas para suas dúvidas ou aprender a utilizar os recursos do nosso sistema.</p>

      <h2>Perguntas Frequentes</h2>
      <div class="accordion" id="faqAccordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Como faço para atualizar meu perfil?
              </button>
            </h5>
          </div>
          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#faqAccordion">
            <div class="card-body">
              Para atualizar seu perfil, basta clicar no ícone de perfil no canto superior direito e acessar a seção de configurações. Você poderá alterar seu nome, e-mail e foto de perfil.
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Onde posso encontrar os relatórios gerados?
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
            <div class="card-body">
              Os relatórios gerados estão disponíveis na seção "Relatórios" do menu principal. Lá você pode visualizar e exportar todos os relatórios em formato PDF ou Excel.
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Como faço para entrar em contato com o suporte?
              </button>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
            <div class="card-body">
              Para entrar em contato com o suporte, clique no ícone de chat no canto inferior direito ou envie um e-mail para suporte@exemplo.com.
            </div>
          </div>
        </div>
      </div>

      <h2>Guia Rápido</h2>
      <p>Aqui estão alguns tópicos rápidos para ajudá-lo a começar:</p>
      <ul>
        <li><a href="#perfil">Como atualizar meu perfil</a></li>
        <li><a href="#relatorios">Acessar relatórios gerados</a></li>
        <li><a href="#suporte">Entrar em contato com o suporte</a></li>
      </ul>
    </main>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
