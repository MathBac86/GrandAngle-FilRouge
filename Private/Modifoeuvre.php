<?php  require_once 'header.php'; ?>
      <?php
        $ido=$_GET['ido'];

        $reqmdo = "SELECT oeuvre.*, inscrire.*, PlanExposition, espace.*
                   FROM oeuvre
                    INNER JOIN inscrire ON inscrire.IdOeuvre = oeuvre.IdOeuvre
                    INNER JOIN exposition ON inscrire.IdExposition = exposition.IdExposition
                    INNER JOIn espace ON inscrire.IdEspace=espace.IdEspace
                    WHERE oeuvre.IdOeuvre=".$ido." ";
        $repmdo=$bdd->query($reqmdo);

      ?>
      <div class="user3 clearfix">
        <div class="user_way">
          <div class="user_way-link">
            <a href="GestionOeuvres.php" alt="Retour Oeuvres"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Oeuvres</a>
          </div>
          <div class="user_way-link">
            <a href="Oeuvres.php" alt="Retour Oeuvres"><i class="fas fa-arrow-alt-circle-left"></i> Retour Administration des Oeuvres</a>
          </div>
          <div class="cadre3 vue">
            <img src="img/oeuvres.jpg" />
          </div>
        </div>
        <div class="cadre4">
          <h3>Modification d'une Oeuvre</h3>
          <form action="Modification/modifoeuv.php" method="get">
            <fieldset>
              <legend> Oeuvre </legend>
                <fieldset>
                  <legend> Français </legend>
                  <?php
                    foreach($repmdo as $oeuv){
                      echo "<p><input class='champ2' type='hidden' name='idmo' value=".$oeuv['IdOeuvre']."></p>";
                      echo "<p><input class='champ2' type='text' name='NOFr' value='".htmlentities($oeuv['NomOeuvreFr'], ENT_QUOTES)."'></p>";
                      echo "<p><textarea class='champ2' rows='10' cols='50' name='descripOFr'>".$oeuv['DescOeuvreFr']."</textarea></p>";
                  ?>
                </fieldset>

                <fieldset>
                  <legend> Anglais </legend>
                  <?php
                    echo "<p><input class='champ2' type='text' name='NOEn' value='".$oeuv['NomOeuvreEn']."'></p>";
                    echo "<p><textarea class='champ2' rows='10' cols='50' name='descripOEn'>".$oeuv['DescOeuvreEn']."</textarea></p>";
                  ?>
                </fieldset>

                <fieldset>
                  <legend> Allemand </legend>
                  <?php
                    echo "<p><input class='champ2' type='text' name='NOAl' value='".$oeuv['NomOeuvreAll']."'></p>";
                    echo "<p><textarea class='champ2' rows='10' cols='50' name='descripOAl'>".$oeuv['DescOeuvreDe']."</textarea></p>";
                  ?>
                </fieldset>

                <fieldset>
                  <legend> Info Oeuvres </legend>
                    <div class="oinfos">
                      <div class="ainfo">
                        <p>Longueur</p>
                      <?php
                        echo "<input class='champ2' type='number' name='long' value='".$oeuv['Longueur']."'>";
                      ?>
                      </div>
                      <div class="ainfo">
                        <p>Largeur</p>
                      <?php
                        echo "<input class='champ2' type='number' name='larg' value='".$oeuv['Largeur']."'>";
                      ?>
                      </div>
                      <div class="ainfo">
                        <p>Profondeur</p>
                      <?php
                        echo "<input class='champ2' type='number' name='prof' value='".$oeuv['Profondeur']."'>";
                      ?>
                      </div>
                      <div class="ainfo">
                        <p>Année de Création</p>
                      <?php
                        echo "<input class='champ2' type='text' name='date' value='".$oeuv['AnneeCreation']."'  maxlength='4' pattern='^\d{4}$'>";
                      ?>
                      </div>
                    </div>
                </fieldset>

                <fieldset>
                  <legend> Autre Informations </legend>

                      <div class="ainfo">
                        <p>Type de l'oeuvre :</p>
                        <?php
                        $type=$oeuv['IdType'];
                        $reqtypeO = "SELECT * From typeoeuvre Where IdType = '".$type."'";
                        $reptypeO = $bdd -> query($reqtypeO);
                        $don = $reptypeO->fetch();
                        echo "<select id='type' name='type'>";
                        echo "<option value='".$don['IdType']."''>".$don['TypeFr']."</option>";
                        $reqto = "SELECT * From typeoeuvre ORDER BY TypeFr";
                        $repto = $bdd -> query($reqto);
                        foreach ($repto as $inf) {
                          echo "<option value='".$inf['IdType']."'>".$inf['TypeFr']."</option>";
                        }
                        echo "</select>";
                        ?>
                      </div>
                      <div class="ainfo">
                        <p>Matière de l'oeuvre :</p>
                        <?php
                        $Mat=$oeuv['IdMatiereOeuvre'];
                        $reqMatO = "SELECT * From matiereoeuvre Where IdMatiereOeuvre = '".$Mat."'";
                        $repMatO = $bdd -> query($reqMatO);
                        $donm = $repMatO->fetch();
                        echo "<select id='mat' name='mat'>";
                        echo "<option value='".$donm['IdMatiereOeuvre']."''>".$donm['MatiereOeuvreFr']."</option>";
                        $reqmao = "SELECT * From matiereoeuvre ORDER BY MatiereOeuvreFr";
                        $repmao = $bdd -> query($reqmao);
                        foreach ($repmao as $infm) {
                          echo "<option value='".$infm['IdMatiereOeuvre']."'>".$infm['MatiereOeuvreFr']."</option>";
                        }
                        echo "</select>";
                        ?>
                      </div>
                      <div class="ainfo">
                        <p>Oeuvre dans Exposition :</p>
                        <select id='expo' name='expo'>";
                        <?php
                          $exp=$oeuv['IdExposition'];
                          $reqexO = "SELECT * From exposition Where Idexposition = '".$exp."'";
                          $repexO = $bdd -> query($reqexO);
                          $dona=$repexO->fetch();
                            echo "<option value='".$dona['IdExposition']."''>".$dona['NomExpositionFr']."</option>";
                            $reqeo = "SELECT * From exposition ORDER BY NomExpositionFr";
                            $repeo = $bdd -> query($reqeo);
                            foreach ($repeo as $infa) {
                              echo "<option value='".$infa['IdExposition']."'>".$infa['NomExpositionFr']."</option>";
                            }
                          echo "</select>";
                        ?>
                      </div>
                      <div class="ainfo">
                        <p>Artiste :</p>
                        <select id='art' name='art'>";
                        <?php
                          $art=$oeuv['idArtiste'];
                          $reqartO = "SELECT * From artiste Where idArtiste = '".$art."'";
                          $repartO = $bdd -> query($reqartO);
                          $donart=$repartO->fetch();
                            echo "<option value='".$donart['idArtiste']."'>".$donart['NomArtiste']."</option>";
                            $reqao = "SELECT * From artiste ORDER BY NomArtiste";
                            $repao = $bdd -> query($reqao);
                            foreach ($repao as $infaO) {
                              echo "<option value='".$infaO['idArtiste']."'>".$infaO['NomArtiste']."</option>";
                            }
                          echo "</select>";
                        ?>
                      </div>
                      <div class="ainfo">
                        <p>Espace d'Exposition :</p>
                        <select id='esp' name='esp'>";
                        <?php
                          $esp=$oeuv['IdEspace'];
                          $reqespO = "SELECT * From espace Where IdEspace =$esp";
                          $repespO = $bdd -> query($reqespO);
                          $donesp=$repespO->fetch();
                            echo "<option value='".$donesp['IdEspace']."'>".$donesp['NomEspace']."</option>";
                            $reqeo = "SELECT * From espace ORDER BY NomEspace";
                            $repeo = $bdd -> query($reqeo);
                            foreach ($repeo as $infeO) {
                              echo "<option value='".$infeO['IdEspace']."'>".$infeO['NomEspace']."</option>";
                            }
                          echo "</select>";
                        }
                        ?>
                      </div>
                </fieldset>
              </fieldset>
              <input class="champ1" type="submit" value="Modifier l'Oeuvre">
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
