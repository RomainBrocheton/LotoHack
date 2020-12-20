<?php
    require('model/frontend.php');

    function indexView(){
        require('view/indexView.php');
    }


    function StatsView(){
        require('view/statistiquesView.php');
    }
    function ReducteurView(){
        require('view/reducteurView.php');
    }
    function GenerateurView(){
        require('view/generateurView.php');
    }
    function ImportView(){
        require('view/importationView.php');
    }
    

    function importation(){
        require('controller/importAuto.php');
    }