<?php
require_once 'connectbdd.php';
if (empty($_GET['TypeFr']) || empty($_GET['TypeEn']) || empty($_GET['TypeAll'])) {
  $status = " Merci de remplir correctement les champs.";
} else {
  $TFr=$_GET['TypeFr'];
  $TEn=$_GET['TypeEn'];
  $TAll=$_GET['TypeAll'];

  $reqty="INSERT iNTO typeoeuvre(TypeFr, TypeEn, TypeAll) Value('".$TFr."','".$TEn."','".$TAll."')";
  $repty=$bdd->query($reqty);

  header("location: GestionType.php");
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
            <a href="GestionType.php" alt="Retour Type"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Types d'oeuvres</a>
          </div>
          <div class="cadre3 vue">
            <img src="img/typeoeuvre.jpg" />

          </div>
        </div>
        <div class="cadre4">
          <h3>Création Type Oeuvre</h3>
          <div id="status"><?php echo $status; ?></div>
          <form action="" action="get">
            <fieldset>
              <legend> Typologie </legend>
                <input class="champ" type="text" name="TypeFr" placeholder="Type Oeuvre en Français">
                <input class="champ" type="text" name="TypeEn" placeholder="Type Oeuvre en Anglais">
                <input class="champ" type="text" name="TypeAll" placeholder="Type Oeuvre en Allemand">


                <input class="champ1" type="submit" value="Créer un Type d'Oeuvre">
            </fieldset>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
