<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width", initial-scale=1, shrink-to-fit="no">
    <title>%TITLE%</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  </head>
  <header>
    <div class="logo">
      <a href="index.php"><h1><img src="img/logo.png" alt="Grand Angle"></h1></a>
    </div>
    <div class="container">
      <!-- menu Bootstrap -->
      <nav class="navbar navbar-expand navbar-light bg-light" style="padding:0;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php" style="padding-left:0;">
                <?php
                if (isset($_COOKIE['langue']) && $_COOKIE['langue']== "francais" ) {
                  echo "Accueil";
                } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "english" ) {
                  echo "Home";
                } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "deutsch" ) {
                  echo "Home";
                }?></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                if (isset($_COOKIE['langue']) && $_COOKIE['langue']== "francais" ) {
                  echo "Exposition";
                } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "english" ) {
                  echo "Exposure";
                } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "deutsch" ) {
                  echo "Belichtung";
                }?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <?php
                if (isset($_COOKIE['langue']) && $_COOKIE['langue']== "francais" ) {
                $query='SELECT IdExposition, NomExpositionFr FROM exposition ORDER BY DateDebut';
                $reponse=$bdd->query($query);
                foreach ($reponse as $info) {
                ?>
                <a class="dropdown-item" href="exposition.php?idExposition=<?php echo $info['IdExposition'] ?>"><?php echo $info['NomExpositionFr'] ?></a>

                <?php ;} } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "english" ) {
                $query='SELECT IdExposition, NomExpositionEn FROM exposition ORDER BY DateDebut';
                $reponse=$bdd->query($query);
                foreach ($reponse as $info) {
                ?>
                <a class="dropdown-item" href="exposition.php?idExposition=<?php echo $info['IdExposition'] ?>"><?php echo $info['NomExpositionEn'] ?></a>

                <?php ;} } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "deutsch" ) {
                $query='SELECT IdExposition, NomExpositionAll FROM exposition ORDER BY DateDebut';
                $reponse=$bdd->query($query);
                foreach ($reponse as $info) {
                ?>
                <a class="dropdown-item" href="exposition.php?idExposition=<?php echo $info['IdExposition'] ?>"><?php echo $info['NomExpositionAll'] ?></a>
                <?php ;} } ?>

              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                if (isset($_COOKIE['langue']) && $_COOKIE['langue']== "francais" ) {
                  echo "Langue";
                } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "english" ) {
                  echo "Language";
                } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "deutsch" ) {
                  echo "Sprache";
                }?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="traitementfrancais.php">Français</a>
                <a class="dropdown-item" href="traitementenglish.php">English</a>
                <a class="dropdown-item" href="traitementdeutsch.php">Deutsch</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>

  </header>
