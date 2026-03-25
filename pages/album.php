<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abbey Road - TrackLoader</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/pages.css">
</head>
<body>
    <?php include '../include/header.php'; ?>

    <section class="album-detail-section">
        <div class="container">
            <!-- PHP générera le contenu de l'album -->
            <div class="album-detail-container">
                <div class="album-detail-cover">
                    <img src="https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?w=500&q=80" alt="Abbey Road">
                </div>
                <div class="album-detail-info">
                    <h1>Abbey Road</h1>
                    <h2>The Beatles</h2>
                    <div class="album-meta">
                        <span class="album-genre">Rock</span>
                        <span>1969</span>
                    </div>
                    <div class="album-price-section">
                        <span class="album-detail-price">15.99 €</span>
                        <form action="/php/add-to-cart.php" method="POST">
                            <input type="hidden" name="album_id" value="1">
                            <button type="submit" class="btn btn-primary">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline-block; vertical-align: middle; margin-right: 0.5rem;">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                Ajouter au panier
                            </button>
                        </form>
                    </div>
                    <div class="album-tracklist">
                        <h3>Liste des pistes</h3>
                        <ol>
                            <li>Come Together</li>
                            <li>Something</li>
                            <li>Maxwell's Silver Hammer</li>
                            <li>Oh! Darling</li>
                            <li>Octopus's Garden</li>
                            <li>I Want You (She's So Heavy)</li>
                            <li>Here Comes the Sun</li>
                            <li>Because</li>
                            <li>You Never Give Me Your Money</li>
                            <li>Sun King</li>
                            <li>Mean Mr. Mustard</li>
                            <li>Polythene Pam</li>
                            <li>She Came in Through the Bathroom Window</li>
                            <li>Golden Slumbers</li>
                            <li>Carry That Weight</li>
                            <li>The End</li>
                            <li>Her Majesty</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include '../include/footer.php'; ?>

</body>
</html>
