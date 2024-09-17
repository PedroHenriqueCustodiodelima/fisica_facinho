<?php
require_once 'vendor/autoload.php'; 

$client = new Google_Client(['client_id' => '795836589716-3avdsmk6r53a0sed11kh6jujj667ho1v.apps.googleusercontent.com']);
$id_token = $_POST['id_token']; 

try {
    $payload = $client->verifyIdToken($id_token);
    if ($payload) {
        $userId = $payload['sub'];
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false]);
}
?>
