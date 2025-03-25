<?php

namespace App\Manager;

use App\Manager\DatabaseManager;
use App\Model\Game;

class GameManager
{
    private \PDO $pdo;

    public function __construct()
    {
        $this->pdo = DatabaseManager::getConnection();
    }

    // Crée une nouvelle partie
    public function newGame(string $mode_jeu, int $mj_id): ?bool
    {
        if (!isset($_SESSION["gameId"])) {
            $requete = $this->pdo->prepare("INSERT INTO game (mode_jeu, mj_id) VALUES (:mode_jeu, :mj_id)");
            $success = $requete->execute(['mode_jeu' => $mode_jeu, 'mj_id' => $mj_id,]);

            if ($success) {
                $_SESSION["gameId"] = $this->pdo->lastInsertId();
            }

            return $success;
        }
        return null;
    }

    // Ajout de rôles dans la composition de la partie
    public function addRolesToCompo(int $partie_id, string $role): bool
    {
        $requete = $this->pdo->prepare("INSERT INTO partie_roles_temp (partie_id, role) VALUES (:partie_id, :role)");
        return $requete->execute(['partie_id' => $partie_id, 'role' => $role]);
    }

    // Suppression de rôles dans la composition de la partie
    public function delRolesToCompo(string $partie_id, string $role): bool
    {
        $requete = $this->pdo->prepare("DELETE FROM partie_roles_temp WHERE partie_id = :partie_id AND role = :role;");
        return $requete->execute(['partie_id' => $partie_id, 'role' => $role]);
    }
}
