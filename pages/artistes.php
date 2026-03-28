<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artistes - TrackLoader</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/pages.css">
    <link rel="icon" type="image/webp" href="../assets/icon/icon.webp">
</head>
<body>
    <?php include '../include/header.php'; ?>

    <?php
        $artists = [];
        $response = @file_get_contents(BASE_URL . '/api/artist');
        if ($response !== false) {
            $artists = json_decode($response, true);
        }
    ?>

    <section class="page-header">
        <div class="container">
            <h1>Artistes</h1>
        </div>
    </section>

    <section class="featured-albums">

        <div class="container">

            <?php if (empty($artists)): ?>

                <div class="empty-state">

                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">

                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>

                    </svg>

                    <h3>Aucun artiste trouvé</h3>
                    <p>Aucun artiste disponible pour le moment.</p>

                </div>

            <?php else: ?>

                <div class="artists-grid">
                    
                    <?php foreach ($artists as $artist): ?>
                        <?php $slug = strtolower(str_replace(' ', '-', htmlspecialchars($artist))); ?>

                        <a href="./artiste.php?artist=<?= urlencode($artist) ?>" class="artist-card artist-photo--<?= $slug ?>">
                            
                            <div class="artist-card-overlay"></div>
                            <div class="artist-card-info">
                                <h3 class="artist-card-name"><?= htmlspecialchars($artist) ?></h3>
                            </div>

                        </a>
                    <?php endforeach; ?>
                </div>

            <?php endif; ?>

        </div>

    </section>

    <?php include '../include/footer.php'; ?>
</body>
</html>