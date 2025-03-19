<?php
$cssCustom = "createGame.css";
$title = "Créer une Partie";
require_once("blocs/header.php");
require_once("classes/UserManager.php");
require_once("classes/RoleManager.php");
require_once("classes/GameManager.php");

$userManager = new UserManager();
$userManager->verifySession();

$game = new Game();
$game->newGame("Standard", $_SESSION["user_id"]);
// var_dump($_SESSION);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["roles"])) {
        $roles = $_POST["roles"];
        foreach ($roles as $role) {
            $game->addRolesToCompo($_SESSION["game_id"], $role);
        }
    } else if (isset($_POST["del_role_name"]) && !empty($_POST["del_role_name"])) {
        $role_id = $_POST["del_role_name"];

        $game->delRolesToCompo($_SESSION["game_id"], $role_id);
    }
}

?>

<section class="create-game">
    <h2>Créer une Partie</h2>
    <p>Configurez votre partie et attribuez les rôles aux joueurs.</p>

    <!-- Section ID de la Partie -->
    <div class="game-id">

        <input type="text" id="game-id" placeholder="ID générée ici" readonly>
        <button onclick="copyGameId()">Copier ID</button>
    </div>

    <!-- Section Mode de Jeu -->
    <div class="game-mode">
        <label for="game-mode">Choisir le mode de jeu</label>
        <select id="game-mode">
            <option value="standard">Standard</option>
            <option value="obscur">Obscur</option>
        </select>
    </div>

    <div class="contenu">
        <!-- Formulaire de Sélection des Rôles -->
        <div class="form-container">
            <div class="form-section">
                <form method="POST" action="createGame.php">
                    <label for="roles">Sélectionner les Rôles</label>
                    <select name="roles[]" multiple size="6">
                        <optgroup label="Sorcères">
                            <?php
                            $roleManaged = new RoleManager();
                            $roles = $roleManaged->getRolesByCamp("sorcieres");
                            foreach ($roles as $role) { ?>
                                <option value="<?= $role->getName() ?>"><?= $role->getName() ?></option>
                            <?php
                            }
                            ?>
                        </optgroup>

                        <optgroup label="Villageois">
                            <?php
                            $roleManaged = new RoleManager();
                            $roles = $roleManaged->getRolesByCamp("villageois");
                            foreach ($roles as $role) { ?>
                                <option value="<?= $role->getName() ?>"><?= $role->getName() ?></option>
                            <?php
                            }
                            ?>
                        </optgroup>

                        <optgroup label="Indépendants">
                            <?php
                            $roleManaged = new RoleManager();
                            $roles = $roleManaged->getRolesByCamp("independant");
                            foreach ($roles as $role) { ?>
                                <option value="<?= $role->getName() ?>"><?= $role->getName() ?></option>
                            <?php
                            }
                            ?>
                        </optgroup>
                    </select>

                    <button class="validate-role">Ajouter</button>
                </form>

            </div>

            <!-- Liste des rôles sélectionnés -->
            <div class="role-summary">
                <h3>Rôles Sélectionnés</h3>
                <?php
                $rolesManaged = new RoleManager();
                $roles = $rolesManaged->getAllRolesByGameId($_SESSION["game_id"]);

                if (!empty($roles)) { ?>
                    <ul id="selected-roles-list">
                        <?php foreach ($roles as $role) { ?>
                            <li>
                                <?= htmlspecialchars($role->getName()) ?>
                                <form method="POST" action="createGame.php">
                                    <input type="hidden" name="del_role_name" value="<?= htmlspecialchars($role->getName()) ?>">
                                    <button type="submit">❌</button>
                                </form>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } else { ?>
                    <p>Aucun rôle sélectionné.</p>
                <?php } ?>

            </div>
        </div>

        <!-- Liste des Joueurs -->
        <div class="player-list">
            <h3>Liste des Joueurs</h3>
            <ul>
                <li>Joueur 1</li>
                <li>Joueur 2</li>
                <li>Joueur 3</li>
            </ul>
        </div>
    </div>
    <button type="submit" class="launch-game">Lancer la Partie</button>
</section>

<?php
require_once("blocs/footer.php");
?>