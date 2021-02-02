<?php 
    $title = "Accueil";

    ob_start();
?>

<h1>Bienvenue sur <strong>LotoHACK</strong></h1>

<p>Ce site complet sur le jeu du Loto de la FDJ a été pensé pour mettre toutes les chances de votre côté lorsqu'il s'agit de choisir les bons numéros !</p>

<p>Vous pourrez bénéficier des dernières statistiques du Loto mises à jour régulièrement et des systèmes réducteurs les plus efficaces, vous pourrez également imprimer une grille à jouer si vous le souhaitez.</p>

<?php 
    $content = ob_get_clean();

    require('template.php'); 
?>