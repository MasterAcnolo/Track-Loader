<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Loader</title>
    
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/pages.css">

    <link rel="icon" href="assets/icon/icon.webp">

    <!-- Open Graph (Discord, Facebook, etc.) -->
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:type" content="website">
</head>
<body>

    <?php include 'include/header.php' ?>
    <?php include 'include/notif.php'; ?>

    <body>
        <!-- Hero Section -->
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

        <!-- Search Section -->
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

        <!-- Featured Albums -->
        <section id="featured" class="featured-albums">
            <div class="container">
                <h2>Albums en vedette</h2>
                <div class="albums-grid">

                    <?php 

                        $albumIds = [1, 2, 14, 18];
                        $albums = [];

                        foreach ($albumIds as $id) {
                            $url = "http://localhost/Track-Loader/api/albums/$id";
                            $response = file_get_contents($url);

                            if ($response !== false) {
                                $albumData = json_decode($response, true);
                                if ($albumData) {
                                    $albums[] = $albumData;
                                }
                            }
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

    </body>

    <?php include 'include/footer.php' ?>
    
</body>
</html>