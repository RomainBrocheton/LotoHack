<?php 
    $title = "Accueil";

    ob_start();
?>

<h1>Bienvenue sur <strong>LotoHACK</strong></h1>

<?php 
    $content = ob_get_clean();

    require('template.php'); 
?>