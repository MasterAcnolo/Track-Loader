<?php
require __DIR__ . '/../controller/UserController.php';

switch ($path) {
    case "/user/register":
        if ($method === "POST") {
            createUser($config);
            break;
        }
        break;

    case "/user/logout":
        if ($method === "GET") {
            logoutUser();
            break;
        }
        break;

    default:
        http_response_code(404);
        echo json_encode(["error" => "Route user inconnue"]);
}