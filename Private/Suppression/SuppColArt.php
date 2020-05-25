<?php
  $idcol=$_GET['idcol'];
  require_once '../connectbdd.php';

  // Suppression des liens entre artiste et collectif
  $reqsupart= "DELETE FROM composer WHERE IdCollectif=".$idcol."";
  $repsupart = $bdd->query($reqsupart);


  $reqsupcol = "DELETE From collectif_artiste WHERE IdCollectif = ".$idcol."";
  $repsupcol = $bdd->query($reqsupcol);

  header('location: ../CollectifArt.php');
  exit();


?>
