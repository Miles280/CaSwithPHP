<?php
$cssCustom = "connexion.css";
$title = "Inscription";
require_once("blocs/header.php");
require_once("classes/UserManager.php");
?>

<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["confirmPassword"])) {
        $errors["missing"] = "Le nom d'utilisateur, le mot de passe et la confirmation du mot de passe sont obligatoires.";
    } else {
        $username = trim($_POST["username"]);
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];

        $userManager = new UserManager();
        $userData = $userManager->getByUsername($username);

        if ($userData) {
            $errors["username"] = "Ce nom d'utilisateur est déjà pris.";
        } else if ($password != $confirmPassword) {
            $errors["password"] = "Le mot de passe n'est pas le même.";
        } else {
            $userManager->register($username, $password);
            header("Location: login.php");
            exit();
        }
    }
}
?>

<section class="auth">
    <h2>Inscription</h2>
    <form action="signup.php" method="POST">
        <input type="text" name="username" placeholder="Nom d'utilisateur" value="<?php if (isset($username)) echo $username; ?>" required>
        <?php if (isset($errors["username"])) echo "<p>" . htmlspecialchars($errors["username"]) . "</p>"; ?>

        <input type="password" name="password" placeholder="Mot de passe" required>

        <input type="password" name="confirmPassword" placeholder="Confirmez votre mot de passe" required>
        <?php if (isset($errors["password"])) echo "<p>" . htmlspecialchars($errors["password"]) . "</p>"; ?>

        <button type="submit">S'inscrire</button>
        <?php if (isset($errors["missing"])) echo "<p>" . htmlspecialchars($errors["missing"]) . "</p>"; ?>
    </form>
    <p>Déjà inscrit ? <a href="login.php">Se connecter</a></p>
</section>

<?php
require_once("blocs/footer.php");
?>