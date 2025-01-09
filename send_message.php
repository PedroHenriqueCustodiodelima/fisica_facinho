<?php
require_once __DIR__ . '/./conexao.php';

// Ajuste de fuso horário para Brasília
date_default_timezone_set('America/Sao_Paulo');

if (isset($_POST['mensagem']) && isset($_POST['user_id']) && isset($_POST['remetente'])) {
    $mensagem = $_POST['mensagem'];
    $userId = intval($_POST['user_id']);  // ID do destinatário
    $remetente = intval($_POST['remetente']);  // ID do remetente (precisamos garantir que está correto)

    // Salva o horário atual considerando o fuso horário do Brasil
    $data_envio = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
    $data_envio_formatado = $data_envio->format('Y-m-d H:i:s');

    // Grava a mensagem no banco de dados para o remetente correto
    $query = "INSERT INTO chat_suporte (user_id, mensagem, remetente, data_envio) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isis", $userId, $mensagem, $remetente, $data_envio_formatado);

    if ($stmt->execute()) {
        echo 'Mensagem enviada com sucesso!';
    } else {
        echo 'Erro ao enviar a mensagem.';
    }
}
?>
