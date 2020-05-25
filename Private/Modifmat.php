<?php  require_once 'header.php'; ?>
      <?php
        $idm=$_GET['idm'];
        $reqmat = "SELECT *  FROM matiereoeuvre WHERE IdMatiereOeuvre=$idm";
        $repmat=$bdd->query($reqmat);
      ?>
      <div class="user3 clearfix">
        <div class="user_way">
          <div class="user_way-link">
            <a href="GestionOeuvres.php" alt="Retour Oeuvres"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Oeuvres</a>
          </div>
          <div class="user_way-link">
            <a href="GestionMat.php" alt="Retour Matière"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Matières d'oeuvres</a>
          </div>
          <div class="cadre3 vue">
            <img src="img/matioeuvre.jpg" />

          </div>
        </div>
        <div class="cadre4">
          <h3>Modification Matière d'une Oeuvre</h3>
          <form action="Modification/modifmat.php" action="get">
            <fieldset>
              <legend> Matière Oeuvre </legend>
              <?php
                foreach($repmat as $info) {
                  echo "<input class='champ' type='hidden' name='idmat' value=".$info['IdMatiereOeuvre']."></p>";
                  echo "<p>Matière d'Oeuvre en Français : </p>";
                  echo "<input class='champ' type='text' name='matfr' value='".$info['MatiereOeuvreFr']."'>";
                  echo "<p>Matière d'Oeuvre en Anglais : </p>";
                  echo "<input class='champ' type='text' name='maten' value=".$info['MatiereOeuvreEn'].">";
                  echo "<p>Matière d'Oeuvre en Allemand : </p>";
                  echo "<input class='champ' type='text' name='matall' value=".$info['MatiereOeuvreAll'].">";
                }
              ?>
                <input class="champ1" type="submit" value="Modifier Matière Oeuvre">
            </fieldset>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
