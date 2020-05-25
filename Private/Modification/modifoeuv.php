<?php

require_once '../connectbdd.php';
$ido = $_GET['idmo'];
// echo $_GET['idmo'];
// echo $ido;

if (empty($_GET['NOFr']) || empty($_GET['descripOFr']) ||
    empty($_GET['NOEn']) || empty($_GET['descripOEn']) ||
    empty($_GET['NOAl']) || empty($_GET['descripOAl'])) {
  header("location: ../Modifoeuvre.php?ido=$ido");
} else {
  $NOFr = addslashes($_GET['NOFr']);
  $NOEn = $_GET['NOEn'];
  $NOAl = $_GET['NOAl'];
  $DesOFr = addslashes($_GET['descripOFr']);
  $DesOEn = $_GET['descripOEn'];
  $DesOAl = $_GET['descripOAl'];
  $Long = $_GET['long'];
  $Larg = $_GET['larg'];
  $Prof = $_GET['prof'];
  $AnnCreat = $_GET['date'];
  $type = $_GET['type'];
  $mat = $_GET['mat'];
  $expo = $_GET['expo'];
  $art = $_GET['art'];
  $esp = $_GET['esp'];

  $reqMo="UPDATE oeuvre
          SET NomOeuvreFr = '".$NOFr."',
              NomOeuvreEn = '".$NOEn."',
              NomOeuvreAll = '".$NOAl."',
              DescOeuvreFr = '".$DesOFr."',
              DescOeuvreEn = '".$DesOEn."',
              DescOeuvreDe = '".$DesOAl."',
              Longueur = '".$Long."',
              Largeur = '".$Larg."',
              Profondeur = '".$Prof."',
              AnneeCreation = '".$AnnCreat."',
              IdType = '".$type."',
              IdMatiereOeuvre = '".$mat."',
              idArtiste = '".$art."'
          WHERE IdOeuvre = ".$ido." ";
          // echo $reqme;
  $exemo=$bdd->query($reqMo);

  $reqMi="UPDATE inscrire
          SET IdExposition = '".$expo."',
              IdEspace = '".$esp."'
          WHERE IdOeuvre = ".$ido." ";
  $exemi=$bdd->query($reqMi);



  header('location: ../Oeuvres.php');
  exit();
}

?>
