<?php

function createToken($data, $config) {
    $payload = base64_encode(json_encode($data));
    $iv = random_bytes(16);
    $encrypted = openssl_encrypt($payload, 'AES-256-CBC', $config['TOKEN_KEY'], 0, $iv);
    return base64_encode($iv . $encrypted);
}

// Déchiffrer le token et récup le payload
function verifyToken($token, $config) {
    $decoded = base64_decode($token);
    if (!$decoded || strlen($decoded) < 16) {
        notification('error', 'Token invalide ou expiré. Veuillez vous reconnecter.');
        exit;
    }

    $iv = substr($decoded, 0, 16);
    $encrypted = substr($decoded, 16);

    if (strlen($iv) !== 16) {
        notification('error', 'Token invalide ou expiré. Veuillez vous reconnecter.');
        exit;
    }

    $decrypted = openssl_decrypt($encrypted, 'AES-256-CBC', $config['TOKEN_KEY'], 0, $iv);
    if (!$decrypted) {
        notification('error', 'Token invalide ou expiré. Veuillez vous reconnecter.');
        exit;
    }

    $payload = json_decode(base64_decode($decrypted), true);
    if (!$payload || !isset($payload['exp'], $payload['email'])) {
        notification('error', 'Token invalide ou expiré. Veuillez vous reconnecter.');
        exit;
    }

    if ($payload['exp'] < time()) {
        notification('error', 'Session expirée. Veuillez vous reconnecter.');
        exit;
    }

    return $payload;
}

?>