<?php  require_once 'header.php'; ?>
      <?php
        $idex=$_GET['ide'];
        $reqmex = "SELECT *  FROM exposition WHERE IdExposition=$idex";
        $repmex=$bdd->query($reqmex);
      ?>
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
          <h3>Modification d'une Exposition</h3>
          <form action="Modification/modifexp.php" method="get">
            <fieldset>
              <legend> Exposition </legend>
                <fieldset>
                  <legend> Français </legend>
                  <?php
                    foreach($repmex as $info) {
                      echo "<p><input class='champ2' type='hidden' name='idexp' value=".$info['IdExposition']."></p>";
                      echo "<p><input class='champ2' type='text' name='NExpoFr' value='".htmlentities($info['NomExpositionFr'], ENT_QUOTES)."'></p>";
                      echo "<p><textarea class='champ2' rows='10' cols='50' name='descripEFr'>".$info['DescriptionExpositionFr']."</textarea></p>";
                  ?>
                </fieldset>
                <fieldset>
                  <legend> Anglais </legend>
                  <?php
                    echo "<p><input class='champ2' type='text' name='NExpoEn' value='".$info['NomExpositionEn']."'></p>";
                    echo "<p><textarea class='champ2' rows='10' cols='50' name='descripEEn'>".$info['DescriptionExpositionEn']."</textarea></p>";
                  ?>
                </fieldset>
                <fieldset>
                  <legend> Allemand </legend>
                  <?php
                    echo "<p><input class='champ2' type='text' name='NExpoAl' value='".$info['NomExpositionAll']."'></p>";
                    echo "<p><textarea class='champ2' rows='10' cols='50' name='descripEAl'>".$info['DescriptionExpositionAll']."</textarea></p>";
                  ?>
                </fieldset>
                <fieldset>
                  <legend> Autre Informations </legend>
                  <div class="oinfos">
                    <div class="ainfo">
                    <?php
                      echo "<p>Date de début de l'exposition : </p>";
                      echo "<input class='champ2' type='Date' name='datedeb' value='".$info['DateDebut']."'>";
                    echo "</div>";
                    echo "<div class='ainfo'>";
                      echo "<p>Date de fin de l'exposition : </p>";
                      echo "<input class='champ2' type='Date' name='datefin' value='".$info['DateFin']."'>";
                    echo "</div>";
                    echo "<div class='ainfo'>";
                      echo "<p>Tarif de l'Exposition en Euros : </p>";
                      echo "<input class='champ2' type='number' name='TarifExp' value='".$info['Tarif']."'>";
                    }
                    ?>
                  </div>
                  </div>
                </fieldset>

            </fieldset>
            <input class="champ1" type="submit" value="Modifier l'exposition">
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
