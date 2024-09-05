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
// Consulta para obter todas as questões e suas alternativas
$questao_sql = "SELECT id, enunciado, explicacao FROM questoes_nivel1";
$questao_result = $conn->query($questao_sql);

$questoes_data = [];  // Inicializa um array para armazenar todas as questões

if ($questao_result->num_rows > 0) {
    // Itera sobre todas as questões
    while ($questao = $questao_result->fetch_assoc()) {
        $questao_id = $questao['id'];
        $enunciado = $questao['enunciado'];
        $explicacao = $questao['explicacao'];

        // Consulta para pegar as alternativas de cada questão
        $alternativas_sql = "SELECT id, texto, correta FROM alternativas WHERE questao_id = $questao_id";
        $alternativas_result = $conn->query($alternativas_sql);

        // Armazena os dados de cada questão e suas alternativas
        $questao_data = [
            'enunciado' => $enunciado,
            'explicacao' => $explicacao,
            'alternativas' => []
        ];

        while ($alternativa = $alternativas_result->fetch_assoc()) {
            $questao_data['alternativas'][] = $alternativa;
        }

        // Adiciona a questão e suas alternativas ao array de todas as questões
        $questoes_data[] = $questao_data;
    }
}

// Fecha a conexão
$stmt->close();
$conn->close();

// Retorna os dados
return [
    'imagemPerfil' => $imagemPerfil,
    'nomeUsuario' => $nomeUsuario,
    'questoes_data' => $questoes_data  // Agora estamos retornando todas as questões
];

