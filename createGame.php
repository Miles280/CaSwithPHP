<?php
$cssCustom = "createGame.css";
$title = "Créer une Partie";
require_once("blocs/header.php");
require_once("blocs/connectDB.php");
?>

<?php
$user = new User();
$user->verifySessionMJ();
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
                <label for="roles-sorcerers">Sélectionner les Sorcières</label>
                <select id="roles-sorcerers" multiple>
                    <option value="sorcerer1">Sorcière 1</option>
                    <option value="sorcerer2">Sorcière 2</option>
                    <option value="sorcerer3">Sorcière 3</option>
                    <option value="sorcerer1">Sorcière 1</option>
                    <option value="sorcerer2">Sorcière 2</option>
                    <option value="sorcerer3">Sorcière 3</option>
                    <option value="sorcerer1">Sorcière 1</option>
                    <option value="sorcerer2">Sorcière 2</option>
                    <option value="sorcerer3">Sorcière 3</option>
                </select>

                <label for="roles-villagers">Sélectionner les Villageois</label>
                <select id="roles-villagers" multiple>
                    <option value="villager1">Villageois 1</option>
                    <option value="villager2">Villageois 2</option>
                    <option value="villager3">Villageois 3</option>
                    <option value="villager1">Villageois 1</option>
                    <option value="villager2">Villageois 2</option>
                    <option value="villager3">Villageois 3</option>
                    <option value="villager1">Villageois 1</option>
                    <option value="villager2">Villageois 2</option>
                    <option value="villager3">Villageois 3</option>
                </select>

                <label for="roles-independents">Sélectionner les Indépendants</label>
                <select id="roles-independents" multiple>
                    <option value="independent1">Indépendant 1</option>
                    <option value="independent2">Indépendant 2</option>
                    <option value="independent3">Indépendant 3</option>
                    <option value="independent1">Indépendant 1</option>
                    <option value="independent2">Indépendant 2</option>
                    <option value="independent3">Indépendant 3</option>
                    <option value="independent1">Indépendant 1</option>
                    <option value="independent2">Indépendant 2</option>
                    <option value="independent3">Indépendant 3</option>
                </select>
            </div>

            <div class="role-summary">
                <h3>Récapitulatif des rôles</h3>
                <p>Rôle 1: Description</p>
                <p>Rôle 2: Description</p>
                <p>Rôle 3: Description</p>
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
</section>

<?php
require_once("blocs/footer.php");
?>