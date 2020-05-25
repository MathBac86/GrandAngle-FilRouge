<?php  require_once 'header.php'; ?>
      <div class="user3 clearfix">
        <div class="user_way">
          <div class="user_way-link">
            <a href="GestionOeuvres.php" alt="Retour Oeuvres"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Oeuvres</a>
          </div>
          <div class="user_way-link">
            <a href="GestionMedias.php" alt="Retour Média"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Médias</a>
          </div>
          <div class="cadre3 vue">
            <img src="img/media.jpg" />

          </div>
        </div>
        <div class="cadre4">
          <h3>Attribution Média</h3>
          <form action="import/upmedia.php" method="post" enctype="multipart/form-data">
            <fieldset>
              <legend> Media </legend>
                <p>Type du fichier : </p>
                <?php
                  $reqTMed = "SELECT * From type_media order by TypeMedia";
                  $repTMed = $bdd -> query($reqTMed);
                ?>
                <select id="media" name="media" >
                  <option value="0">Merci de choisir un type de média</option>
                  <?php
                    foreach ($repTMed as $info) {
                      echo "<option value='".$info['IdTypeMedia']."'>".$info['TypeMedia']."</option>";
                    }
                  ?>
                </select>
                <p>L'Oeuvre : </p>
                <?php
                  $reqOeuv = "SELECT IdOeuvre, NomOeuvreFr From oeuvre order by NomOeuvreFr";
                  $repOeuv = $bdd -> query($reqOeuv);
                ?>
                <select id="oeuvre" name="oeuvre" >
                  <option value="0">Merci de choisir une oeuvre</option>
                  <?php
                    foreach ($repOeuv as $info) {
                      echo "<option value='".$info['IdOeuvre']."'>".$info['NomOeuvreFr']."</option>";
                    }
                  ?>
                </select>
                <p>Le Médias: </p>
                <input name="userfile" type="file" accept=".jpg,.png">
                <br>
                <input class="champ1" type="submit" value="Attribuer un Média">
            </fieldset>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
