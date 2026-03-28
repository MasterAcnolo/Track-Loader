<?php

function createToken($data, $config) {
    $payload = base64_encode(json_encode($data));
    $iv = random_bytes(16);
    $encrypted = openssl_encrypt($payload, 'AES-256-CBC', $config['TOKEN_KEY'], 0, $iv);
    return base64_encode($iv . $encrypted);
}

function verifyToken($token, $config) {
    $decoded = base64_decode($token);
    if (!$decoded) return false;

    $iv = substr($decoded, 0, 16);
    $encrypted = substr($decoded, 16);

    $decrypted = openssl_decrypt($encrypted, 'AES-256-CBC', $config['TOKEN_KEY'], 0, $iv);
    if (!$decrypted) return false;

    $payload = json_decode(base64_decode($decrypted), true);
    if (!$payload || !isset($payload['exp'], $payload['email'])) return false;

    if ($payload['exp'] < time()) return false;

    return $payload;
}

?>