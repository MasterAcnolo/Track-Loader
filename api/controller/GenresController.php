<?php
require_once __DIR__ . '/../services/GenresServices.php';

function getGenres() {
    $genres = getGenresServices();

    if (!$genres) {
        http_response_code(404);
        header('Content-Type: application/json');
        echo json_encode(["error" => "Aucun genre trouvé"]);
        return;
    }

    // On retourne juste la liste des styles uniques
    $uniqueGenres = array_map(function($row) { return $row['style']; }, $genres);

    http_response_code(200);
    header('Content-Type: application/json');
    echo json_encode($uniqueGenres);
}

function getAlbumsByGenre($genre) {
    $albums = getGenresServices($genre);

    if (!$albums) {
        http_response_code(404);
        header('Content-Type: application/json');
        echo json_encode(["error" => "Aucun album trouvé pour ce genre"]);
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

    http_response_code(200);
    header('Content-Type: application/json');
    echo json_encode($albums);
}
