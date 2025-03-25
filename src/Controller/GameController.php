<?php

namespace App\Controller;

use App\Manager\UserManager;

use App\Manager\GameManager;

class GameController
{

    public function findGame()
    {
        $cssCustom = "findGame.css";
        $title = "Rejoindre une Partie";
        $userManager = new UserManager();
        $userManager->verifySession();
        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/blocks/header.php';

        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/findGame.php';

        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/blocks/footer.php';
    }

    public function createGame()
    {
        $cssCustom = "createGame.css";
        $title = "Créer une Partie";
        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/blocks/header.php';

        $userManager = new UserManager();
        $userManager->verifySessionMJ();

        $game = new GameManager();
        $game->newGame("Standard", $_SESSION["user_id"]);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST["roles"])) {
                $roles = $_POST["roles"];
                foreach ($roles as $role) {
                    $game->addRolesToCompo($_SESSION["game_id"], $role);
                }
            } else if (isset($_POST["del_role_name"]) && !empty($_POST["del_role_name"])) {
                $role_id = $_POST["del_role_name"];

                $game->delRolesToCompo($_SESSION["game_id"], $role_id);
            }
        }


        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/createGame.php';

        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/blocks/footer.php';
    }
}
