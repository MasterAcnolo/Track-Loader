<?php
require_once __DIR__ . '/../config/database.php';

// Recherche globale sur nom ou artiste
function searchAlbumsByNameOrArtist($query) {
    global $pdo;
    try {
        $sql = "SELECT id_album, name, cover, style, tracklist, release_date, price, author_name, author_image_url FROM album WHERE name LIKE :q OR author_name LIKE :q ORDER BY name";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['q' => "%$query%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        sendJson(500, ["error" => $e->getMessage()]);
    }
}

?>