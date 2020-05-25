<?php
  require_once 'connectbdd.php';
  if (empty($_GET['MatiereFr']) || empty($_GET['MatiereEn']) || empty($_GET['MatiereAll'])) {
    $status = " Merci de remplir correctement les champs.";
  } else {
    $MatFr=$_GET['MatiereFr'];
    $MatEn=$_GET['MatiereEn'];
    $MatAll=$_GET['MatiereAll'];

    $reqmt="INSERT iNTO matiereoeuvre(MatiereOeuvreFr, MatiereOeuvreEn, MatiereOeuvreAll) Value('".$MatFr."','".$MatEn."','".$MatAll."')";
    $repmt=$bdd->query($reqmt);

    header("location: GestionMat.php");
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
            <a href="GestionMat.php" alt="Retour Matière"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Matières</a>
          </div>
          <div class="cadre3 vue">
            <img src="img/matioeuvre.jpg" />

          </div>
        </div>
        <div class="cadre4">
          <h3>Création Matière</h3>
          <div id="status"><?php echo $status; ?></div>
          <form action="" action="get">
            <fieldset>
              <legend> Matière </legend>
                <input class="champ" type="text" name="MatiereFr" placeholder="Matière en Français">
                <input class="champ" type="text" name="MatiereEn" placeholder="Matière en Anglais">
                <input class="champ" type="text" name="MatiereAll" placeholder="Matière en Allemand">


                <input class="champ1" type="submit" value="Créer d'une Matière">
            </fieldset>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
