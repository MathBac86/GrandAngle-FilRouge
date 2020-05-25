<?php
  $urlActuelle = $_SERVER['PHP_SELF'];
  // ----Admin Générale----
  if (stristr($urlActuelle,"accueil.php")){
    $nav_active = "Administration Générale";

  // ---Exposition----
  }elseif (stristr($urlActuelle,"GestionExpo.php")){
    $nav_active = "Administration des Expositions";
  }elseif (stristr($urlActuelle,"CreationExpo.php")){
    $nav_active = "Création d'une Expo";
  }elseif (stristr($urlActuelle,"Modifexpo.php")){
    $nav_active = "Modification d'une Exposition";
  }elseif (stristr($urlActuelle,"Printexpofr.php")){
    $nav_active = "Exposition en Français";
  }elseif (stristr($urlActuelle,"Printexpoen.php")){
    $nav_active = "Exposition en Anglais";
  }elseif (stristr($urlActuelle,"Printexpoall.php")){
    $nav_active = "Exposition en Allemand";
  }elseif (stristr($urlActuelle,"Vueexp.php")){
    $nav_active = "Détail d'une Exposition";

  // ---Plan----
  }elseif (stristr($urlActuelle,"PlanExpo.php")){
    $nav_active = "Administration des Plans";
  }elseif (stristr($urlActuelle,"CreationPlan.php")){
    $nav_active = "Attribution Plan";
  }elseif (stristr($urlActuelle,"Modifplan.php")){
    $nav_active = "Modification d'un Plan";

  // ---Espace----
  }elseif (stristr($urlActuelle,"GestionSpace.php")){
  $nav_active = "Gestion d'un Espace";
  }elseif (stristr($urlActuelle,"CreationEsp.php")){
    $nav_active = "Création d'un Espace";
  }elseif (stristr($urlActuelle,"Modifesp.php")){
    $nav_active = "Modification d'un Espace";
  }elseif (stristr($urlActuelle,"Suppesp.php")){
    $nav_active = "Suppression d'un Espace";

  // ----Oeuvres----
  }elseif (stristr($urlActuelle,"oeuvres.php")){
    $nav_active = "Administration des Oeuvres";
  }elseif (stristr($urlActuelle,"CreationOeuv.php")){
    $nav_active = "Création d'une Oeuvre";
  }elseif (stristr($urlActuelle,"Modifoeuvre.php")){
    $nav_active = "Modification d'une Oeuvre";
  }elseif (stristr($urlActuelle,"Printoeuvfr.php")){
    $nav_active = "Oeuvre en Français";
  }elseif (stristr($urlActuelle,"Printoeuven.php")){
    $nav_active = "Oeuvre en Anglais";
  }elseif (stristr($urlActuelle,"Printoeuvall.php")){
    $nav_active = "Oeuvre en Allemand";
  }elseif (stristr($urlActuelle,"Flashcode.php")){
    $nav_active = "Gestion des QR Code";
  }elseif (stristr($urlActuelle,"AttFlash.php")){
    $nav_active = "Attribution d'un QR Code";

  // ----Artistes----
  }elseif (stristr($urlActuelle,"GestionArtistes.php")){
    $nav_active = "Administration des Artistes";
  }elseif (stristr($urlActuelle,"CreationArt.php")) {
    $nav_active = "Création Artiste";
  }elseif (stristr($urlActuelle,"Modifart.php")){
    $nav_active = "Modification d'un Artiste";
  }elseif (stristr($urlActuelle,"Vueart.php")){
    $nav_active = "Détail d'un Artiste";
  }elseif (stristr($urlActuelle,"CollectifArt.php")){
    $nav_active = "Création d'un Collectif";



  // ---Typo----
  }elseif (stristr($urlActuelle,"GestionType.php")){
    $nav_active = "Administration des Typologies";
  }elseif (stristr($urlActuelle,"CreatTypo.php")){
    $nav_active = "Création d'une Typologie";
  }elseif (stristr($urlActuelle,"suppvaltypo.php")){
    $nav_active = "Suppression d'une Typo";

  // ---Matière----
  }elseif (stristr($urlActuelle,"GestionMat.php")){
    $nav_active = "Administration des Matières";
  }elseif (stristr($urlActuelle,"CreationMat.php")){
    $nav_active = "Création d'une Matière";
  }elseif (stristr($urlActuelle,"suppvalmat.php")){
    $nav_active = "Suppression d'une Matière";

  // ---Media----
  }elseif (stristr($urlActuelle,"GestionMedias.php")){
    $nav_active = "Administration des Médias";
  }elseif (stristr($urlActuelle,"CreationMed.php")){
    $nav_active = "Attribution Média";

  // ---Type Media----
}elseif (stristr($urlActuelle,"TypeMed.php")){
    $nav_active = "Administration des Types de Médias";
  }elseif (stristr($urlActuelle,"CreationTypM.php")){
    $nav_active = "Création Type Média";

  // ----Stat----
  }elseif (stristr($urlActuelle,"GestionStat.php")){
    $nav_active = "Administration des Statistiques";
  }elseif (stristr($urlActuelle,"statoeuvres.php")){
    $nav_active = "Statistiques des oeuvres";

  // ----Login----
  }elseif (stristr($urlActuelle,"GestionLogin.php")){
    $nav_active = "Administration des Logins";
  }elseif (stristr($urlActuelle,"CreationLog.php")){
    $nav_active = "Création d'un Login";
  }elseif (stristr($urlActuelle,"Modiflogin.php")){
    $nav_active = "Modification d'un Login";

  // ----Page Accueil----
  }else{
    $nav_active="Grand Angle";
  }
?>
