<?php
  require_once 'connectbdd.php';
  // ----si champ vide----
  if (empty($_GET['NExpoFr']) || empty($_GET['descripEFr']) ||
      empty($_GET['NExpoEn']) || empty($_GET['descripEEn']) ||
      empty($_GET['NExpoAl']) || empty($_GET['descripEAl']) ||
      empty($_GET['datedeb']) || empty($_GET['datefin']) ||
      empty($_GET['TarifExp'])) {
    $status = " Merci de remplir correctement les champs.";
  } else {
    $NFr=addslashes($_GET['NExpoFr']);
    $NEn=$_GET['NExpoFr'];
    $NAll=$_GET['NExpoFr'];
    $DescFr=addslashes($_GET['descripEFr']);
    $DescEn=$_GET['descripEEn'];
    $DescAl=$_GET['descripEAl'];
    $dated=$_GET['datedeb'];
    $datef=$_GET['datefin'];
    $Tarif=$_GET['TarifExp'];

    // ----Appel requête de création exposition----
    $requs="INSERT iNTO exposition(NomExpositionFr, NomExpositionEn, NomExpositionAll, DescriptionExpositionFr, DescriptionExpositionEn, DescriptionExpositionAll, DateDebut, DateFin, Tarif)
            Value('".$NFr."','".$NEn."','".$NAll."','".$DescFr."','".$DescEn."','".$DescAll."','".$dated."','".$datef."','".$Tarif."')";
    $repus=$bdd->query($requs);

    // ----Création d'un dossier pour mettre les photos des oeuvres----
    $dossier = "img/".$NFr."";
    if(!is_dir($dossier)){
       mkdir($dossier);
    }

    // ----Retour au à la gestion des expos----
    header("location: GestionExpo.php");
    exit();

  }
?>
<?php  require_once 'header.php'; ?>
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
          <h3>Création d'une Exposition</h3>
          <div id="status"><?php echo $status; ?></div>
          <form action="" action="get">
            <fieldset>
              <legend> Exposition </legend>
                <fieldset>
                  <legend> Français </legend>
                    <p><input class="champ2" type="text" name="NExpoFr" placeholder="Nom de l'Expo Français"></p>
                    <p><textarea class="champ2" rows="10" cols="50" name="descripEFr" placeholder="Petite description Français"></textarea></p>
                </fieldset>
                <fieldset>
                  <legend> Anglais </legend>
                    <p><input class="champ2" type="text" name="NExpoEn" placeholder="Nom de l'Expo Anglais"></p>
                    <p><textarea class="champ2" rows="10" cols="50" name="descripEEn" placeholder="Petite description Anglais"></textarea></p>
                </fieldset>
                <fieldset>
                  <legend> Allemand </legend>
                    <p><input class="champ2" type="text" name="NExpoAl" placeholder="Nom de l'Expo Allemand"></p>
                    <p><textarea class="champ2" rows="10" cols="50" name="descripEAl" placeholder="Petite description Allemand"></textarea></p>
                </fieldset>
                <fieldset>
                  <legend> Autre Informations </legend>
                  <div class="oinfos">
                    <div class="ainfo">
                      <p>Date de début de l'exposition :</p>
                      <input class="champ2" type="Date" name="datedeb">
                    </div>
                    <div class="ainfo">
                      <p>Date de fin de l'exposition : </p>
                      <input class="champ2" type="Date" name="datefin">
                    </div>
                    <div class="ainfo">
                      <p>Tarif de l'Exposition en € : </p>
                      <input class="champ2" type="number" name="TarifExp" placeholder="Tarif de l'exposition en €">
                    </div>
                  </div>
                </fieldset>

            </fieldset>
            <input class="champ1" type="submit" value="Créer l'exposition">
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
