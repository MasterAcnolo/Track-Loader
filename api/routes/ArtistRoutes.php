<?php
require __DIR__ . '/../controller/ArtistController.php';
require_once __DIR__ . '/../helpers/helpers.php';

switch ($path) {
    case "/artist":
        if ($method === "GET") {
            getArtist();
            break;
        }
        break;

    default:
        sendJson(404, ["error" => "Route genre inconnue"]);
}
