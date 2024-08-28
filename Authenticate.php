<?php

namespace app\library;

class Authenticate
{
    public function authGoogle($userData)
    {
        $_SESSION['auth'] = true;
        $_SESSION['user'] = $userData;
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: ' . filter_var('http://localhost:3006/login.php', FILTER_SANITIZE_URL));
        exit();
    }
}
?>
