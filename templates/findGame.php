<!-- Section pour rejoindre une partie -->
<section class="join-game">
    <h2>Rejoindre une partie</h2>
    <form>
        <label for="game-id">ID de la partie</label>
        <input type="text" id="game-id" placeholder="ID de la partie" required>

        <button type="submit">Rejoindre</button>
    </form>
    <p class="link"><a href="index.php?action=createGame">Créer une nouvelle partie</a></p>
    <?php
    if (isset($_SESSION['error_message'])) {
        echo "<div class='error-message'>" . $_SESSION['error_message'] . "</div>";
        unset($_SESSION['error_message']);
    }
    ?>
</section>

<!-- Section pour les anciennes parties -->
<section class="old-games">
    <h2>Historique des parties</h2>
    <div class="game-history">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Mode de jeu</th>
                    <th>Nombre de joueurs</th>
                    <th>Camp victorieux</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>12/02/25</td>
                    <td>Composition cachée</td>
                    <td>12</td>
                    <td>Villageois</td>
                </tr>
                <tr>
                    <td>03/02/25</td>
                    <td>Standard</td>
                    <td>9</td>
                    <td>Sorcières</td>
                </tr>
                <!-- Autres anciennes parties -->
            </tbody>
        </table>
    </div>
    <p class="link"><a href="historique.php">Voir plus</a></p>
</section>