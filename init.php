<?php
session_start();

$config = require __DIR__ . '/api/config/config.php';
require_once __DIR__ . '/api/utils/TokenUtils.php';
require_once __DIR__ . '/api/services/UserService.php'; 

include __DIR__ . '/include/notif.php';


checkAndLoadSession($config);

function checkAndLoadSession($config) {

    $token = $_COOKIE['token'] ?? $_SESSION['token'] ?? null;
    if (!$token) return false;

    $data = verifyToken($token, $config);
    if (!$data) {
        setcookie('token', '', time() - 3600, '/');
        unset($_SESSION['token']);
        unset($_SESSION['user']);
        session_destroy();
        return false;
    }

    // Si user déjà en session avec id_user, pas besoin de retaper la DB
    if (isset($_SESSION['user']['id_user'])) return true;

    // Sinon on va chercher l'id_user en DB
    $user = getUserByEmailService($data['email']);
    if (!$user) return false;

    $_SESSION['token'] = $token;
    $_SESSION['user'] = [
        'id_user' => $user['id_user'],
        'email'   => $data['email']
    ];

    return true;
}

function notification($type, $message) {
    $allowed = ['success', 'error'];

    if (!in_array($type, $allowed)) {
        $type = 'success';
    }

    $_SESSION['flash'] = [
        'type' => $type,
        'message' => $message
    ];
}