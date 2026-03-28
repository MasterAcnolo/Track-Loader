<?php
require __DIR__ . '/../controller/PanierController.php';

switch ($path) {
    case "/panier":
        if ($method === "GET") {
            getPanier($config);
            break;
        }
        break;
    case "/panier/checkout":
        if ($method === "POST") {
            checkout($config);
            break;
        }
        break;
    case (preg_match('/^\/panier\/(\d+)$/', $path, $matches) ? $path : false): // Panier/:ID

        $id_album = (int)$matches[1];

        if ($method === "POST") {
            addToPanier($config, $id_album);
            break;
        }
        if ($method === "DELETE") {
            removeFromPanier($config, $id_album);
            break;
        }
        break;
    default:
        http_response_code(404);
        header('Content-Type: application/json');
        echo json_encode(["error" => "Route panier inconnue"]);
}