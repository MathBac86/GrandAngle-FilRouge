<?php  require_once 'header.php'; ?>
      <div class="user3 clearfix">
        <div class="user_way">
          <div class="user_way-link">
            <a href="GestionExpo.php" alt="RetourExpo"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Expositions</a>
          </div>
          <div class="cadre3 vue">
            <img src="img/Plan/plan1.jpg" />
            <a href="CreationPlan.php" title="Attribution Plan"><div class="cachee">
              <h2> Attribution Plan</h2>
            </div></a>
          </div>
        </div>
        <div class="cadre4">
          <table style="width:90%">
            <h3>Les plans</h3>
            <tr>
             <th class="titre1"><span>Expositions</span></th>
             <th class="titre4"><span>Plan</span></th>
             <th class="titre2"><span>Modifier</span></th>
            </tr>
              <?php
                $reqExpo = "SELECT * From exposition order by DateDebut";
                $repExpo = $bdd -> query($reqExpo);

                  foreach ($repExpo as $info) {
                    setlocale(LC_ALL, 'fr_FR.UTF8');
                    $date = strftime ("%Y-%m-%d");
                    $datedeb = $info['DateDebut'];
                    $datefin = $info['DateFin'];
                    if ($info['PlanExposition']=="") {
                      $plan = " pas encore de plan";
                    } else {
                      $plan = "<img style='padding=5px;' src='img/Plan/".$info['PlanExposition']."'</img>";
                    }

                    echo "<tr>";
                    echo "<td><span>".$info['NomExpositionFr']."<span> <br> <span style='color:#9bff00e0'> du ".strftime( '%d/%m/%Y', strtotime($info['DateDebut']))." au ".strftime( '%d/%m/%Y', strtotime($info['DateFin']))."</span></td>";
                    echo "<td><span>".$plan."</span></td>";
                    echo "<td><a class='icon_hover' href='Modifplan.php?idp=".$info['IdExposition']."'>";
                      if ($date < $datedeb ) {
                        echo "<i class='fas fa-pencil-alt fa-2x'></i>";
                      } else {
                        echo " ";
                      }
                      echo "</a></td>";
                    echo "</tr>";
                  }
                ?>
            </fieldset>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
