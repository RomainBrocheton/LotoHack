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
    StatsView();
});
Route::add('/genielogiciel/reducteur.php',function(){
    ReducteurView();
});
Route::add('/genielogiciel/generateur.php',function(){
    GenerateurView();
});
Route::add('/genielogiciel/importation.php',function(){
    ImportView();
});
Route::add('/genielogiciel/importAuto.php',function(){
    importation();
});


Route::run('/');