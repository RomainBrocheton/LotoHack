<?php
    /***
     * Models : only data binding. It should not contain any presentation logic.
     */
    function db_connect() {
        try {
            $db = new PDO('mysql:host=localhost;dbname=genielogiciel;charset=utf8', 'root', 'root') ;
            return $db ;
        }
        catch(Exception $e) {
            die('Erreur : ' . $e->getMessage()) ;
        }
    }