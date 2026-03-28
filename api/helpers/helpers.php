<?php
// Helpers pour l'API Albums
function formatTracklist($album) {
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
    return $album;
}

function sendJson($code, $data) {
    http_response_code($code);
    header('Content-Type: application/json');
    echo json_encode($data);
}
