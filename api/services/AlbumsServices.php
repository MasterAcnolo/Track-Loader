<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../helpers/helpers.php';

function getAlbumsServices($id = null, $genre = null, $annee = null, $artiste = null, $name = null) {
    global $pdo;
    try {
        $sql = "
            SELECT id_album, name, cover, style, tracklist, release_date, price, author_name, author_image_url
            FROM album
            WHERE 1=1
        "; // le WHERE 1 = 1 ça permet d'ajouter après des query
        $params = [];

        if ($id !== null) {
            $sql .= " AND id_album = :id";
            $params['id'] = $id;
        }
        if ($genre !== null) {
            $sql .= " AND style = :genre";
            $params['genre'] = $genre;
        }
        if ($annee !== null) {
            $sql .= " AND YEAR(release_date) = :annee";
            $params['annee'] = $annee;
        }
        if ($artiste !== null) {
            $sql .= " AND author_name LIKE :artiste";
            $params['artiste'] = "%$artiste%"; // Recherche Flou 
        }
        if ($name !== null) {
            $sql .= " AND name LIKE :name";
            $params['name'] = "%$name%";
        }

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        return $id !== null
            ? $stmt->fetch(PDO::FETCH_ASSOC)
            : $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        sendJson(500, ["error" => $e->getMessage()]);
    }
}

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