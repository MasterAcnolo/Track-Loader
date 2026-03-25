<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rock - TrackLoader</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/pages.css">
</head>
<body>
    <?php include '../include/header.php'; ?>

    <section class="page-header">
        <div class="container">
            <h1>Rock</h1>
            <!-- PHP affichera le nom du genre ici -->
            <p><a href="./genres.php" class="link-secondary">&larr; Retour aux genres</a></p>
        </div>
    </section>

    <section class="featured-albums">
        <div class="container">
            <!-- PHP générera ces albums -->
            <div class="albums-grid">
                <a href="./album.php?id=1" class="album-card">
                    <img src="https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?w=500&q=80" alt="Abbey Road" class="album-cover">
                    <div class="album-info">
                        <h3 class="album-title">Abbey Road</h3>
                        <p class="album-artist">The Beatles</p>
                        <div class="album-details">
                            <span class="album-price">15.99 €</span>
                            <span class="album-genre">Rock</span>
                        </div>
                    </div>
                </a>
                
                <a href="./album.php?id=5" class="album-card">
                    <img src="https://images.unsplash.com/photo-1498038432885-c6f3f1b912ee?w=500&q=80" alt="The Dark Side of the Moon" class="album-cover">
                    <div class="album-info">
                        <h3 class="album-title">The Dark Side of the Moon</h3>
                        <p class="album-artist">Pink Floyd</p>
                        <div class="album-details">
                            <span class="album-price">15.99 €</span>
                            <span class="album-genre">Rock</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <?php include '../include/footer.php'; ?>
</body>
</html>
