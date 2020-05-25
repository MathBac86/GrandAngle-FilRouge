<?php
require_once 'connectbdd.php';
if (empty($_GET['TypeMed'])) {
  $status = " Merci de remplir correctement les champs.";
} else {
  $TMed=$_GET['TypeMed'];

  $reqtym="INSERT iNTO type_media(TypeMedia) Value('".$TMed."')";
  $reptym=$bdd->query($reqtym);

  header("location: TypeMed.php");
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
            <a href="GestionMedias.php" alt="Retour Média"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Médias</a>
          </div>
          <div class="user_way-link">
            <a href="TypeMed.php" alt="Retour Type Média"><i class="fas fa-arrow-alt-circle-left"></i> Retour Typologie des Médias</a>
          </div>
          <div class="cadre3 vue">
            <img src="img/média.jpg" />

          </div>
        </div>
        <div class="cadre4">
          <h3>Création Type Médias</h3>
          <div id="status"><?php echo $status; ?></div>
          <form action="" action="get">
            <fieldset>
              <legend> Typologie </legend>
                <input class="champ" type="text" name="TypeMed" placeholder="Type Médias">

                <input class="champ1" type="submit" value="Créer un Type d'Oeuvre">
            </fieldset>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
