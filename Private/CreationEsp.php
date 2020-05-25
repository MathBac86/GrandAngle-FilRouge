<?php
  require_once 'connectbdd.php';
  if (empty($_GET['NomEspace'])) {
    $status = " Merci de remplir correctement les champs.";
  } else {
    $Nesp=$_GET['NomEspace'];

    $requs="INSERT INTO espace(NomEspace) Value('".$Nesp."')";
    $repus=$bdd->query($requs);

    header("location: GestionSpace.php");
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
            <a href="GestionSpace.php" alt="Retour Espace"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Espaces</a>
          </div>
          <div class="cadre3 vue">
            <img src="img/visageart.jpg" />

          </div>
        </div>
        <div class="cadre4">
          <h3>Création Espace</h3>
          <div id="status"><?php echo $status; ?></div>
          <form action="" action="get">
            <fieldset>
              <legend> Espace </legend>
                <input class="champ" type="text" name="NomEspace" placeholder="Nom de l'Espace">

                <input class="champ1" type="submit" value="Créer un Espace">
            </fieldset>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
