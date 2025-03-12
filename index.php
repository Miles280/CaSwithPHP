<?php
$cssCustom = "index.css";
$title = "Acceuil";
require_once("blocs/header.php");
require_once("blocs/connectDB.php");
?>



<section class="intro">
    <h2>Bienvenue dans l'univers de la Chasse aux Sorcières</h2>
    <p>Entrez dans un monde mystérieux où sorcières et villageois s'affrontent dans des jeux de stratégie. Découvrez qui sont vos alliés et qui sont vos ennemis dans une lutte à mort pour la survie.</p>
    <p>Prêt à relever le défi ?</p>
    <a href="findGame.php" class="btn-primary">Jouer maintenant</a>
</section>

<?php
require_once("blocs/footer.php");
?>