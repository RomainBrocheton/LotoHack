<?php 
    $title = "Statistiques";
    $head = '
        <script src="public/vendor/chartjs/Chart.min.js"></script>
        <link rel="stylesheet" href="public/vendor/chartjs/Chart.min.css">
    ';
    ob_start();
?>

<h1>Statistiques</h1>

<?php 
    $content = ob_get_clean();

    require('template.php'); 
?>