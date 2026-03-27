<?php

require_once __DIR__ . '/../config/database.php';

function getGenresServices($genres = null) {
    global $pdo;

    try {
        
        // api/genres
        if ($genres !== null) {
            
            $stmt = $pdo->prepare("
                SELECT id_album, name, cover, style, tracklist, release_date, price, author_name, author_image_url
                FROM album
                WHERE style = :genres
            ");

            $stmt->execute(['genres' => $genres]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // api/genres
        $stmt = $pdo->prepare("
            SELECT DISTINCT style
            FROM album
            WHERE style IS NOT NULL;
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