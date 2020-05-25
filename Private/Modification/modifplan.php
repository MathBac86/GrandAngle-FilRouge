<?php
require_once '../connectbdd.php';

if (empty($_FILES['userfile']['name'])) {
  header("location: ../Modifplan.php");
} else {
$img=$_FILES['userfile']['name'];
$exp=$_POST['idexp'];


$reqpexp = "UPDATE exposition SET PlanExposition='".$img."' WHERE IdExposition=$exp";
// echo $reqpexp;
$reppexp=$bdd->query($reqpexp);


header("location: ../PlanExpo.php");
exit();
}

?>
