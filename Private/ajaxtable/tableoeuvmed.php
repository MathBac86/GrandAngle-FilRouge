<?php
require_once "../connectbdd.php";

$expo = $_GET['expo'];
$reqO = "SELECT DISTINCT oeuvre.IdOeuvre, NomOeuvreFr, NomExpositionFr, Media
         FROM oeuvre
            INNER JOIN inscrire ON inscrire.IdOeuvre=oeuvre.IdOeuvre
            INNER JOIN exposition ON inscrire.IdExposition=exposition.IdExposition
            INNER JOIN media ON media.IdOeuvre=oeuvre.IdOeuvre
            INNER JOIN type_media ON type_media.IdTypeMedia=media.IdTypeMedia
         WHERE exposition.IdExposition = $expo
         And TypeMedia = 'image'
         group by oeuvre.IdOeuvre
         ORDER BY oeuvre.IdOeuvre";
$repO = $bdd->query($reqO);
// var_dump($repO);

while ($donnees=$repO->fetch()) {
  $tableau[]=["id"=>$donnees['IdOeuvre'], "Oeuvre"=>htmlentities($donnees['NomOeuvreFr'], ENT_QUOTES)];
}

echo json_encode($tableau);

?>
