<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte - TrackLoader</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/pages.css">
</head>
<body>
    <!-- <?php include '../include/header.php'; ?> -->

    <section class="page-header">
        <div class="container">
            <h1>Mon Compte</h1>
        </div>
    </section>

    <section class="account-section">
        <div class="container">
            <!-- Si l'utilisateur n'est pas connecté -->
            <!-- <?php if (!isset($_SESSION['user_id'])): ?> -->
            <div class="empty-state" style="display: none;">
                <h2>Non connecté</h2>
                <p>Veuillez vous connecter pour accéder à votre compte</p>
                <a href="./login.php" class="btn btn-primary">Se connecter</a>
            </div>
            <!-- <?php endif; ?> -->

            <!-- Si l'utilisateur est connecté -->
            <!-- <?php if (isset($_SESSION['user_id'])): ?> -->
            <div class="account-grid">
                <!-- Paramètres du compte -->
                <div class="account-settings">
                    <!-- Informations utilisateur -->
                    <div class="card">
                        <div class="card-header">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <h2>Informations du compte</h2>
                        </div>
                        <div class="card-body">
                            <div class="info-row">
                                <label>Nom</label>
                                <p>Jean Dupont</p>
                                <!-- PHP: <?php echo htmlspecialchars($user['name']); ?> -->
                            </div>
                            <div class="info-row">
                                <label>Email</label>
                                <p>jean.dupont@example.com</p>
                                <!-- PHP: <?php echo htmlspecialchars($user['email']); ?> -->
                            </div>
                        </div>
                    </div>

                    <!-- Modifier l'email -->
                    <div class="card">
                        <div class="card-header">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            <h2>Modifier l'email</h2>
                        </div>
                        <div class="card-body">
                            <form action="/php/update-email.php" method="POST">
                                <div class="form-group">
                                    <label for="new-email">Nouvel email</label>
                                    <input type="email" id="new-email" name="email" class="form-input" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Mettre à jour l'email</button>
                            </form>
                        </div>
                    </div>

                    <!-- Modifier le mot de passe -->
                    <div class="card">
                        <div class="card-header">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                            <h2>Modifier le mot de passe</h2>
                        </div>
                        <div class="card-body">
                            <form action="/php/update-password.php" method="POST">
                                <div class="form-group">
                                    <label for="current-password">Mot de passe actuel</label>
                                    <input type="password" id="current-password" name="current_password" class="form-input" required>
                                </div>
                                <div class="form-group">
                                    <label for="new-password">Nouveau mot de passe</label>
                                    <input type="password" id="new-password" name="new_password" class="form-input" minlength="6" required>
                                </div>
                                <div class="form-group">
                                    <label for="confirm-password">Confirmer le mot de passe</label>
                                    <input type="password" id="confirm-password" name="confirm_password" class="form-input" minlength="6" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Mettre à jour le mot de passe</button>
                            </form>
                        </div>
                    </div>

                    <!-- Zone de danger -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            </svg>
                            <h2>Zone de danger</h2>
                        </div>
                        <div class="card-body">
                            <p>La suppression de votre compte est irréversible.</p>
                            <form action="/php/delete-account.php" method="POST" onsubmit="return confirm('Êtes-vous vraiment sûr de vouloir supprimer votre compte ? Cette action est irréversible.');">
                                <button type="submit" class="btn btn-danger">Supprimer mon compte</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Historique d'achats -->
                <div class="purchase-history">
                    <div class="card sticky-card">
                        <div class="card-header">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <path d="M16 10a4 4 0 0 1-8 0"></path>
                            </svg>
                            <h2>Historique d'achats</h2>
                        </div>
                        <div class="card-body">
                            <!-- Si aucun achat -->
                            <!-- <?php if (count($purchases) == 0): ?> -->
                            <p class="text-secondary" style="display: none;">Aucun achat pour le moment</p>
                            <!-- <?php endif; ?> -->

                            <!-- Si des achats existent -->
                            <!-- <?php if (count($purchases) > 0): ?> -->
                            <div class="mb-2">
                                <p class="text-secondary">Total : 5 achats</p>
                                <p class="text-secondary">Page 1 sur 1</p>
                            </div>

                            <!-- PHP générera les achats ici -->
                            <div class="purchase-item">
                                <h4>Abbey Road</h4>
                                <p class="text-secondary">The Beatles</p>
                                <div class="purchase-details">
                                    <span class="text-secondary">15/03/2026</span>
                                    <span class="purchase-price">15.99 €</span>
                                </div>
                            </div>

                            <div class="purchase-item">
                                <h4>Thriller</h4>
                                <p class="text-secondary">Michael Jackson</p>
                                <div class="purchase-details">
                                    <span class="text-secondary">12/03/2026</span>
                                    <span class="purchase-price">14.99 €</span>
                                </div>
                            </div>

                            <div class="purchase-item">
                                <h4>Random Access Memories</h4>
                                <p class="text-secondary">Daft Punk</p>
                                <div class="purchase-details">
                                    <span class="text-secondary">08/03/2026</span>
                                    <span class="purchase-price">16.99 €</span>
                                </div>
                            </div>

                            <!-- Pagination si nécessaire -->
                            <!-- <?php if ($total_pages > 1): ?> -->
                            <div class="pagination" style="display: none;">
                                <a href="?page=<?php echo $current_page - 1; ?>" class="btn btn-small">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline-block; vertical-align: middle;">
                                        <polyline points="15 18 9 12 15 6"></polyline>
                                    </svg>
                                    Précédent
                                </a>
                                <span>1 / 1</span>
                                <a href="?page=<?php echo $current_page + 1; ?>" class="btn btn-small">
                                    Suivant
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline-block; vertical-align: middle;">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </a>
                            </div>
                            <!-- <?php endif; ?> -->
                            <!-- <?php endif; ?> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- <?php endif; ?> -->
        </div>
    </section>

    <!-- <?php include '../include/footer.php'; ?> -->
</body>
</html>
