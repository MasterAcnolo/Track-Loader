<?php
// Récupère le nombre d'items du panier
$cart_count = 0;
$token = $_SESSION['token'] ?? $_COOKIE['token'] ?? null;

if ($token) {
    require_once __DIR__ . '/../api/utils/TokenUtils.php';
    require_once __DIR__ . '/../api/config/config.php';
    require_once __DIR__ . '/../api/services/PanierServices.php';
    require_once __DIR__ . '/../api/services/UserService.php';

    $payload = verifyToken($token, $config);
    if ($payload) {
        $user = getUserByEmailService($payload['email']);
        if ($user) {
            $items = getPanierService($user['id_user']);
            $cart_count = is_array($items) && !isset($items['error']) ? count($items) : 0;
        }
    }
}
?>

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
                <?php if ($token && isset($payload) && $payload): ?>
                    <a href="/Track-Loader/pages/cart.php" class="cart-link">
                        Panier
                        <?php if ($cart_count > 0): ?>
                            <span class="cart-badge"><?= $cart_count ?></span>
                        <?php endif; ?>
                    </a>
                    <a href="/Track-Loader/pages/account.php">
                        <?= htmlspecialchars($payload['email']) ?>
                    </a>
                <?php else: ?>
                    <a href="/Track-Loader/pages/login.php" class="btn btn-small">Connexion</a>
                    <a href="/Track-Loader/pages/register.php" class="btn btn-small btn-secondary">Inscription</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>