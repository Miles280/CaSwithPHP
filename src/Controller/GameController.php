<?php

namespace App\Controller;

use App\Manager\UserManager;
use App\Manager\RoleManager;
use App\Manager\GameManager;

class GameController
{
    //Page de recherche de partie
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

    // Page de création de partie
    public function createGame()
    {
        $cssCustom = "createGame.css";
        $title = "Créer une Partie";
        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/blocks/header.php';

        $userManager = new UserManager();
        $gameManager = new GameManager();
        $roleManaged = new RoleManager();

        $userManager->verifySessionMJ();
        $gameManager->newGame("Standard", $_SESSION["userId"]);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST["roles"])) {
                $roles = $_POST["roles"];
                foreach ($roles as $role) {
                    $roleObject = $roleManaged->getByName($role);
                    $gameManager->addRolesToCompo($_SESSION["gameId"], $roleObject->getId());
                }
            } else if (isset($_POST["deleteRole"]) && !empty($_POST["deleteRole"])) {
                $role = $_POST["deleteRole"];
                $roleObject = $roleManaged->getByName($role);

                $gameManager->delRolesToCompo($_SESSION["gameId"], $roleObject->getId());
            }
        }

        $rolesSorcieres = $roleManaged->getRolesByCamp("sorcieres");
        $rolesVillageois = $roleManaged->getRolesByCamp("villageois");
        $rolesIndependants = $roleManaged->getRolesByCamp("independant");
        $selectedRoles = $roleManaged->getAllRolesByGameId($_SESSION["gameId"]);
        $selectedVillageoisRoles = array_filter($selectedRoles, fn($role) => $role->getCamp() === "villageois");
        $selectedSorcieresRoles = array_filter($selectedRoles, fn($role) => $role->getCamp() === "sorcieres");
        $selectedIndependantsRoles = array_filter($selectedRoles, fn($role) => $role->getCamp() === "independant");


        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/createGame.php';

        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/blocks/footer.php';
    }
}
