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
    function ReducteurProcess($post){

        /**
         * retourne fact(n)
         */
        function factorielle($n)
        {
            $res=1;
            while ($n>1)
            {
                $res*=$n;
                $n--;
            }
            return $res;
        }
        
        /**
         * retourne k parmi n
         */
        function kparmin($k, $n) { return factorielle($n)/(factorielle($n-$k)*factorielle($k)); }
               
        function Systeme_reducteur($numeros, $garantie)
        {
            $nbr_de_grilles_syst_total = ceil(kparmin(5,count($numeros)));

            if ( count($numeros)==7 && $garantie == 4 ) $nbr_grilles=2;
            elseif ( count($numeros)==8 && $garantie == 3 ) $nbr_grilles=2;
            elseif ( count($numeros)==8 && $garantie == 4 ) $nbr_grilles=8;

            else $nbr_grilles=1;
            
            $grilles=[];
            $indice=0;
            if ( count($numeros)%$garantie==0 )
            $garantie+=1;
            for ($i=0 ; $i<$nbr_grilles ; $i++)
            {
                $grilles=array_merge($grilles,[[]]);
                $grille=$numeros;
                while (count($grille)>5)
                {
                    $num_cible=$indice%count($numeros);
                    if ( $indice%$garantie!=0 )
                    unset($grille[$num_cible]);
                    $indice+=1;
                }
                sort($grille);
                $grilles[$i]=$grille;
            }
            return [$nbr_grilles, $grilles];
        }

        $numeros = htmlspecialchars($post['numeros_indiques']);
        $numeros=explode(',', $numeros);
        sort($numeros);
        $garantie = htmlspecialchars($post['garantie']);

        $code_erreur=[];
        for ($i=0 ; $i<count($numeros) ; $i++)
        {
            if ( $numeros[$i]<1 || $numeros[$i]>49 ) array_push($code_erreur,1);
            $temp=$numeros;
            unset($temp[$i]);
            if ( in_array($numeros[$i],$temp) ) array_push($code_erreur,2);
        }
        if ( count($numeros)<5 || count($numeros)>8 )
            array_push($code_erreur,3);
        

        if ( count($code_erreur)==0 )   $result = Systeme_reducteur($numeros, $garantie);


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

    function stats(){
        require('controller/stats.php'); 
    }
    function grilleGen(){
        require('controller/grilleGen.php'); 
    }
