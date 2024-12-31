<?php
require_once 'conexao.php';

if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];
    
    // Verifica se a mensagem foi enviada pelo suporte
    if (isset($_POST['mensagem']) && !empty($_POST['mensagem'])) {
        $mensagem = $_POST['mensagem'];
        $dataResposta = date('Y-m-d H:i:s');  // Data e hora atuais
        
        // Obtém o chat_id do usuário
        $sqlChatId = "SELECT id, session_id FROM chat_suporte WHERE user_id = ? AND status_chat = 'ativo' ORDER BY data_envio DESC LIMIT 1"; 
        $stmtChatId = $conn->prepare($sqlChatId);
        $stmtChatId->bind_param("i", $userId);
        $stmtChatId->execute();
        $stmtChatId->store_result();
        $stmtChatId->bind_result($chatId, $sessionId);
        $stmtChatId->fetch();
        $stmtChatId->close();

        // Verifica se um chat_id foi encontrado
        if ($chatId) {
            // Insere a resposta na tabela respostas_suporte
            $sqlInsert = "INSERT INTO respostas_suporte (chat_id, resposta, data_resposta, session_id) VALUES (?, ?, ?, ?)";
            $stmtInsert = $conn->prepare($sqlInsert);
            $stmtInsert->bind_param("isss", $chatId, $mensagem, $dataResposta, $sessionId);
            
            if ($stmtInsert->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Resposta enviada com sucesso!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Erro ao enviar a resposta.']);
            }

            $stmtInsert->close();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Chat não encontrado para este usuário.']);
        }
    }

    // Consulta para buscar todas as mensagens e respostas
    $sql = "SELECT c.mensagem, c.data_envio, r.resposta, r.data_resposta
            FROM chat_suporte c
            LEFT JOIN respostas_suporte r ON c.id = r.chat_id
            WHERE c.user_id = ?
            ORDER BY c.data_envio ASC";  // Ordena as mensagens pela data de envio

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->store_result();
    
    $stmt->bind_result($mensagem, $dataEnvio, $resposta, $dataResposta);
    
    $messages = [];
    while ($stmt->fetch()) {
        $messages[] = [
            'mensagem' => $mensagem,
            'data_envio' => $dataEnvio,
            'resposta' => $resposta,
            'data_resposta' => $dataResposta
        ];
    }

    // Retorna as mensagens e respostas no formato JSON
    echo json_encode($messages);
} else {
    echo json_encode([]);
}

$stmt->close();
$conn->close();
?>
