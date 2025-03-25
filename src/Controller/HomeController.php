<?php

namespace App\Controller;

class HomeController
{

    public function homePage()
    {

        $cssCustom = "homePage.css";
        $title = "Acceuil";
        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/blocks/header.php';

        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/homePage.php';

        require_once $_SERVER['DOCUMENT_ROOT'] . '/CaS/templates/blocks/footer.php';
    }
}
