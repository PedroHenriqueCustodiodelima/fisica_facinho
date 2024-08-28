<?php
require_once 'vendor/autoload.php'; // Certifique-se de que o autoload do Composer está configurado

$client = new Google_Client(['client_id' => '795836589716-3avdsmk6r53a0sed11kh6jujj667ho1v.apps.googleusercontent.com']);
$id_token = $_POST['id_token']; // Este deve ser o token enviado pelo cliente

try {
    $payload = $client->verifyIdToken($id_token);
    if ($payload) {
        // Token válido
        $userId = $payload['sub'];
        // Você pode buscar o usuário no banco de dados e fazer o login aqui
        echo json_encode(['success' => true]);
    } else {
        // Token inválido
        echo json_encode(['success' => false]);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false]);
}
?>
