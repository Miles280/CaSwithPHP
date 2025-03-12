<?php
$cssCustom = "game.css";
$title = "En Partie";
require_once("blocs/header.php");
require_once("blocs/connectDB.php");
?>



<section class="game">
    <h2>Rejoindre une Partie</h2>
    <p>Choisissez une partie et rejoignez-la pour commencer.</p>

    <!-- Affichage des informations de la partie -->
    <div class="game-info">
        <div class="game-status">
            <h3>ID de la Partie: <span id="game-id">12345</span></h3>
            <p>Status: <span id="game-status">En attente de joueurs</span></p>
        </div>

        <div class="game-details">
            <h3>Mode de jeu: <span id="game-mode">Standard</span></h3>
            <h4>Rôles disponibles:</h4>
            <ul id="game-roles">
                <li>Sorcière 1</li>
                <li>Villageois 2</li>
                <li>Indépendant 1</li>
            </ul>
        </div>
    </div>

    <!-- Liste des joueurs déjà inscrits -->
    <div class="player-list">
        <h3>Joueurs inscrits:</h3>
        <ul>
            <li>Joueur 1</li>
            <li>Joueur 2</li>
            <li>Joueur 3</li>
        </ul>
    </div>

    <!-- Bouton pour rejoindre la partie -->
    <div class="join-game">
        <button id="join-game-button" onclick="joinGame()">Rejoindre la Partie</button>
    </div>

    <!-- Informations dynamiques de la partie si en cours -->
    <div id="game-in-progress" class="game-in-progress">
        <h3>Partie en cours</h3>
        <p>Le Maître du Jeu a déjà attribué les rôles et la partie a commencé. Vous pouvez rejoindre la partie en spectateur.</p>
        <p>Rôles attribués: Sorcière 1, Villageois 2, Indépendant 1</p>
        <p>Le jeu a commencé à 20h30.</p>
    </div>
</section>

<?php
require_once("blocs/footer.php");
?>