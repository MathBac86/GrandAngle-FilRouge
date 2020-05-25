<?php
require_once '../connectbdd.php';

$idcol=$_GET['idcol'];

if (($_GET['NomCol'])=="" ){
  header("location: ../ModifColArt.php?idcol=$idcol");
} else {
  $NomCol=$_GET['NomCol'];

  $reqmcoa="UPDATE collectif_artiste SET NomCollectif = '".$NomCol."' Where IdCollectif=".$idcol." ";
  $execolart=$bdd->query($reqmcoa);

  header('location: ../CollectifArt.php');
  exit();
}

?>
