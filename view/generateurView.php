<?php 
    $title = "Générateur";

    $image = "./public/images/generateur/GrilleDuLoto.png";

    ob_start();

    /*
    grilleGen();
    stats();
    $Last_tirages = get_last(5);
    $boules = last_to_gen($Last_tirages);
    $chaine = grilles_gen($boules);
    */
?>

<h1>Grilles à jouer</h1>

<body>

    <a download="GrilleDuLoto.png" href="<?php echo $image; ?>" title="Grille du Loto" class="mx-auto" style="width: 1000px;">
        <img src="<?php echo $image; ?>" class="img-fluid h-75 w-75 m-5" alt="Grille du Loto">
    </a>

    <button onclick="printImg('<?php echo $image; ?>')" type="button" class="btn btn-secondary btn-lg">Imprimer une grille du Loto</button>
</body>

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