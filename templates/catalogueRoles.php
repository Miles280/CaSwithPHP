<!-- Section des boutons -->
<div class="button-group">
    <a href="index.php?action=catalogueRoles">
        <button class="role-btn">Tous les rôles</button>
    </a>
    <a href="index.php?action=catalogueRoles&sorter=villageois">
        <button class="role-btn">Villageois</button>
    </a>
    <a href="index.php?action=catalogueRoles&sorter=sorcieres">
        <button class="role-btn">Sorcières</button>
    </a>
    <a href="index.php?action=catalogueRoles&sorter=independants">
        <button class="role-btn">Indépendants</button>
    </a>
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