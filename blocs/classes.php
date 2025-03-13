<?php
require_once("blocs/database.php");
session_start();


class User
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
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
        if (!isset($_SESSION['user_id'])) {
            header("Location: login.php");
            exit();
        }

        $userManaged = new User();
        $user = $userManaged->getById($_SESSION['user_id']);

        if ($user["est_mj"] != 1) {
            $_SESSION['error_message'] = "Vous devez être MJ pour accéder à cette page.";
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    // Récupération d'un utilisateur via son username
    public function getByUsername(string $username): ?array
    {
        $requete = $this->pdo->prepare("SELECT * FROM user WHERE username = :username");
        $requete->execute(['username' => $username]);
        $user = $requete->fetch();


        return $user ?: null;
    }

    // Récupération d'un utilisateur via son id
    public function getById(string $id): ?array
    {
        $requete = $this->pdo->prepare("SELECT * FROM user WHERE id = :id");
        $requete->execute(['id' => $id]);
        $user = $requete->fetch();


        return $user ?: null;
    }
}

class Role
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    // Récupération d'un rôle via son nom
    public function getByName(string $name): ?array
    {
        $requete = $this->pdo->prepare("SELECT * FROM user WHERE username = :username");
        $requete->execute(['username' => $name]);
        $role = $requete->fetch();


        return $role ?: null;
    }

    // Récupération d'un rôle via son id
    public function getById(string $id): ?array
    {
        $requete = $this->pdo->prepare("SELECT * FROM user WHERE id = :id");
        $requete->execute(['id' => $id]);
        $role = $requete->fetch();


        return $role ?: null;
    }

    // Récupération de tous les rôles d'un camp
    public function getRolesByCamp(string $camp): array
    {
        $requete = $this->pdo->prepare("SELECT * FROM role WHERE camp = :camp");
        $requete->execute(['camp' => $camp]);
        $roles = $requete->fetchAll();

        return $roles;
    }
}
