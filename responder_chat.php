<?php
require_once 'conexao.php';

if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];
    
    // Verifica se a mensagem foi enviada pelo suporte
    if (isset($_POST['mensagem']) && !empty($_POST['mensagem'])) {
        $mensagem = $_POST['mensagem'];
        $dataResposta = date('Y-m-d H:i:s');  // Data e hora atuais
        
        // Obtém o chat_id do usuário (essa parte pode precisar de ajustes dependendo da estrutura do banco de dados)
        $sqlChatId = "SELECT id FROM chat_suporte WHERE user_id = ? ORDER BY data_envio DESC LIMIT 1"; 
        $stmtChatId = $conn->prepare($sqlChatId);
        $stmtChatId->bind_param("i", $userId);
        $stmtChatId->execute();
        $stmtChatId->store_result();
        $stmtChatId->bind_result($chatId);
        $stmtChatId->fetch();
        $stmtChatId->close();

        // Verifica se um chat_id foi encontrado
        if ($chatId) {
            // Consulta para inserir a resposta na tabela respostas_suporte
            $sqlInsert = "INSERT INTO respostas_suporte (chat_id, resposta, data_resposta) VALUES (?, ?, ?)";
            $stmtInsert = $conn->prepare($sqlInsert);
            $stmtInsert->bind_param("iss", $chatId, $mensagem, $dataResposta);
            
            if ($stmtInsert->execute()) {
                // Mensagem inserida com sucesso
                echo json_encode(['status' => 'success', 'message' => 'Resposta enviada com sucesso!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Erro ao enviar a resposta.']);
            }

            $stmtInsert->close();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Chat não encontrado para este usuário.']);
        }
    }

    // Consulta para buscar todas as mensagens daquele usuário
    $sql = "SELECT c.mensagem, c.data_envio
            FROM chat_suporte c
            WHERE c.user_id = ?
            ORDER BY c.data_envio ASC";  // Ordena as mensagens pela data de envio

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->store_result();
    
    $stmt->bind_result($mensagem, $dataEnvio);
    
    $messages = [];
    while ($stmt->fetch()) {
        $messages[] = [
            'mensagem' => $mensagem,
            'data_envio' => $dataEnvio
        ];
    }

    // Retorna as mensagens no formato JSON
    echo json_encode($messages);
} else {
    echo json_encode([]);
}

$stmt->close();
$conn->close();
?>
