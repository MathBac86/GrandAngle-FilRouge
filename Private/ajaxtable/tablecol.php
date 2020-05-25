<?php
require_once "../connectbdd.php";

$expo = $_GET['expo'];

$reqCol = "SELECT exposition.IdExposition, exposition.NomExpositionFr, collectif_artiste.IdCollectif, collectif_artiste.NomCollectif
              FROM Exposition
                INNER JOIN inscrire ON inscrire.IdExposition=exposition.IdExposition
                INNER JOIN oeuvre ON inscrire.IdOeuvre=oeuvre.IdOeuvre
                INNER JOIN artiste ON oeuvre.idArtiste=artiste.idArtiste
                INNER JOIN composer ON composer.idArtiste=artiste.idArtiste
                INNER JOIN collectif_artiste ON collectif_artiste.IdCollectif=composer.IdCollectif
              WHERE exposition.IdExposition = $expo
              Group By collectif_artiste.IdCollectif
              ORDER BY collectif_artiste.IdCollectif";
$repCol = $bdd->query($reqCol);
// echo var_dump($repCol);
// echo var_dump($reqCol);

while ($donnees=$repCol->fetch()) {
  $tableauc[]=["id"=>$donnees['IdCollectif'], "Collectif"=>htmlentities($donnees['NomCollectif'], ENT_QUOTES),"exp"=>$donnees['NomExpositionFr']];
}

// var_dump($tableauc);
echo json_encode($tableauc);

?>
