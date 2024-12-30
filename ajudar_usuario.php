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
    <h1>Chats com Usuários</h1>

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

    <!-- Modal de Resposta -->
    <div id="modalResposta" style="display:none;">
        <div class="modal-content">
            <!-- Nome e foto do usuário (no topo do modal) -->
            <div id="usuarioInfo">
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

    <a href="logout.php">Sair</a>

    <script>
        // Função para abrir o modal e preencher o chat_id e mensagens do usuário
        function abrirModal(userId, usuarioNome, usuarioFoto) {
            // Faz uma requisição AJAX para pegar todas as mensagens do usuário e as respostas do suporte
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'responder_chat.php?user_id=' + userId, true);

            xhr.onload = function() {
                if (xhr.status == 200) {
                    var mensagens = JSON.parse(xhr.responseText); // Espera que as mensagens retornem no formato JSON
                    
                    // Preenche a foto e o nome do usuário no modal
                    document.getElementById('usuarioFoto').src = usuarioFoto;
                    document.getElementById('usuarioNome').textContent = usuarioNome;

                    // Limpa o conteúdo do chat para mostrar todas as mensagens
                    document.getElementById('chatMessages').innerHTML = '';

                    // Itera pelas mensagens e as exibe no modal
                    mensagens.forEach(function(msg) {
                        var data = new Date(msg.data_envio);  // Converte a string de data para o objeto Date
                        var hora = data.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }); // Formata somente a hora
                        
                        // Adiciona a mensagem do usuário no modal
                        var messageDiv = document.createElement('div');
                        messageDiv.classList.add('message');
                        messageDiv.innerHTML = `
                            <div class="message-text">${msg.mensagem}</div> <!-- Exibe a mensagem do usuário -->
                            <div class="message-time">${hora}</div> <!-- Exibe a hora -->
                        `;
                        document.getElementById('chatMessages').appendChild(messageDiv);

                        // Se houver resposta do suporte, mostra também
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

                    // Preenche o conteúdo do modal com as mensagens
                    document.getElementById('modalResposta').style.display = 'block'; // Exibe o modal
                } else {
                    alert('Erro ao carregar as mensagens.');
                }
            };

            xhr.send();
        }

        // Função para enviar a resposta
        function enviarResposta(event) {
            event.preventDefault();  // Impede o envio do formulário

            var resposta = document.querySelector('textarea[name="resposta"]').value;  // Pega a resposta do suporte do input
            var chatId = document.getElementById('chatIdModal').value;  // Obtém o ID do chat

            var formData = new FormData();
            formData.append('chat_id', chatId);  // ID do chat
            formData.append('resposta', resposta);  // A resposta que será enviada

            // Faz a requisição AJAX para enviar a resposta
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '', true);  // Ação do script PHP que vai salvar a resposta

            xhr.onload = function() {
                if (xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.status == 'success') {
                        alert('Resposta enviada com sucesso!');
                        fecharModal();  // Fecha o modal
                    } else {
                        alert(response.message);
                    }
                } else {
                    alert('Erro ao enviar a resposta');
                }
            };

            xhr.send(formData);  // Envia a requisição
        }

        // Função para fechar o modal
        function fecharModal() {
            document.getElementById('modalResposta').style.display = 'none'; // Oculta o modal
        }
    </script>

</body>
</html>

<?php
// Fecha a conexão
$stmt->close();
$conn->close();
?>
