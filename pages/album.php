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
 
        <!-- Fond flou dynamique basé sur la cover -->
        <div class="album-hero-bg" style="background-image: url('<?= htmlspecialchars($album['cover']) ?>')"></div>
 
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
 
    
 
<?php endif; ?>
 
<?php include '../include/footer.php'; ?>
</body>
</html>