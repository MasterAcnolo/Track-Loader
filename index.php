<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Loader</title>
    
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/pages.css">

    <link rel="icon" href="assets/icon/icon.webp">
</head>
<body>

    <?php include 'include/header.php' ?>
    <?php include 'include/notif.php'; ?>

    <body>

        <section class="hero">
            <div class="container">
                <h1>Découvrez les meilleurs albums</h1>
                <p>Explorez notre collection de musique de tous les genres</p>
                <div class="hero-actions">
                    <a href="./pages/genres.php" class="btn btn-primary">Parcourir les genres</a>
                    <a href="#featured" class="btn btn-secondary">Albums en vedette</a>
                </div>
            </div>
        </section>

        <section class="search-section">
            <div class="container">
                <form action="./pages/search.php" method="GET" class="search-box">
                    <input type="text" name="q" placeholder="Rechercher un album ou un artiste..." required>
                    <button type="submit">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.35-4.35"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </section>

        <section id="featured" class="featured-albums">
            <div class="container">
                <div class="section-head">
                    <div>
                        <p class="eyebrow">Sélection de la semaine</p>
                        <h2 class="sec-title">Albums en vedette</h2>
                    </div>
                </div>
                <div class="albums-grid">

                    <?php 
                        $albums = [];
                        $response = @file_get_contents(BASE_URL . '/api/albums/trending');
                        if ($response !== false) {
                            $albums = json_decode($response, true);
                        }
                    ?>
                    
                    <?php foreach ($albums as $album) : ?>

                        <a href="./pages/album.php?id=<?= $album['id_album'] ?>" class="album-card">

                            <img src="<?= $album['cover'] ?>" alt="<?= htmlspecialchars($album['name']) ?>" class="album-cover">

                            <div class="album-info">

                                <h3 class="album-title"><?= htmlspecialchars($album['name']) ?></h3>
                                <p class="album-artist"><?= htmlspecialchars($album['author_name']) ?></p>

                                <div class="album-details">

                                    <span class="album-price"><?= number_format($album['price'], 2) ?> €</span>
                                    <span class="album-genre"><?= htmlspecialchars($album['style']) ?></span>

                                </div>

                            </div>
                        </a>

                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="cta-section">
            <div class="container">
                <div class="cta-inner">
                    <div class="cta-glow"></div>
                    <p class="eyebrow" style="color:var(--primary-color)">Prêt à plonger ?</p>
                    <h2>Des milliards de sons vous attendent</h2>
                    <p class="cta-sub">Rejoignez la communauté Track Loader et explorez un catalogue musical sans limites, sans abonnement.</p>
                    <div class="cta-btns">
                        <a href="./pages/register.php" class="btn btn-primary btn-lg">Créer un compte gratuit</a>
                        <a href="./pages/genres.php"   class="btn btn-outline btn-lg">Parcourir sans compte</a>
                    </div>
                </div>
            </div>
        </section>

    </body>

    <?php include 'include/footer.php' ?>
    
</body>
</html>