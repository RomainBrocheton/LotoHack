<?php 
    $title = "Réducteur";

    ob_start();
?>

<h1>Réducteur</h1>

<div class="container-fluid">
<form action="systeme_reducteur.php" method="POST" class="w-100">
    <p class="lead">Quel numéros souhaitez vous jouer? (entre 5 et 8 - séparer les numéros par une virgule)</p>

    <div class="form-group">
        <label for="numeros">Vos numéros</label>
        <input type="text" id="numeros" name="numeros_indiques" required placeholder="Ex : 1,5,6,8,10" value="<?php if(isset($post)) echo $post['numeros_indiques']; ?>"/>
    </div>
    <div class="form-group">
        <label for="garantie">Votre garantie</label>
        <select name="garantie">
          <option value="0" <?php if(!isset($post)) echo "selected" ?> disabled>Garantie</option>
          <option value="4" <?php if(isset($post) && ($post['garantie']=="4")) echo 'selected' ?>>4/5</option>
          <option value="3" <?php if(isset($post) && ($post['garantie']=="3")) echo 'selected' ?>>3/5</option>
        </select>
    </div>
    <input type="submit" class="btn btn-primary" value="Envoyer"/>
</form>
</div>
<?php 
    if(isset($code_erreur)){
        if ( in_array(1,$code_erreur) )
            echo '<p style="color:red">Un des numéros n\'est pas compris entre 1 et 49!</p>';
        if ( in_array(2,$code_erreur) )
            echo '<p style="color:red">Vous ne pouvez indiquer chaque numéro qu\'une fois!</p>';
        if ( in_array(3,$code_erreur) )
            echo '<p style="color:red">Vous devez indiquer de 5 à 8 numéros!</p>';
    }

    if(isset($result))
    {
        $nb_grille = array_shift($result);
        $grilles = array_shift($result);
        $nbr_de_grilles_syst_total = ceil(kparmin(5,count($numeros)));
        echo "<br>Le système total contient ". $nbr_de_grilles_syst_total . " grilles.";
        echo "<br>Avec ce système réducteur vous aurez au moins ".$garantie." bons numéros tirés si 5 numéros sont bons parmi les ".count($numeros)." numéros indiqués.";
        
?>

<table>
    <tr>
        <th>Grille n°</th>
        <th>Numéros</th>
    </tr>
<?php
    $i = 1;
    foreach($grilles as $grille){
?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php foreach($grille as $numero) echo '<span>' . $numero . '</span>';?></td>
    </tr>
<?php
    }
?>
</table>
<?php
}
?>

<?php 
    $content = ob_get_clean();

    require('template.php'); 
?>