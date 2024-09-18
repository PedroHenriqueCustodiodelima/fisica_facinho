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


// Função para obter os dados das missões
function obterDadosMissoes($conn, $usuario_id) {
    $query = "
        SELECT 
            COUNT(*) AS total_tentativas,
            SUM(CASE WHEN correta = 1 THEN 1 ELSE 0 END) AS total_acertos,
            SUM(CASE WHEN correta = 0 THEN 1 ELSE 0 END) AS total_erros
        FROM 
            tentativas_usuarios
        WHERE 
            id_usuario = ?
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $dados = $result->fetch_assoc();
    $stmt->close();

    return $dados;
}

// Obter dados das missões
$dadosMissoes = obterDadosMissoes($conn, $usuario_id);
?>