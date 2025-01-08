<?php
include("funcoes_php/funcoes_suporte.php");
include 'header.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FACINHO - Central de Ajuda</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="css/suporte.css">
</head>
<body>
  
  <main class="container mt-4">
  <div class="voltar-container mb-4">
      <a href="inicio.php" class="custom-link mb-3">
        <i class="fa-solid fa-circle-arrow-left" style="color: #001A4E;"></i> 
        <span style="color: #001A4E;">Voltar</span>
      </a>
    </div>
    <h1>Central de Ajuda</h1>
    <p>Envie sua mensagem para a nossa equipe de suporte. Se você tiver dúvidas, consulte também as perguntas frequentes abaixo.</p>

    <!-- Exibindo Feedback -->
    <?php if ($sucesso): ?>
      <div class="alert alert-success">
        <?php echo $sucesso; ?>
      </div>
    <?php elseif ($erro): ?>
      <div class="alert alert-danger">
        <?php echo $erro; ?>
      </div>
    <?php endif; ?>

    <!-- Formulário de Contato -->
    <form method="POST" action="">
      <div class="form-group">
        <label for="mensagem">Mensagem</label>
        <textarea id="mensagem" name="mensagem" class="form-control" rows="4" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <hr>

    <!-- Perguntas Frequentes (FAQ) -->
    <section id="faq">
      <h2>Perguntas Frequentes</h2>
      <div class="accordion" id="faqAccordion">
        <div class="card">
          <div class="card-header" id="faqOne">
            <h5 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Como posso recuperar minha senha?
              </button>
            </h5>
          </div>
          <div id="collapseOne" class="collapse show" aria-labelledby="faqOne" data-parent="#faqAccordion">
            <div class="card-body">
              Você pode recuperar sua senha clicando em "Esqueci a senha" na página de login. Basta fornecer seu email e seguiremos com a recuperação.
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="faqTwo">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Como faço para alterar meu endereço de email?
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="faqTwo" data-parent="#faqAccordion">
            <div class="card-body">
              Para alterar seu endereço de e-mail, vá até as configurações do perfil e atualize seu e-mail na seção "Informações Pessoais".
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="faqThree">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Como posso cancelar minha conta?
              </button>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="faqThree" data-parent="#faqAccordion">
            <div class="card-body">
              Para cancelar sua conta, entre em contato com nossa equipe de suporte e solicite o encerramento.
            </div>
          </div>
        </div>
      </div>
    </section>

    <hr>

    <!-- Chat de Suporte -->
    <section id="chat">
      <h2>Precisa de ajuda imediata?</h2>
      <p>Você pode conversar com nosso suporte ao vivo através do chat.</p>
      <button class="btn btn-secondary">Iniciar Chat</button>
    </section>
      <!-- Botão para abrir o chat -->
<button id="openChatBtn" class="open-chat-btn">Chat de Suporte</button>

<!-- Modal do chat -->
<div id="chatModal" class="chat-modal">
  <div class="chat-modal-content">
    <div class="chat-header">
      <h4>Chat de Suporte</h4>
      <span id="closeChatBtn" class="close-chat">&times;</span>
    </div>
    <div class="chat-body" id="chatBody">
      <!-- Mensagens serão carregadas dinamicamente aqui -->
    </div>
    <div class="chat-footer">
      <textarea id="chatMessage" placeholder="Digite sua mensagem..."></textarea>
      <button id="sendMessageBtn" class="send-chat-btn">Enviar</button>
    </div>
  </div>
</div>

    <hr>

    <!-- Links Úteis -->
    <section id="links-uteis">
      <h2>Links Úteis</h2>
      <ul>
        <li><a href="tutorials.php">Tutoriais</a></li>
        <li><a href="termos.php">Termos de Serviço</a></li>
        <li><a href="politica_privacidade.php">Política de Privacidade</a></li>
      </ul>
    </section>

    <hr>

    <!-- Informações de Contato -->
    <section id="contato">
      <h2>Informações de Contato</h2>
      <p>Email: <a href="mailto:fisicafacinho@gmail.com">fisicafacinho@gmail.com</a></p>
    </section>
  </main>

  <footer class="mt-5 py-3 text-center">
    <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
  </footer>
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    <?php if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1): ?>
      Swal.fire({
        icon: 'success',
        title: 'Mensagem Enviada!',
        text: 'Sua mensagem foi enviada com sucesso!',
        confirmButtonText: 'Ok'
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
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const chatModal = document.getElementById("chatModal");
      const openChatBtn = document.getElementById("openChatBtn");
      const closeChatBtn = document.getElementById("closeChatBtn");
      const sendMessageBtn = document.getElementById("sendMessageBtn");
      const chatBody = document.getElementById("chatBody");
      const chatMessage = document.getElementById("chatMessage");

      // Abrir o modal
      openChatBtn.addEventListener("click", () => {
        chatModal.style.display = "block";
        loadMessages();
      });

      // Fechar o modal
      closeChatBtn.addEventListener("click", () => {
        chatModal.style.display = "none";
      });

      // Enviar mensagem
      sendMessageBtn.addEventListener("click", () => {
        const message = chatMessage.value.trim();
        if (message !== "") {
          sendMessage(message);
          chatMessage.value = "";
        }
      });

      // Carregar mensagens
      function loadMessages() {
        fetch("carregar_mensagens.php")
          .then((response) => response.json())
          .then((data) => {
            chatBody.innerHTML = "";
            data.forEach((msg) => {
              const div = document.createElement("div");
              div.classList.add("message", msg.remetente === "user" ? "user" : "support");
              div.textContent = msg.mensagem;
              chatBody.appendChild(div);
            });
            chatBody.scrollTop = chatBody.scrollHeight;
          });
      }

      // Enviar mensagem para o servidor
      function sendMessage(message) {
        fetch("enviar_mensagem.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ mensagem: message }),
        }).then((response) => {
          if (response.ok) {
            loadMessages();
          }
        });
      }
    });
  </script>
</body>
</html>
