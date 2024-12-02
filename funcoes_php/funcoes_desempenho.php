<?php
session_start();

require_once 'conexao.php';

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
    $stmt = $conn->prepare("SELECT foto, nome FROM professores WHERE id = ?");
} else {
    $stmt = $conn->prepare("SELECT foto, nome FROM usuarios WHERE id = ?");
}

$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

if ($usuario) {
    $imagemPerfil = $usuario['foto'] ?? $imagemPerfil;
    $nomeUsuario = $usuario['nome'] ?? $nomeUsuario;
}
setlocale(LC_TIME, 'pt_BR.UTF-8', 'pt_BR');
$query = "
    SELECT 
        DATE_FORMAT(data_tentativa, '%Y-%m') AS mes_ano,  -- Formata como 'YYYY-MM'
        COUNT(*) AS total_tentativas,  -- Conta o total de tentativas
        SUM(CASE WHEN correta = 1 THEN 1 ELSE 0 END) AS total_acertos,  -- Conta os acertos
        SUM(CASE WHEN correta = 0 THEN 1 ELSE 0 END) AS total_erros  -- Conta os erros
    FROM 
        tentativas_usuarios
    WHERE 
        id_usuario = ?
    GROUP BY 
        mes_ano
    ORDER BY 
        mes_ano;
";

$stmt = $conn->prepare($query);
$stmt->bind_param('i', $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

$dados_questoes = [];
if ($result->num_rows > 0) {
    $anoAtual = date("Y");

    while ($row = $result->fetch_assoc()) {
        if (substr($row['mes_ano'], 0, 4) == $anoAtual) {
            $data = DateTime::createFromFormat('Y-m', $row['mes_ano']);
            $row['mes_ano'] = strftime('%B', $data->getTimestamp()); 
            $dados_questoes[] = $row;
        }
    }
} else {
    $dados_questoes = [
        [
            'mes_ano' => 'Nenhum dado',  
            'total_tentativas' => 0,
            'total_acertos' => 0,
            'total_erros' => 0
        ]
    ];
}

$stmt->close();
$conn->close();
?>
