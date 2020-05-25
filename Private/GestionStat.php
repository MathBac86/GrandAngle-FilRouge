<?php  require_once 'header.php'; ?>
      <div class="user3 clearfix">
        <div class="user_way">
          <div class="cadre3 vue">
            <img src="img/stat.jpg" />

          </div>
        </div>
        <div class="cadre4">
            <table style="width:85%">
              <h3>Statistiques par exposition</h3>
              <tr>
               <th class="titre1"><span>Expositions</span></th>
               <th class="titre2"><span>Statuts de l'Expo</span></th>
               <th class="titre3"><span>Chiffres </span></th>
              </tr>
              <?php
                $reqStatexpo = "SELECT * From exposition order by DateDebut";
                $repStatexpo = $bdd -> query($reqStatexpo);

                  foreach ($repStatexpo as $info) {
                    setlocale(LC_ALL, 'fr_FR.UTF8');
                    $date = strftime("%Y-%m-%d");

                    $datedeb = $info['DateDebut'];
                    $datefin = $info['DateFin'];
                    if ($date >  $datefin) {
                      $statusexpo = "<span style='color:red'>Terminée";
                    } elseif ($date < $datedeb) {
                      $statusexpo = "<span style='color:blue'>A venir";
                    } else {
                      $statusexpo = "<span style='color:green'>En-cours";
                    }
                    if ($info['NomExpositionFr'] == "Pas d'Exposition") {
                      $statusexpo = "<span > - ";
                    }

                    echo "<tr>";
                    echo "<td><span>".$info['NomExpositionFr']."<span> <br> <span style='color:#9bff00e0'> du ".strftime( '%d/%m/%Y', strtotime($info['DateDebut']))." au ".strftime( '%d/%m/%Y', strtotime($info['DateFin']))."</span></td>";
                    echo "<td>".$statusexpo."</span></td> ";
                    echo "<td><span><a class='icon_hover' href='statoeuvres.php?ids=".$info['IdExposition']."'><i class='fas fa-chart-line fa-2x'></i></a></span></td>";
                    echo "</tr>";
                  }
              ?>
            </table>
        </div>
      </div>
    </main>
  </body>
</html>
