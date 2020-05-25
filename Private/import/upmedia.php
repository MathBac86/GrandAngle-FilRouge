<?php
require_once '../connectbdd.php';

if (empty($_FILES['userfile']['name']) || $_POST['oeuvre']==0 || $_POST['media']==0) {
  header("Location: ../CreationMed.php");
} else {
$img = $_FILES['userfile']['name'];
// $exp = $_POST['expo'];
$med = $_POST['media'];
$oeuv = $_POST['oeuvre'];


$reqattmed = "INSERT INTO media(Media, IdOeuvre, IdTypeMedia) Value('".$img."', '".$oeuv."', '".$med."')";
// echo $reqattmed;
$repattmed=$bdd->query($reqattmed);


header("Location: ../GestionMedias.php");
exit();
}

?>
