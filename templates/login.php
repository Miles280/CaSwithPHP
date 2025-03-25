<section class="auth">
    <h2>Connexion</h2>
    <form action="index.php?action=login" method="POST">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
        <input type="password" name="password" placeholder="Mot de passe" required>

        <button type="submit">Se connecter</button>
        <?php if (isset($errors["failed"])) echo "<p>" . htmlspecialchars($errors["failed"]) . "</p>"; ?>

    </form>
    <p>Pas encore inscrit ? <a href="signup.php">S'inscrire</a></p>
</section>