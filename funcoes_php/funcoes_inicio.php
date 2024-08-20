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

// Recupera o caminho da imagem de perfil do banco de dados
$stmt = $conn->prepare("SELECT foto FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();
$imagemPerfil = $usuario['foto'] ?? 'img/default-avatar.png'; // Caminho da imagem padrão se não houver imagem

// Fecha a conexão
$stmt->close();
?>