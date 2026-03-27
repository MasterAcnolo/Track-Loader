<?php
require_once __DIR__ . '/../services/AlbumsServices.php';

// ALBUMS
function getAlbums() {
    $albums = getAlbumsServices();

    if (!$albums) {
        http_response_code(404);
        header('Content-Type: application/json');
        notification("error","Erreur serveur ou aucun album trouvé");
        echo json_encode(["error" => "Aucun album trouvé"]);
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

function getAlbumById($id) {
    $album = getAlbumsServices($id);

    if (!$album) {
        http_response_code(404);
        header('Content-Type: application/json');
        echo json_encode(["error" => "Album introuvable"]);
        return;
    }

    if (!empty($album['tracklist'])) {
        $tracks = json_decode($album['tracklist'], true);

        if (is_array($tracks)) {
            $newTracks = [];

            foreach ($tracks as $index => $track) {
                $newTracks[$index + 1] = $track;
            }

            $album['tracklist'] = $newTracks;
        }
    }

    http_response_code(200);
    header('Content-Type: application/json');
    echo json_encode($album);
}

?>