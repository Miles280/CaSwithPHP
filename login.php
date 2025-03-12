<?php
$cssCustom = "connexion.css";
$title = "Connexion";
require_once("blocs/header.php");
require_once("blocs/connectDB.php");
?>

<?php
$errors = [];


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    $requete = $pdo->prepare("SELECT * FROM user WHERE username = :username");
    $requete->execute(["username" => $username]);
    $user = $requete->fetch(PDO::FETCH_ASSOC);

    if (!empty($password) && !empty($user["password"]) && password_verify($password, $user["password"])) {
        $_SESSION["username"] = $user["username"];
        header("Location: index.php");
        exit();
    } else {
        $errors["failed"] = "L'identifiant ou le mot de passe n'est pas correcte.";
    }
}
?>

<section class="auth">
    <h2>Connexion</h2>
    <form action="login.php" method="POST">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
        <input type="password" name="password" placeholder="Mot de passe" required>

        <button type="submit">Se connecter</button>
        <?php if (isset($errors["failed"])) echo "<p>" . htmlspecialchars($errors["failed"]) . "</p>"; ?>

    </form>
    <p>Pas encore inscrit ? <a href="signup.php">S'inscrire</a></p>
</section>

<?php
require_once("blocs/footer.php");
?>