<?php

require_once __DIR__ . '/../services/AlbumsServices.php';
require_once __DIR__ . '/../helpers/helpers.php';

// ALBUMS
function getAlbums() {

    $allowed = ['genre', 'annee', 'artiste', 'name'];
    $unknown = array_diff(array_keys($_GET), $allowed); // Unknown contient tous les params non autorisé. Array_keys c'est pour récupérer touts les paramètresreçu dans l'URL.
    if (count($unknown) > 0) {
        sendJson(400, ["error" => "Bad Request : " . implode(', ', $unknown)]);
        return;
    }

    $genre = isset($_GET['genre']) ? trim($_GET['genre']) : null;
    $annee = isset($_GET['annee']) ? trim($_GET['annee']) : null;
    $artiste = isset($_GET['artiste']) ? trim($_GET['artiste']) : null;
    $name = isset($_GET['name']) ? trim($_GET['name']) : null;

    $albums = getAlbumsServices(genre: $genre, annee: $annee, artiste: $artiste, name: $name);

    if (!$albums) {
        sendJson(404, ["error" => "Aucun album trouvé"]);
        return;
    }

    $result = [];

    foreach ($albums as $album) {
        $result[] = formatTracklist($album);
    }

    sendJson(200, $result);
}

function getAlbumById($id) {
    $album = getAlbumsServices(id: $id);

    if (!$album) {
        sendJson(404, ["error" => "Album introuvable"]);
        return;
    }

    sendJson(200, formatTracklist($album));
}

function getTrendingAlbums() {
    // IDs d'albums en tendance
    $trendingIds = [1, 2, 14, 18]; // Hybrid THeory - MEteora - HOPE - The Eminem Show
    $albums = [];
    foreach ($trendingIds as $id) {
        $album = getAlbumsServices(id: $id);
        if ($album) {
            $albums[] = formatTracklist($album);
        }
    }
    sendJson(200, $albums);
}
?>