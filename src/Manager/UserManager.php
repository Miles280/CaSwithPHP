<?php

namespace App\Manager;

use App\Manager\DatabaseManager;
use App\Model\User;

class UserManager
{
    private \PDO $pdo;

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
            $_SESSION['userId'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            return true;
        }
        return false;
    }

    // Vérifie si l'utilisateur est connecté
    public static function verifySession(): void
    {
        if (!isset($_SESSION['userId'])) {
            header("Location: index.php?action=login");
            exit();
        }
    }

    // Vérifie si l'utilisateur est MJ
    public static function verifySessionMJ(): void
    {
        self::verifySession();

        $userManager = new UserManager;
        $verifyUser = $userManager->getById($_SESSION["userId"]);

        if (!$verifyUser || $verifyUser->getIsMJ() == 0) {
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

        if (!$userData) {
            return null;
        }

        return new User(
            $userData["username"],
            $userData["password"],
            $userData["isMj"],
            $userData["inscriptionDate"],
            $userData["id"]
        );
    }

    // Récupération d'un utilisateur via son id
    public function getById(int $id): ?User
    {
        $requete = $this->pdo->prepare("SELECT * FROM user WHERE id = :id");
        $requete->execute(['id' => $id]);
        $userData = $requete->fetch();

        if (!$userData) {
            return null;
        }

        return new User(
            $userData["username"],
            $userData["password"],
            $userData["isMj"],
            $userData["inscriptionDate"],
            $userData["id"]
        );
    }
}
