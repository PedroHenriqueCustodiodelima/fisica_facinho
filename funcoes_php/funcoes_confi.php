<?php

include("conexao.php");
session_start();

date_default_timezone_set('America/Sao_Paulo');

$message = ''; 
$usuario_id = $_SESSION['usuario_id'];

$sucesso = ''; 
$erroEmail = ''; 


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
    return $_SESSION['foto'] ?? 'img/usuario_perfil.png';
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

// Função para verificar se o e-mail já existe
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
        $novoEmail = trim($_POST['email']);


        $stmt = $conn->prepare("SELECT email FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        $stmt->bind_result($emailAtual);
        $stmt->fetch();
        $stmt->close();

        // Verificar se o novo e-mail é o mesmo que o atual
        if ($novoEmail === $emailAtual) {
            global $sucesso;
            $sucesso = "Dados atualizados com sucesso.";
        } else {
            // Verificar se o e-mail contém "@gmail.com"
            if (strpos($novoEmail, '@gmail.com') === false) {
                global $erroEmail;
                $erroEmail = "O e-mail deve ser do domínio @gmail.com.";
            } elseif (emailExiste($conn, $novoEmail)) {
                global $erroEmail;
                $erroEmail = "Este e-mail já está em uso. Por favor, escolha outro.";
            } else {
                // Atualizar o e-mail no banco de dados
                $stmt = $conn->prepare("UPDATE usuarios SET email = ? WHERE id = ?");
                $stmt->bind_param("si", $novoEmail, $usuario_id);
                $stmt->execute();
                $stmt->close();

                $_SESSION['email'] = $novoEmail;
                global $sucesso;
                $sucesso = "E-mail atualizado com sucesso.";
            }
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

salvarImagemPerfil($conn, $usuario_id);
atualizarNomeUsuario($conn, $usuario_id);
atualizarEmailUsuario($conn, $usuario_id);

$usuario = obterDadosUsuario($conn, $usuario_id);

if (!isset($usuario)) {
    header('Location: login.php');
    exit();
}
$dadosAtualizados = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['imagem'])) {
        $imagem = $_FILES['imagem'];
        $destino = 'caminho_para_salvar_imagem/' . basename($imagem['name']);

        if ($imagem['size'] <= 5000000 && in_array($imagem['type'], ['image/jpeg', 'image/png', 'image/gif'])) {
            if (move_uploaded_file($imagem['tmp_name'], $destino)) {
                $usuario['foto'] = $destino; 
            }
        }
    }
    $usuario['nome'] = $_POST['nome'] ?? $usuario['nome'];
    $usuario['email'] = $_POST['email'] ?? $usuario['email'];
    $dadosAtualizados = true;
}
$dadosAtualizados = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erroEmail = 'E-mail inválido.';
        } elseif (strpos($email, '@gmail.com') === false) {
            $erroEmail = 'O e-mail deve ser @gmail.com.';
        } else {
            $dadosAtualizados = true;
        }
    }
}

?>
