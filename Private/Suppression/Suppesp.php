<?php
  $idesp=$_GET['ides'];
  require_once '../connectbdd.php';

  $reqse ="DELETE FROM espace WHERE IdEspace =".$idesp."";
  $repse = $bdd->query($reqse);

  header('location: ../GestionSpace.php');
  exit();


?>
