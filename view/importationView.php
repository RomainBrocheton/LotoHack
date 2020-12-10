<?php 
    $title = "Importation";

    ob_start();
?>

<h1>Importation</h1>

<?php 
    $content = ob_get_clean();

    require('template.php'); 
?>