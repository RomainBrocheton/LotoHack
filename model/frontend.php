<?php
/***
* Models : only data binding. It should not contain any presentation logic.
*/
function db_connect() {
    try {
        $db = new PDO('mysql:host=localhost;dbname=u902185925_loto;charset=utf8', 'root', '') ;
        return $db ;
    }
    catch(Exception $e) {
        die('Erreur : ' . $e->getMessage()) ;
    }
}

/**
* Create tables
*
* @return void
*/
function create_tables() {
    $db = db_connect();
    try {
        $sql = "CREATE TABLE IF NOT EXISTS Tirages (id_tirage INTEGER NOT NULL AUTO_INCREMENT,boule_1 INTEGER NULL DEFAULT NULL,boule_2 INTEGER NULL DEFAULT NULL,boule_3 INTEGER NULL DEFAULT NULL,boule_4 INTEGER NULL DEFAULT NULL,boule_5 INTEGER NULL DEFAULT NULL,boule_c INTEGER NULL DEFAULT NULL,poids INTEGER NULL DEFAULT NULL,nb_pair INTEGER NULL DEFAULT NULL,dizaines INTEGER NULL DEFAULT NULL,finals INTEGER NULL DEFAULT NULL,PRIMARY KEY (id_tirage));";
        $req = $db->query($sql);
        
        $sql = "CREATE TABLE IF NOT EXISTS Numeros (id_num INTEGER NOT NULL AUTO_INCREMENT,freq DECIMAL(6,5) NULL DEFAULT NULL,parite CHAR NOT NULL,PRIMARY KEY (id_num));";
        $req = $db->query($sql);
        
        $sql = "CREATE TABLE IF NOT EXISTS Numeros_chance (id_num_c INTEGER NOT NULL AUTO_INCREMENT,freq_c DECIMAL(6,5) NULL DEFAULT NULL,parite_c CHAR NOT NULL,poids_moy INTEGER NULL DEFAULT NULL,nb_pairs_moy INTEGER NULL DEFAULT NULL,nb_dizaines_moy INTEGER NULL DEFAULT NULL,nb_finals_moy INTEGER NULL DEFAULT NULL,PRIMARY KEY (id_num_c));";
        $req = $db->query($sql);
    }
    catch(Exception $e) {
        die('Erreur SQL !<br>' . $e->getMessage());
    }
    
    $req = null;
    $db = null;
}

/**
* Clear tables
*
* @return void
*/
function clear_tables(){
    $db = db_connect();
    try {
        $sql = "TRUNCATE TABLE Tirages;";
        $req = $db->query($sql);
        
        $sql = "TRUNCATE TABLE Numeros;";
        $req = $db->query($sql);
        
        $sql = "TRUNCATE TABLE Numeros_chance;";
        $req = $db->query($sql);
    }
    catch(Exception $e) {
        die('Erreur SQL !<br>' . $e->getMessage());
    }
    $req = null;
    $db = null;
}

/**
* Import table Tirages
* @param array $result : tableau contenant les résultats des tirages
* @return void
*/
function import_tirages(array $result) {
    $db = db_connect();
    
    foreach($result as $res){
        
        if ($res["id_tirage"] != 'annee_numero_de_tirage') {
            
            $req = $db->prepare('INSERT INTO Tirages(id_tirage, boule_1, boule_2, boule_3, boule_4, boule_5, boule_c, poids, nb_pair, dizaines, finals) VALUES(:idtirage, :boule1, :boule2, :boule3, :boule4, :boule5, :boulec, :poids, :nb_pair, :dizaines, :finals)');
            $req->execute(array(
                'idtirage' => (int)$res["id_tirage"],
                'boule1' =>  (int)$res["boule_1"],
                'boule2' =>  (int)$res["boule_2"],
                'boule3' =>  (int)$res["boule_3"],
                'boule4' =>  (int)$res["boule_4"],
                'boule5' =>  (int)$res["boule_5"],
                'boulec' =>  (int)$res["boule_C"],
                'poids' => calcul_poids($res),
                'nb_pair' => nombres_pairs($res),
                'dizaines' => dizaines(array((int)$res["boule_1"], (int)$res["boule_2"], (int)$res["boule_3"], (int)$res["boule_4"], (int)$res["boule_5"])),
                'finals' => finals(array((int)$res["boule_1"], (int)$res["boule_2"], (int)$res["boule_3"], (int)$res["boule_4"], (int)$res["boule_5"]))
            ));
        }
    }
    $req = null;
    $db = null;
}

/**
* Import table Numeros
* @param array $result : tableau contenant les résultats des tirages
* @return void
*/
function import_numeros(array $result) {
    $db = db_connect();
    
    for ($i=1; $i<=49; $i++) {
        $req = $db->prepare('INSERT INTO Numeros(id_num, freq, parite) VALUES(:id_num, :freq, :parite)');
        $req->execute(array(
            'id_num' => $i,
            'freq' => calcul_frequences($i,$result),
            'parite' => parite($i)
        ));
    }
    $req = null;
    $db = null;
}

/**
* Import table Numeros_chance
* @param array $result : tableau contenant les résultats des tirages
* @return void
*/
function import_numeros_chance(array $result) {
    $db = db_connect();
    
    for ($i=1; $i<=10; $i++) {
        $req = $db->prepare('INSERT INTO Numeros_chance(id_num_c, freq_c, parite_c, poids_moy, nb_pairs_moy, nb_dizaines_moy, nb_finals_moy) VALUES(:id_num_c, :freq_c, :parite_c, :poids_moy, :nb_pairs_moy, :nb_dizaines_moy, :nb_finals_moy)');
        $req->execute(array(
            'id_num_c' => $i,
            'freq_c' => calcul_frequences_c($i,$result),
            'parite_c' => parite($i),
            'poids_moy' => calcul_poids_moy_c($i,$result),
            'nb_pairs_moy' => calcul_pairs_moy_c($i,$result),
            'nb_dizaines_moy' => calcul_dizaines_moy_c($i,$result),
            'nb_finals_moy' => calcul_finals_moy_c($i,$result)
        ));
    }
    $req = null;
    $db = null;
}


/**
* Renvois les fréquences des numéros
* @return array : tableau des fréquences
*/
function get_frequences() {
    $db = db_connect();
    $frequences = array();

    $req = "SELECT id_num,freq FROM `numeros`";
    foreach ($db->query($req) as $row) {
        array_push($frequences, 
                    array($row['id_num'],$row['freq'])
                );
    }
    $req = null;
    $db = null;
    return json_encode($frequences);
}


/**
* Renvois les fréquences des numéros chance
* @return array : tableau des fréquences
*/
function get_frequences_c() {
    $db = db_connect();
    $frequences = array();

    $req = "SELECT id_num_c,freq_c FROM `numeros_chance`";
    foreach ($db->query($req) as $row) {
        array_push($frequences, 
                    array($row['id_num_c'],$row['freq_c'])
                );
    }
    $req = null;
    $db = null;
    return json_encode($frequences);
}


/**
* Renvois les poids moyens associés aux numéros chance
* @return array : tableau des poids moyens
*/
function get_poids_moy_c() {
    $db = db_connect();
    $poids = array();

    $req = "SELECT id_num_c,poids_moy FROM `numeros_chance`";
    foreach ($db->query($req) as $row) {
        array_push($poids, 
                    array($row['id_num_c'],$row['poids_moy'])
                );
    }
    $req = null;
    $db = null;
    return json_encode($poids);
}

/**
* Renvois le nombre moyen de numéros pairs associés aux numéros chance
* @return array : tableau des nombres moyens de numéros pairs
*/
function get_pairs_moy_c() {
    $db = db_connect();
    $pairs = array();

    $req = "SELECT id_num_c,nb_pairs_moy FROM `numeros_chance`";
    foreach ($db->query($req) as $row) {
        array_push($pairs, 
                    array($row['id_num_c'],$row['nb_pairs_moy'])
                );
    }
    $req = null;
    $db = null;
    return json_encode($pairs);
}


/**
* Renvois le nombre moyen de dizaines associées aux numéros chance
* @return array : tableau des nombres moyens de dizaines
*/
function get_dizaines_moy_c() {
    $db = db_connect();
    $dizaines = array();

    $req = "SELECT id_num_c,nb_dizaines_moy FROM `numeros_chance`";
    foreach ($db->query($req) as $row) {
        array_push($dizaines, 
                    array($row['id_num_c'],$row['nb_dizaines_moy'])
                );
    }
    $req = null;
    $db = null;
    return json_encode($dizaines);
}

/**
* Renvois le nombre moyen de finals associés aux numéros chance
* @return array : tableau des nombres moyens de finals
*/
function get_finals_moy_c() {
    $db = db_connect();
    $finals = array();

    $req = "SELECT id_num_c,nb_finals_moy FROM `numeros_chance`";
    foreach ($db->query($req) as $row) {
        array_push($finals, 
                    array($row['id_num_c'],$row['nb_finals_moy'])
                );
    }
    $req = null;
    $db = null;
    return json_encode($finals);
}

?>