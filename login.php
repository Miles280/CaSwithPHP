<?php
$cssCustom = "connexion.css";
$title = "Connexion";
require_once("blocs/header.php");
require_once("blocs/connectDB.php");
?>


<section class="auth">
    <h2>Connexion</h2>
    <form>
        <input type="text" placeholder="Nom d'utilisateur" required>
        <input type="password" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
    </form>
    <p>Pas encore inscrit ? <a href="signup.php">S'inscrire</a></p>
</section>

<?php
require_once("blocs/footer.php");
?>