<?php
session_start();
require_once 'conexao.php'; // Inclua seu arquivo de conexão com o banco de dados

// Verifique se a conexão foi bem estabelecida
if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Falha na conexão com o banco de dados: ' . $conn->connect_error]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['chat_id']) && isset($_POST['resposta'])) {
    $chatId = $_POST['chat_id'];
    $resposta = $_POST['resposta'];

    // Verifique se os dados não estão vazios
    if (empty($chatId) || empty($resposta)) {
        echo json_encode(['status' => 'error', 'message' => 'Chat ID ou resposta estão vazios.']);
        exit;
    }

    // Preparar a consulta SQL
    $sqlResposta = "INSERT INTO respostas_suporte (chat_id, resposta, data_resposta) VALUES (?, ?, NOW())";
    $stmtResposta = $conn->prepare($sqlResposta);

    // Verifique se a preparação falhou
    if ($stmtResposta === false) {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao preparar a consulta SQL: ' . $conn->error]);
        exit;
    }

    // Vincular os parâmetros
    if (!$stmtResposta->bind_param("is", $chatId, $resposta)) {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao vincular os parâmetros: ' . $stmtResposta->error]);
        exit;
    }

    // Execute a consulta SQL
    if ($stmtResposta->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Resposta enviada com sucesso!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao executar a consulta SQL: ' . $stmtResposta->error]);
    }

    $stmtResposta->close();
}

$conn->close();
?>
