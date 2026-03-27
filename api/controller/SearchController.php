<?php

require_once __DIR__ . '/../services/SearchServices.php';
require_once __DIR__ . '/../helpers/helpers.php';

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
    $result = [];

    foreach ($albums as $album) {
        $result[] = formatTracklist($album);
    }

    sendJson(200, $result);
}

?>