<?php

namespace app\library;

use Google_Client;
use Google_Service_Oauth2;

class GoogleClient
{
    private $client;

    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setClientId('795836589716-3avdsmk6r53a0sed11kh6jujj667ho1v.apps.googleusercontent.com');
        $this->client->setClientSecret('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');
        $this->client->setRedirectUri('http://localhost:3006');
        $this->client->addScope('email');
        $this->client->addScope('profile');
    }

    public function init()
    {
        if (isset($_GET['code'])) {
            $this->client->fetchAccessTokenWithAuthCode($_GET['code']);
            $_SESSION['access_token'] = $this->client->getAccessToken();
            header('Location: ' . filter_var($this->client->getRedirectUri(), FILTER_SANITIZE_URL));
            exit();
        }

        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
        }
    }

    public function authorized()
    {
        return $this->client->getAccessToken() !== null;
    }

    public function getData()
    {
        $oauth = new Google_Service_Oauth2($this->client);
        return $oauth->userinfo->get();
    }

    public function generateAuthLink()
    {
        return $this->client->createAuthUrl();
    }
}
