<section class="auth">
    <h2>Inscription</h2>
    <form action="index.php?action=signup" method="POST">
        <input type="text" name="username" placeholder="Nom d'utilisateur" value="<?php if (isset($username)) echo $username; ?>" required>
        <?php if (isset($errors["username"])) echo "<p>" . htmlspecialchars($errors["username"]) . "</p>"; ?>

        <input type="password" name="password" placeholder="Mot de passe" required>

        <input type="password" name="confirmPassword" placeholder="Confirmez votre mot de passe" required>
        <?php if (isset($errors["password"])) echo "<p>" . htmlspecialchars($errors["password"]) . "</p>"; ?>

        <button type="submit">S'inscrire</button>
        <?php if (isset($errors["missing"])) echo "<p>" . htmlspecialchars($errors["missing"]) . "</p>"; ?>
    </form>
    <p>Déjà inscrit ? <a href="index.php?action=login">Se connecter</a></p>
</section>