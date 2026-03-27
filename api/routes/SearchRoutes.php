<?php
require_once __DIR__ . '/../controller/SearchController.php';

switch ($path) {
    case "/search":
        if ($method === "GET") {
            searchAlbums($_GET['q'] ?? '');
            break;
        }
        break;
    default:
        sendJson(404, ["error" => "Route inconnue"]);
}
