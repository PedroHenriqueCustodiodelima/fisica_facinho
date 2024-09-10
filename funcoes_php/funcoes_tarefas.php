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

// Obtém o nível do filtro, se definido
$nivel = isset($_GET['nivel']) ? intval($_GET['nivel']) : 1;

// Define a tabela com base no nível
switch ($nivel) {
    case 1:
        $tabela = 'questoes_nivel1';
        break;
    case 2:
        $tabela = 'questoes_nivel2';
        break;
    case 3:
        $tabela = 'questoes_nivel3';
        break;
    default:
        $tabela = 'questoes_nivel1';
}

// Define o número de questões por página
$questoes_por_pagina = 3;

// Obtém o número da página atual
$pagina_atual = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
$pagina_atual = ($pagina_atual > 0) ? $pagina_atual : 1;

// Calcula o offset
$offset = ($pagina_atual - 1) * $questoes_por_pagina;

// Consulta para obter o número total de questões
$total_questoes_sql = "SELECT COUNT(*) AS total FROM $tabela";
$total_questoes_result = $conn->query($total_questoes_sql);
$total_questoes_row = $total_questoes_result->fetch_assoc();
$total_questoes = $total_questoes_row['total'];

// Consulta para obter as questões e suas alternativas para a página atual
$questao_sql = "SELECT id, enunciado, explicacao FROM $tabela LIMIT $offset, $questoes_por_pagina";
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

// Calcula o número total de páginas
$total_paginas = ceil($total_questoes / $questoes_por_pagina);

// Retorna os dados
return [
    'imagemPerfil' => $imagemPerfil,
    'nomeUsuario' => $nomeUsuario,
    'questoes_data' => $questoes_data,  // Agora estamos retornando todas as questões
    'pagina_atual' => $pagina_atual,
    'total_paginas' => $total_paginas
];
?>
