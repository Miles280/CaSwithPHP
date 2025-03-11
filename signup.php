<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/connexion.css">
    <title>Inscription - La Chasse aux Sorcières</title>
</head>

<body>
    <header>
        <h1>La Chasse aux Sorcières</h1>
    </header>
    <main>
        <section class="auth">
            <h2>Inscription</h2>
            <form action="signup.php" method="POST">
                <input type="text" placeholder="Nom d'utilisateur" required>
                <input type="password" placeholder="Mot de passe" required>
                <input type="password" placeholder="Confirmez votre mot de passe" required>
                <button type="submit">S'inscrire</button>
            </form>
            <p>Déjà inscrit ? <a href="login.php">Se connecter</a></p>
        </section>
    </main>
</body>

</html>