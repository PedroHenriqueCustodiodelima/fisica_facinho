<?php


require_once __DIR__ . '/../conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

$imagemPerfil = 'img/usuario_perfil.png'; // Imagem padrão
$nomeUsuario = 'Usuário';

$stmt = $conn->prepare("SELECT email FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$email = $result->fetch_assoc()['email'] ?? '';

if (strpos($email, 'edu.br') !== false) {
    $stmt = $conn->prepare("SELECT foto, nome, imagem FROM professores WHERE id = ?");
} else {
    $stmt = $conn->prepare("SELECT foto, nome, imagem FROM usuarios WHERE id = ?");
}

$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

if ($usuario) {
    // Se a foto estiver vazia, usa a imagem padrão
    $imagemPerfil = !empty($usuario['foto']) ? $usuario['foto'] : $usuario['imagem'] ?? $imagemPerfil;
    $nomeUsuario = $usuario['nome'] ?? $nomeUsuario;
}

$stmt->close();
?>
