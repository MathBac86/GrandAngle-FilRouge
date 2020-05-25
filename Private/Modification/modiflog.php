<?php
require_once '../connectbdd.php';
$id=$_GET['idlog'];

if (($_GET['nomlog'])=="" || ($_GET['mdp'])=="" || ($_GET['rolelog'])=="" ){
  header("location: ../Modiflogin.php?idl=$id");
} else {
  $Nom=$_GET['nomlog'];
  $mdp=$_GET['mdp'];
  $irole=$_GET['rolelog'];

  $reqmu="UPDATE users SET Login='".$Nom."', MotDePasse='".$mdp."', Role='".$irole."' Where ID=".$id." ";
  $execution=$bdd->query($reqmu);

  header('location: ../GestionLogin.php');
  exit();
}

?>
