<?php
require __DIR__ . '/../controller/GenresController.php';
require_once __DIR__ . '/../helpers/helpers.php';

switch ($path) {
    case "/genres":
        if ($method === "GET") {
            getGenres();
            break;
        }
        break;

    default:
        sendJson(404, ["error" => "Route genre inconnue"]);
}
