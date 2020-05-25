<?php
require_once '../connectbdd.php';

if (empty($_FILES['userfile']['name']) || $_POST['expo']==0) {
  header("location: ../CreationPlan.php");
} else {
$img=$_FILES['userfile']['name'];
$exp=$_POST['expo'];


$reqpexp = "UPDATE exposition SET PlanExposition='".$img."' WHERE IdExposition=$exp";
// echo $reqpexp;
$reppexp=$bdd->query($reqpexp);


header("location: ../PlanExpo.php");
exit();
}

?>
