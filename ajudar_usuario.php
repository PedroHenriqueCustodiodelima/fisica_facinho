<?php
session_start();
require_once 'conexao.php';

// Verifique se a conexão foi bem estabelecida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Processa o envio de uma resposta de suporte
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['chat_id']) && isset($_POST['resposta'])) {
    $chatId = $_POST['chat_id'];
    $resposta = $_POST['resposta'];

    // Insere a resposta no banco de dados
    $sqlResposta = "INSERT INTO respostas_suporte (chat_id, resposta, data_resposta) VALUES (?, ?, NOW())";
    $stmtResposta = $conn->prepare($sqlResposta);
    $stmtResposta->bind_param("is", $chatId, $resposta);

    if ($stmtResposta->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Resposta enviada com sucesso!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao enviar a resposta.']);
    }
    $stmtResposta->close();
}

// SQL para obter o ID do usuário, nome, foto, a última mensagem e as respostas do suporte
$sql = "SELECT c.user_id, u.nome AS usuario_nome, u.foto AS usuario_foto, 
        (SELECT mensagem FROM chat_suporte WHERE user_id = c.user_id ORDER BY data_envio DESC LIMIT 1) AS ultima_mensagem
        FROM chat_suporte c
        JOIN usuarios u ON c.user_id = u.id
        GROUP BY c.user_id, u.nome, u.foto";  // Agrupa pelo ID do usuário

$stmt = $conn->prepare($sql);

// Verifique se a preparação da consulta falhou
if ($stmt === false) {
    die('Erro ao preparar a consulta: ' . $conn->error);
}

// Execute a consulta
$stmt->execute();

// Verifique se a execução da consulta falhou
if ($stmt->error) {
    die('Erro ao executar a consulta: ' . $stmt->error);
}

$stmt->store_result();

// Ajuste o bind_result para corresponder às 4 colunas
$stmt->bind_result($userId, $usuarioNome, $usuarioFoto, $ultimaMensagem);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajuda ao Usuário</title>
    <link rel="stylesheet" href="css/ajudar_usuario.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Chats com Usuários</h1>
        </header>

        <section class="chat-table">
            <table>
                <thead>
                    <tr>
                        <th>ID do Usuário</th>
                        <th>Usuário</th>
                        <th>Foto</th>
                        <th>Última Mensagem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($stmt->fetch()): ?>
                        <tr onclick="abrirModal(<?php echo $userId; ?>, '<?php echo addslashes($usuarioNome); ?>', '<?php echo addslashes($usuarioFoto); ?>')">
                            <td><?php echo htmlspecialchars($userId); ?></td>
                            <td><?php echo htmlspecialchars($usuarioNome); ?></td>
                            <td><img src="<?php echo htmlspecialchars($usuarioFoto); ?>" alt="Foto do Usuário" class="user-photo"></td>
                            <td><?php echo htmlspecialchars($ultimaMensagem); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>

        <!-- Modal de Resposta -->
        <div id="modalResposta" class="modal">
            <div class="modal-content">
                <!-- Nome e foto do usuário (no topo do modal) -->
                <div id="usuarioInfo" class="usuario-info">
                    <img src="" id="usuarioFoto" alt="Foto do Usuário" class="user-photo">
                    <span id="usuarioNome"></span>
                </div>

                <!-- Exibição das mensagens -->
                <div id="chatMessages" class="chat-messages"></div>

                <!-- Formulário para enviar a resposta -->
                <form id="formResposta" method="POST" onsubmit="enviarResposta(event)">
                    <input type="hidden" name="chat_id" id="chatIdModal">
                    <textarea name="resposta" placeholder="Digite sua resposta..." rows="5" required></textarea><br><br>
                    <button type="submit">Enviar Resposta</button>
                    <button type="button" onclick="fecharModal()">Cancelar</button>
                </form>
            </div>
        </div>

        <footer>
            <a href="logout.php">Sair</a>
        </footer>
    </div>

</body>
</html>

<?php
// Fecha a conexão
$stmt->close();
$conn->close();
?>
<script>
    function abrirModal(userId, usuarioNome, usuarioFoto) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'responder_chat.php?user_id=' + userId, true);

        xhr.onload = function() {
            if (xhr.status == 200) {
                var mensagens = JSON.parse(xhr.responseText);

                // Preenche a foto e o nome do usuário no modal
                document.getElementById('usuarioFoto').src = usuarioFoto;
                document.getElementById('usuarioNome').textContent = usuarioNome;

                // Preenche o chatId no campo oculto
                document.getElementById('chatIdModal').value = userId;

                // Limpa o conteúdo do chat para mostrar todas as mensagens
                document.getElementById('chatMessages').innerHTML = '';

                mensagens.forEach(function(msg) {
                    var data = new Date(msg.data_envio);
                    var hora = data.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

                    var messageDiv = document.createElement('div');
                    messageDiv.classList.add('message');
                    messageDiv.innerHTML = `
                        <div class="message-text">${msg.mensagem}</div>
                        <div class="message-time">${hora}</div>
                    `;
                    document.getElementById('chatMessages').appendChild(messageDiv);

                    if (msg.resposta) {
                        var respostaDiv = document.createElement('div');
                        respostaDiv.classList.add('response');
                        var respostaHora = new Date(msg.data_resposta).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

                        respostaDiv.innerHTML = `
                            <div class="response-text">${msg.resposta}</div>
                            <div class="response-time">${respostaHora}</div>
                        `;
                        document.getElementById('chatMessages').appendChild(respostaDiv);
                    }
                });

                scrollToBottom();
                document.getElementById('modalResposta').style.display = 'flex';
            } else {
                alert('Erro ao carregar as mensagens.');
            }
        };

        xhr.send();
    }

    function scrollToBottom() {
        var chatMessages = document.getElementById('chatMessages');
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function fecharModal() {
        document.getElementById('modalResposta').style.display = 'none';
    }

    // Função para enviar a resposta via AJAX
    function enviarResposta(event) {
        event.preventDefault();  // Impede o envio normal do formulário

        const chatId = document.getElementById('chatIdModal').value;
        const resposta = document.querySelector('textarea[name="resposta"]').value;

        // Verifique no console se os valores estão corretos
        console.log('Chat ID:', chatId);
        console.log('Resposta:', resposta);

        if (!chatId || !resposta) {
            alert("Chat ID ou Resposta não estão preenchidos corretamente.");
            return;
        }

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'resposta_suporte.php', true);  // Enviar para o arquivo que processa a resposta

        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    alert(response.message);
                    document.querySelector('textarea[name="resposta"]').value = '';  // Limpa o campo de resposta
                    fecharModal();  // Fecha o modal
                } else {
                    alert('Erro ao enviar a resposta.');
                }
            } else {
                alert('Erro ao processar a resposta.');
            }
        };

        xhr.send('chat_id=' + encodeURIComponent(chatId) + '&resposta=' + encodeURIComponent(resposta));
    }
</script>
