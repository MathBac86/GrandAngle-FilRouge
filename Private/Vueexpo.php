<?php  require_once 'header.php'; ?>
      <div class="user3 clearfix">
        <div class="user_way">
          <div class="user_way-link">
            <a href="GestionExpo.php" alt="Retour Exposition"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Expositions</a>
          </div>
          <div class="cadre3 vue">
            <img src="img/expo.jpg" />

          </div>
        </div>
        <div class="cadre4">
          <h3>Vue d'une exposition</h3>
          <?php
            $ide=$_GET['ide'];
            $reqexo="SELECT *
                      FROM exposition
                      Where IdExposition=$ide";
            $repexo=$bdd->query($reqexo);
            $infexo=$repexo->fetch();
          ?>
          <div class='titre-expo'>
            <?php
              echo "<p><strong>".$infexo['NomExpositionFr']."</strong> <a class='icon_hover' href='Modifexpo.php?ide=".$infexo['IdExposition']."' title='Modifier ".$infexo['NomExpositionFr']."'><i class='fas fa-pencil-alt'></i></a></p>" ;
              echo "<div class='img-exp'>";
                echo "<img class='img-tab' src='img/".htmlentities($infexo['NomExpositionFr'], ENT_QUOTES)."/expo.jpg' title='".htmlentities($infexo['NomExpositionFr'], ENT_QUOTES)."'></img>";
              echo "</div>";
              echo "<p>Du ".strftime( '%d/%m/%Y', strtotime($infexo['DateDebut']))." au ".strftime( '%d/%m/%Y', strtotime($infexo['DateFin']))."</p>";
            ?>
          </div>
          <div class="descrip-expo">
            <div class="descrip-expo-article">
              <p><strong>Exposition en Français</strong></p>
              <?php
                echo "<p><strong>".$infexo['NomExpositionFr']."</strong></p>";
                echo htmlentities($infexo['DescriptionExpositionFr'], ENT_QUOTES);
                echo "<p><strong> L'entrée de l'exposition '".$infexo['NomExpositionFr']."' est de ".$infexo['Tarif']." €.</strong></p>";
              ?>
            </div>
            <div class="descrip-expo-article">
              <p><strong>Exposition en Anglais</strong></p>
              <?php
                echo "<p><strong>".$infexo['NomExpositionEn']."</strong></p>";
                echo $infexo['DescriptionExpositionEn'];
                echo "<p><strong> The entrance to the exhibition '".$infexo['NomExpositionEn']."' is ".$infexo['Tarif']." €.</strong></p>";
              ?>
            </div>
            <div class="descrip-expo-article">
              <p><strong>Exposition en Allemand</strong></p>
              <?php
                echo "<p><strong>".$infexo['NomExpositionAll']."</strong></p>";
                echo $infexo['DescriptionExpositionAll'];
                echo "<p><strong> Der Eintritt in die Ausstellung '".$infexo['NomExpositionAll']."' beträgt ".$infexo['Tarif']." €.</strong></p><br>";
              ?>
            </div>
          </div>
          <div class="plan-expo">
            <div class='planexp'>
              <?php
                if ($infexo['PlanExposition']=="") {
                  echo "<strong> Pas de Plan </strong>";
                } else {
                  echo "<img class='img-tab' src='img/Plan/".$infexo['PlanExposition']."' title='plan de l'exposition : ".htmlentities($infexo['NomExpositionFr'], ENT_QUOTES)."'></img>";
                }
              ?>
            </div>
          </div>
          <div class="exp-oeuvre">
            <p><strong>Les Oeuvres de l'exposition</strong></p>
            <?php
              $expo=$infexo['IdExposition'];
              $reqexesp="SELECT exposition.IdExposition, NomExpositionFr, espace.IdEspace, NomEspace
                         FROM exposition
	                         Inner Join inscrire ON exposition.IdExposition=inscrire.IdExposition
                           INNER JOIN espace on espace.IdEspace=inscrire.IdEspace
                         Where inscrire.IdExposition = $expo
                         Group By inscrire.IdEspace
                         Order by inscrire.IdEspace";
              $repexesp=$bdd->query($reqexesp);
              foreach ($repexesp as $infexesp) {
            ?>
                <div class="expo-esp">
                  <?php
                    echo "<p><strong>".$infexesp['NomEspace']."</strong></p>";
                  ?>
                  <div class="expo-esp-toeuv clearfix">
                    <?php
                      $expo=$infexesp['IdExposition'];
                      $esp=$infexesp['IdEspace'];
                      $reqoesex="SELECT oeuvre.IdOeuvre, NomOeuvreFr, Media, TypeMedia, espace.IdEspace, NomEspace, exposition.IdExposition, NomExpositionFr
                                 FROM oeuvre
	                                  INNER JOIN media ON media.IdOeuvre=oeuvre.IdOeuvre
                                    INNER JOIN type_media ON type_media.IdTypeMedia=media.IdTypeMedia
                                    INNER JOIN inscrire ON inscrire.IdOeuvre=oeuvre.IdOeuvre
                                    INNER JOIN espace ON inscrire.IdEspace=espace.IdEspace
                                    INNER JOIN exposition ON inscrire.IdExposition=exposition.IdExposition
                                 WHERE inscrire.IdExposition = $expo
                                 AND inscrire.IdEspace = $esp
                                 GROUP BY inscrire.IdOeuvre
                                 ORDER BY inscrire.IdOeuvre";
                      $repoesex=$bdd->query($reqoesex);
                      foreach ($repoesex as $infosex) {
                        $nomexp=addslashes($infosex['NomExpositionFr']);
                        $nommed=addslashes($infosex['Media']);
                        echo "<div class='expo-esp-oeuv'>";
                          echo "<p><strong>".$infosex['NomOeuvreFr']."</strong> -  <a class='icon_hover' href='Modifoeuvre.php?ido=".$infosex['IdOeuvre']."' title='Modifier ".$infosex['NomOeuvreFr']."'><i class='fas fa-pencil-alt'></i></a></p>";
                          echo "<div class='medimg'>";
                            echo "<a class='icon_hover' href='Printoeuvfr.php?ido=".$infosex['IdOeuvre']."'><img class='img-med' src='img/".$nomexp."/".$nommed."' title='".$infosex['NomOeuvreFr']."'></img></a>";
                          echo "</div>";
                        echo "</div>";
                      }
                    ?>
                  </div>
                </div>
            <?php
              }
            ?>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>
