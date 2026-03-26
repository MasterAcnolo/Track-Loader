<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - TrackLoader</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/pages.css">
</head>
<body>
    <?php include '../include/header.php'; ?>

    <section class="auth-section">
        <div class="container">
            <div class="auth-container">
                <div class="auth-card">
                    <div class="auth-header">
                        <h1>Connexion</h1>
                        <p>Connectez-vous à votre compte TrackLoader</p>
                    </div>

                    <form action="/Track-Loader/api/user/login" method="POST" class="auth-form">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-input" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" id="password" name="password" class="form-input" required>
                        </div>

                        <div class="form-options">
                            <label class="checkbox-label">
                                <input type="checkbox" name="remember">
                                <span>Se souvenir de moi</span>
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                    </form>

                    <div class="auth-footer">
                        <p>Pas encore de compte ? <a href="./register.php" class="link-primary">Créer un compte</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include '../include/footer.php'; ?>

</body>
</html>
