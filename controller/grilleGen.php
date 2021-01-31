<?php




function last_to_gen(array $Last) {
    $result = array();
    foreach($Last as $L) {
        array_push($result, 
            array(
            "boule_1" => $L[1],
            "boule_2" => $L[2],
            "boule_3" => $L[3],
            "boule_4" => $L[4],
            "boule_5" => $L[5],
            "boule_C" => $L[6]
            )
        );
    }
    return $result;
}


/**
* Affiche les boules à jouer
* @param array $grilles : tableau contenant les différentes grilles à jouer
* @return string : chaine de caractère permettant d'afficher les grilles à jouer
*/
function grilles_gen(array $grilles) {
    
    $jeu = "Il n'y a aucune grille à jouer";
    if ($grilles[0]["boule_1"]!=NULL) {
        $i = 0;
        $jeu = "<table class='table table-bordered'>
        <thead>
            <tr >
                <th scope='col'>N° grille</th>
                <th scope='col'>Numéros à jouer</th>
                <th scope='col'>Numéro chance</th>
            </tr>
        </thead>
        <tbody>";
        
        foreach($grilles as $g) {
            $i++;
            $jeu = $jeu . "<tr class='tab-row'>
                                <th scope='row'>" . $i . "</th>
                                <td>" . $g["boule_1"] . " - " . $g["boule_2"] . " - " . $g["boule_3"] . " - " . $g["boule_4"] . " - " . $g["boule_5"] . "</td>
                                <td>" . $g["boule_C"] . "</td>
                          </tr>";
        }
    }

    $jeu = $jeu . "</tbody></table>";

    return $jeu;
}
?>