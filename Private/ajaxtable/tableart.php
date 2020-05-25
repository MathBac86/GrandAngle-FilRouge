<?php
require_once "../connectbdd.php";

$expo = $_GET['expo'];
$reqA = "SELECT DISTINCT oeuvre.IdOeuvre, NomOeuvreFr, NomExpositionFr, Media, artiste.idArtiste, NomArtiste
         FROM oeuvre
            INNER JOIN inscrire ON inscrire.IdOeuvre=oeuvre.IdOeuvre
            INNER JOIN exposition ON inscrire.IdExposition=exposition.IdExposition
            INNER JOIN media ON media.IdOeuvre=oeuvre.IdOeuvre
            INNER JOIN type_media ON type_media.IdTypeMedia=media.IdTypeMedia
            INNER JOIN artiste ON artiste.idArtiste = oeuvre.idArtiste
         WHERE exposition.IdExposition = $expo
         And TypeMedia = 'image'
         group by oeuvre.IdOeuvre
         ORDER BY oeuvre.IdOeuvre";
$repA = $bdd->query($reqA);
// var_dump($repO);

while ($donnees=$repA->fetch()) {
  $tableaua[]=["id"=>$donnees['IdOeuvre'], "Oeuvre"=>htmlentities($donnees['NomOeuvreFr'], ENT_QUOTES),"exp"=>$donnees['NomExpositionFr'],"img"=>$donnees['Media'], "ida"=>$donnees['idArtiste'], "art"=>$donnees['NomArtiste']];
}

echo json_encode($tableaua);

?>
