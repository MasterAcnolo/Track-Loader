<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genres Musicaux - TrackLoader</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/pages.css">
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
                <!-- PHP générera ces genres -->
                <a href="./genre.php?genre=rock" class="genre-card">
                    <h3>Rock</h3>
                    <p>3 albums</p>
                </a>
                
                <a href="./genre.php?genre=pop" class="genre-card">
                    <h3>Pop</h3>
                    <p>2 albums</p>
                </a>
                
                <a href="./genre.php?genre=jazz" class="genre-card">
                    <h3>Jazz</h3>
                    <p>2 albums</p>
                </a>
                
                <a href="./genre.php?genre=hip-hop" class="genre-card">
                    <h3>Hip-Hop</h3>
                    <p>1 album</p>
                </a>
                
                <a href="./genre.php?genre=electronique" class="genre-card">
                    <h3>Électronique</h3>
                    <p>2 albums</p>
                </a>
            </div>
        </div>
    </section>

    <?php include '../include/footer.php'; ?>

</body>
</html>
