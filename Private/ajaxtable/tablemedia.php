<?php
require_once "../connectbdd.php";

$oeuvre = $_GET['oeuvre'];
$reqMO = "SELECT IdMedia, Media, TypeMedia, NomOeuvreFr, NomExpositionFr
         FROM media
            INNER JOIN type_media ON type_media.IdTypeMedia = media.IdTypeMedia
            INNER JOIN oeuvre ON oeuvre.IdOeuvre = media.IdOeuvre
            INNER JOIN inscrire On oeuvre.IdOeuvre = inscrire.IdOeuvre
            INNER JOIN exposition On exposition.IdExposition = inscrire.IdExposition
         WHERE media.IdOeuvre = $oeuvre
         ORDER BY IdMedia";
$repMO = $bdd->query($reqMO);
// var_dump($repO);
$tableaum=[];
while ($dono=$repMO->fetch()) {
  $tableaum[]=["idm"=>$dono['IdMedia'], "exp"=>htmlentities($dono['NomExpositionFr'], ENT_QUOTES), "oeuv"=>htmlentities($dono['NomOeuvreFr'], ENT_QUOTES), "Media"=>$dono['Media'], "TMedia"=>$dono['TypeMedia']];
}

echo json_encode($tableaum);

?>
