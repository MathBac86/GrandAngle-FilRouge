<?php
require_once '../connectbdd.php';
$idexp= $_GET['idexp'];

if (($_GET['NExpoFr'])=="" || ($_GET['descripEFr'])=="" ||
    ($_GET['NExpoEn'])=="" || ($_GET['descripEEn'])=="" ||
    ($_GET['NExpoAl'])=="" || ($_GET['descripEAl'])=="" ||
    ($_GET['datedeb'])=="" || ($_GET['datefin'])=="" ||
    ($_GET['TarifExp'])=="" ) {
  header("location: ../Modifexpo.php?ide=$idexp");
} else {
  $NExpFr=addslashes($_GET['NExpoFr']);
  $NExpEn=$_GET['NExpoEn'];
  $NExpAl=$_GET['NExpoAl'];
  $DesExpFr=addslashes($_GET['descripEFr']);
  $DesExpEn=$_GET['descripEEn'];
  $DesExpAl=$_GET['descripEAl'];
  $datedebut=$_GET['datedeb'];
  $datefin=$_GET['datefin'];
  $TarifE=$_GET['TarifExp'];


  $reqme="UPDATE exposition
          SET NomExpositionFr = '".$NExpFr."',
              NomExpositionEn = '".$NExpEn."',
              NomExpositionAll = '".$NExpAl."',
              DescriptionExpositionFr = '".$DesExpFr."',
              DescriptionExpositionEn = '".$DesExpEn."',
              DescriptionExpositionAll = '".$DesExpAl."',
              DateDebut = '".$datedebut."',
              DateFin = '".$datefin."',
              Tarif = '".$TarifE."'
          WHERE IdExposition = ".$idexp." ";
          // echo $reqme;
  $exeme=$bdd->query($reqme);

  header('location: ../GestionExpo.php');
  exit();
}

?>
