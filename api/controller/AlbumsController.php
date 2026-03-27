<?php

require_once __DIR__ . '/../services/AlbumsServices.php';
require_once __DIR__ . '/../helpers/helpers.php';

// ALBUMS
function getAlbums() {

    $allowed = ['genre', 'annee', 'artiste', 'name'];
    $unknown = array_diff(array_keys($_GET), $allowed);
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

    $albums = array_map('formatTracklist', $albums);
    sendJson(200, $albums);
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

// Recherche globale sur nom ou artiste
function searchAlbums($query) {
    $q = trim($query);
    if ($q === '') {
        sendJson(400, ["error" => "Paramètre 'q' requis"]);
        return;
    }
    $albums = searchAlbumsByNameOrArtist($q);
    if (!$albums) {
        sendJson(404, ["error" => "Aucun album trouvé"]);
        return;
    }
    $albums = array_map('formatTracklist', $albums);
    sendJson(200, $albums);
}
?>