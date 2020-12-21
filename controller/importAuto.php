<?php
    
    /**
     * Crawle $url et récupère les adresses URL des fichiers ZIP résultats du loto.
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

    /**
     * Retourne un array contenant tous les tirages
     *
     * @param array $paths : filepaths des fichiers csv
     * @return array|null  : tirages
     */
    function getData(array $paths) : ? array{
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

    // crawling
    $url = "https://www.fdj.fr/jeux-de-tirage/loto/statistiques";
    $urls = crawler($url);

    // unzip files
    $files = unZip($urls);

    // read files
    $result = getData($files);
?>