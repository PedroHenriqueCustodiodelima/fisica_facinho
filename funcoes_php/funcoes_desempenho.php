<?php
session_start();

// Inclui o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Verifica se o usuário está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

// Recupera o ID do usuário da sessão
$usuario_id = $_SESSION['usuario_id'];
$imagemPerfil = 'img/default-avatar.png';
$nomeUsuario = 'Usuário';

// Consulta para buscar o total de tentativas, acertos e erros por questão
$query = "
    SELECT 
        id_questao,
        COUNT(*) AS total_tentativas,
        SUM(CASE WHEN correta = 1 THEN 1 ELSE 0 END) AS total_acertos,
        SUM(CASE WHEN correta = 0 THEN 1 ELSE 0 END) AS total_erros
    FROM 
        tentativas_usuarios
    WHERE 
        id_usuario = ?
    GROUP BY 
        id_questao;
";

$stmt = $conn->prepare($query);
$stmt->bind_param('i', $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

$dados_questoes = [];
if ($result->num_rows > 0) {
    // Armazena todas as questões em um array
    while ($row = $result->fetch_assoc()) {
        $dados_questoes[] = $row;
    }
} else {
    $dados_questoes = null;
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>
