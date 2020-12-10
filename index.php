<?php
include('controller/Route.php');
require('controller/frontendController.php');

// Index
Route::add('/genielogiciel/',function(){
    require('view/indexView.php');
});
Route::add('/genielogiciel/index.php',function(){
    require('view/indexView.php');
});

// Pages
Route::add('/genielogiciel/mentions.php',function(){
    require('view/mentionsView.php');
});
Route::add('/genielogiciel/statistiques.php',function(){
    require('view/statistiquesView.php');
});
Route::add('/genielogiciel/reducteur.php',function(){
    require('view/reducteurView.php');
});
Route::add('/genielogiciel/generateur.php',function(){
    require('view/generateurView.php');
});
Route::add('/genielogiciel/importation.php',function(){
    require('view/importationView.php');
});

Route::run('/');