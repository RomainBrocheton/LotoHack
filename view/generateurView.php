<?php 
    $title = "Générateur";

    ob_start();

    /*
    grilleGen();
    stats();
    $Last_tirages = get_last(5);
    $boules = last_to_gen($Last_tirages);
    $chaine = grilles_gen($boules);
    */
?>

<h1>Générateur</h1>

<!--
<div class="container-fluid">
    <div class="row">

        <div class="col-1">
        </div>

        <div class="col-md-10">
            <?php echo $chaine ?>
        </div>
    
        <div class="col-1">
        </div>
    </div>
</div>
-->


<?php 
    $content = ob_get_clean();

    require('template.php'); 
?>