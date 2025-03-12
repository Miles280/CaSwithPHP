<?php
$cssCustom = "connexion.css";
$title = "Inscription";
require_once("blocs/header.php");
require_once("blocs/connectDB.php");
?>


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

<?php
require_once("blocs/footer.php");
?>