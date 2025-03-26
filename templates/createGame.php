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
                <form method="POST" action="">
                    <label for="roles">Sélectionner les Rôles</label>
                    <select name="roles[]" multiple size="6">
                        <optgroup label="Sorcières">
                            <?php
                            foreach ($rolesSorcieres as $role) { ?>
                                <option value="<?= htmlspecialchars($role->getName()) ?>"><?= htmlspecialchars($role->getName()) ?></option>
                            <?php
                            }
                            ?>
                        </optgroup>
                        <optgroup label="Villageois">
                            <?php
                            foreach ($rolesVillageois as $role) { ?>
                                <option value="<?= htmlspecialchars($role->getName()) ?>"><?= htmlspecialchars($role->getName()) ?></option>
                            <?php
                            }
                            ?>
                        </optgroup>

                        <optgroup label="Indépendants">
                            <?php
                            foreach ($rolesIndependants as $role) { ?>
                                <option value="<?= htmlspecialchars($role->getName()) ?>"><?= htmlspecialchars($role->getName()) ?></option>
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
                if (!empty($selectedRoles)) { ?>
                    <ul id="selected-roles-list">
                        <?php foreach ($selectedRoles as $role) { ?>
                            <li>
                                <?= htmlspecialchars($role->getName()) ?>
                                <form method="POST" action="">
                                    <input type="hidden" name="deleteRole" value="<?= htmlspecialchars($role->getName()) ?>">
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