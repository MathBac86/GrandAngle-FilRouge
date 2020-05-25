<?php
  $ido=$_GET['ido'];
  require_once '../connectbdd.php';

  $reqioeuv = "DELETE From inscrire WHERE IdOeuvre = ".$ido."";
  $repioeuv = $bdd->query($reqioeuv);

  $reqmeoeuv = "DELETE From media WHERE IdOeuvre = ".$ido."";
  $repmeoeuv = $bdd->query($reqmeoeuv);

  $reqsoeuv = "DELETE FROM oeuvre WHERE IdOeuvre = ".$ido."";
  $repsoeuv = $bdd->query($reqsoeuv);



  header('location: ../Oeuvres.php');
  exit();


?>
