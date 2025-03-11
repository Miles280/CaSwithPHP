<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/gameManagement.css">
    <title>Gestion des Parties</title>
</head>

<body>
    <header>
        <h1>Gestion des Parties</h1>
    </header>
    <main>
        <!-- Section pour rejoindre une partie -->
        <section class="join-game">
            <h2>Rejoindre une partie</h2>
            <form>
                <label for="game-id">ID de la partie</label>
                <input type="text" id="game-id" placeholder="ID de la partie" required>

                <button type="submit">Rejoindre</button>
            </form>
            <p class="create-game-link"><a href="createGame.html">Créer une nouvelle partie</a></p>
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
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Chasse aux Sorcières #1</td>
                            <td>Obscur</td>
                            <td>Terminé</td>
                        </tr>
                        <tr>
                            <td>Chasse aux Sorcières #2</td>
                            <td>Standard</td>
                            <td>Terminé</td>
                        </tr>
                        <!-- Autres anciennes parties -->
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>

</html>