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

$stmt = $conn->prepare("SELECT email FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$email = $result->fetch_assoc()['email'] ?? '';

if (strpos($email, 'edu.br') !== false) {
    $stmt = $conn->prepare("SELECT foto, nome FROM professores WHERE id = ?");
} else {
    $stmt = $conn->prepare("SELECT foto, nome FROM usuarios WHERE id = ?");
}

$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

if ($usuario) {
    $imagemPerfil = $usuario['foto'] ?? $imagemPerfil;
    $nomeUsuario = $usuario['nome'] ?? $nomeUsuario;
}
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