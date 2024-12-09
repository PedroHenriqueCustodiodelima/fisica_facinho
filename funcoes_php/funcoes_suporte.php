<?php
session_start();

require_once __DIR__ . '/../conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

$imagemPerfil = 'img/default-avatar.png'; // Imagem padrão
$nomeUsuario = 'Usuário';

$stmt = $conn->prepare("SELECT email FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $usuario_id);  // Usar $usuario_id para pegar o email do usuário
$stmt->execute();
$result = $stmt->get_result();
$email = $result->fetch_assoc()['email'] ?? '';

if (strpos($email, 'edu.br') !== false) {
    $stmt = $conn->prepare("SELECT foto, nome, imagem FROM professores WHERE id = ?");
} else {
    $stmt = $conn->prepare("SELECT foto, nome, imagem FROM usuarios WHERE id = ?");
}

$stmt->bind_param("i", $usuario_id);  // Continuar usando o $usuario_id
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

if ($usuario) {
    $imagemPerfil = !empty($usuario['foto']) ? $usuario['foto'] : $usuario['imagem'] ?? $imagemPerfil;
    $nomeUsuario = $usuario['nome'] ?? $nomeUsuario;
}

$sucesso = '';
$erro = '';

// Processamento do envio da mensagem
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $mensagem = $_POST['mensagem'];

  // Validação simples dos campos
  if (!empty($mensagem)) {
      // Buscar o email do usuário na tabela 'usuarios'
      $sql_email = "SELECT email FROM usuarios WHERE id = ?";
      if ($stmt = $conn->prepare($sql_email)) {
          $stmt->bind_param("i", $usuario_id);
          if ($stmt->execute()) {
              $stmt->store_result();
              $stmt->bind_result($email_usuario);

              if ($stmt->fetch()) {
                  // Prepara a consulta SQL para inserir os dados no banco de dados
                  $sql = "INSERT INTO mensagens_suporte (id_usuario, nome, email, mensagem) VALUES (?, ?, ?, ?)";
                  if ($stmt_insert = $conn->prepare($sql)) {
                      $stmt_insert->bind_param("isss", $usuario_id, $nomeUsuario, $email_usuario, $mensagem);
                      if ($stmt_insert->execute()) {
                          // Sucesso ao enviar a mensagem
                          $sucesso = "Sua mensagem foi enviada com sucesso!";
                          // Redirecionar após o envio para evitar reenvio ao atualizar a página
                          header("Location: " . $_SERVER['PHP_SELF'] . "?sucesso=1");
                          exit();
                      } else {
                          $erro = "Erro ao salvar a mensagem. Tente novamente mais tarde.";
                      }
                      $stmt_insert->close();
                  } else {
                      $erro = "Erro na preparação da consulta. Tente novamente mais tarde.";
                  }
              } else {
                  $erro = "Não foi possível recuperar o email do usuário.";
              }
              $stmt->close();
          } else {
              $erro = "Erro ao recuperar o email do usuário.";
          }
      } else {
          $erro = "Erro na preparação da consulta para buscar o email. Tente novamente mais tarde.";
      }
  } else {
      $erro = "Por favor, preencha todos os campos.";
  }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>