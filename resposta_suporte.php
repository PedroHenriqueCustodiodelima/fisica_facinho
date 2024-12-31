<?php
session_start();
require_once 'conexao.php'; // Inclua seu arquivo de conexão com o banco de dados

// Verifique se a conexão foi bem estabelecida
if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Falha na conexão com o banco de dados: ' . $conn->connect_error]);
    exit;
}

// Verifica se os dados foram enviados pelo método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['chat_id']) && isset($_POST['resposta'])) {
    $chatId = $_POST['chat_id'];
    $resposta = $_POST['resposta'];

    // Verificação do status do chat (por exemplo, se está ativo ou não)
    $statusChat = "ativo"; // Exemplo de status. Isso pode vir de uma variável POST ou ser consultado no banco.

    // Validação: Verifica se os campos não estão vazios
    if (empty($chatId) || empty($resposta)) {
        echo json_encode(['status' => 'error', 'message' => 'Chat ID ou resposta estão vazios.']);
        exit;
    }

    // Consulta SQL para inserir a resposta
    $sqlResposta = "INSERT INTO respostas_suporte (chat_id, resposta, data_resposta, status_chat) VALUES (?, ?, NOW(), ?)";
    $stmtResposta = $conn->prepare($sqlResposta);

    // Verifica se a preparação da consulta falhou
    if ($stmtResposta === false) {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao preparar a consulta SQL: ' . $conn->error]);
        exit;
    }

    // Vincula os parâmetros
    if (!$stmtResposta->bind_param("iss", $chatId, $resposta, $statusChat)) {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao vincular os parâmetros: ' . $stmtResposta->error]);
        exit;
    }

    // Executa a consulta SQL
    if ($stmtResposta->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Resposta enviada com sucesso!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao executar a consulta SQL: ' . $stmtResposta->error]);
    }

    // Fecha o statement
    $stmtResposta->close();
}

// Fecha a conexão com o banco
$conn->close();
?>
