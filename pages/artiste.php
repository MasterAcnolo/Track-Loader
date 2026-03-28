<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($_GET['artist']) ? htmlspecialchars($_GET['artist']) : 'Artiste' ?> - TrackLoader</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/pages.css">
    <link rel="icon" type="image/webp" href="../assets/icon/icon.webp">
</head>
<body>
    <?php include '../include/header.php'; ?>

    <?php
        $artistName  = isset($_GET['artist']) ? trim($_GET['artist']) : '';
        $artistLabel = htmlspecialchars($artistName);

        $albums = [];
        if ($artistName) {
            $response = @file_get_contents(BASE_URL . '/api/albums?artiste=' . urlencode($artistName));
            if ($response !== false) {
                $albums = json_decode($response, true);
            }
        }

        // Invalide si pas de nom dans l'URL ou aucun album retourné
        $isInvalid = empty($artistName) || empty($albums) || !is_array($albums);
    ?>

   <section class="artist-section">
        <div class="container">

            <?php if ($isInvalid): ?>

                <div class="empty-state">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    <h3>Artiste introuvable</h3>
                    <p>L'artiste demandé n'existe pas ou aucun album n'est disponible.</p>
                    <a href="./artiste.php" class="btn btn-primary">Retour aux artistes</a>
                </div>

            <?php else: ?>

                <section class="artist-header artist-photo--<?= strtolower( str_replace(' ', '-', $artistLabel)) ?>">
                    <div class="artist-header-content">
                        <h1 class="artist-name"><?= $artistLabel ?></h1>
                        <p class="artist-album-count">
                            <?= count($albums) ?> album<?= count($albums) > 1 ? 's' : '' ?>
                        </p>
                    </div>
                </section>

                <section class="featured-albums">

                    <div class="container">

                        <h2 class="section-title">Albums de <?= $artistLabel ?></h2>
                        <div class="albums-grid">

                            <?php foreach ($albums as $album) : ?>

                                <a href="./album.php?id=<?= htmlspecialchars($album['id_album']) ?>" class="album-card">

                                    <img src="<?= htmlspecialchars($album['cover']) ?>" alt="<?= htmlspecialchars($album['name']) ?>" class="album-cover">

                                    <div class="album-info">
                                        
                                        <h3 class="album-title"><?= htmlspecialchars($album['name']) ?></h3>
                                        <p class="album-artist"><?= htmlspecialchars($album['author_name']) ?></p>
                                        <div class="album-details">

                                            <span class="album-price"><?= htmlspecialchars($album['price']) ?> €</span>
                                            <span class="album-genre"><?= htmlspecialchars($album['style']) ?></span>

                                        </div>
                                    </div>
                                    
                                </a>

                            <?php endforeach; ?>
                            
                        </div>

                    </div>

                </section>

            <?php endif; ?>

        </div>
    </section>

    <?php include '../include/footer.php'; ?>
</body>
</html>