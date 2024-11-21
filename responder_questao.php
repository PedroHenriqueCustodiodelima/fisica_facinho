<?php
require_once 'conexao.php'; // Inclui a conexão com o banco

session_start();

// Verifica se é uma requisição POST para salvar a tentativa
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'responder') {
    $id_usuario = $_SESSION['id_usuario']; // Substitua pelo ID do usuário logado na sessão
    $id_questao = intval($_POST['questao_id']);
    $id_alternativa = intval($_POST['alternativa_id']);

    // Verifica se a alternativa está correta
    $query = "SELECT correta FROM alternativas WHERE id = ? AND questao_id = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("ii", $id_alternativa, $id_questao);
    $stmt->execute();
    $result = $stmt->get_result();
    $alternativa = $result->fetch_assoc();

    if ($alternativa) {
        $correta = $alternativa['correta'] == 1;

        // Salva a tentativa na tabela `tentativas_usuarios`
        $query_inserir = "INSERT INTO tentativas_usuarios (id_usuario, id_questao, id_alternativa, correta, data_tentativa) 
                          VALUES (?, ?, ?, ?, NOW())";
        $stmt_inserir = $conexao->prepare($query_inserir);
        $stmt_inserir->bind_param("iiii", $id_usuario, $id_questao, $id_alternativa, $correta);
        $stmt_inserir->execute();

        // Retorna a resposta ao usuário
        echo json_encode([
            'status' => 'success',
            'correct' => $correta,
            'message' => $correta ? 'Resposta correta!' : 'Resposta incorreta!',
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Alternativa inválida ou questão não encontrada.',
        ]);
    }
    exit;
}
?>
