<?php
if (!isset($_GET['id'])) {

    $album = null;

} else {
    $albumId = (int)$_GET['id'];
    $apiUrl = "http://localhost/Track-Loader/api/albums/$albumId";
    $response = @file_get_contents($apiUrl); // @ pour éviter warning si 404

    if ($response === false) {
        $album = null;
    } else {
        $album = json_decode($response, true);
        if (!$album) $album = null;
    }
}

// Préparer la tracklist
$tracklist = [];
if ($album && !empty($album['tracklist']) && is_array($album['tracklist'])) {
    $tracklist = $album['tracklist'];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $album ? htmlspecialchars($album['name']) : 'Album introuvable' ?> - TrackLoader</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/pages.css">
    <link rel="icon" type="image/webp" href="../assets/icon/icon.webp">
</head>
<body>
<?php include '../include/header.php'; ?>

<section class="album-detail-section">
    <div class="container">

        <?php if (!$album): ?>

            <div class="empty-state">

                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
                </svg>

                <h2>Album introuvable</h2>
                <p>Cet album n'existe pas ou a été supprimé</p>
                <a href="../index.php" class="btn btn-primary">Retour à la liste des albums</a>
                
            </div>

        <?php else: ?>

            <div class="album-detail-grid">

                <div class="album-detail-cover-container">
                    <img class="album-detail-cover" src="<?= htmlspecialchars($album['cover']) ?>" alt="<?= htmlspecialchars($album['name']) ?>">
                </div>

                <div class="album-detail-info">

                    <h1 class="album-detail-title"><?= htmlspecialchars($album['name']) ?></h1> 

                    <span><?= date('Y', strtotime($album['release_date'])) ?></span>

                    <h2 class="album-detail-artist"><?= htmlspecialchars($album['author_name']) ?></h2>

                    <span class="badge badge-primary album-genre"><?= htmlspecialchars($album['style']) ?></span>

                    <div class="album-actions-bottom">

                        <div class="album-price-large album-price-nomargin"><?= number_format($album['price'], 2) ?> €</div>
                        <form action="/php/add-to-cart.php" method="POST" class="album-cart-form">

                            <input type="hidden" name="album_id" value="<?= $album['id_album'] ?>">

                            <button type="submit" class="btn btn-primary btn-cart">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                Ajouter au panier
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="tracklist" style="margin-top: 3rem;">
                <h3>Liste des pistes</h3>
                <div class="track-list">
                    <?php foreach ($tracklist as $num => $title): ?>
                        <div class="track-item">
                            <span class="track-number"><?= $num ?></span>
                            <span class="track-title"><?= htmlspecialchars($title) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</section>

<?php include '../include/footer.php'; ?>
</body>
</html>