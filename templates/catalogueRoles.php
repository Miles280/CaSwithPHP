<!-- Section des boutons -->
<div class="button-group">
    <button class="role-btn">Tous les rôles</button>
    <button class="role-btn">Villageois</button>
    <button class="role-btn">Sorcières</button>
    <button class="role-btn">Indépendants</button>
</div>

<!-- Section des rôles -->
<div class="role-list">
    <?php
    foreach ($roles as $role) { ?>
        <div class="role-item">
            <a href="index.php?action=detailRole&roleId=<?= $role->getId() ?>">
                <h3><?= $role->getName() ?></h3>
                <p><?= $role->getDescription() ?></p>
            </a>
        </div>
    <?php } ?>
</div>