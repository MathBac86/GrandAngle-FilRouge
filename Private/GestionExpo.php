<?php  require_once 'header.php'; ?>
      <div class="user3 clearfix">
        <div class="user_way">
          <div class="user_way-bubles">
            <div class="cadre3 vue">
              <img src="img/expo.jpg" />
              <a href="CreationExpo.php" title="Création Exposition"><div class="cachee">
                <h2> 1 - Création</h2>
              </div></a>
            </div>
            <div class="cadre3 vue">
              <img src="img/Plan/plan1.jpg" />
              <a href="PlanExpo.php" title="Plan Exposition"><div class="cachee">
                <h2> 2 - Plan</h2>
              </div></a>
            </div>
          </div>
        </div>
        <div class="cadre4">
          <table style="width:95%">
            <h3>Les Expositions</h3>
            <tr>
             <th class="titre1"><span>Expositions</span></th>
             <th class="titre2"><span>Modifier</span></th>
             <th class="titre3"><span>Supprimer</span></th>
             <th class="titre4"><span>Imprimer</span></th>
            </tr>
            <?php
              $reqExpo = "SELECT * From exposition order by DateDebut";
              $repExpo = $bdd -> query($reqExpo);

                foreach ($repExpo as $info) {
                  setlocale(LC_ALL, 'fr_FR.UTF8');
                  $date = strftime ("%Y-%m-%d");
                  $datedeb = $info['DateDebut'];
                  $datefin = $info['DateFin'];

                  echo "<tr>";
                  echo "<td><span style='font-size:110%;'>".$info['NomExpositionFr']."<span> <br><span><a class='icon_hover' href='Vueexpo.php?ide=".$info['IdExposition']."' title='Détail de ".htmlentities($info['NomExpositionFr'], ENT_QUOTES)."'><img class='img-tab' src='img/".htmlentities($info['NomExpositionFr'], ENT_QUOTES)."/expo.jpg' title='".htmlentities($info['NomExpositionFr'], ENT_QUOTES)."'></img></a></span> <span style='color:#9bff00e0'> du ".strftime( '%d/%m/%Y', strtotime($info['DateDebut']))." au ".strftime( '%d/%m/%Y', strtotime($info['DateFin']))."</span></td>";
                  echo "<td><a class='icon_hover' href='Modifexpo.php?ide=".$info['IdExposition']."' title='Modifier ".htmlentities($info['NomExpositionFr'], ENT_QUOTES)."'>";
                    if ($date < $datefin ) {
                      echo "<i class='fas fa-pencil-alt fa-2x'></i>";
                    } else {
                      echo " ";
                    }
                    echo "</a></td>";
                  echo "<td><a class='icon_hover' href='javascript:confirmation(".$info['IdExposition'].")' title='Supprimer ".htmlentities($info['NomExpositionFr'], ENT_QUOTES)."'><i class='fas fa-trash-alt fa-2x'></i></a></td>";
                  echo "<td class='drapeau'><a class='icon_hover' href='Printexpofr.php?ide=".$info['IdExposition']."'><img src='img/france.png' title='Français'></a>
                  <a class='icon_hover' href='Printexpoen.php?ide=".$info['IdExposition']."'><img src='img/unitedkingdom.png' title='Anglais'></a>
                  <a class='icon_hover' href='Printexpoall.php?ide=".$info['IdExposition']."'><img src='img/germany.png' title='Allemand'></a></td>";
                  echo "</tr>";
                }
            ?>
          </table>
        </div>
      </div>
      <script type="text/javascript">
        function confirmation(elem) {
          var msg = "Etes-vous sur de vouloir supprimer cette exposition ?";
          if (confirm(msg)){
            window.location.href="Suppression/Suppexpo.php?ide="+elem;
          }else{
            window.location.href="GestionExpo.php";
          }
        }
      </script>
    </main>
  </body>
</html>
