<?php 
    $title = "Générateur";

    ob_start();
?>

<h1>Générateur</h1>

<?php 
    $content = ob_get_clean();

    require('template.php'); 
?>