<?php  require_once 'header.php'; ?>
      <div class="user3 clearfix">
        <div class="user_way">
          <div class="user_way-link">
            <a href="GestionExpo.php" alt="Retour Exposition"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Expositions</a>
          </div>
          <div class="user_way-link">
            <a href="PlanExpo.php" alt="Retour Plan"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Plans</a>
          </div>
          <div class="cadre3 vue">
            <img src="img/Plan/Plan1.jpg" />

          </div>
        </div>
        <div class="cadre4">
          <h3>Attribution Plan</h3>
          <form action="Modification/modifplan.php" method="post" enctype="multipart/form-data">
            <fieldset>
              <legend> Plan </legend>

                <?php
                  $idp = $_GET['idp'];
                  $reqExpo = "SELECT * From exposition WHERE IdExposition = $idp";
                  $repExpo = $bdd -> query($reqExpo);
                  $info = $repExpo->fetch();
                  echo "<p><input class='champ' type='hidden' name='idexp' value=".$info['IdExposition']."></p>";
                  echo "<p>L'Exposition : ". $info['NomExpositionFr']."</p>";
                  echo "<p>Le Plan Actuel: </p>";
                  echo "<img src='img/Plan/".$info['PlanExposition']."' title='Plan Actuel' ></img>";
                  echo "<input name='userfile' type='file' accept='.jpg,.png' >";
                ?>
                <br>
                <input class="champ1" type="submit" value="Attribuer un Plan">
            </fieldset>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
