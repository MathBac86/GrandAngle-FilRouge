<?php
require_once '../connectbdd.php';
$idmat=$_GET['idmat'];

if (($_GET['matfr'])=="" || ($_GET['maten'])=="" || ($_GET['matall'])=="" ){
  header("location: ../Modifmat.php?idt=$idtyp");
} else {
  $MFr=$_GET['matfr'];
  $MEn=$_GET['maten'];
  $MAll=$_GET['matall'];

  $reqme="UPDATE matiereoeuvre SET MatiereOeuvreFr = '".$MFr."', MatiereOeuvreEn = '".$MEn."', MatiereOeuvreAll = '".$MAll."' Where IdMatiereOeuvre=".$idmat." ";
  $execution=$bdd->query($reqme);

  header('location: ../GestionMat.php');
  exit();
}

?>
