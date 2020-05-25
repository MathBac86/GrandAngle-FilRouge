<?php
  require_once 'connectbdd.php';
  if (empty($_GET['NOeuvreFr']) || empty($_GET['descripOFr']) ||
      empty($_GET['NOeuvreEn']) || empty($_GET['descripOEn']) ||
      empty($_GET['NOeuvreAl']) || empty($_GET['descripOAl']) ||
      $_GET['art']=="0" || $_GET['type']=="0" || $_GET['mat']=="0" ||
      $_GET['expo']=="0" || $_GET['espace']=="0") {
    $status = " Merci de remplir correctement les champs.";
  } else {
    $NomFr=$_GET['NOeuvreFr'];
    $NomEn=$_GET['NOeuvreEn'];
    $NomAl=$_GET['NOeuvreAl'];
    $DescFr=$_GET['descripOFr'];
    $DescEn=$_GET['descripOEn'];
    $DescAl=$_GET['descripOAl'];
    $Year=$_GET['YOeuvre'];
    $iart=$_GET['art'];
    $type=$_GET['type'];
    $mat=$_GET['mat'];
    $Long=$_GET['LongOeuvre'];
    $Larg=$_GET['LargOeuvre'];
    $Prof=$_GET['ProfOeuvre'];
    $Freq=$_GET['FreqOeuvre'];
    $expo=$_GET['expo'];
    $espace=$_GET['espace'];

    // -----Création de l'oeuvre dans BDD------
    $reqco = "INSERT INTO oeuvre(NomOeuvreFr, NomOeuvreEn, NomOeuvreAll, DescOeuvreFr, DescOeuvreEn,
            DescOeuvreDe, AnneeCreation, FreqOeuvre, IdType,
            IdMatiereOeuvre, idArtiste)
            Value('".$NomFr."', '".$NomEn."', '".$NomAl."', '".$DescFr."', '".$DescEn."',
            '".$DescAl."','".$Year."','".$Freq."',
            '".$type."', '".$mat."', '".$iart."')";
    $repco = $bdd -> query($reqco);
    // var_dump($reqco);

    // -----Mise à jour de l'oeuvre créée si dimension Null----
    $reqUo = "UPDATE oeuvre
              SET  Longueur='".$Long."', Largeur='".$Larg."', Profondeur='".$Prof."'
              WHERE IdOeuvre = (SELECT IdOeuvre FROM oeuvre WHERE NomOeuvreFr='".$NomFr."')";
    $repUo = $bdd -> query($reqUo);


    // -----Mise de l'oeuvre dans une expo et espace----
    $reqins = "INSERT INTO inscrire(IdOeuvre, IdExposition, IdEspace)
              Value((SELECT IdOeuvre FROM oeuvre WHERE NomOeuvreFr='".$NomFr."'), '".$expo."', '".$espace."')";
    $repins = $bdd -> query($reqins);
    //var_dump($reqins);

    header("location: Oeuvres.php");
    exit();

  }
?>
<?php  require_once 'header.php'; ?>
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
          <h3>Création d'une Oeuvre</h3>
          <div id="status"><?php echo $status; ?></div>
          <form action="" action="get">
            <fieldset>
              <legend> Oeuvres </legend>
                <fieldset>
                  <legend> Français </legend>
                    <p><input class="champ2" type="text" name="NOeuvreFr" placeholder="Nom De L'oeuvre en Français"></p>
                    <p><textarea class="champ2" rows="10" cols="50" name="descripOFr" placeholder="Petite description Français"></textarea></p>
                </fieldset>
                <fieldset>
                  <legend> Anglais </legend>
                    <p><input class="champ2" type="text" name="NOeuvreEn" placeholder="Nom De L'oeuvre en Anglais"></p>
                    <p><textarea class="champ2" rows="10" cols="50" name="descripOEn" placeholder="Petite description Anglais"></textarea></p>
                </fieldset>
                <fieldset>
                  <legend> Allemand </legend>
                    <p><input class="champ2" type="text" name="NOeuvreAl" placeholder="Nom De L'oeuvre en Allemand"></p>
                    <p><textarea class="champ2" rows="10" cols="50" name="descripOAl" placeholder="Petite description Allemand"></textarea></p>
                </fieldset>
                <fieldset>
                  <legend> L'Oeuvre en Elle-Même </legend>
                    <div class="oinfos">
                      <div class="ainfo">
                        <p>Artiste de l'Oeuvre : </p>
                        <?php
                        $reqart = "SELECT * From artiste order by NomArtiste";
                        $repart = $bdd -> query($reqart);
                        ?>
                        <select id="art" name="art">
                          <option value="0">Merci de choisir un artiste</option>
                          <?php
                            foreach ($repart as $info) {
                              echo "<option value='".$info['idArtiste']."'>".$info['NomArtiste']."</option>";
                            }
                          ?>
                        </select>
                      </div>
                      <div class="ainfo">
                        <p>Année de Création : </p>
                        <input class="champ2" type="text" name="YOeuvre" placeholder="Mettre l'année de création" maxlength="4" pattern="^\d{4}$">
                      </div>
                      <div class="ainfo">
                        <p>Type de l'Oeuvre : </p>
                        <?php
                        $reqtype = "SELECT * From typeoeuvre order by TypeFr";
                        $reptype = $bdd -> query($reqtype);
                        ?>
                        <select id="type" name="type">
                          <option value="0">Merci de choisir une type</option>
                          <?php
                            foreach ($reptype as $info) {
                              echo "<option value='".$info['IdType']."'>".$info['TypeFr']."</option>";
                            }
                          ?>
                        </select>
                      </div>
                      <div class="ainfo">
                        <p>Matière de l'Oeuvre : </p>
                        <?php
                        $reqmat = "SELECT * From matiereoeuvre order by MatiereOeuvreFr";
                        $repmat = $bdd -> query($reqmat);
                        ?>
                        <select id="mat" name="mat">
                          <option value="0">Merci de choisir une matière</option>
                          <?php
                            foreach ($repmat as $info) {
                              echo "<option value='".$info['IdMatiereOeuvre']."'>".$info['MatiereOeuvreFr']."</option>";
                            }
                          ?>
                        </select>
                      </div>
                      <div class="ainfo">
                        <p>Longueur : </p>
                        <input class="champ2" type="number" name="LongOeuvre" placeholder="Mettre une longueur en cm">
                      </div>
                      <div class="ainfo">
                        <p>Largeur : </p>
                        <input class="champ2" type="number" name="LargOeuvre" placeholder="Mettre une largeur en cm">
                      </div>
                      <div class="ainfo">
                        <p>Profondeur : </p>
                        <input class="champ2" type="number" name="ProfOeuvre" placeholder="Mettre une profondeur en cm">
                      </div>
                      <input class="champ2" type="hidden" name="FreqOeuvre" value=0>
                    </div>
                </fieldset>
                <fieldset>
                  <legend> Autres Information sur l'Oeuvre </legend>
                    <div class="oinfos">
                      <div class="ainfo">
                        <p>Association avec une exposition : </p>
                        <?php
                        $reqexp = "SELECT * From exposition order by NomExpositionFr";
                        $repexp = $bdd -> query($reqexp);
                        ?>
                        <select id="expo" name="expo">
                          <option value="0">Merci de choisir exposition</option>
                          <?php
                            foreach ($repexp as $info) {
                              echo "<option value='".$info['IdExposition']."'>".$info['NomExpositionFr']."</option>";
                            }
                          ?>
                        </select>
                      </div>
                      <div class="ainfo">
                        <p>Association avec un espace : </p>
                        <?php
                        $reqesp = "SELECT * From espace order by NomEspace";
                        $repesp = $bdd -> query($reqesp);
                        ?>
                        <select id="espace" name="espace">
                          <option value="0">Merci de choisir espace</option>
                          <?php
                            foreach ($repesp as $info) {
                              echo "<option value='".$info['IdEspace']."'>".$info['NomEspace']."</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                </fieldset>
            </fieldset>
            <input class="champ1" type="submit" value="Créer une Oeuvre">
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
