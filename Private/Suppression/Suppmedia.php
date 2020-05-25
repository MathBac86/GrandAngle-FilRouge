<?php
  $idm=$_GET['idm'];
  require_once '../connectbdd.php';

  $reqmoeuv = "DELETE From media WHERE IdMedia = ".$idm."";
  $repmoeuv = $bdd->query($reqmoeuv);

  header('location: ../GestionMedias.php');
  exit();


?>
