<?php  require_once 'header.php'; ?>
      <?php
        $idcol=$_GET['idcol'];
        $reqcol = "SELECT *  FROM collectif_artiste WHERE IdCollectif=$idcol";
        $repcol=$bdd->query($reqcol);
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
          <h3>Modification Collectif d'Artiste</h3>
          <form action="Modification/modifcol.php" action="get">
            <fieldset>
              <legend> Espace </legend>
              <?php
                foreach($repcol as $infc) {
                  echo "<input class='champ' type='hidden' name='idcol' value=".$infc['IdCollectif']."></p>";
                  echo "<p>Nom du Collectif d'Artistes : </p>";
                  echo "<input class='champ' type='text' name='NomCol' value='".$infc['NomCollectif']."'>";
                }
              ?>
                <input class="champ1" type="submit" value="Modifier le Collectif">
            </fieldset>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
