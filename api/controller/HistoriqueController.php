<?php
require_once __DIR__ . '/../services/HistoriqueServices.php';
require_once __DIR__ . '/../helpers/helpers.php';
require_once __DIR__ . '/../utils/TokenUtils.php';

function getHistorique($config) {
    $token = $_SESSION['token'] ?? $_COOKIE['token'] ?? null;
    if (!$token) {
        sendJson(401, ["error" => "Non authentifié"]);
        exit;
    }

    $payload = verifyToken($token, $config);
    if (!$payload) {
        sendJson(401, ["error" => "Token invalide"]);
        exit;
    }

    require_once __DIR__ . '/../services/UserService.php';
    $user = getUserByEmailService($payload['email']);
    if (!$user) {
        sendJson(404, ["error" => "Utilisateur introuvable"]);
        exit;
    }

    $historique = getHistoriqueService($user['id_user']);

    if (isset($historique['error'])) {
        sendJson(500, ["error" => $historique['error']]);
        exit;
    }

    sendJson(200, ["historique" => $historique]);
}