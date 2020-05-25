<?php
require_once "../connectbdd.php";

$Art = $_GET['Art'];
$reqAO = "SELECT DISTINCT oeuvre.IdOeuvre, NomOeuvreFr, NomExpositionFr, Media
         FROM oeuvre
            INNER JOIN inscrire ON inscrire.IdOeuvre=oeuvre.IdOeuvre
            INNER JOIN exposition ON inscrire.IdExposition=exposition.IdExposition
            INNER JOIN media ON media.IdOeuvre=oeuvre.IdOeuvre
            INNER JOIN type_media ON type_media.IdTypeMedia=media.IdTypeMedia
         WHERE idArtiste = $Art
         And TypeMedia = 'image'
         group by oeuvre.IdOeuvre
         ORDER BY oeuvre.IdOeuvre";
$repAO = $bdd->query($reqAO);
// var_dump($repO);

while ($donnees=$repAO->fetch()) {
  $tableauao[]=["id"=>$donnees['IdOeuvre'], "Oeuvre"=>htmlentities($donnees['NomOeuvreFr'], ENT_QUOTES),"exp"=>$donnees['NomExpositionFr'],"img"=>$donnees['Media']];
}

echo json_encode($tableauao);

?>
