<?php
require_once __DIR__ . '/../init.php';

if (!isset($_GET['id'])) {

    $album = null;

} else {
    $albumId = (int) $_GET['id'];
    $response = @file_get_contents(BASE_URL . "/api/albums/$albumId"); // @ pour éviter warning si 404

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

$artistAlbums = [];
if ($album && !empty($album['author_name'])) {
    $artistResponse = @file_get_contents(BASE_URL . '/api/albums?artiste=' . urlencode($album['author_name']));
    if ($artistResponse !== false) {
        $allArtistAlbums = json_decode($artistResponse, true);
        if (is_array($allArtistAlbums)) {
            // Exclure l'album courant
            $artistAlbums = array_filter($allArtistAlbums, fn($a) => $a['id_album'] !== $album['id_album']);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $album ? htmlspecialchars($album['name']) : 'Album introuvable' ?> - <?= $album ? htmlspecialchars($album['author_name']) : '' ?></title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/pages.css">
    <link rel="icon" type="image/webp" href="../assets/icon/icon.webp">
</head>
<body>

<?php include '../include/header.php'; ?>
<?php include '../include/notif.php'; ?>

<div style="position: relative; overflow: hidden;">

    <div class="album-hero-bg" style="background-image: url('<?= htmlspecialchars($album['cover']) ?>')"></div>

    <?php if (!$album): ?>
    
            <div class="container">
                <div class="empty-state">
    
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
                    </svg>
    
                    <h2>Album introuvable</h2>
                    <p>Cet album n'existe pas ou a été supprimé</p>
                    <a href="../index.php" class="btn btn-primary">Retour à la liste des albums</a>
    
                </div>
            </div>
    
    <?php else: ?>
 
        <section class="album-hero">
    
            <div class="container">
                <div class="album-detail-grid">
    
                    <!-- Pochette nette -->
                    <div class="album-detail-cover-container">
                        <img
                            class="album-detail-cover"
                            src="<?= htmlspecialchars($album['cover']) ?>"
                            alt="<?= htmlspecialchars($album['name']) ?>"
                        >
                    </div>
    
                    <!-- Infos album -->
                    <div class="album-detail-info">
    
                        <div style="display: flex; align-items: baseline; gap: 10px;" >
                            <h1 class="album-detail-title"><?= htmlspecialchars($album['name']) ?></h1>
                            <span class="album-year"><?= date('Y', strtotime($album['release_date'])) ?></span>
                        </div>
    
                        <h2 class="album-detail-artist">
                            <a href="artiste.php?artist=<?= urlencode($album['author_name']) ?>">
                                <?= htmlspecialchars($album['author_name']) ?>
                            </a>
                        </h2>
    
                        <a href="genre.php?genre=<?= urlencode($album['style']) ?>" class="badge badge-primary album-genre">
                            <?= htmlspecialchars($album['style']) ?>
                        </a>
    
                        <div class="album-actions-bottom">
    
                            <div class="album-price-large album-price-nomargin">
                                <?= number_format($album['price'], 2) ?> €
                            </div>
    
                            <form action="<?php echo BASE_URL . '/api/panier/' . $album['id_album'] ?>" method="POST" class="album-cart-form">

                                <button type="submit" class="btn btn-primary btn-cart">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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
            </div>

            <div class="container">

                <div class="tracklist-glass">

                    <div class="tracklist-header">
                        <span>Tracklist</span>
                        <span class="track-count"><?= count($tracklist) ?> pistes</span>
                    </div>

                    <?php foreach ($tracklist as $num => $title): ?>

                        <div class="track-item">

                            <span class="track-number"><?= $num ?></span>

                            <div class="track-dot">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                    stroke="rgba(255,255,255,0.3)" stroke-width="2">
                                    <circle cx="12" cy="12" r="4"/>
                                </svg>
                            </div>
                            
                            <span class="track-title"><?= htmlspecialchars($title) ?></span>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

        </section>
 
        <?php if (!empty($artistAlbums)): ?>

            <section class="artist-albums-section">
                <div class="container">

                    <h2 class="artist-albums-title">
                        Autres albums de
                        <a href="artiste.php?artist=<?= urlencode($album['author_name']) ?>">
                            <?= htmlspecialchars($album['author_name']) ?>
                        </a>
                    </h2>

                    <div class="albums-grid">
                        <?php foreach ($artistAlbums as $a): ?>
                            <a href="album.php?id=<?= $a['id_album'] ?>" class="album-card">

                                <img
                                    src="<?= htmlspecialchars($a['cover']) ?>"
                                    alt="<?= htmlspecialchars($a['name']) ?>"
                                    class="album-cover"
                                    loading="lazy"
                                >

                                <div class="album-info">
                                    <h3 class="album-title"><?= htmlspecialchars($a['name']) ?></h3>
                                    <p class="album-artist"><?= htmlspecialchars($a['author_name']) ?></p>
                                    <div class="album-details">
                                        <span class="album-price"><?= number_format($a['price'], 2) ?> €</span>
                                        <span class="album-genre"><?= htmlspecialchars($a['style']) ?></span>
                                    </div>
                                </div>

                            </a>
                        <?php endforeach; ?>
                    </div>

                </div>
            </section>

        <?php endif; ?>
    
 
    <?php endif; ?>
 
</div>
<?php include '../include/footer.php'; ?>
</body>
</html>