<?php
require_once __DIR__ . '/helpers/helpers.php';

$method = $_SERVER['REQUEST_METHOD'];

$fullPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$cleanPath = trim(str_replace('/Track-Loader/api', '', $fullPath), '/');
$path = '/' . $cleanPath;

if ($method === 'POST' && ($_POST['_method'] ?? '') === 'DELETE') {
    $method = 'DELETE';
}

switch (true) {
    case $path === "/status":
        require __DIR__ . '/routes/StatusRoutes.php';
        exit;

    case str_starts_with($path, "/user"):
        require __DIR__ . '/routes/UserRoutes.php';
        exit;

    case str_starts_with($path, "/albums"):
        require __DIR__ . '/routes/AlbumsRoutes.php';
        exit;

    case str_starts_with($path, "/genre"):
        require __DIR__ . '/routes/GenresRoutes.php';
        exit;

    case str_starts_with($path, "/artist"):
        require __DIR__ . '/routes/ArtistRoutes.php';
        exit;

    case str_starts_with($path, "/search"):
        require __DIR__ . '/routes/SearchRoutes.php';
        exit;

    case str_starts_with($path, "/panier"):
        require __DIR__ . '/routes/PanierRoutes.php';
        exit;

    case str_starts_with($path, "/historique"):
        require __DIR__ . '/routes/HistoriqueRoutes.php';
        exit;
}

sendJson(404, ["error" => "Route not found"]);

?>