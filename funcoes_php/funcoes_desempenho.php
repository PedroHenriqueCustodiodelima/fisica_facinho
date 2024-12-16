<?php
session_start();

require_once __DIR__ . '/../conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

$imagemPerfil = 'img/usuario_perfil.png'; 
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
    $imagemPerfil = !empty($usuario['foto']) ? $usuario['foto'] : $usuario['imagem'] ?? $imagemPerfil;
    $nomeUsuario = $usuario['nome'] ?? $nomeUsuario;
}

function contarRespostas($usuario_id, $conn) {
    $stmt = $conn->prepare("
        SELECT COUNT(*) AS corretas
        FROM (
            SELECT correta FROM tentativas_usuarios WHERE id_usuario = ? AND correta = 1
            UNION ALL
            SELECT correta FROM tentativas_concursos WHERE id_usuario = ? AND correta = 1
        ) AS respostas_corretas
    ");
    $stmt->bind_param("ii", $usuario_id, $usuario_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $corretas = $result->fetch_assoc()['corretas'];
    $stmt->close();
    $stmt = $conn->prepare("
        SELECT COUNT(*) AS erradas
        FROM (
            SELECT correta FROM tentativas_usuarios WHERE id_usuario = ? AND correta = 0
            UNION ALL
            SELECT correta FROM tentativas_concursos WHERE id_usuario = ? AND correta = 0
        ) AS respostas_erradas
    ");
    $stmt->bind_param("ii", $usuario_id, $usuario_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $erradas = $result->fetch_assoc()['erradas'];
    $stmt->close();

    return [
        'corretas' => $corretas,
        'erradas' => $erradas
    ];
}


$respostas = contarRespostas($usuario_id, $conn);
$total = $respostas['corretas'] + $respostas['erradas'];
$percentualAcerto = $total > 0 ? round(($respostas['corretas'] / $total) * 100, 1) : 0;

function contarTentativasPorDia($usuario_id, $conn) {
    $diasSemana = array_fill(0, 7, 0); 

    $stmt = $conn->prepare("
        SELECT DAYOFWEEK(data_tentativa) AS dia_semana, COUNT(*) AS tentativas
        FROM (
            -- Contagem de tentativas na tabela tentativas_usuarios
            SELECT data_tentativa FROM tentativas_usuarios
            WHERE id_usuario = ?
            UNION ALL
            -- Contagem de tentativas na tabela tentativas_concursos
            SELECT data_tentativa FROM tentativas_concursos
            WHERE id_usuario = ?
        ) AS tentativas_totais
        GROUP BY dia_semana
        ORDER BY dia_semana
    ");

    if ($stmt === false) {
        die('Erro na preparação da consulta: ' . $conn->error);
    }
    $stmt->bind_param("ii", $usuario_id, $usuario_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $diasSemana[$row['dia_semana'] - 1] = $row['tentativas']; 
    }

    $totalTentativas = array_sum($diasSemana); 
    $diasComTentativas = count(array_filter($diasSemana, fn($d) => $d > 0)); 
    $mediaDiaria = $diasComTentativas > 0 ? round($totalTentativas / $diasComTentativas, 1) : 0;

    $stmt->close();

    return [
        'diasSemana' => $diasSemana,
        'mediaDiaria' => $mediaDiaria
    ];
}


function contarAcertosPorHora($usuario_id, $conn) {
    $acertosPorHora = array_fill(0, 24, 0);

    $stmt = $conn->prepare("
        SELECT HOUR(data_tentativa) AS hora, COUNT(*) AS acertos
        FROM (
            -- Contagem de acertos na tabela tentativas_usuarios
            SELECT data_tentativa FROM tentativas_usuarios
            WHERE id_usuario = ? AND correta = 1
            UNION ALL
            -- Contagem de acertos na tabela tentativas_concursos
            SELECT data_tentativa FROM tentativas_concursos
            WHERE id_usuario = ? AND correta = 1
        ) AS acertos_totais
        GROUP BY hora
        ORDER BY hora
    ");

    if ($stmt === false) {
        die('Erro na preparação da consulta: ' . $conn->error);
    }

    $stmt->bind_param("ii", $usuario_id, $usuario_id); 
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $acertosPorHora[$row['hora']] = $row['acertos'];
    }

    $stmt->close();

    return $acertosPorHora;
}

function calcularMediaAcertosPorHora($acertosPorHora) {
    $totalAcertos = array_sum($acertosPorHora);
    $mediaAcertosPorHora = $totalAcertos / 24;

    return $mediaAcertosPorHora;
}


function contarTentativasPorConcurso($usuario_id, $conn) {
    $stmt = $conn->prepare("
        SELECT q.concurso, COUNT(tc.id) AS tentativas
        FROM tentativas_concursos tc
        JOIN questoes q ON tc.id_questao = q.id
        WHERE tc.id_usuario = ?
        GROUP BY q.concurso
        ORDER BY q.concurso
    ");

    if ($stmt === false) {
        die('Erro na preparação da consulta: ' . $conn->error);
    }

    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    
    if ($stmt->error) {
        die('Erro na execução da consulta: ' . $stmt->error);
    }

    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        return []; 
    }

    $tentativasPorConcurso = [];
    while ($row = $result->fetch_assoc()) {
        $tentativasPorConcurso[$row['concurso']] = $row['tentativas'];
    }

    $stmt->close();

    return $tentativasPorConcurso;
}

function ultimas10Questoes($usuario_id, $conn) {
    $stmt = $conn->prepare("
        SELECT q.id, tc.correta, tc.data_tentativa
        FROM tentativas_concursos tc
        JOIN questoes q ON tc.id_questao = q.id
        WHERE tc.id_usuario = ?
        ORDER BY tc.data_tentativa DESC
        LIMIT 10
    ");

    if ($stmt === false) {
        die('Erro na preparação da consulta: ' . $conn->error);
    }
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();

    if ($stmt->error) {
        die('Erro na execução da consulta: ' . $stmt->error);
    }

    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        return []; 
    }

    $ultimasQuestoes = [];
    while ($row = $result->fetch_assoc()) {
        $correta = $row['correta'] == 1 ? 'Certa' : 'Errada'; 
        $ultimasQuestoes[] = [
            'id' => $row['id'],
            'correta' => $correta,
        ];
    }
    $stmt->close();

    return $ultimasQuestoes;
}

$stmt->close();
?>
