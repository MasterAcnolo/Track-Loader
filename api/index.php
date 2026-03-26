<?php
$method = $_SERVER['REQUEST_METHOD'];


$fullPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$cleanPath = trim(str_replace('/Track-Loader/api', '', $fullPath), '/');
$path = '/' . $cleanPath;

switch (true) {
    case $path === "/status":
        require __DIR__ . '/routes/StatusRoutes.php';
        exit;

    case str_starts_with($path, "/user"):
        require __DIR__ . '/routes/UserRoutes.php';
        exit;

    case str_starts_with($path, "/albums"):
        require __DIR__ . '/routes/AlbumsRoutes.php';
        exit;
}

http_response_code(404);
header('Content-Type: application/json');
echo json_encode(["error" => "Route not found"]);

?>