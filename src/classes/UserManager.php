<?php
require_once("classes/DatabaseManager.php");
require_once("classes/entities/User.php");

class UserManager
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DatabaseManager::getConnection();
    }

    // Inscription d'un utilisateur
    public function register(string $username, string $password): bool
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $requete = $this->pdo->prepare("INSERT INTO user (username, password) VALUES (:username, :password)");
        return $requete->execute([
            'username' => $username,
            'password' => $hashedPassword
        ]);
    }

    // Connexion d'un utilisateur
    public function login(string $username, string $password): bool
    {
        $requete = $this->pdo->prepare("SELECT * FROM user WHERE username = :username");
        $requete->execute(['username' => $username]);
        $user = $requete->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            return true;
        }
        return false;
    }

    // Vérifie si l'utilisateur est connecté
    public static function verifySession(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login.php");
            exit();
        }
    }

    // Vérifie si l'utilisateur est MJ
    public static function verifySessionMJ(): void
    {
        self::verifySession();

        if ($_SESSION['user_id'] == 0) {
            $_SESSION['error_message'] = "Vous devez être MJ pour accéder à cette page.";
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    // Récupération d'un utilisateur via son username
    public function getByUsername(string $username): ?User
    {
        $requete = $this->pdo->prepare("SELECT * FROM user WHERE username = :username");
        $requete->execute(['username' => $username]);
        $userData = $requete->fetch();

        $user = new User($userData["id"], $userData["username"], $userData["password"], $userData["est_mj"], $userData["date_inscription"]);
        return $user ?: null;
    }

    // Récupération d'un utilisateur via son id
    public function getById(int $id): ?User
    {
        $requete = $this->pdo->prepare("SELECT * FROM user WHERE id = :id");
        $requete->execute(['id' => $id]);
        $userData = $requete->fetch();

        $user = new User($userData["id"], $userData["username"], $userData["password"], $userData["est_mj"], $userData["date_inscription"]);
        return $user ?: null;
    }
}
