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

$query = "
    SELECT 
        u.id AS usuario_id, 
        u.nome AS usuario_nome, 
        u.foto AS usuario_foto,
        COUNT(DISTINCT tu.id_questao) AS total_acertos
    FROM 
        usuarios AS u
    LEFT JOIN 
        tentativas_usuarios AS tu ON u.id = tu.id_usuario AND tu.correta = 1
    GROUP BY 
        u.id
    ORDER BY 
        total_acertos DESC;
";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$ranking = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $ranking[] = $row;
    }
}

$usuarioPosicao = null;
foreach ($ranking as $index => $usuario) {
    if ($usuario['usuario_id'] == $usuario_id) {
        $usuarioPosicao = $index + 1; 
        break;
    }
}
if ($usuarioPosicao !== null) {
    echo "O usuário está no ranking na posição $usuarioPosicao com {$ranking[$usuarioPosicao - 1]['total_acertos']} pontos.";
} else {
    echo "O usuário não está no ranking, mas você pode buscar os pontos diretamente.";
}


$stmt->close();
$conn->close();
?>
