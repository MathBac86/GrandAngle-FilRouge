<?php
  require_once 'connectbdd.php';
  // ----si champ vide----
  if (empty($_GET['NArtiste']) || empty($_GET['descripAFr']) ||
      empty($_GET['descripAEn']) || empty($_GET['descripAAl'])) {
    $status = " Merci de remplir correctement les champs.";
  } else {
    $Nart=addslashes($_GET['NArtiste']);
    $DescaFr=addslashes($_GET['descripAFr']);
    $DescaEn=$_GET['descripAEn'];
    $DescaAl=addslashes($_GET['descripAAl']);
    $colart=$_GET['colart'];


    // ----Appel requête de création exposition----
    $reqcart="INSERT iNTO artiste(NomArtiste, BioArtisteFr, BioArtisteEn, BioArtisteAll)
            Value('".$Nart."','".$DescaFr."','".$DescaEn."','".$DescaAl."')";
    $repcart=$bdd->query($reqcart);

    // ----Rattachement avec un collectif----
    if($colart!=='0') {
    $reqcart="INSERT INTO composer(idArtiste, IdCollectif)
              Value((SELECT idArtiste FROM artiste WHERE NomArtiste='".$Nart."'), '".$colart."')";
    $repcart=$bdd->query($reqcart);
    }

    // ----Retour au à la gestion des expos----
    header("location: GestionArtistes.php");
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
            <a href="GestionArtistes.php" alt="Retour Artiste"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Artistes</a>
          </div>
          <div class="cadre3 vue">
            <img src="img/artiste.jpg" />

          </div>
        </div>
        <div class="cadre4">
          <h3>Création d'un Artiste</h3>
          <div id="status"><?php echo $status; ?></div>
          <form action="" action="get">
            <fieldset>
              <legend> Artiste </legend>
                <fieldset>
                  <p><input class="champ2" type="text" name="NArtiste" placeholder="Nom de l'Artiste"></p>
                  <legend> Français </legend>
                    <p><textarea class="champ2" rows="10" cols="50" name="descripAFr" placeholder="Petite description Français"></textarea></p>
                </fieldset>
                <fieldset>
                  <legend> Anglais </legend>
                    <p><textarea class="champ2" rows="10" cols="50" name="descripAEn" placeholder="Petite description Anglais"></textarea></p>
                </fieldset>
                <fieldset>
                  <legend> Allemand </legend>
                    <p><textarea class="champ2" rows="10" cols="50" name="descripAAl" placeholder="Petite description Allemand"></textarea></p>
                </fieldset>
                <fieldset>
                  <legend> Collectif d'Artistes </legend>
                  <?php
                    $reqColA = "SELECT * From collectif_artiste order by NomCollectif";
                    $repColA = $bdd -> query($reqColA);
                    echo "<select name='colart'>";
                      echo "<option value='0'>Aucun Collectif</option>";
                      foreach ($repColA as $info) {
                        echo "<option value='".$info['IdCollectif']."'>".$info['NomCollectif']."</option>";
                      }
                    echo "</select>";
                  ?>

                </fieldset>
            </fieldset>
            <input class="champ1" type="submit" value="Créer Artiste">
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
