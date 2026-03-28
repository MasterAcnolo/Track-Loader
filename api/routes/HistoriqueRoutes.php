<?php
require __DIR__ . '/../controller/HistoriqueController.php';

switch ($path) {
    case "/historique":
        if ($method === "GET") {
            getHistorique($config);
            break;
        }
        break;
    default:
        http_response_code(404);
        header('Content-Type: application/json');
        echo json_encode(["error" => "Route historique inconnue"]);
}