<?php

namespace App\Manager;

use App\Manager\DatabaseManager;
use App\Model\Role;
use App\Model\User;


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
        $requete = $this->pdo->prepare("SELECT * FROM role WHERE nom = :nom");
        $requete->execute(['nom' => $name]);
        $roleData = $requete->fetch();


        if ($roleData) {
            $role = new Role($roleData["nom"], $roleData["camp"], $roleData["description"], $roleData["id"]);
            return $role;
        } else {
            return null;
        }
    }

    // Récupération d'un rôle via son id
    public function getById(int $id): ?Role
    {
        $requete = $this->pdo->prepare("SELECT * FROM role WHERE id = :id");
        $requete->execute(['id' => $id]);
        $roleData = $requete->fetch();

        $role = new User($roleData["id"], $roleData["nom"], $roleData["camp"], $roleData["description"]);
        return $role ?: null;
    }

    // Récupération de tous les rôles d'un camp
    public function getRolesByCamp(string $camp): array
    {
        $requete = $this->pdo->prepare("SELECT * FROM role WHERE camp = :camp");
        $requete->execute(['camp' => $camp]);
        $roles = $requete->fetchAll();

        $arrayRoles = [];
        foreach ($roles as $role) {
            $roleObject = new Role($role["nom"], $role["camp"], $role["description"], $role["id"]);
            $arrayRoles[] = $roleObject;
        }

        return $arrayRoles;
    }

    // Récupération de tous les rôles via l'id d'une game
    public function getAllRolesByGameId(string $partie_id): ?array
    {
        $requete = $this->pdo->prepare("SELECT * FROM partie_roles_temp WHERE partie_id = :partie_id");
        $requete->execute(['partie_id' => $partie_id,]);
        $roles = $requete->fetchAll();

        $arrayRoles = [];
        $roleManager = new RoleManager();
        foreach ($roles as $role) {
            $roleData = $roleManager->getByName($role["role"]);

            $roleObject = new Role($roleData->getName(), $roleData->getCamp(), $roleData->getDescription(), $roleData->getId());
            $arrayRoles[] = $roleObject;
        }

        return $arrayRoles ?: null;
    }
}
