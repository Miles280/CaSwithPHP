<section>
    <h2>Bienvenue dans l'univers de la Chasse aux Sorcières</h2>
    <p>Entrez dans un monde mystérieux où sorcières et villageois s'affrontent dans des jeux de stratégie. Découvrez qui sont vos alliés et qui sont vos ennemis dans une lutte à mort pour la survie.</p>
    <p>Prêt à relever le défi ?</p>
    <a href="index.php?action=findGame" class="btn-primary">Jouer maintenant</a>
</section>

<section>
    <h2>Découvrir les rôles</h2>
    <p>Chaque rôles possède des capacités uniques qui peuvent changer le cours du jeu.</p>
    <p>Apprenez à maîtriser chaque rôle pour déjouer les stratégies de vos adversaires.</p>
    <a href="index.php?action=catalogueRoles" class="btn-primary">Tous les rôles</a>
    <p class="link"><a href="index.php?action=catalogueRoles">Créer un nouveau rôle</a></p>
    <?php
    if (isset($_SESSION['error_message'])) {
        echo "<div class='error-message'>" . $_SESSION['error_message'] . "</div>";
        unset($_SESSION['error_message']);
    }
    ?>
</section>