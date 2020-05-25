<?php
  $idtm=$_GET['idtm'];
  require_once '../connectbdd.php';

  $reqtmoeuv = "DELETE From type_media WHERE IdTypeMedia = ".$idtm."";
  $reptmoeuv = $bdd->query($reqtmoeuv);

  header('location: ../TypeMed.php');
  exit();


?>
