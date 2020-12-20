<?php
    
    /**
     * CRAWLER : Crawle $url et récupère les adresses URL des fichiers ZIP résultats du loto.
     *
     * @param string $url : adresse à crawler
     * @return array|null : tableau contenant les urls des fichiers ZIP
     */
    function crawler(string $url) : ? array{
        // RECUPERATION DE LA PAGE
        $data = file_get_contents($url);

        // ANALYSE
        preg_match_all('/(<a href="(https\:\/\/media\.fdj\.fr\/static\/csv\/loto\/loto_\d{3,}\.zip)" download="Historique des tirages")/', $data, $output);
        
        $urls = null;
        if(isset($output[2]))
            $urls = $output[2];

        return $urls;
    }

    /**
     * Télécharge et ouvre les zips puis récupère les données
     *
     * @param array $urls : urls à récupérer
     * @return array|null : filepaths des fichiers csv
     */
    function unZip(array $urls) : ? array{
        $newfile = 'tmp/tmp_file.zip';
        foreach($urls as $url){

            if (!copy($url, $newfile)) {
                echo "Erreur de copie\n";
            }

            $zip = new ZipArchive();
            if ($zip->open($newfile, ZIPARCHIVE::CREATE)!==TRUE) {
                exit("Impossible d'ouvrir <$filename>\n.");
            }
            $zip->extractTo('tmp/');
            $zip->close();
        }

        if(file_exists($newfile))
            unlink($newfile);

        $files = glob("tmp/*.csv");
        return $files;
    }

    function getData(array $paths){
        $result = array();

        foreach($paths as $path){
            $handle = fopen($path, "r");
            $i = 0;
            while (($data = fgetcsv($handle, 0, $delimiter = ';')) !== FALSE) {
                if(($i == 0) && ($data[1] == "1er_ou_2eme_tirage"))
                    break;
                
                $i++;
                array_push($result, 
                    array(
                        "date" => $data[2],
                        "jour" => $data[1],
                        "boule_1" => $data[4],
                        "boule_2" => $data[5],
                        "boule_3" => $data[6],
                        "boule_4" => $data[7],
                        "boule_5" => $data[8],
                        "boule_C" => $data[9],
                        "combinaison" => $data[10]
                    )
                );
            }
        }

        return $result;
    }

    $exec_time = microtime(true);

    // crawling
    echo "Crawling ";
    $start = microtime(true);

    $url = "https://www.fdj.fr/jeux-de-tirage/loto/statistiques";
    $urls = crawler($url);

    $time_elapsed_secs = microtime(true) - $start;
    echo '(' . round($time_elapsed_secs,3) . 's)<br/>';

    // unzip files
    echo "UnZip ";
    $start = microtime(true);

    $files = unZip($urls);

    $time_elapsed_secs = microtime(true) - $start;
    echo '(' . round($time_elapsed_secs,3) . 's)<br/>';

    // read files
    echo "Lecture ";
    $start = microtime(true);

    $result = getData($files);

    $time_elapsed_secs = microtime(true) - $start;
    echo '(' . round($time_elapsed_secs,3) . 's)<br/>';
    
    echo "Lecture terminée, <b>" . (count($result)-1) . "</b> tirages récupérés.<br/>";

    $exec_time = microtime(true) - $exec_time;
    echo 'Importation terminée (' . round($exec_time,3) . 's écoulées)<br/>';
?>