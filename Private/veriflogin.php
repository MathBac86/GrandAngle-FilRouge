<?php
require_once 'connectbdd.php';

$login=$_GET['Log'];
$password =$_GET['pswd'];


$requete="SELECT ID, Login, MotDePasse, Role From users WHERE Login ='".$login."' AND MotDePasse = '".$password."'";
$reponse=$bdd->query($requete);
$donnees=$reponse->fetch();

if (isset($donnees['ID'])) {
  setcookie("User", $donnees['ID'], time()+4000 );
  header("Location: accueil.php");
  exit();

} else {
  header("Location: index.php");
  exit();

}

?>
