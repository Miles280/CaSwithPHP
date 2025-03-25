<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["user_id"])) {
    unset($_SESSION["user_id"]);
}

if (isset($_SESSION["username"])) {
    unset($_SESSION["username"]);
}

if (isset($_SESSION["gameId"])) {
    unset($_SESSION["gameId"]);
}

header("location: index.php");
