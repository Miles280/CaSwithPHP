<?php

namespace App\Controller;

use App\Manager\UserManager;

class SecurityController
{
    // Page d'inscription
    public function register()
    {
        $cssCustom = "connexion.css";
        $title = "Inscription";
        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/blocks/header.php';

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
                    header("Location: index.php?action=login");
                    exit();
                }
            }
        }

        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/signup.php';

        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/blocks/footer.php';
    }

    // Page de connection
    public function login()
    {
        $cssCustom = "connexion.css";
        $title = "Connexion";
        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/blocks/header.php';

        $errors = [];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = trim($_POST["username"]);
            $password = $_POST["password"];

            $userManager = new UserManager();
            if ($userManager->login($username, $password)) {
                header("Location: index.php");
                exit();
            } else {
                $errors["failed"] = "L'identifiant ou le mot de passe n'est pas correcte.";
            }
        }

        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/login.php';

        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/blocks/footer.php';
    }

    // Page de déconnexion
    public function logout()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/logout.php';
    }
}
