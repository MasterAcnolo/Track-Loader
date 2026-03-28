<?php
session_start();

$config = require __DIR__ . '/api/config/config.php';
require_once __DIR__ . '/api/utils/TokenUtils.php';
include __DIR__ . '/include/notif.php';


checkAndLoadSession($config);

function checkAndLoadSession($config) {

    $token = $_COOKIE['token'] ?? $_SESSION['token'] ?? null;

    if (!$token) {
        return false;
    }

    $data = verifyToken($token, $config);

    if (!$data) {
        setcookie('token', '', time() - 3600, '/');

        unset($_SESSION['token']);
        unset($_SESSION['user']);

        session_destroy();

        return false;
    }

    $_SESSION['token'] = $token;
    $_SESSION['user'] = $data;

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