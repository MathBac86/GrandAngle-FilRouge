<?php
require_once "../connectbdd.php";

$reqTA = "SELECT idArtiste, NomArtiste
         FROM artiste
         ORDER BY NomArtiste";
$repTA = $bdd->query($reqTA);
// var_dump($repO);

while ($donnees=$repTA->fetch()) {
  $tableauta[]=["ida"=>$donnees['idArtiste'], "Artiste"=>htmlentities($donnees['NomArtiste'], ENT_QUOTES)];
}

echo json_encode($tableauta);

?>
