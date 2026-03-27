<?php

require_once __DIR__ . '/../config/database.php'
;
function getAlbumsServices($id = null) {
    global $pdo;

    try {
        if ($id !== null) {
            
            $stmt = $pdo->prepare("
                SELECT id_album, name, cover, style, tracklist, release_date, price, author_name, author_image_url
                FROM album
                WHERE id_album = :id
            ");

            $stmt->execute(['id' => $id]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        $stmt = $pdo->prepare("
            SELECT id_album, name, cover, style, tracklist, release_date, price, author_name, author_image_url
            FROM album
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