<?php
require __DIR__ . '/../controller/AlbumsController.php';

switch ($path) {
    case "/albums":
        if ($method === "GET") {
            getAlbums();
            break;
        }
        break;

    default:
        http_response_code(404);
        echo json_encode(["error" => "Route user inconnue"]);
}