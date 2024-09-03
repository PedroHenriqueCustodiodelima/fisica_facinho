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

// Inicializa variáveis
$imagemPerfil = 'img/default-avatar.png';
$nomeUsuario = 'Usuário';

// Primeiro, buscamos o e-mail do usuário para determinar se é um professor ou um usuário
$stmt = $conn->prepare("SELECT email FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$email = $result->fetch_assoc()['email'] ?? '';

if (strpos($email, 'edu.br') !== false) {
    // O e-mail contém "edu.br", então é um professor
    $stmt = $conn->prepare("SELECT foto, nome FROM professores WHERE id = ?");
} else {
    // O e-mail não contém "edu.br", então é um usuário
    $stmt = $conn->prepare("SELECT foto, nome FROM usuarios WHERE id = ?");
}

$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

// Atualiza as variáveis com base no resultado da consulta
if ($usuario) {
    $imagemPerfil = $usuario['foto'] ?? $imagemPerfil;
    $nomeUsuario = $usuario['nome'] ?? $nomeUsuario;
}

// Fecha a conexão
$stmt->close();
?>
