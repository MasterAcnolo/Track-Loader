<?php

$envPath = __DIR__ . '/../.env';

if (!file_exists($envPath)) {
    die("Fichier .env introuvable : $envPath");
}

$config = parse_ini_file($envPath);

if ($config === false) {
    die("Erreur lecture du .env");
}

if (!defined('BASE_URL') && isset($config['BASE_URL'])) {
    define('BASE_URL', $config['BASE_URL']);
}

return $config;

?>