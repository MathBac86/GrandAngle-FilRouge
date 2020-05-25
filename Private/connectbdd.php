<?php
try {
  $bdd = new PDO('mysql:host=mysql-matbac.alwaysdata.net;dbname=matbac_filrouge;charset=utf8', 'matbac', '125titan86');
 //  $bdd = new PDO('mysql:host=localhost;dbname=grand angle;charset=utf8', 'root', '');
}
catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

?>
