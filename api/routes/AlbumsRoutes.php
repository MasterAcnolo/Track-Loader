<?php
require __DIR__ . '/../controller/AlbumsController.php';

switch ($path) {
    case "/albums":
        if ($method === "GET") {
            getAlbums();
            break;
        }
        break;

    case "/albums/search": // TODO
        if ($method === "GET") {
            searchAlbums($_GET['q'] ?? '');
            break;
        }
        break;

    default:
        // /api/albums/ID
        if ($method === "GET" && preg_match('#^/albums/(\d+)$#', $path, $matches)) {
            getAlbumById($matches[1]);
            break;
        }

        http_response_code(404);
        header('Content-Type: application/json');
        echo json_encode(["error" => "Route inconnue"]);
}

?>