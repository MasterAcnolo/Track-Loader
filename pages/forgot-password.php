<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié - TrackLoader</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/pages.css">
</head>
<body>
    <!-- <?php include '../include/header.php'; ?> -->

    <section class="auth-section">
        <div class="container">
            <div class="auth-container">
                <div class="auth-card">
                    <div class="auth-header">
                        <h1>Mot de passe oublié</h1>
                        <p>Entrez votre email pour réinitialiser votre mot de passe</p>
                    </div>

                    <form action="/php/forgot-password.php" method="POST" class="auth-form">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-input" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Envoyer le lien de réinitialisation</button>
                    </form>

                    <div class="auth-footer">
                        <p><a href="./login.php" class="link-primary">&larr; Retour à la connexion</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include '../include/footer.php'; ?>

</body>
</html>
