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

$stmt->close();

// Verifica se já existe uma questão e sua data de criação
if (!isset($_SESSION['questao_id']) || !isset($_SESSION['data_criacao'])) {
    $stmt = $conn->prepare("SELECT * FROM questoes ORDER BY RAND() LIMIT 1");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $questao = $result->fetch_assoc();
        $_SESSION['questao_id'] = $questao['id'];
        $_SESSION['data_criacao'] = (new DateTime())->format('Y-m-d H:i:s');
    } else {
        echo "Nenhuma questão encontrada!";
        exit();
    }
} else {
    $stmt = $conn->prepare("SELECT * FROM questoes WHERE id = ?");
    $stmt->bind_param("i", $_SESSION['questao_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $questao = $result->fetch_assoc();
        $now = new DateTime();
        $dataCriacao = new DateTime($_SESSION['data_criacao']);
        $interval = $now->diff($dataCriacao);
        // Se a questão estiver mais de 24 horas na sessão, seleciona uma nova questão
        if ($interval->h >= 24) {
            $stmt = $conn->prepare("SELECT * FROM questoes ORDER BY RAND() LIMIT 1");
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $questao = $result->fetch_assoc();
                $_SESSION['questao_id'] = $questao['id'];
                $_SESSION['data_criacao'] = $now->format('Y-m-d H:i:s');
            } else {
                echo "Nenhuma questão encontrada!";
                exit();
            }
        }
    } else {
        echo "Nenhuma questão encontrada!";
        exit();
    }
}

// Recupera as alternativas para a questão
$stmt = $conn->prepare("SELECT * FROM alternativas_concurso WHERE id_questao = ?");
$stmt->bind_param("i", $questao['id']);
$stmt->execute();
$alternativas_result = $stmt->get_result();
$alternativas = [];

while ($alternativa = $alternativas_result->fetch_assoc()) {
    $alternativas[] = $alternativa;
}

$stmt->close();

// Variáveis de feedback
$feedback = '';
$imagemCabecalho = 'img/cara.png'; // Imagem por padrão para erro

// Lógica de verificação de resposta
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alternativa_usuario = $_POST['alternativa'] ?? null;
    $id_questao = $_POST['id_questao'] ?? null;

    if ($alternativa_usuario && $id_questao) {
        $stmt = $conn->prepare("SELECT correta FROM alternativas_concurso WHERE id = ? AND id_questao = ?");
        $stmt->bind_param("ii", $alternativa_usuario, $id_questao);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $alternativa = $result->fetch_assoc();
            $correta = $alternativa['correta'];

            if ($correta == 1) {
                $feedback = "Você acertou a questão!";
                $imagemCabecalho = 'img/cara.png'; // Imagem para quando o usuário acerta
            } else {
                $feedback = "Você errou a questão. Tente novamente!";
                $imagemCabecalho = 'img/triste.png';
            }
        } else {
            $feedback = "Questão ou alternativa inválida.";
        }

        $stmt->close();
    } else {
        $feedback = "Resposta ou questão inválida.";
    }
}
?>