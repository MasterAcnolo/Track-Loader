<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genres Musicaux - TrackLoader</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/pages.css">
    <link rel="icon" type="image/webp" href="../assets/icon/icon.webp">
</head>
<body>
    <?php include '../include/header.php'; ?>

    <section class="page-header">
        <div class="container">
            <h1>Genres Musicaux</h1>
            <p>Explorez nos albums par genre musical</p>
        </div>
    </section>

    <section class="genres-section">
        <div class="container">
            <div class="genres-grid">
                <?php
                
                $genres = [];

                $response = @file_get_contents(BASE_URL . '/api/genres');
                if ($response !== false) {
                    $genres = json_decode($response, true);
                }

                if (!empty($genres) && is_array($genres)) {
                    foreach ($genres as $genre) {
                        $genreUrl = './genre.php?genre=' . urlencode($genre);
                        $genreLabel = htmlspecialchars($genre);
                        $genreClass = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $genre));
                        echo "<a href='$genreUrl' class='genre-card $genreClass'><div class='genre-img'></div><h3>$genreLabel</h3></a>";
                    }
                } else {
                    echo "<p>Aucun genre trouvé.</p>";
                }
                ?>
            </div>
        </div>
    </section>

    <?php include '../include/footer.php'; ?>

</body>
</html>
