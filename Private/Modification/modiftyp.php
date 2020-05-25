<?php
require_once '../connectbdd.php';
$idtyp=$_GET['idtyp'];

if (($_GET['typefr'])=="" || ($_GET['typeen'])=="" || ($_GET['typeall'])=="" ){
  header("location: ../Modiftypo.php?idt=$idtyp");
} else {
  $TFr=$_GET['typefr'];
  $TEn=$_GET['typeen'];
  $TAll=$_GET['typeall'];

  $reqme="UPDATE typeoeuvre SET TypeFr = '".$TFr."', TypeEn = '".$TEn."', TypeAll = '".$TAll."' Where IdType=".$idtyp." ";
  $execution=$bdd->query($reqme);

  header('location: ../GestionType.php');
  exit();
}

?>
