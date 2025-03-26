<?php

namespace App\Manager;

use App\Manager\DatabaseManager;
use App\Model\Role;

class RoleManager
{
    private \PDO $pdo;

    public function __construct()
    {
        $this->pdo = DatabaseManager::getConnection();
    }

    // Récupération d'un rôle via son nom
    public function getByName(string $name): ?Role
    {
        $requete = $this->pdo->prepare("SELECT * FROM role WHERE name = :name");
        $requete->execute(['name' => $name]);
        $roleData = $requete->fetch();

        return $roleData ? new Role($roleData["name"], $roleData["camp"], $roleData["description"], $roleData["id"]) : null;
    }

    // Récupération d'un rôle via son ID
    public function getById(int $roleId): ?Role
    {
        $requete = $this->pdo->prepare("SELECT * FROM role WHERE id = :roleId");
        $requete->execute(['roleId' => $roleId]);
        $roleData = $requete->fetch();

        return $roleData ? new Role($roleData["name"], $roleData["camp"], $roleData["description"], $roleData["id"]) : null;
    }

    // Récupération de tous les rôles d'un camp
    public function getRolesByCamp(string $camp): array
    {
        $requete = $this->pdo->prepare("SELECT * FROM role WHERE camp = :camp");
        $requete->execute(['camp' => $camp]);
        $roles = $requete->fetchAll();

        $arrayRoles = [];
        foreach ($roles as $role) {
            $arrayRoles[] = new Role($role["name"], $role["camp"], $role["description"], $role["id"]);
        }

        return $arrayRoles;
    }

    // Récupération de tous les rôles d'une partie via son ID
    public function getAllRolesByGameId(int $gameId): array
    {
        $requete = $this->pdo->prepare("SELECT role.* FROM composition INNER JOIN role ON composition.roleId = role.id WHERE composition.gameId = :gameId");
        $requete->execute(['gameId' => $gameId]);
        $roles = $requete->fetchAll();

        $arrayRoles = [];
        foreach ($roles as $role) {
            $arrayRoles[] = new Role($role["name"], $role["camp"], $role["description"], $role["id"]);
        }

        return $arrayRoles;
    }
}
