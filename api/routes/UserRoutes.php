<?php
require __DIR__ . '/../controller/UserController.php';

switch ($path) {
    case "/user/register":
        if ($method === "POST") {
            createUser($config);
            break;
        }
        break;

    case "/user/login":
        if ($method === "POST") {
            loginUser($config);
            break;
        }
        break;

    case "/user/logout":
        if ($method === "GET") {
            logoutUser();
            break;
        }
        break;

    case "/user/delete":
        if ($method === "DELETE") {
            deleteUser();
            break;
        }
        break;

    default:
        sendJson(404, ["error" => "Route user inconnue"]);
}