<?php
session_start();

require_once __DIR__ . '/../conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

$imagemPerfil = 'img/default-avatar.png'; 
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

date_default_timezone_set('America/Sao_Paulo');

// Carregar questões do banco de dados
$sql = "SELECT id, enunciado, resolucao, video, ano, materia, concurso FROM questoes WHERE concurso = 'ENEM'";
$result = $conn->query($sql);

$feedback = '';
$mensagem_feedback = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['resposta'])) {
    $id_usuario = $_SESSION['usuario_id'];
    $id_questao = $_POST['id_questao'];
    $id_resposta = $_POST['resposta']; 
    $data_tentativa = date('Y-m-d H:i:s'); 

    // Verificar se a alternativa correta existe
    $stmt = $conn->prepare("SELECT id FROM alternativas_concurso WHERE id_questao = ? AND correta = 1 LIMIT 1");
    $stmt->bind_param("i", $id_questao);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id_correta);
        $stmt->fetch();

        // Verificar se a resposta do usuário corresponde à correta
        $correta_usuario = ($id_resposta == $id_correta) ? 1 : 0;

        // Inserir a tentativa no banco de dados
        $stmt_insert = $conn->prepare("INSERT INTO tentativas_concursos (id_usuario, id_questao, id_alternativa, data_tentativa, correta) VALUES (?, ?, ?, ?, ?)");
        $stmt_insert->bind_param("iiisi", $id_usuario, $id_questao, $id_resposta, $data_tentativa, $correta_usuario);

        if ($stmt_insert->execute()) {
            $response = [
                "status" => $correta_usuario == 1 ? "success" : "error",
                "message" => $correta_usuario == 1 ? "Parabéns! Você acertou!" : "Que pena, você errou. Tente novamente!",
            ];
            echo json_encode($response);
            exit;
        } else {
            echo json_encode(["status" => "error", "message" => "Houve um erro ao salvar sua tentativa. Tente novamente."]);
            exit;
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Alternativa correta não encontrada. Tente novamente."]);
        exit;
    }
}

$stmt->close();
?>