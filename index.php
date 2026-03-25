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
                    <!-- PHP générera ces albums -->
                    <!-- Exemple statique -->
                    <a href="./pages/album.php?id=1" class="album-card">
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
                    
                    <a href="./pages/album.php?id=2" class="album-card">
                        <img src="https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=500&q=80" alt="Thriller" class="album-cover">
                        <div class="album-info">
                            <h3 class="album-title">Thriller</h3>
                            <p class="album-artist">Michael Jackson</p>
                            <div class="album-details">
                                <span class="album-price">14.99 €</span>
                                <span class="album-genre">Pop</span>
                            </div>
                        </div>
                    </a>
                    
                    <a href="./pages/album.php?id=3" class="album-card">
                        <img src="https://images.unsplash.com/photo-1470225620780-dba8ba36b745?w=500&q=80" alt="Random Access Memories" class="album-cover">
                        <div class="album-info">
                            <h3 class="album-title">Random Access Memories</h3>
                            <p class="album-artist">Daft Punk</p>
                            <div class="album-details">
                                <span class="album-price">16.99 €</span>
                                <span class="album-genre">Électronique</span>
                            </div>
                        </div>
                    </a>
                    
                    <a href="./pages/album.php?id=4" class="album-card">
                        <img src="https://images.unsplash.com/photo-1511379938547-c1f69419868d?w=500&q=80" alt="Kind of Blue" class="album-cover">
                        <div class="album-info">
                            <h3 class="album-title">Kind of Blue</h3>
                            <p class="album-artist">Miles Davis</p>
                            <div class="album-details">
                                <span class="album-price">13.99 €</span>
                                <span class="album-genre">Jazz</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>

    </body>

    <?php include 'include/footer.php' ?>
    
</body>
</html>