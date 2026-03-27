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
    <?php include '../include/header.php'; ?>
    <?php include '../include/notif.php'; ?>

    <section class="account-section">
        <div class="container">

            <?php if (!isset($_SESSION['user'])): ?>

                <div class="empty-state">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <h3>Non connecté</h3>
                    <p>Veuillez vous connecter pour accéder à votre compte</p>
                    <a href="./login.php" class="btn btn-primary">Se connecter</a>
                </div>

            <?php else:

                // TODO: remplacer par requête BDD
                $purchases = [
                    ['title' => 'Abbey Road',             'artist' => 'The Beatles',    'date' => '15/03/2026', 'price' => '15.99'],
                    ['title' => 'Thriller',               'artist' => 'Michael Jackson','date' => '12/03/2026', 'price' => '14.99'],
                    ['title' => 'Random Access Memories', 'artist' => 'Daft Punk',      'date' => '08/03/2026', 'price' => '16.99'],
                    ['title' => 'OK Computer',            'artist' => 'Radiohead',      'date' => '01/03/2026', 'price' => '13.99'],
                    ['title' => 'Nevermind',              'artist' => 'Nirvana',        'date' => '22/02/2026', 'price' => '12.99'],
                    ['title' => 'Abbey Road',             'artist' => 'The Beatles',    'date' => '15/03/2026', 'price' => '15.99'],
                    ['title' => 'Thriller',               'artist' => 'Michael Jackson','date' => '12/03/2026', 'price' => '14.99'],
                    ['title' => 'Random Access Memories', 'artist' => 'Daft Punk',      'date' => '08/03/2026', 'price' => '16.99'],
                    ['title' => 'OK Computer',            'artist' => 'Radiohead',      'date' => '01/03/2026', 'price' => '13.99'],
                    ['title' => 'Nevermind',              'artist' => 'Nirvana',        'date' => '22/02/2026', 'price' => '12.99'],
                    ['title' => 'Abbey Road',             'artist' => 'The Beatles',    'date' => '15/03/2026', 'price' => '15.99'],
                    ['title' => 'Thriller',               'artist' => 'Michael Jackson','date' => '12/03/2026', 'price' => '14.99'],
                    ['title' => 'Random Access Memories', 'artist' => 'Daft Punk',      'date' => '08/03/2026', 'price' => '16.99'],
                    ['title' => 'OK Computer',            'artist' => 'Radiohead',      'date' => '01/03/2026', 'price' => '13.99'],
                    ['title' => 'Nevermind',              'artist' => 'Nirvana',        'date' => '22/02/2026', 'price' => '12.99'],
                    ['title' => 'Abbey Road',             'artist' => 'The Beatles',    'date' => '15/03/2026', 'price' => '15.99'],
                    ['title' => 'Thriller',               'artist' => 'Michael Jackson','date' => '12/03/2026', 'price' => '14.99'],
                    ['title' => 'Random Access Memories', 'artist' => 'Daft Punk',      'date' => '08/03/2026', 'price' => '16.99'],
                    ['title' => 'OK Computer',            'artist' => 'Radiohead',      'date' => '01/03/2026', 'price' => '13.99'],
                    ['title' => 'Nevermind',              'artist' => 'Nirvana',        'date' => '22/02/2026', 'price' => '12.99'],
                ];

                
                // TODO: remplacer par requête BDD
                $total_purchases = count($purchases);

            ?>

            <section class="page-header">
                    <div class="container">
                        <h1>Mon Compte</h1>
                    </div>
            </section>

            <div class="account-grid">

                <!-- Informations du compte -->
                <div class="card">
                    <div class="card-header" style="gap: 0.75rem;">
                        <span style="display:flex;align-items:center;justify-content:center;background:var(--primary-color,#007bff);color:#fff;border-radius:50%;width:2.2em;height:2.2em;min-width:2.2em;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </span>
                        <h2 style="font-size:1.2em;line-height:1.2;">Informations du compte</h2>
                    </div>
                    <div class="card-body">
                        <div class="info-row">
                            <label>Email</label>
                            <?php echo htmlspecialchars($_SESSION['user']['email']); ?>
                        </div>
                    </div>
                </div>

                <!-- Session -->
                <div class="card">
                    <div class="card-header" style="gap: 0.75rem;">
                        <span style="display:flex;align-items:center;justify-content:center;background:var(--info-color,#17a2b8);color:#fff;border-radius:50%;width:2.2em;height:2.2em;min-width:2.2em;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                        </span>
                        <h2 style="font-size:1.2em;line-height:1.2;">Session</h2>
                    </div>
                    <div class="card-body">
                        <p style="color:var(--text-secondary);font-size:0.875rem;margin-bottom:1rem;">
                            Connecté en tant que <strong><?php echo htmlspecialchars($_SESSION['user']['email']); ?></strong>.
                        </p>
                        <a href="/Track-Loader/api/user/logout" class="btn btn-secondary" style="display:inline-flex;align-items:center;gap:0.5rem;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                            Se déconnecter
                        </a>
                    </div>
                </div>

                <!-- Modifier l'email -->
                <div class="card">
                    <div class="card-header" style="gap: 0.75rem;">
                        <span style="display:flex;align-items:center;justify-content:center;background:var(--primary-color,#007bff);color:#fff;border-radius:50%;width:2.2em;height:2.2em;min-width:2.2em;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </span>
                        <h2 style="font-size:1.2em;line-height:1.2;">Modifier l'email</h2>
                    </div>
                    <div class="card-body">
                        <form action="/Track-Loader/api/user/update-email" method="POST">
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
                    <div class="card-header" style="gap: 0.75rem;">
                        <span style="display:flex;align-items:center;justify-content:center;background:var(--warning-color,#ffc107);color:#fff;border-radius:50%;width:2.2em;height:2.2em;min-width:2.2em;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                        </span>
                        <h2 style="font-size:1.2em;line-height:1.2;">Modifier le mot de passe</h2>
                    </div>
                    <div class="card-body">
                        <form action="/Track-Loader/api/user/update-password" method="POST" autocomplete="off">
                            <div class="form-group">
                                <label for="current-password">Mot de passe actuel</label>
                                <input type="password" id="current-password" name="current_password" class="form-input" required autocomplete="current-password">
                            </div>
                            <div class="form-group">
                                <label for="new-password">Nouveau mot de passe</label>
                                <input type="password" id="new-password" name="new_password" class="form-input" minlength="8" required autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">Confirmer le mot de passe</label>
                                <input type="password" id="confirm-password" name="confirm_password" class="form-input" minlength="8" required autocomplete="new-password">
                            </div>
                            <button type="submit" class="btn btn-primary" style="width:100%;">Mettre à jour le mot de passe</button>
                        </form>
                    </div>
                </div>

                <!-- Historique d'achats -->
                <div class="card card-wide">
                    <div class="card-header" style="gap: 0.75rem;">
                        <span style="display:flex;align-items:center;justify-content:center;background:var(--success-color,#28a745);color:#fff;border-radius:50%;width:2.2em;height:2.2em;min-width:2.2em;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <path d="M16 10a4 4 0 0 1-8 0"></path>
                            </svg>
                        </span>
                        <h2 style="font-size:1.2em;line-height:1.2;">Historique d'achats</h2>
                    </div>
                    <div class="card-body">

                        <?php if (empty($purchases)): ?>
                            <div class="empty-state">
                                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                    <line x1="3" y1="6" x2="21" y2="6"></line>
                                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                                </svg>
                                <h3>Aucun achat</h3>
                                <p>Aucun achat pour le moment</p>
                            </div>
                        <?php else: ?>

                            <div class="mb-2">
                                <p class="text-secondary">Total : <?php echo $total_purchases; ?> achat<?php echo $total_purchases > 1 ? 's' : ''; ?></p>
                            </div>

                            <?php foreach ($purchases as $purchase): ?>
                            <div class="purchase-item">
                                <div class="purchase-info">
                                    <h4><?php echo htmlspecialchars($purchase['title']); ?></h4>
                                    <p><?php echo htmlspecialchars($purchase['artist']); ?></p>
                                </div>
                                <div class="purchase-details">
                                    <span class="text-secondary"><?php echo htmlspecialchars($purchase['date']); ?></span>
                                    <span class="purchase-price"><?php echo htmlspecialchars($purchase['price']); ?> €</span>
                                </div>
                            </div>
                            <?php endforeach; ?>

                        <?php endif; ?>

                    </div>
                </div>

                <!-- Zone de danger -->
                <div class="card card-last">
                    <div class="card-header" style="gap: 0.75rem;">
                        <span style="display:flex;align-items:center;justify-content:center;background:var(--danger-color);color:#fff;border-radius:50%;width:2.2em;height:2.2em;min-width:2.2em;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            </svg>
                        </span>
                        <h2 style="font-size:1.2em;line-height:1.2;">Zone de danger</h2>
                    </div>
                    <div class="card-body">
                        <div class="danger-zone">
                            <h3>Supprimer le compte</h3>
                            <p>La suppression de votre compte est irréversible. Toutes vos données seront perdues.</p>
                            <form action="/Track-Loader/api/user/delete" method="POST"
                                  onsubmit="return confirm('Êtes-vous vraiment sûr de vouloir supprimer votre compte ? Cette action est irréversible.');">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Supprimer mon compte</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <?php endif; ?>

        </div>
    </section>

    <?php include '../include/footer.php'; ?>
</body>
</html>