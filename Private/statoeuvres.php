<?php  require_once 'header.php'; ?>
      <div class="user3 clearfix">
        <div class="user_way">
          <div class="user_way-link">
            <a href="GestionStat.php" alt="Retour Stat"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Statistiques</a>
          </div>
          <div class="cadre3 vue">
            <img src="img/stat.jpg" />
          </div>
        </div>
        <div class="cadre4">
          <h3>Statistiques par oeuvres</h3>
            <?php $idexp = $_GET['ids'];
                $reqExp = "SELECT * From exposition Where IdExposition = $idexp";
                $repExp = $bdd -> query($reqExp);
                foreach ($repExp as $donnees) {
                  echo "<p class='infoexpo'>L'exposition : ".$donnees['NomExpositionFr']." du ".strftime( '%d/%m/%Y', strtotime($donnees['DateDebut']))." au ".strftime( '%d/%m/%Y', strtotime($donnees['DateFin']))."</p>";
                }
              ?>


              <table style="width:65%">

                <tr>
                 <th class="titre1"><span>Oeuvres</span></th>
                 <th class="titre3" style="width:30%;"><span>Nombres de Vues </span></th>
                </tr>
              <?php

                $reqStat = "SELECT oeuvre.IdOeuvre, NomOeuvreFr, FreqOeuvre
                            FROM oeuvre
                              INNER JOIN inscrire ON oeuvre.IdOeuvre = inscrire.IdOeuvre
                            WHERE IdExposition = ".$idexp."
                            ORDER BY IdOeuvre";
                $repStat = $bdd -> query($reqStat);

                  foreach ($repStat as $info) {

                    echo "<tr>";
                    echo "<td><span>".$info['NomOeuvreFr']."</span></td>";
                    echo "<td><span>".$info['FreqOeuvre']."</a></span></td>";
                    echo "</tr>";
                  }

              ?>
            </table>
        </div>
      </div>
      <script>
        $('#cprint').on('click', function () {
          print();
        });
      </script>
    </main>
  </body>
</html>
