<?php
require_once __DIR__ . '/./conexao.php';

$query = "SELECT usuarios.nome, chat_suporte.mensagem, chat_suporte.data_envio, chat_suporte.user_id 
          FROM chat_suporte 
          INNER JOIN usuarios ON chat_suporte.user_id = usuarios.id 
          GROUP BY usuarios.nome 
          ORDER BY chat_suporte.data_envio DESC";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat de Suporte</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="css/inicio.css">
  <link rel="icon" type="img/png" href="img/cara.png">
  <script src="js/inicio.js"></script>
</head>
<body>
  <div class="page-container">
    <main class="container">
      <h1 class="my-4">Chat de Suporte</h1>
      
     <!-- Tabela -->
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Usuário</th>
      <th>Mensagem</th>
      <th>Data da Mensagem</th>
      <th>Responder</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($result->num_rows > 0): ?>
      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row['nome']; ?></td>
          <td><?php echo $row['mensagem']; ?></td>
          <td><?php echo date('d/m/Y H:i', strtotime($row['data_envio'])); ?></td>
          <td>
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#conversaModal" data-user-id="<?php echo $row['user_id']; ?>">Responder</button>
          </td>
        </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr>
        <td colspan="4" class="text-center">Nenhuma mensagem encontrada.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

      
   
<div class="modal fade" id="conversaModal" tabindex="-1" role="dialog" aria-labelledby="conversaModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="conversaModalLabel">Conversa Particular</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="conversa-body" style="max-height: 300px; overflow-y: auto;">
        <!-- As mensagens serão carregadas aqui via AJAX -->
      </div>
      <div class="modal-footer">
        <form id="form_mensagem">
          <textarea class="form-control" id="nova_mensagem" name="mensagem" placeholder="Digite sua mensagem..." required></textarea>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</div>




    </main>
    <footer>
      <p>Copyright © 2023 | Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Norte</p>
    </footer>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
   $(document).ready(function() {
    var userId = null;  // Armazena o ID do usuário para o qual a conversa será aberta

    // Função para carregar as mensagens em tempo real
    function carregarMensagens() {
        $.ajax({
            url: 'fetch_messages.php',
            type: 'GET',
            data: { user_id: userId },
            dataType: 'json',
            success: function(mensagens) {
                $('#conversa-body').empty();  // Limpa o conteúdo antigo
                mensagens.reverse();  // Inverte a ordem das mensagens (da mais recente para a mais antiga)
                
                mensagens.forEach(function(mensagem) {
                    $('#conversa-body').append(
                        '<div class="msg-container">' +
                        '<div class="msg-time">' + mensagem.data_envio + '</div>' +
                        '<div class="msg-text">' + mensagem.mensagem + '</div>' +
                        '</div>'
                    );
                });
            },
            error: function() {
                console.log('Erro ao carregar mensagens');
            }
        });
    }

    // Evento do modal para quando ele for mostrado
    $('#conversaModal').on('show.bs.modal', function(e) {
        userId = $(e.relatedTarget).data('user-id');
        carregarMensagens();  // Carregar as mensagens quando o modal for exibido

        // Atualizar as mensagens em intervalos
        setInterval(function() {
            carregarMensagens();
        }, 5000);  // Atualiza a cada 5 segundos
    });

    // Envio da mensagem
    $('#form_mensagem').submit(function(e) {
        e.preventDefault();
        
        var mensagem = $('#nova_mensagem').val();
        
        if (mensagem.trim() === "") return;
        
        $.ajax({
            url: 'send_message.php',
            type: 'POST',
            data: {
                user_id: userId,
                mensagem: mensagem,
                remetente: 'usuario'  // Remetente identificando o usuário
            },
            success: function(response) {
                $('#nova_mensagem').val('');  // Limpar o campo de mensagem após enviar
                carregarMensagens();  // Atualizar o modal com as novas mensagens
            },
            error: function() {
                console.log('Erro ao enviar a mensagem');
            }
        });
    });
});

  </script>
</body>
</html>
