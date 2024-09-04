<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera a resposta do usuário
    $alternativa_id = $_POST['alternativa'] ?? null;

    if ($alternativa_id) {
        // Verifica se a alternativa é correta
        $stmt = $conn->prepare("SELECT correta FROM alternativas WHERE id = ?");
        $stmt->bind_param("i", $alternativa_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $alternativa = $result->fetch_assoc();

        if ($alternativa && $alternativa['correta']) {
            $resposta = ['status' => 'success', 'message' => 'Resposta correta!'];
        } else {
            $resposta = ['status' => 'error', 'message' => 'Resposta incorreta!'];
        }

        // Retorna a resposta em formato JSON
        echo json_encode($resposta);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Nenhuma alternativa selecionada.']);
    }

    $stmt->close();
    $conn->close();
    exit();
}
?>
