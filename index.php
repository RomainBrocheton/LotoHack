<?php
include('controller/Route.php');
require('controller/frontendController.php');

// Index
Route::add('/',function(){
    require('view/indexView.php');
});
Route::add('/index.php',function(){
    require('view/indexView.php');
});

// Pages
Route::add('/mentions.php',function(){
    require('view/mentionsView.php');
});
Route::add('/statistiques.php',function(){
    StatsView();
});
Route::add('/reducteur.php',function(){
    ReducteurView();
});
Route::add('/systeme_reducteur.php',function(){
    ReducteurProcess($_POST);
}, 'post');
Route::add('/generateur.php',function(){
    GenerateurView();
});
Route::add('/importation.php',function(){
    ImportView();
});
Route::add('/importAuto.php',function(){
    require('controller/importAuto.php');
});
Route::add('/stats.php',function(){
    stats();
});
Route::add('/grilleGen.php',function(){
    grilleGen();
});

Route::run('/');