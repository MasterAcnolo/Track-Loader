<?php
$q = isset($_GET['q']) ? trim($_GET['q']) : '';
$results = [];

if ($q !== '') {
    $response = @file_get_contents(BASE_URL . "/api/search?q=" . urlencode($q));
    if ($response !== false) {
        $results = json_decode($response, true) ?? [];
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche<?= $q ? ' : ' . htmlspecialchars($q) : '' ?> - TrackLoader</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/pages.css">
    <link rel="icon" type="image/webp" href="../assets/icon/icon.webp">
</head>
<body>
    <?php include '../include/header.php'; ?>

    <section class="page-header">
        <div class="container">
            <h1>Résultats de recherche</h1>
            <?php if ($q): ?>
                <p>Recherche pour : "<?= htmlspecialchars($q) ?>"</p>
            <?php endif; ?>
        </div>
    </section>

    <section class="search-results-section">
        <div class="container">

            <form action="./search.php" method="GET" class="search-box" style="max-width: 600px; margin: 0 auto 2rem;">
                <input type="text" name="q" value="<?= htmlspecialchars($q) ?>" placeholder="Rechercher un album ou un artiste..." required>
                <button type="submit">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                </button>
            </form>

            <?php if ($q === ''): ?>

                <div class="empty-state">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                    <h2>Entrez un mot-clé pour rechercher</h2>
                </div>

            <?php elseif (count($results) === 0): ?>

                <div class="empty-state">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                    <h2>Aucun résultat trouvé</h2>
                    <p>Essayez avec d'autres mots-clés</p>
                </div>

            <?php else: ?>

                <p style="margin-bottom: 1.5rem;"><?= count($results) ?> résultat(s) trouvé(s)</p>

                <div class="albums-grid">
                    <?php foreach ($results as $album): ?>
                        <a href="./album.php?id=<?= $album['id_album'] ?>" class="album-card">
                            <img src="<?= htmlspecialchars($album['cover']) ?>" alt="<?= htmlspecialchars($album['name']) ?>" class="album-cover">
                            <div class="album-info">
                                <h3 class="album-title"><?= htmlspecialchars($album['name']) ?></h3>
                                <p class="album-artist"><?= htmlspecialchars($album['author_name']) ?></p>
                                <div class="album-details">
                                    <span class="album-price"><?= number_format($album['price'], 2) ?> €</span>
                                    <span class="album-genre badge badge-primary"><?= htmlspecialchars($album['style']) ?></span>
                                </div>
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