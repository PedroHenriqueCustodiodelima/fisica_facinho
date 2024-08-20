<?php
// funcoes_confi.php

include("conexao.php");
session_start();

// Define o fuso horário para São Paulo (horário de Brasília)
date_default_timezone_set('America/Sao_Paulo');

$message = ''; 
$usuario_id = $_SESSION['usuario_id'];

// Função para salvar a imagem do perfil
function salvarImagemPerfil($conn, $usuario_id) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagem'])) {
        $imagem = $_FILES['imagem'];
        
        if ($imagem['error'] === UPLOAD_ERR_OK) {
            $imagemTmpName = $imagem['tmp_name'];
            $imagemNome = basename($imagem['name']);
            $imagemDestino = 'foto_usuario/' . $imagemNome;
            
            if (move_uploaded_file($imagemTmpName, $imagemDestino)) {
                $stmt = $conn->prepare("UPDATE usuarios SET foto = ? WHERE id = ?");
                $stmt->bind_param("si", $imagemDestino, $usuario_id);
                $stmt->execute();
                $stmt->close();
                
                $_SESSION['foto'] = $imagemDestino;
                return $imagemDestino;
            } else {
                global $message;
                $message = "Erro ao mover o arquivo para o diretório de uploads.";
            }
        } else {
            global $message;
            $message = "Erro no upload do arquivo.";
        }
    }
    return $_SESSION['foto'] ?? 'img/default-avatar.png';
}

// Função para atualizar o nome do usuário
function atualizarNomeUsuario($conn, $usuario_id) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'])) {
        $novoNome = $_POST['nome'];
        $stmt = $conn->prepare("UPDATE usuarios SET nome = ? WHERE id = ?");
        $stmt->bind_param("si", $novoNome, $usuario_id);
        $stmt->execute();
        $stmt->close();

        $_SESSION['nome'] = $novoNome;
    }
}

// Função para obter os dados do usuário
function obterDadosUsuario($conn, $usuario_id) {
    $stmt = $conn->prepare("SELECT nome, foto FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();
    $stmt->close();
    
    return $usuario;
}

// Executa as funções conforme a necessidade
salvarImagemPerfil($conn, $usuario_id);
atualizarNomeUsuario($conn, $usuario_id);

$usuario = obterDadosUsuario($conn, $usuario_id);

?>