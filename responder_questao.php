<?php
session_start();
require_once 'conexao.php';

// Verifica se o usuário está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

// Obtém os dados do formulário
$usuario_id = $_SESSION['usuario_id'];
$questao_id = $_POST['questao_id'];
$alternativa_id = $_POST['alternativa'];
$nivel = $_POST['nivel'];  // Vamos pegar o nível da questão do formulário

// Verifica se a alternativa selecionada está correta
$stmt = $conn->prepare("SELECT correta FROM alternativas WHERE id = ?");
$stmt->bind_param("i", $alternativa_id);
$stmt->execute();
$result = $stmt->get_result();
$alternativa = $result->fetch_assoc();

$correta = $alternativa['correta'];

// Insere a tentativa na tabela tentativas_usuarios
$stmt = $conn->prepare("
    INSERT INTO tentativas_usuarios (id_usuario, id_questao, id_alternativa, correta, nivel, data_tentativa) 
    VALUES (?, ?, ?, ?, ?, NOW())
");
$stmt->bind_param("iiiis", $usuario_id, $questao_id, $alternativa_id, $correta, $nivel);
$stmt->execute();

// Fecha a conexão
$stmt->close();
$conn->close();

// Redireciona de volta à página de questões
header("Location: tarefas.php?nivel={$nivel}&pagina={$_GET['pagina']}");
exit();
?>
