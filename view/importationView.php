<?php 
    $title = "Importation";

    ob_start();
?>

<h1>Importation</h1>

<p>Cette page vous permet d'importer de nouveaux tirages à la base de données de LotoHACK. Vous pouvez choisir d'importer manuellement un fichier ou d'utiliser l'importation automatique.</p>

<div id="importation">
    <!--
    <button class="btn-gradient-hover">
        <i class="fas fa-bolt"></i>
        <span>Importation automatique</span>
    </button>
    -->
    <a href="importAuto">Importer automatiquement</a>
</div>

<?php 
    $content = ob_get_clean();

    require('template.php'); 
?>