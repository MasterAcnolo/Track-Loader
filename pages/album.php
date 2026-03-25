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
            <div class="album-detail-grid">
                <div class="album-detail-cover-container">
                    <img class="album-detail-cover" src="https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?w=500&q=80" alt="Abbey Road">
                </div>
                <div class="album-detail-info">
                    <h1>Abbey Road</h1>
                    <h2 class="album-detail-artist">The Beatles</h2>
                    <div class="album-meta">
                        <span class="badge badge-primary album-genre">Rock</span>
                        <span>1969</span>
                    </div>
                    <div class="album-price-large" style="margin-bottom: 2rem;">15.99 €</div>
                    <div class="album-actions" style="margin-bottom: 2rem;">
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
                </div>
            </div>
            <div class="tracklist" style="margin-top: 3rem;">
                <h3>Liste des pistes</h3>
                <div class="track-list">
                    <div class="track-item"><span class="track-number">1</span><span class="track-title">Come Together</span></div>
                    <div class="track-item"><span class="track-number">2</span><span class="track-title">Something</span></div>
                    <div class="track-item"><span class="track-number">3</span><span class="track-title">Maxwell's Silver Hammer</span></div>
                    <div class="track-item"><span class="track-number">4</span><span class="track-title">Oh! Darling</span></div>
                    <div class="track-item"><span class="track-number">5</span><span class="track-title">Octopus's Garden</span></div>
                    <div class="track-item"><span class="track-number">6</span><span class="track-title">I Want You (She's So Heavy)</span></div>
                    <div class="track-item"><span class="track-number">7</span><span class="track-title">Here Comes the Sun</span></div>
                    <div class="track-item"><span class="track-number">8</span><span class="track-title">Because</span></div>
                    <div class="track-item"><span class="track-number">9</span><span class="track-title">You Never Give Me Your Money</span></div>
                    <div class="track-item"><span class="track-number">10</span><span class="track-title">Sun King</span></div>
                    <div class="track-item"><span class="track-number">11</span><span class="track-title">Mean Mr. Mustard</span></div>
                    <div class="track-item"><span class="track-number">12</span><span class="track-title">Polythene Pam</span></div>
                    <div class="track-item"><span class="track-number">13</span><span class="track-title">She Came in Through the Bathroom Window</span></div>
                    <div class="track-item"><span class="track-number">14</span><span class="track-title">Golden Slumbers</span></div>
                    <div class="track-item"><span class="track-number">15</span><span class="track-title">Carry That Weight</span></div>
                    <div class="track-item"><span class="track-number">16</span><span class="track-title">The End</span></div>
                    <div class="track-item"><span class="track-number">17</span><span class="track-title">Her Majesty</span></div>
                </div>
            </div>
        </div>
    </section>

    <?php include '../include/footer.php'; ?>

</body>
</html>
