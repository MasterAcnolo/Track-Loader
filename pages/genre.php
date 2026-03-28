<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $genre = isset($_GET['genre']) ? $_GET['genre'] : ''; ?> - TrackLoader</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/pages.css">
    <link rel="icon" type="image/webp" href="../assets/icon/icon.webp">
</head>
<body>
    <?php include '../include/header.php'; ?>

    <?php
    // Récupérer le genre depuis l'URL
    $genre = isset($_GET['genre']) ? $_GET['genre'] : '';
    $genreLabel = htmlspecialchars($genre);
    ?>
    <section class="page-header">
        <div class="container">
            <h1><?= $genreLabel ?></h1>
            <p><a href="./genres.php" class="link-secondary">&larr; Retour aux genres</a></p>
        </div>
    </section>

    <section class="featured-albums">
        <div class="container">
            <?php
            $albums = [];
            if ($genre) {
                $response = @file_get_contents(BASE_URL . '/api/albums?genre=' . urlencode($genre));
                if ($response !== false) {
                    $albums = json_decode($response, true);
                }
            }
            ?>
            <div class="albums-grid">

                <?php if (!empty($albums) && is_array($albums)) : ?>

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

                <?php else : ?>

                    <p>Aucun album trouvé pour ce genre.</p>

                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php include '../include/footer.php'; ?>
</body>
</html>
