<?php  require_once 'header.php'; ?>
      <?php
        $ida=$_GET['ida'];
        $reqrart = "SELECT *  FROM artiste WHERE idArtiste=$ida";
        $reprart=$bdd->query($reqrart);
      ?>
      <div class="user3 clearfix">
        <div class="user_way">
          <div class="user_way-link">
            <a href="GestionOeuvres.php" alt="Retour Oeuvres"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Oeuvres</a>
          </div>
          <div class="user_way-link">
            <a href="GestionArtistes.php" alt="Retour Artiste"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Artistes</a>
          </div>
          <div class="cadre3 vue">
            <img src="img/artiste.jpg" />

          </div>
        </div>
        <div class="cadre4">
          <h3>Modification d'un Artiste</h3>
          <form action="Modification/modifart.php" method="get">
            <fieldset>
              <fieldset>
                <legend> Artiste </legend>
                <?php
                  foreach($reprart as $infart) {
                    echo "<input class='champ' type='hidden' name='idart' value=".$infart['idArtiste']."></p>";
                    echo "<p>Nom de l'Artiste : <input class='champ' type='text' name='NArt' value='".htmlentities($infart['NomArtiste'], ENT_QUOTES)."'></p>";
                ?>
              </fieldset>
              <fieldset>
                <legend> Description en Français</legend>
                <?php
                  echo "<p><textarea class='champ2' rows='10' cols='50' name='desAFr'>".htmlentities($infart['BioArtisteFr'], ENT_QUOTES)."</textarea></p>";
                ?>
              </fieldset>
              <fieldset>
                <legend> Description en Anglais</legend>
                <?php
                  echo "<p><textarea class='champ2' rows='10' cols='50' name='desAEn'>".$infart['BioArtisteEn']."</textarea></p>";
                ?>
              </fieldset>
              <fieldset>
                <legend> Description en Allemand</legend>
                <?php
                  echo "<p><textarea class='champ2' rows='10' cols='50' name='desAAl'>".$infart['BioArtisteAll']."</textarea></p>";
                ?>
              </fieldset>
              <fieldset>
                <p>Collectif d'Artistes :</p>

                <?php
                  $nart = $infart['idArtiste'];
                  $reqClA = "SELECT idArtiste, collectif_artiste.*
                             From composer
                              INNER JOIN collectif_artiste ON collectif_artiste.IdCollectif=composer.IdCollectif
                             Where idArtiste=$nart";
                  $repClA = $bdd -> query($reqClA);
                  $donCa = $repClA->fetch();
                    echo "<select id='ColA' name='ColA'>";
                    echo "<option value='".$donCa['IdCollectif']."'>".$donCa['NomCollectif']."</option>";
                    $reqCo = "SELECT * From collectif_artiste ORDER BY NomCollectif";
                    $repCo = $bdd -> query($reqCo);
                    foreach ($repCo as $infCa) {
                      echo "<option value='".$infCa['IdCollectif']."'>".$infCa['NomCollectif']."</option>";
                    }
                  echo "</select>";
                }
                ?>
              </fieldset>
              <input class="champ1" type="submit" value="Modifier l'artiste">
            </fieldset>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
