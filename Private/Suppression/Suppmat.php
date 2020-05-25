<?php
  $idm=$_GET['idm'];
  require_once '../connectbdd.php';

  $reqst ="DELETE FROM matiereoeuvre WHERE IdMatiereOeuvre =".$idm."";
  $repst = $bdd->query($reqst);

  header('location: ../GestionMat.php');
  exit();


?>
