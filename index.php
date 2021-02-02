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


Route::pathNotFound(function($path) {
    header('HTTP/1.0 404 Not Found');
    echo 'Erreur 404 😮<br>';
    echo 'La ressource demandée n\'existe pas...';
});


Route::methodNotAllowed(function($path, $method) {
    // Do not forget to send a status header back to the client
    // The router will not send any headers by default
    // So you will have the full flexibility to handle this case
    header('HTTP/1.0 405 Method Not Allowed');
    echo 'Erreur 405 😮<br>';
    echo 'Cette methode n\'est pas autorisée...';
  });

Route::run('/');