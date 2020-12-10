<?php 
    $title = "Réducteur";

    ob_start();
?>

<h1>Réducteur</h1>

<?php 
    $content = ob_get_clean();

    require('template.php'); 
?>