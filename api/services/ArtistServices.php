<?php
require_once __DIR__ . '/../config/database.php';


function getArtistServices() {
    global $pdo;

    try {

        // api/artist
        $stmt = $pdo->prepare("
            SELECT DISTINCT author_name
            FROM album
            WHERE author_name IS NOT NULL
            ORDER BY author_name ASC;
        ");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        http_response_code(500);
        header('Content-Type: application/json');
        echo json_encode(["error" => $e->getMessage()]);
    }
}
?>