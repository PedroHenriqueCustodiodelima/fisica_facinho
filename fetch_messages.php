<?php
require_once __DIR__ . '/./conexao.php';

date_default_timezone_set('America/Sao_Paulo');  // Fuso horário para Brasília

if (isset($_GET['user_id'])) {
    $user_id = intval($_GET['user_id']);  // ID do usuário para quem a conversa é filtrada
    
    $query = "SELECT * FROM chat_suporte WHERE user_id = ? ORDER BY data_envio DESC";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $mensagens = [];
    while ($row = $result->fetch_assoc()) {
        $mensagens[] = $row;
    }
    
    echo json_encode($mensagens);  // Retorna as mensagens em JSON para o AJAX
}
?>
