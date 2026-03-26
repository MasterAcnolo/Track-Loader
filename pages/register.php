<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - TrackLoader</title>
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
                        <h1>Inscription</h1>
                        <p>Créez votre compte TrackLoader</p>
                    </div>

                    <form action="/Track-Loader/api/user/register" method="POST" class="auth-form">

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-input" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" id="password" name="password" class="form-input" minlength="6" required>
                            <small class="form-hint">Au moins 6 caractères</small>
                        </div>

                        <div class="form-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="terms" required>
                                <span>J'accepte les <a href="#" class="link-primary">conditions d'utilisation</a> et la <a href="#" class="link-primary">politique de confidentialité</a></span>
                            </label>
                             <label class="checkbox-label">
                                <input type="checkbox" name="remember">
                                <span>Se souvenir de moi </span>
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Créer mon compte</button>
                    </form>

                    <div class="auth-footer">
                        <p>Vous avez déjà un compte ? <a href="./login.php" class="link-primary">Se connecter</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include '../include/footer.php'; ?>

</body>
</html>
