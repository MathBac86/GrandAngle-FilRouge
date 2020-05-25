<?php
require_once '../connectbdd.php';
$idesp=$_GET['idesp'];

if (($_GET['Nomesp'])=="" ){
  header("location: ../Modifesp.php?ides=$idesp");
} else {
  $NomEsp=$_GET['Nomesp'];

  $reqme="UPDATE espace SET NomEspace = '".$NomEsp."' Where IdEspace=".$idesp." ";
  $execution=$bdd->query($reqme);

  header('location: ../GestionSpace.php');
  exit();
}

?>
