<?php

namespace App\Manager;

// Crée le lien avec ma base de donnée
class DatabaseManager
{
    private static ?\PDO $pdo = null; // Stocke la connexion PDO

    public static function getConnection(): \PDO
    {
        if (self::$pdo === null) { // Vérifie si la connexion existe déjà
            $host = 'localhost';
            $dbName = 'chasseAuxSorcieres';
            $user = 'root';
            $password = '';

            try {
                self::$pdo = new \PDO(
                    "mysql:host=$host;dbname=$dbName;charset=utf8",
                    $user,
                    $password
                );
                self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            } catch (\Exception $e) {
                die("Erreur de connexion à la base de données : " . $e->getMessage());
            }
        }
        return self::$pdo; // Retourne la connexion
    }
}

// Ouvre la session si ce n'est pas déjà fait
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
