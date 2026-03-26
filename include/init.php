<?php
session_start();
require_once __DIR__ . '/../api/utils/TokenUtils.php';
$config = require __DIR__ . '/../api/.env.php';
checkAndLoadSession($config);

function checkAndLoadSession($config) {
    if (!isset($_COOKIE['token'])) return false;

    $data = verifyToken($_COOKIE['token'], $config);

    if (!$data) {
        setcookie('token', '', time() - 3600, '/');
        session_unset();
        session_destroy();
        return false;
    }

    $_SESSION['user'] = $data;
    return true;
}