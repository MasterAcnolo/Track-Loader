<?php
require_once __DIR__ . '/../services/GenresServices.php';
require_once __DIR__ . '/../helpers/helpers.php';

function getGenres() {
    $genres = getGenresServices();

    if (!$genres) {
        sendJson(404, ["error" => "Aucun genre trouvé"]);
        return;
    }

    // On retourne juste la liste des styles uniques
    $uniqueGenres = array_map(function($row) { return $row['style']; }, $genres);

    sendJson(200, $uniqueGenres);
}

function getAlbumsByGenre($genre) {
    $albums = getGenresServices($genre);

    if (!$albums) {
        sendJson(404, ["error" => "Aucun album trouvé pour ce genre"]);
        return;
    }

    // Transformer tracklist en dico
    for ($i = 0; $i < count($albums); $i++) {
        if (!empty($albums[$i]['tracklist'])) {
            $tracks = json_decode($albums[$i]['tracklist'], true);
            if (is_array($tracks)) {
                $newTracks = [];
                foreach ($tracks as $index => $track) {
                    $newTracks[$index + 1] = $track;
                }
                $albums[$i]['tracklist'] = $newTracks;
            }
        }
    }

    sendJson(200, $albums);
}
