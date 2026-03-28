<?php
require_once __DIR__ . '/../config/database.php';

// Recherche globale sur nom ou artiste
function searchAlbumsByNameOrArtist($query) {
    global $pdo;
    try {

        $words = array_filter(explode(' ', trim($query)));
        if (empty($words)) return [];

        $conditions = [];
        $params = [];

        foreach ($words as $index => $word) {
            // Pour chaque mot, on veut qu'il apparaisse dans le nom de l'album OU de l'artiste
            // :word0, :word1... sont des noms uniques pour éviter les conflits PDO
            $conditions[] = "(name LIKE :word$index OR author_name LIKE :word$index)";
            $params["word$index"] = "%$word%"; // le mot
        }

        // implode(' AND ', ...) colle les conditions avec AND :
        // WHERE (... LIKE :word0 ...) AND (... LIKE :word1 ...)
        $stmt = $pdo->prepare(
            "SELECT id_album, name, cover, style, tracklist, release_date, price, author_name, author_image_url 
            FROM album WHERE " . implode(' AND ', $conditions) . " ORDER BY name"
        );

        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        sendJson(500, ["error" => $e->getMessage()]);
    }
}

?>