<?php  require_once 'header.php'; ?>
      <?php
        $ides=$_GET['ides'];
        $reqmat = "SELECT *  FROM espace WHERE IdEspace=$ides";
        $repmat=$bdd->query($reqmat);
      ?>
      <div class="user3 clearfix">
        <div class="user_way">
          <div class="user_way-link">
            <a href="GestionOeuvres.php" alt="Retour Oeuvres"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Oeuvres</a>
          </div>
          <div class="user_way-link">
            <a href="GestionSpace.php" alt="Retour Espace"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Espaces</a>
          </div>
          <div class="cadre3 vue">
            <img src="img/visageart.jpg" />

          </div>
        </div>
        <div class="cadre4">
          <h3>Modification Espace</h3>
          <form action="Modification/modifesp.php" action="get">
            <fieldset>
              <legend> Espace </legend>
              <?php
                foreach($repmat as $info) {
                  echo "<input class='champ' type='hidden' name='idesp' value=".$info['IdEspace']."></p>";
                  echo "<p>Nom de l'Espace : </p>";
                  echo "<input class='champ' type='text' name='Nomesp' value='".$info['NomEspace']."'>";
                }
              ?>
                <input class="champ1" type="submit" value="Modifier un Espace">
            </fieldset>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
