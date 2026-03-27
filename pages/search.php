<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche - TrackLoader</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/pages.css">
    <link rel="icon" type="image/webp" href="../assets/icon/icon.webp">
</head>
<body>
    <?php include '../include/header.php'; ?>

    <section class="page-header">
        <div class="container">
            <h1>Résultats de recherche</h1>
            <!-- PHP affichera la requête ici: <?php echo htmlspecialchars($_GET['q']); ?> -->
            <p>Recherche pour : "album exemple"</p>
        </div>
    </section>

    <section class="search-results-section">
        <div class="container">
            <!-- Search bar -->
            <form action="./search.php" method="GET" class="search-box" style="max-width: 600px; margin: 0 auto 2rem;">
                <input type="text" name="q" placeholder="Rechercher un album ou un artiste..." required>
                <button type="submit">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                </button>
            </form>

            <!-- PHP générera les résultats ici -->
            <div class="albums-grid">
                <!-- Exemple de résultat -->
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
            </div>

            <!-- Message si aucun résultat -->
            <!-- <?php if (count($results) == 0): ?> -->
            <div class="empty-state" style="display: none;">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
                <h2>Aucun résultat trouvé</h2>
                <p>Essayez avec d'autres mots-clés</p>
            </div>
            <!-- <?php endif; ?> -->
        </div>
    </section>

    <?php include '../include/footer.php'; ?>
</body>
</html>
