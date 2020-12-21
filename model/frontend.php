<?php
    /***
     * Models : only data binding. It should not contain any presentation logic.
     */
    function db_connect(){
        try {
            $db = new PDO('mysql:host=localhost;dbname=genielogiciel;charset=utf8', 'root', 'root') ;
            return $db ;
        }
        catch(Exception $e) {
            die('Erreur : ' . $e->getMessage()) ;
        }
    }


    /**
     * Create table
     *
     * @return void
     */
    function create_base() {
        $db = db_connect();

        $sql = "DROP TABLE IF EXISTS Tirages;";
        $req = $db->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

        $sql = "CREATE TABLE Tirages (id_tirage INTEGER NOT NULL AUTO_INCREMENT,boule_1 INTEGER NULL DEFAULT NULL,boule_2 INTEGER NULL DEFAULT NULL,boule_3 INTEGER NULL DEFAULT NULL,boule_4 INTEGER NULL DEFAULT NULL,boule_5 INTEGER NULL DEFAULT NULL,boule_c INTEGER NULL DEFAULT NULL,poids INTEGER NULL DEFAULT NULL,nb_pair INTEGER NULL DEFAULT NULL,dizaines INTEGER NULL DEFAULT NULL,finals INTEGER NULL DEFAULT NULL,PRIMARY KEY (id_tirage));";
        $req = $db->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

        $sql = "DROP TABLE IF EXISTS Numeros;";
        $req = $db->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

        $sql = "CREATE TABLE Numeros (id_num INTEGER NOT NULL AUTO_INCREMENT,freq DECIMAL NULL DEFAULT NULL,parite CHAR NOT NULL,PRIMARY KEY (id_num));";
        $req = $db->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

        $sql = "DROP TABLE IF EXISTS Numeros_chance;";
        $req = $db->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

        $sql = "CREATE TABLE Numeros_chance (id_num_c INTEGER NOT NULL AUTO_INCREMENT,freq_c INTEGER NULL DEFAULT NULL,parite_c CHAR NOT NULL,poids_moy INTEGER NULL DEFAULT NULL,PRIMARY KEY (id_num_c));";
        $req = $db->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
    }