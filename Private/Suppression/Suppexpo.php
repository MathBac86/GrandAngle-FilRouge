<?php
  $idexp=$_GET['ide'];
  require_once '../connectbdd.php';

  $reqsins = "UPDATE inscrire SET IdExposition = 12 Where Idexposition = ".$idexp."";
  $repsins = $bdd->query($reqsins);

  $reqsexp ="DELETE FROM exposition WHERE IdExposition =".$idexp."";
  $repsexp = $bdd->query($reqsexp);

  header('location: ../GestionExpo.php');
  exit();


?>
