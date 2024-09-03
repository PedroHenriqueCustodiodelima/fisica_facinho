<?php
session_start();


require_once 'conexao.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['password']; 

 
    $stmt = $conn->prepare("SELECT id, nome FROM usuarios WHERE email = ? AND senha = ?");
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
     
        $stmt->bind_result($usuarioId, $nome);
        $stmt->fetch();
        
       
        $token = bin2hex(random_bytes(16));
        $ipUsuario = $_SERVER['REMOTE_ADDR'];
        $navegador = $_SERVER['HTTP_USER_AGENT'];

        
        $stmt = $conn->prepare("INSERT INTO sessoes (id_usuario, token_sessao, data_inicio, ip_address, user_agent) VALUES (?, ?, NOW(), ?, ?)");
        $stmt->bind_param("isss", $usuarioId, $token, $ipUsuario, $navegador);
        $stmt->execute();
        $sessionId = $stmt->insert_id; 
        $stmt->close();
        
    
        $_SESSION['usuario_id'] = $usuarioId;
        $_SESSION['session_id'] = $sessionId;
        $_SESSION['nome'] = $nome; 
        
  
        header("Location: inicio.php");
        exit();
    } else {
  
        $stmt = $conn->prepare("SELECT id, nome FROM professores WHERE email = ? AND senha = ?");
        $stmt->bind_param("ss", $email, $senha);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {

            $stmt->bind_result($usuarioId, $nome);
            $stmt->fetch();
            
            $token = bin2hex(random_bytes(16));
            $ipUsuario = $_SERVER['REMOTE_ADDR'];
            $navegador = $_SERVER['HTTP_USER_AGENT'];

            $stmt = $conn->prepare("INSERT INTO sessoes (id_usuario, token_sessao, data_inicio, ip_address, user_agent) VALUES (?, ?, NOW(), ?, ?)");
            $stmt->bind_param("isss", $usuarioId, $token, $ipUsuario, $navegador);
            $stmt->execute();
            $sessionId = $stmt->insert_id; 
            $stmt->close();
            
            $_SESSION['usuario_id'] = $usuarioId;
            $_SESSION['session_id'] = $sessionId;
            $_SESSION['nome'] = $nome; 
            header("Location: inicio.php");
            exit();
        } else {
            $_SESSION['loginErro'] = "Email ou senha inválidos.";
            header("Location: login.php"); 
            exit();
        }
    }
}
?>
