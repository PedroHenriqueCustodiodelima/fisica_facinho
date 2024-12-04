<?php
include("funcoes_php/funcoes_suporte.php"); 

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
        <a href="configuracoes.php" class="d-flex align-items-center" style="text-decoration: none;">
          <img id="avatar-imagem" src="<?php echo htmlspecialchars($imagemPerfil); ?>" alt="Avatar" width="50px" height="50px" class="ml-3">
          <p class="m-0 ml-2"><span id="usuario-nome"><?php echo htmlspecialchars($nomeUsuario); ?></span></p>
        </a>
      </div>
    </header>

    <main class="container mt-4">
      <h1>Central de Ajuda</h1>
      <p>Bem-vindo à central de ajuda. Aqui você pode encontrar respostas para suas dúvidas ou aprender a utilizar os recursos do nosso sistema.</p>

      <!-- Exibindo Mensagens de Sucesso ou Erro -->
      <?php if ($sucesso): ?>
        <div class="alert alert-success"><?php echo $sucesso; ?></div>
      <?php endif; ?>
      <?php if ($erro): ?>
        <div class="alert alert-danger"><?php echo $erro; ?></div>
      <?php endif; ?>

      <!-- Formulário de Contato -->
      <h2>Envie sua mensagem para o Suporte</h2>
      <form action="" method="POST">
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" id="nome" name="nome" class="form-control" value="<?php echo htmlspecialchars($nomeUsuario); ?>" required>
        </div>
        <div class="form-group">
          <label for="mensagem">Mensagem</label>
          <textarea id="mensagem" name="mensagem" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
      </form>

      <!-- Perguntas Frequentes com Accordion -->
      <h2 class="mt-5">Perguntas Frequentes</h2>
      <div class="accordion" id="faqAccordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Como atualizar meu perfil?
              </button>
            </h5>
          </div>
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
            <div class="card-body">
              Para atualizar seu perfil, vá até a página de configurações e edite as informações desejadas, como nome, foto de perfil e outros dados pessoais.
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Como acessar relatórios gerados?
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
            <div class="card-body">
              Os relatórios gerados podem ser acessados na seção de relatórios dentro do painel de administração. Lá você poderá visualizar, baixar e compartilhar os relatórios.
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Como entrar em contato com o suporte?
              </button>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
            <div class="card-body">
              Caso precise de suporte, você pode enviar uma mensagem através do formulário nesta página ou acessar a seção de contato disponível no menu principal.
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

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    // Exibe a mensagem de sucesso ou erro com SweetAlert2
    <?php if ($sucesso): ?>
      Swal.fire({
        icon: 'success',
        title: 'Mensagem enviada!',
        text: '<?php echo $sucesso; ?>',
        confirmButtonText: 'Ok'
      }).then(() => {
        // Redireciona após a exibição da mensagem
        window.location.href = window.location.href;
      });
    <?php elseif ($erro): ?>
      Swal.fire({
        icon: 'error',
        title: 'Erro!',
        text: '<?php echo $erro; ?>',
        confirmButtonText: 'Ok'
      });
    <?php endif; ?>
  </script>

  <footer>
    <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
