<?php 
    $title = "Statistiques";

    ob_start();
?>

<h1>Statistiques</h1>

<?php 
    $content = ob_get_clean();

    require('template.php'); 
?>