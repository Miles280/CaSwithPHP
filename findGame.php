<?php
$cssCustom = "findGame.css";
$title = "Rejoindre une Partie";
require_once("blocs/header.php");
require_once("blocs/classes.php");
?>

<?php
$user = new User();
$user->verifySession();
?>

<!-- Section pour rejoindre une partie -->
<section class="join-game">
    <h2>Rejoindre une partie</h2>
    <form>
        <label for="game-id">ID de la partie</label>
        <input type="text" id="game-id" placeholder="ID de la partie" required>

        <button type="submit">Rejoindre</button>
    </form>
    <p class="create-game-link"><a href="createGame.php">Créer une nouvelle partie</a></p>
</section>

<!-- Section pour les anciennes parties -->
<section class="old-games">
    <h2>Anciennes parties</h2>
    <div class="game-history">
        <table>
            <thead>
                <tr>
                    <th>Nom de la partie</th>
                    <th>Mode</th>
                    <th>Camp victorieux</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Chasse aux Sorcières #1</td>
                    <td>Obscur</td>
                    <td>Villageois</td>
                </tr>
                <tr>
                    <td>Chasse aux Sorcières #2</td>
                    <td>Standard</td>
                    <td>Sorcières</td>
                </tr>
                <!-- Autres anciennes parties -->
            </tbody>
        </table>
    </div>
</section>

<?php
require_once("blocs/footer.php");
?>