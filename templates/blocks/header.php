<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/CaS/templates/css/<?= $cssCustom ?>?v=<?= time(); ?>">
    <title><?= $title ?> - La Chasse aux Sorcières</title>
</head>

<body>
    <header>
        <h1><a href="index.php">La Chasse aux Sorcières</a></h1>
        <nav>
            <ul>
                <?php
                if (!isset($_SESSION["username"])) {
                    echo "<li><a href='index.php?action=login'>Se connecter</a></li><li><a href='index.php?action=signup'>S'inscrire</a></li>";
                }
                if (isset($_SESSION["username"])) {
                    echo "<li><a href='index.php?action=logout'>Déconnexion</a></li>";
                }
                ?>
            </ul>
        </nav>
    </header>

    <main>


        <!-- CSS du header -->
        <style>
            header {
                background-color: #3d2c5e;
                padding: 10px;
                text-align: center;
                margin-bottom: 20px;

                h1 {
                    margin: 0;
                    font-size: 2.5em;

                    a {
                        text-decoration: none;
                        color: #c084fc;
                    }
                }

                nav {
                    margin-top: 10px;

                    ul {
                        list-style-type: none;
                        padding: 0;
                        display: flex;
                        justify-content: center;
                        gap: 20px;
                        margin: 0px;

                        li {
                            display: flex;
                            /* Permet à <a> de s'étendre correctement */

                            a {
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                width: 150px;
                                height: 40px;
                                text-decoration: none;
                                color: #c084fc;
                                font-size: 1.2em;
                                transition: color 0.3s;

                                &:hover {
                                    color: #8b5cf6;
                                }
                            }
                        }
                    }
                }
            }
        </style>