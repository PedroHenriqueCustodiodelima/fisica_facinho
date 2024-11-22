<?php
session_start();

require_once __DIR__ . '/../conexao.php';


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

$stmt->close();
?>
