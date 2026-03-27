<?php
require_once __DIR__ . '/../helpers/helpers.php';
require_once __DIR__ . '/../services/ArtistServices.php';

function getArtist() {
    $artist = getArtistServices();

    if (!$artist) {
        sendJson(404, ["error" => "Aucun artist trouvé"]);
        return;
    }

    // On retourne juste la liste des artist uniques
    $uniqueArtist = array_map(function($row) { return $row['author_name']; }, $artist);

    sendJson(200, $uniqueArtist);
}
?>