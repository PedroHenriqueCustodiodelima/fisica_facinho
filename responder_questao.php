<?php
session_start();
require_once('../conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $questao_id = $_POST['questao_id'];
    $alternativa_id = $_POST['alternativa'];

    // Verifica se a resposta está correta
    $sql = "SELECT correta FROM alternativas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $alternativa_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $alternativa = $result->fetch_assoc();

    if ($alternativa && $alternativa['correta'] == 1) {
        // Resposta correta
        $_SESSION['resultado'] = 'acertou';
        echo 'acertou';
    } else {
        // Resposta incorreta
        $_SESSION['resultado'] = 'errou';
        echo 'errou';
    }
}
?>
