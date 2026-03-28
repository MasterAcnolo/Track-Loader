<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../api/services/PanierServices.php';
require_once __DIR__ . '/../api/utils/TokenUtils.php';
require_once __DIR__ . '/../api/config/config.php';

$cart_items = [];
$total = 0;

$token = $_SESSION['token'] ?? $_COOKIE['token'] ?? null;

if ($token) {
    $payload = verifyToken($token, $config);
    if ($payload) {
        require_once __DIR__ . '/../api/services/UserService.php';
        $user = getUserByEmailService($payload['email']);
        if ($user) {
            $cart_items = getPanierService($user['id_user']);
            if (isset($cart_items['error'])) $cart_items = [];
            foreach ($cart_items as $item) {
                $total += $item['price'];
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier - TrackLoader</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/pages.css">
    <link rel="icon" type="image/webp" href="../assets/icon/icon.webp">
</head>
<body>
    <?php include '../include/header.php'; ?>
    <?php include '../include/notif.php'; ?>

    <section class="page-header">
        <div class="container">
            <h1>Mon Panier</h1>
        </div>
    </section>

    <section class="cart-section">
        <div class="container">

            <?php if (!$token): ?>
                <div class="empty-state">
                    <h2>Vous devez être connecté</h2>
                    <p>Connectez-vous pour voir votre panier</p>
                    <a href="login.php" class="btn btn-primary">Se connecter</a>
                </div>

            <?php elseif (empty($cart_items)): ?>
                <div class="empty-state">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    <h2>Votre panier est vide</h2>
                    <p>Découvrez nos albums et ajoutez-les à votre panier</p>
                    <a href="../index.php" class="btn btn-primary">Parcourir les albums</a>
                </div>

            <?php else: ?>
                <div class="cart-grid">

                    <div class="cart-items">

                        <?php foreach ($cart_items as $item): ?>

                            <div class="cart-item">

                                <img src="<?= htmlspecialchars($item['cover']) ?>"
                                    alt="<?= htmlspecialchars($item['name']) ?>"
                                    class="cart-item-cover">

                                <div class="cart-item-info">

                                    <span class="cart-item-title"><?= htmlspecialchars($item['name']) ?></span>
                                    <span class="cart-item-artist"><?= htmlspecialchars($item['author_name']) ?></span>
                                    <span class="cart-item-price"><?= number_format($item['price'], 2) ?> €</span>

                                </div>

                                <form action="<?php echo BASE_URL . '/api/panier/' . $item['id_album'] ?>" method="POST" class="cart-item-remove">

                                    <input type="hidden" name="_method" value="DELETE"> <!-- J'arrive pas avec Delete, Ducoup ya ça-->

                                    <button type="submit" class="btn-remove">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        </svg>

                                    </button>
                                </form>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="cart-summary">

                        <h3>Résumé</h3>

                        <div class="summary-row">
                            <span class="summary-label"><?= count($cart_items) ?> album(s)</span>
                            <span class="summary-value"><?= number_format($total, 2) ?> €</span>
                        </div>

                        <div class="summary-row total">
                            <span class="summary-label">Total</span>
                            <span class="summary-value"><?= number_format($total, 2) ?> €</span>
                        </div>

                        <form action="<?php echo BASE_URL . '/api/panier/checkout' ?>" method="POST">
                            <button type="submit" class="btn btn-primary btn-block" style="width:100%; margin-top: 1rem;">
                                Procéder au paiement
                            </button>
                        </form>

                    </div>

                </div>
            <?php endif; ?>

        </div>
    </section>

    <?php include '../include/footer.php'; ?>
</body>
</html>