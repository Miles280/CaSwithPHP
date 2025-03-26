<?php

namespace App\Manager;

use App\Manager\DatabaseManager;

class GameManager
{
    private \PDO $pdo;

    public function __construct()
    {
        $this->pdo = DatabaseManager::getConnection();
    }

    // Crée une nouvelle partie
    public function newGame(string $gameMode, int $mjId): ?bool
    {
        if (!isset($_SESSION["gameId"])) {
            $requete = $this->pdo->prepare("INSERT INTO game (gameMode, mjId) VALUES (:gameMode, :mjId)");
            $success = $requete->execute([
                'gameMode' => $gameMode,
                'mjId' => $mjId,
            ]);

            if ($success) {
                $_SESSION["gameId"] = $this->pdo->lastInsertId();
            }

            return $success;
        }
        return null;
    }

    // Ajout de rôles dans la composition de la partie
    public function addRolesToCompo(int $gameId, int $roleId): bool
    {
        $requete = $this->pdo->prepare("INSERT INTO composition (gameId, roleId) VALUES (:gameId, :roleId)");
        return $requete->execute([
            'gameId' => $gameId,
            'roleId' => $roleId
        ]);
    }

    // Suppression de rôles dans la composition de la partie
    public function delRolesToCompo(int $gameId, int $roleId): bool
    {
        $requete = $this->pdo->prepare("DELETE FROM composition WHERE gameId = :gameId AND roleId = :roleId");
        return $requete->execute([
            'gameId' => $gameId,
            'roleId' => $roleId
        ]);
    }
}
