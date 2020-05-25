<?php
  $idt=$_GET['idt'];
  require_once '../connectbdd.php';

  $reqst ="DELETE FROM typeoeuvre WHERE IdType =".$idt."";
  $repst = $bdd->query($reqst);

  header('location: ../GestionType.php');
  exit();


?>
