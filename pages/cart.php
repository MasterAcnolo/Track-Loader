<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier - TrackLoader</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/pages.css">
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
            <?php if (empty($cart_items)): ?>
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
                <div id="cart-content">
                    <div class="cart-items-container">
                        <!-- PHP générera les articles ici -->
                        <div class="cart-item">
                            <img src="https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?w=500&q=80" alt="Abbey Road" class="cart-item-cover">
                            <div class="cart-item-info">
                                <h3>Abbey Road</h3>
                                <p>The Beatles</p>
                            </div>
                            <div class="cart-item-price">
                                15.99 €
                            </div>
                            <form action="/php/remove-from-cart.php" method="POST" style="display: inline;">
                                <input type="hidden" name="album_id" value="1">
                                <button type="submit" class="btn-remove">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <div class="cart-item">
                            <img src="https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=500&q=80" alt="Thriller" class="cart-item-cover">
                            <div class="cart-item-info">
                                <h3>Thriller</h3>
                                <p>Michael Jackson</p>
                            </div>
                            <div class="cart-item-price">
                                14.99 €
                            </div>
                            <form action="/php/remove-from-cart.php" method="POST" style="display: inline;">
                                <input type="hidden" name="album_id" value="2">
                                <button type="submit" class="btn-remove">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="cart-summary">
                        <h2>Résumé</h2>
                        <div class="summary-row">
                            <span>Total</span>
                            <span class="total-price">30.98 €</span>
                        </div>
                        <form action="/php/checkout.php" method="POST">
                            <button type="submit" class="btn btn-primary btn-block">
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