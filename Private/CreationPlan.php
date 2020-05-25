
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

          <form action="import/upplan.php" method="post" enctype="multipart/form-data">
            <fieldset>
              <legend> Plan </legend>
                <p>L'Exposition: </p>
                <?php
                  $reqExpo = "SELECT * From exposition order by NomExpositionFr";
                  $repExpo = $bdd -> query($reqExpo);
                ?>
                <select name="expo" id="expo">
                  <option value="0">Merci de choisir une exposition</option>
                  <?php
                    foreach ($repExpo as $info) {
                      echo "<option value='".$info['IdExposition']."'>".$info['NomExpositionFr']."</option>";
                    }
                  ?>
                </select>
                <p>Le Plan : </p>
                <input name="userfile" type="file" accept=".jpg,.png"/>
                <br>
                <input class="champ1" type="submit" value="Attribuer un Plan">
            </fieldset>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
