<?php

include("conexao.php");
session_start();


date_default_timezone_set('America/Sao_Paulo');

$message = ''; 
$usuario_id = $_SESSION['usuario_id'];


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

function emailExiste($conn, $email) {
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $num_rows = $stmt->num_rows;
    $stmt->close();
    
    return $num_rows > 0;
}

function atualizarEmailUsuario($conn, $usuario_id) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
        $novoEmail = $_POST['email'];

      
        if (emailExiste($conn, $novoEmail)) {
            global $message;
            $message = "Este e-mail já está em uso. Por favor, escolha outro.";
        } else {
            $stmt = $conn->prepare("UPDATE usuarios SET email = ? WHERE id = ?");
            $stmt->bind_param("si", $novoEmail, $usuario_id);
            $stmt->execute();
            $stmt->close();

            $_SESSION['email'] = $novoEmail;
            $message = "E-mail atualizado com sucesso.";
        }
    }
}


function obterDadosUsuario($conn, $usuario_id) {
    $stmt = $conn->prepare("SELECT nome, foto, email, data_criacao FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();
    $stmt->close();
    
   
    if (isset($usuario['data_criacao'])) {
        $usuario['data_criacao_formatada'] = date('d/m/Y', strtotime($usuario['data_criacao']));
    } else {
        $usuario['data_criacao_formatada'] = 'Data não disponível';
    }

    return $usuario;
}

function contarRespostas($conn, $usuario_id) {

    $stmt = $conn->prepare("SELECT COUNT(*) AS total_corretas FROM tentativas_usuarios WHERE id_usuario = ? AND correta = 1");
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $total_corretas = $row['total_corretas'];
    $stmt->close();


    $stmt = $conn->prepare("SELECT COUNT(*) AS total_erradas FROM tentativas_usuarios WHERE id_usuario = ? AND correta = 0");
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $total_erradas = $row['total_erradas'];
    $stmt->close();

    return ['corretas' => $total_corretas, 'erradas' => $total_erradas];
}

$contagemRespostas = contarRespostas($conn, $usuario_id);


salvarImagemPerfil($conn, $usuario_id);
atualizarNomeUsuario($conn, $usuario_id);
atualizarEmailUsuario($conn, $usuario_id);

$usuario = obterDadosUsuario($conn, $usuario_id);


?>