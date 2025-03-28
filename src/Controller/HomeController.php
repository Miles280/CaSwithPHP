<?php

namespace App\Controller;

use App\Manager\RoleManager;

class HomeController
{
    // Page d'acceuil
    public function homePage()
    {

        $cssCustom = "homePage.css";
        $title = "Acceuil";
        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/blocks/header.php';

        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/homePage.php';

        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/blocks/footer.php';
    }

    // Page des rôles
    public function catalogue()
    {

        $cssCustom = "catalogueRoles.css";
        $title = "Tous les rôles";

        $roleManager = new RoleManager;
        $sorter = isset($_GET["sorter"]) ? $_GET["sorter"] : null;

        if ($sorter === null) {
            $roles = $roleManager->getAll();
        } else if ($sorter === "villageois") {
            $roles = $roleManager->getRolesByCamp("villageois");
        } else if ($sorter === "sorcieres") {
            $roles = $roleManager->getRolesByCamp("sorciere");
        } else if ($sorter === "independants") {
            $roles = $roleManager->getRolesByCamp("independant");
        }


        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/blocks/header.php';

        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/catalogueRoles.php';

        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/blocks/footer.php';
    }

    // Page du détail d'un rôle
    public function detailRole()
    {

        $cssCustom = "detailRole.css";
        $title = "Rôle";

        $roleManager = new RoleManager;
        $role = $roleManager->getById($_GET["roleId"]);

        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/blocks/header.php';

        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/detailRole.php';

        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/blocks/footer.php';
    }
}
