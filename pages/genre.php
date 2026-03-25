<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rock - TrackLoader</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/pages.css">
</head>
<body>
    <!-- <?php include '../includes/header.php'; ?> -->
    
    <header class="main-header">
        <div class="container">
            <div class="header-content">
                <a href="../index.php" class="logo">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 18V5l12-2v13"></path>
                        <circle cx="6" cy="18" r="3"></circle>
                        <circle cx="18" cy="16" r="3"></circle>
                    </svg>
                    <span>TrackLoader</span>
                </a>

                <nav class="main-nav">
                    <a href="../index.php">Accueil</a>
                    <a href="./genres.php">Genres</a>
                    <a href="./cart.php">Panier <span class="cart-badge">0</span></a>
                    <a href="./account.php">Mon Compte</a>
                </nav>

                <div class="header-actions">
                    <a href="./login.php" class="btn btn-small">Connexion</a>
                    <a href="./register.php" class="btn btn-small btn-secondary">Inscription</a>
                </div>
            </div>
        </div>
    </header>

    <section class="page-header">
        <div class="container">
            <h1>Rock</h1>
            <!-- PHP affichera le nom du genre ici -->
            <p><a href="./genres.php" class="link-secondary">&larr; Retour aux genres</a></p>
        </div>
    </section>

    <section class="featured-albums">
        <div class="container">
            <!-- PHP générera ces albums -->
            <div class="albums-grid">
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
                
                <a href="./album.php?id=5" class="album-card">
                    <img src="https://images.unsplash.com/photo-1498038432885-c6f3f1b912ee?w=500&q=80" alt="The Dark Side of the Moon" class="album-cover">
                    <div class="album-info">
                        <h3 class="album-title">The Dark Side of the Moon</h3>
                        <p class="album-artist">Pink Floyd</p>
                        <div class="album-details">
                            <span class="album-price">15.99 €</span>
                            <span class="album-genre">Rock</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- <?php include '../includes/footer.php'; ?> -->
    
    <footer class="main-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-section">
                    <div class="footer-logo">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 18V5l12-2v13"></path>
                            <circle cx="6" cy="18" r="3"></circle>
                            <circle cx="18" cy="16" r="3"></circle>
                        </svg>
                        <span>TrackLoader</span>
                    </div>
                    <p>Votre destination pour découvrir et acheter les meilleurs albums de musique de tous les genres.</p>
                </div>

                <div class="footer-section">
                    <h3>Navigation</h3>
                    <ul>
                        <li><a href="../index.php">Accueil</a></li>
                        <li><a href="./genres.php">Genres</a></li>
                        <li><a href="./cart.php">Panier</a></li>
                        <li><a href="./account.php">Mon Compte</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3>Support</h3>
                    <ul>
                        <li><a href="#">Centre d'aide</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Conditions d'utilisation</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3>Suivez-nous</h3>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>
                        </a>
                        <a href="#" aria-label="Twitter">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                            </svg>
                        </a>
                        <a href="#" aria-label="Instagram">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                        </a>
                        <a href="#" aria-label="YouTube">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path>
                                <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2026 TrackLoader. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html>
