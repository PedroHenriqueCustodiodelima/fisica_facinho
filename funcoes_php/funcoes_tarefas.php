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

// Consulta para obter a foto e o nome do usuário
$stmt = $conn->prepare("SELECT foto, nome FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

// Atualiza as variáveis com base no resultado da consulta
if ($usuario) {
    $imagemPerfil = $usuario['foto'] ?? $imagemPerfil;
    $nomeUsuario = $usuario['nome'] ?? $nomeUsuario;
}

// Consulta para obter a questão, alternativas e explicação
$questao_sql = "SELECT id, enunciado, explicacao FROM questoes LIMIT 1";
$questao_result = $conn->query($questao_sql);

$questao_data = [];
if ($questao_result->num_rows > 0) {
    $questao = $questao_result->fetch_assoc();
    $questao_id = $questao['id'];
    $enunciado = $questao['enunciado'];
    $explicacao = $questao['explicacao'];
    
    // Consulta para pegar as alternativas da questão
    $alternativas_sql = "SELECT id, texto, correta FROM alternativas WHERE questao_id = $questao_id";
    $alternativas_result = $conn->query($alternativas_sql);
    
    // Armazena dados da questão e alternativas
    $questao_data['enunciado'] = $enunciado;
    $questao_data['explicacao'] = $explicacao;
    $questao_data['alternativas'] = [];
    
    while ($alternativa = $alternativas_result->fetch_assoc()) {
        $questao_data['alternativas'][] = $alternativa;
    }
}

// Fecha a conexão
$stmt->close();
$conn->close();

// Retorna os dados
return [
    'imagemPerfil' => $imagemPerfil,
    'nomeUsuario' => $nomeUsuario,
    'questao_data' => $questao_data
];
