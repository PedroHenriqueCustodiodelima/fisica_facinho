<?php
require_once __DIR__ . '/./conexao.php';

// Verifica se o parâmetro 'user_id' foi enviado via POST
if (isset($_POST['user_id'])) {
    $userId = (int)$_POST['user_id'];  // Convertendo o user_id para inteiro

    // Consulta para obter mensagens e o nome do usuário associado ao user_id
    $queryMessages = "SELECT usuarios.nome, chat_suporte.mensagem, chat_suporte.data_envio 
                      FROM chat_suporte 
                      INNER JOIN usuarios ON chat_suporte.user_id = usuarios.id 
                      WHERE chat_suporte.user_id = ? 
                      ORDER BY chat_suporte.data_envio ASC";  // Ordena por data de envio

    $stmtMessages = $conn->prepare($queryMessages);
    $stmtMessages->bind_param("i", $userId);  // Bind do user_id como inteiro
    $stmtMessages->execute();
    $resultMessages = $stmtMessages->get_result();

    if ($resultMessages->num_rows > 0):
        $response = "";
        while ($rowMessages = $resultMessages->fetch_assoc()):
            $response .= "<p><strong>" . $rowMessages['nome'] . " - " . date('d/m/Y H:i', strtotime($rowMessages['data_envio'])) . ":</strong> " . $rowMessages['mensagem'] . "</p>";
        endwhile;
        echo $response;
    else:
        echo "<p class='text-muted'>Nenhuma mensagem encontrada.</p>";
    endif;

    $stmtMessages->close();  // Fechando a conexão do statement
} else {
    echo "Usuário não encontrado.";
}
?>
