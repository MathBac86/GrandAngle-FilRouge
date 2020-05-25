<?php
  require_once '../connectbdd.php';
  $idart=$_GET['idart'];

  $requpoe="UPDATE oeuvre SET idArtiste = 16 Where idArtiste = ".$idart." ";
  $repupoe=$bdd->query($requpoe);

  $reqsaart="DELETE FROM composer WHERE idArtiste=$idart";
  $repsaart=$bdd->query($reqsaart);

  $reqsart="DELETE FROM artiste WHERE idArtiste=$idart";
  $repsart=$bdd->query($reqsart);


  header('location: ../GestionArtistes.php');
  exit();
?>
