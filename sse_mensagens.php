<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

require_once __DIR__ . '/conexao.php';

$user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : null;

if ($user_id) {
    // Prepara a consulta SQL para capturar mensagens incrementais por usuário
    $query = "SELECT mensagens.mensagem, mensagens.remetente, mensagens.data_envio 
              FROM chat_suporte AS mensagens 
              WHERE mensagens.user_id = ? 
              ORDER BY mensagens.data_envio ASC";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $user_id);
    
    // Executa a consulta e aguarda por novas mensagens
    $stmt->execute();
    
    // Obter o ID da última mensagem enviada
    $lastMessageId = 0;
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $lastMessageId = $row['id'];  // Atualiza o ID da última mensagem
        echo "data: " . json_encode($row) . "\n\n";
        ob_flush();  // Limpa o buffer de saída
        flush();  // Envia os dados para o cliente
    }

    // Aguarda por novas mensagens sem intervalo fixo
    while (true) {
        // Ajuste para evitar consultas constantes
        $query = "SELECT mensagens.mensagem, mensagens.remetente, mensagens.data_envio 
                  FROM chat_suporte AS mensagens 
                  WHERE mensagens.user_id = ? AND mensagens.id > ?
                  ORDER BY mensagens.data_envio ASC";

        $stmt = $conn->prepare($query);
        $stmt->bind_param('ii', $user_id, $lastMessageId);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $lastMessageId = $row['id'];  // Atualiza o ID da última mensagem
            echo "data: " . json_encode($row) . "\n\n";
            ob_flush();  // Limpa o buffer de saída
            flush();  // Envia os dados para o cliente
        }

        // Aguarda por um tempo antes de tentar novamente
        sleep(1);  // Ajuste para o tempo que faz sentido para o fluxo
    }
}
?>
