<?php

require_once __DIR__ . '/../config/database.php';

function getAlbumsServices() {
    global $pdo;

    try {
        $stmt = $pdo->prepare("
            SELECT id_album, name, cover, style, tracklist, release_date, price, author_name, author_image_url 
            FROM album
        ");
        $stmt->execute();

        $albums = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$albums) {
            http_response_code(404);
            echo json_encode(["message" => "Aucun album trouvé"]);
            return;
        }

        return $albums;

    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["error" => $e->getMessage()]);
    }
}

?>