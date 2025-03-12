<?php

// Vérifie que l'utilisateur est connecté
function verifySession(): void
{
    session_start();
    if (!isset($_SESSION["username"])) {
        header("Location: index.php");
        exit();
    };
};
