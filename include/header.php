<header class="main-header">
    <div class="container">
        <div class="header-content">

            <a href="/Track-Loader/index.php" class="logo">
                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 18V5l12-2v13"></path>
                    <circle cx="6" cy="18" r="3"></circle>
                    <circle cx="18" cy="16" r="3"></circle>
                </svg>
                <span>TrackLoader</span>
            </a>

            <form action="/Track-Loader/pages/search.php" method="GET" class="search-bar">
                <input type="text" name="q" placeholder="Rechercher un album, un artiste...">
                <button type="submit">OK</button>
            </form>

            <div class="header-actions">
                <?php if(isset($_SESSION['user'])): ?>
                    <!-- Si connecté -->
                    <a href="/Track-Loader/pages/cart.php" class="cart-link">
                        Panier
                        <span id="cart-count" class="cart-badge">0</span>
                    </a>

                    <a href="/Track-Loader/pages/account.php">
                        <?= htmlspecialchars($_SESSION['user']['email']) ?>
                    </a>

                    <!-- <a href="/Track-Loader/pages/logout.php" class="btn btn-small btn-secondary">Déconnexion</a> -->
                <?php else: ?>
                    <!-- Si non connecté -->
                    <a href="/Track-Loader/pages/login.php" class="btn btn-small">Connexion</a>
                    <a href="/Track-Loader/pages/register.php" class="btn btn-small btn-secondary">Inscription</a>
                <?php endif; ?>
            </div>

        </div>
    </div>
</header>