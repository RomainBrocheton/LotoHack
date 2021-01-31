<?php 
    $title = "Statistiques";
    $head = '
        <script src="public/vendor/chartjs/Chart.min.js"></script>
        <link rel="stylesheet" href="public/vendor/chartjs/Chart.min.css">
    ';
    ob_start();

    stats(); 

    $max_freq = num_freq_max(get_frequences());
    $max_freq_c = num_freq_max(get_frequences_c());
    $freq = json_encode(get_frequences());
    $freq_c = json_encode(get_frequences_c());
    $poids_moy = get_poids_moy();
    $pairs_moy = get_pairs_moy();
    $dizaines_moy = get_dizaines_moy();
    $finals_moy = get_finals_moy();
    $min_freq = num_freq_min(get_frequences());
    $min_freq_c = num_freq_min(get_frequences_c());

    $stats_c = get_stats_c();

    $Last_tirages = get_last(9);
?>

<h1>Statistiques</h1>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <span>
                <strong><u>Statistiques globales</u> : </strong>
            </span>
            <p> <u>Numéro(s) le(s) plus fréquent(s)</u> <strong><?php foreach($max_freq as $i){echo " : " . $i;}?></strong> <br />
                <u>Numéro(s) chance le(s) plus fréquent(s)</u> <strong><?php foreach($max_freq_c as $i){echo " : " . $i;}?></strong>
            </p>

            <p> <u>Poids moyen des tirages</u> : <strong><?php echo $poids_moy?></strong> <br />
                <u>Nombre moyen de numéros pairs par tirage</u> : <strong><?php echo $pairs_moy?></strong> <br />
                <u>Nombre moyen de dizaines par tirage</u> : <strong><?php echo $dizaines_moy?></strong> <br />
                <u>Nombre moyen de finals par tirage</u> : <strong><?php echo $finals_moy?></strong> <br />
            </p> 

            <p> <u>Numéro(s) le(s) moins fréquent(s)</u> <strong><?php foreach($min_freq as $i){echo " : " . $i;}?></strong><br />
                <u>Numéro(s) chance le(s) moins fréquent(s)</u> <strong><?php foreach($min_freq_c as $i){echo " : " . $i;}?></strong>
            </p>
        </div>

        <div class="col-md-6">
            <span>
                <strong><u>Derniers tirages</u> : </strong>
            </span>
            <p>
                <?php foreach($Last_tirages as $t){
                    echo "Tirage du <i>" . $t[7] . " " . $t[0] . "</i> : <strong class='tirages'>" . $t[1] . " - " . $t[2] . " - " . $t[3] . " - " . $t[4] . " - " . $t[5] . " | " . $t[6] . "</strong><br />";
                }?>
            </p>
        </div>

    </div>

  <div class="row">
    <div class="col-md-6">
      <canvas id="chart-frequences" width="40" height="60"></canvas>
    </div>
    <div class="col-md-6">
      <canvas id="chart-freq-chances" width="10" height="10"></canvas>
    </div>
  </div>
    <div class = "row">
        <div class="col-md">
            <br />
                <h5><strong>Statistiques associées aux numéros chance : </strong></h5>
            <br />
        </div>
    </div>
    <div class = "row">
        <div class="col-md">
            <table class="table table-bordered">
                <thead>
                    <tr>
                       <th scope="col">Numéro chance</th>
                       <th scope="col">Fréquence</th>
                       <th scope="col">Poids moyen</th>
                       <th scope="col">Nombre moyen de numéros pairs</th>
                       <th scope="col">Nombre moyen de dizaines</th>
                       <th scope="col">Nombre moyen de finals</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($stats_c as $s) {
                        echo "<tr class='tab-row'>";
                        echo "<th scope='row'>" . $s[0] . "</th>";
                        echo "<td>" . $s[1] . "</td>";
                        echo "<td>" . $s[2] . "</td>";
                        echo "<td>" . $s[3] . "</td>";
                        echo "<td>" . $s[4] . "</td>";
                        echo "<td>" . $s[5] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>




<script>
/* Importation des fréquences des numéros */
var Freq = <?php echo $freq ?>;    
    
var colors = []; 
var frequences = [];
var labls = [];
for(var i = 1; i <= 49; i++) {
    labls.push(Freq[i-1][0]);
    frequences.push(parseFloat(Freq[i-1][1]));
    if(i%2 == 0) {
        colors.push("#00c0ba");
    } else {
        colors.push("#a84caf");
    }
}
/*Graphe des fréquences des numéros */
new Chart(document.getElementById("chart-frequences"), {
    type: 'horizontalBar',
    data: {
      labels: labls,
      datasets: [
        {
          label: "Fréquences",
          backgroundColor: colors,
          data: frequences
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Fréquences des numéros'
      }
    }
});
/* Importation des fréquences des numéros chances */
var Freq_c = <?php echo $freq_c ?>;

var colors_c = [];
var frequences_c = [];
var labls_c = [];
for(var j = 1; j <= 10; j++) {
    labls_c.push(Freq_c[j-1][0]);
    frequences_c.push(parseFloat(Freq_c[j-1][1]));
    if(j%2 == 0) {
        colors_c.push("#00c0ba");
    } else {
        colors_c.push("#a84caf");
    }
}
/* Graphe des fréquences des numéros chances */
new Chart(document.getElementById("chart-freq-chances"), {
    type: 'bar',
    data: {
      labels: labls_c,
      datasets: [
        {
          label: "Fréquences",
          backgroundColor: colors,
          data: frequences_c
        }
      ]
    },
    options: {
      legend: { display: false },

      title: {
        display: true,
        text: 'Fréquences des numéros chances'
      }
    }
});
</script>

<?php 
    $content = ob_get_clean();

    require('template.php'); 
?>