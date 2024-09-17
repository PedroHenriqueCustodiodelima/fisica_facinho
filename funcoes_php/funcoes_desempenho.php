<?php
session_start();


require_once 'conexao.php';


if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}


$usuario_id = $_SESSION['usuario_id'];
$imagemPerfil = 'img/default-avatar.png';
$nomeUsuario = 'Usuário';

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
    while ($row = $result->fetch_assoc()) {
        $dados_questoes[] = $row;
    }
} else {
    $dados_questoes = null;
}

$stmt->close();
$conn->close();
?>
