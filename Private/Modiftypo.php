<?php  require_once 'header.php'; ?>
      <?php
        $idt=$_GET['idt'];
        $reqmtyp = "SELECT *  FROM typeoeuvre WHERE IdType=$idt";
        $repmtyp=$bdd->query($reqmtyp);
      ?>
      <div class="user3 clearfix">
        <div class="user_way">
          <div class="user_way-link">
            <a href="GestionOeuvres.php" alt="Retour Oeuvres"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Oeuvres</a>
          </div>
          <div class="user_way-link">
            <a href="GestionType.php" alt="Retour Type"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Types d'oeuvres</a>
          </div>
          <div class="cadre3 vue">
            <img src="img/typeoeuvre.jpg" />

          </div>
        </div>
        <div class="cadre4">

          <h3>Modification Type Oeuvre</h3>
          <form action="Modification/modiftyp.php" action="get">
            <fieldset>
              <legend> Typologie </legend>
              <?php
                foreach($repmtyp as $info) {
                  echo "<input class='champ' type='hidden' name='idtyp' value=".$info['IdType']."></p>";
                  echo "<p>Typologie Oeuvre en Français : </p>";
                  echo "<input class='champ' type='text' name='typefr' value='".$info['TypeFr']."'>";
                  echo "<p>Typologie Oeuvre en Anglais : </p>";
                  echo "<input class='champ' type='text' name='typeen' value=".$info['TypeEn'].">";
                  echo "<p>Typologie Oeuvre en Allemand : </p>";
                  echo "<input class='champ' type='text' name='typeall' value=".$info['TypeAll'].">";
                }
              ?>
                <input class="champ1" type="submit" value="Modifier un Type d'Oeuvre">
            </fieldset>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
