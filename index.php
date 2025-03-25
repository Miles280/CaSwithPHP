<?php
require __DIR__ . '/vendor/autoload.php';

use App\Controller\HomeController;
use App\Controller\SecurityController;
use App\Controller\GameController;

$HomeController = new HomeController;
$SecurityController = new SecurityController;
$GameController = new GameController;


if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = null;
}

if ($action === null) {
    $HomeController->homePage();
} else if ($action === "signup") {
    $SecurityController->register();
} else if ($action === "login") {
    $SecurityController->login();
} else if ($action === "logout") {
    $SecurityController->logout();
} else if ($action === "findGame") {
    $GameController->findGame();
} else if ($action === "createGame") {
    $GameController->createGame();
}
