<?php
require __DIR__ . '/../controller/GenresController.php';

switch ($path) {
    case "/genres":
        if ($method === "GET") {
            getGenres();
            break;
        }
        break;

    default:
        // /api/genre/LEGENRE
        if ($method === "GET" && preg_match('#^/genres/(.+)$#', $path, $matches)) {
            getAlbumsByGenre(urldecode($matches[1]));
            break;
        }

        http_response_code(404);
        header('Content-Type: application/json');
        echo json_encode(["error" => "Route genre inconnue"]);
}
