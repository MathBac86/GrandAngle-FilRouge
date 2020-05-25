<?php
require_once '../connectbdd.php';

$ida=$_GET['idart'];

// if (!isset($_GET['NArt']) || !isset($_GET['desAFR']) ||
//     !isset($_GET['desAEn']) || !isset($_GET['desAAl'])) {
//   header("location: ../Modifart.php?ida=$ida");
// } else {
  $NomArt = addslashes($_GET['NArt']);
  $BioFr = addslashes($_GET['desAFr']);
  $BioEn = addslashes($_GET['desAEn']);
  $BioAl = addslashes($_GET['desAAl']);
  $ColA = $_GET['ColA'];

  $reqmart="UPDATE artiste
          SET NomArtiste='".$NomArt."',
              BioArtisteFr='".$BioFr."',
              BioArtisteEn='".$BioEn."',
              BioArtisteAll='".$BioAl."'
          Where idArtiste=$ida";
  $exemart=$bdd->query($reqmart);

  $reqCAa="UPDATE composer
           SET IdCollectif=$ColA
           Where idArtiste=$ida";
  $repCAa=$bdd->query($reqCAa);



  header('location: ../GestionArtistes.php');
  exit();
// }

?>
