<?php
require_once __DIR__ . '/../services/AlbumsServices.php';

function getAlbums() {
    $albums = getAlbumsServices();

    if (!$albums) {
        
        http_response_code(500);
        echo json_encode(["error" => "Erreur serveur ou aucun album trouvé"]);
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

    header('Content-Type: application/json');
    echo json_encode($albums);
}

?>