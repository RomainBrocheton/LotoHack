<?php
/**
* Calcul du poids d'un tirage
* * @param array $boules : tableau contenant les numéros des boules 1 à 5
* * @return int  : poids
*/
function calcul_poids(array $res) {
    
    $poids = (int)$res["boule_1"] + (int)$res["boule_2"] + (int)$res["boule_3"] + (int)$res["boule_4"] + (int)$res["boule_5"];
    
    return $poids;
}

/**
* Calcul des dizaines
* * @param array $res : tableau contenant les numéros des boules 1 à 5
* * @return int  : nombre de dizaines
*/
function dizaines(array $res) {
    $boules = array((int)$res["boule_1"], (int)$res["boule_2"], (int)$res["boule_3"], (int)$res["boule_4"], (int)$res["boule_5"]);
    $nb = 0;
    $d0 = 0;
    $d1 = 0;
    $d2 = 0;
    $d3 = 0;
    $d4 = 0;
    foreach($boules as $b) {
        if ($b>0 and $b<10) {
            $d0 = 1;
        }
        if ($b>=10 and $b<20) {
            $d1 = 1;
        }
        if ($b>=20 and $b<30) {
            $d2 = 1;
        }
        if ($b>=30 and $b<40) {
            $d3 = 1;
        }
        if ($b>=40 and $b<=49) {
            $d4 = 1;
        }
    }
    $nb = $d0 + $d1 + $d2 + $d3 + $d4;
    return $nb;
}

/**
* Calcul des finals
* * @param array $res : tableau contenant les numéros des boules 1 à 5
* * @return int  : nombre de finals
*/
function finals(array $res) {
    $boules = array((int)$res["boule_1"], (int)$res["boule_2"], (int)$res["boule_3"], (int)$res["boule_4"], (int)$res["boule_5"]);
    $nb = 0;
    $f0 = 0;
    $f1 = 0;
    $f2 = 0;
    $f3 = 0;
    $f4 = 0;
    $f5 = 0;
    $f6 = 0;
    $f7 = 0;
    $f8 = 0;
    $f9 = 0;
    foreach($boules as $b) {
        if ($b%10 == 0) {
            $f0 = 1;
        }
        if ($b%10 == 1) {
            $f1 = 1;
        }
        if ($b%10 == 2) {
            $f2 = 1;
        }
        if ($b%10 == 3) {
            $f3 = 1;
        }
        if ($b%10 == 4) {
            $f4 = 1;
        }
        if ($b%10 == 5) {
            $f5 = 1;
        }
        if ($b%10 == 6) {
            $f6 = 1;
        }
        if ($b%10 == 7) {
            $f7 = 1;
        }
        if ($b%10 == 8) {
            $f8 = 1;
        }
        if ($b%10 == 9) {
            $f9 = 1;
        }
    }
    $nb = $f0 + $f1 + $f2 + $f3 + $f4 + $f5 + $f6 + $f7 + $f8 + $f9;
    return $nb;
}

/**
* Prend en paramètre un nombre et les résultats des tirages et retourne la fréquence du numéro par tirage
* * @param int $num : numéro
* * @param array $result : tirages
* * @return float : frequence
*/
function calcul_frequences(int $num, array $result) {
    $freq = 0.0;
    $i = 0;
    $n = 0;
    foreach($result as $res){
        if ($res["id_tirage"] != 'annee_numero_de_tirage') {
            for ($k=1; $k<=5; $k++) {
                if ($res["boule_" . (string)$k] == $num) {
                    $n++;
                }
            }
        }
        $i++;
    }
    $freq = $n/$i;
    return $freq;
}

/**
* Prend en paramètre un numéro chance et les résultats des tirages et retourne la fréquence du numéro chance
* * @param int $num : numéro
* * @param array $result : tirages
* * @return float : frequence (3 chiffres significatifs)
*/
function calcul_frequences_c(int $num, array $result) {
    $freq = 0.0;
    $i = 0;
    $n = 0;
    foreach($result as $res){
        if ($res["id_tirage"] != 'annee_numero_de_tirage') {
            if ($res["boule_C"] == $num) {
                $n++;
            }
        }
        $i++;
    }
    $freq = $n/$i;
    return $freq;
}

/**
* Donne la parité d'un nombre
* * @param int $num : numéro
* * @return string : parite (p si pair, i si impair)
*/
function parite(int $num) {
    if ($num%2 == 0) {
        $parite = 'p';
    } else {
        $parite = 'i';
    }
    return $parite;
}

/**
* Donne le nombre de numéros pairs dans un tirage
* * @param array $res : tirage
* * @return int : nombre de numréros pairs
*/
function nombres_pairs(array $res) {
    $nb_pairs = 5 - ((int)$res["boule_1"]%2 + (int)$res["boule_2"]%2 + (int)$res["boule_3"]%2 + (int)$res["boule_4"]%2 + (int)$res["boule_5"]%2);
     return $nb_pairs;
}

/**
* Calcul le poids moyen associé aux numéros chance
* * @param int $num : numéro chance
* * @param array $result : tirages
* * @return int : poids moyen
*/
function calcul_poids_moy_c(int $num, array $result) {
    $poids_moy = 0;
    $i = 0;
    $poids = 0;
    foreach($result as $res){
        if ($res["id_tirage"] != 'annee_numero_de_tirage') {
            if ($res["boule_C"] == $num) {
                $poids = $poids + calcul_poids($res);
                $i++;
            }
        }
    }
    $poids_moy = $poids/$i;
    return $poids_moy;
}

/**
* Calcul le nombre moyen de numéros pairs associés aux numéros chance
* * @param int $num : numéro chance
* * @param array $result : tirages
* * @return int : nombre de numéros pairs moyen
*/
function calcul_pairs_moy_c(int $num, array $result) {
    $pairs_moy = 0;
    $i = 0;
    $pairs = 0;
    foreach($result as $res){
        if ($res["id_tirage"] != 'annee_numero_de_tirage') {
            if ($res["boule_C"] == $num) {
                $pairs = $pairs + nombres_pairs($res);
                $i++;
            }
        }
    }
    $pairs_moy = $pairs/$i;
    return $pairs_moy;
}

/**
* Calcul le nombre moyen de dizaines associées aux numéros chance
* * @param int $num : numéro chance
* * @param array $result : tirages
* * @return int : nombre de dizaines moyen
*/
function calcul_dizaines_moy_c(int $num, array $result) {
    $dizaines_moy = 0;
    $i = 0;
    $dizaines = 0;
    foreach($result as $res){
        if ($res["id_tirage"] != 'annee_numero_de_tirage') {
            if ($res["boule_C"] == $num) {
                $dizaines = $dizaines + dizaines($res);
                $i++;
            }
        }
    }
    $dizaines_moy = $dizaines/$i;
    return $dizaines_moy;
}

/**
* Calcul le nombre moyen de finals associés aux numéros chance
* * @param int $num : numéro chance
* * @param array $result : tirages
* * @return int : nombre de finals moyen
*/
function calcul_finals_moy_c(int $num, array $result) {
    $finals_moy = 0;
    $i = 0;
    $finals = 0;
    foreach($result as $res){
        if ($res["id_tirage"] != 'annee_numero_de_tirage') {
            if ($res["boule_C"] == $num) {
                $finals = $finals + finals($res);
                $i++;
            }
        }
    }
    $finals_moy = $finals/$i;
    return $finals_moy;
}

/**
* Calcul du ou des numéro(s) le(s) plus fréquent(s)
* * @param array $array : tableau
* * @return array : numéro(s) le(s) plus fréquent(s)
*/
function num_freq_max(array $array) {
    $max = 0;
    $num = array();
    foreach ($array as $row) {
        if ($max < floatval($row[1])) {
            $max = floatval($row[1]);
        }
    }
    foreach ($array as $r) {
        if ($max == floatval($r[1])) {
            array_push($num, $r[0]);
        }
    }
    return $num;
}

/**
* Calcul du ou des numéro(s) le(s) moins fréquent(s)
* * @param array $array : tableau
* * @return array : numéro(s) le(s) moins fréquent(s)
*/
function num_freq_min(array $array) {
    $min = 1;
    $num = array();
    foreach ($array as $row) {
        if ($min > floatval($row[1])) {
            $min = floatval($row[1]);
        }
    }
    foreach ($array as $r) {
        if ($min == floatval($r[1])) {
            array_push($num, $r[0]);
        }
    }
    return $num;
}

?>