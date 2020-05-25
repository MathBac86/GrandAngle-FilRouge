<?php require_once 'pageact.php'; ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title><?php if ($nav_active=="Grand Angle") { echo "Grand Angle"; }else{ echo $nav_active;} ?></title>

    <link rel="shortcut icon" href="favicon.ico"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.12.1/TweenMax.min.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style2.css">

    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> -->
  </head>
  <body>
    <?php require_once 'connectbdd.php'; ?>
    <header>
      <div class="header_date">
        <?php
          setlocale(LC_ALL, 'fr_FR.UTF8');
          $date=strftime("%A %e %B %Y");
          // $heure= date("G : i");
          echo "<span>Le $date, il est <span id='heure'></span>.</span>";
        ?>
      </div>
      <div class="profil">
        <?php
          if ($nav_active == "Grand Angle") {

          } else {
            if (isset($_COOKIE['User'])){
              $log=$_COOKIE["User"];
              $requete = "SELECT * From users WHERE ID ='".$log."'";
              $reponse = $bdd -> query($requete);
              $donnee = $reponse -> fetch();
              echo "<p><i class='fas fa-user-circle'></i> - Bonjour, ".$donnee['Login']." -> ";

            } else {
              header("location: index.php");
              exit();
            }

            if ($nav_active !== "Administration Générale") {
              echo "<a class='BOff' href='accueil.php'>Back-Office</a> | ";
            } else {
              echo " ";
            }

            echo "<a class='deconnec' href='deconnexion.php'>Se Déconnecter</a></p>";
          }
        ?>
      </div>
      <script type="text/javascript">

        //----DAte heure footer----
        function addZero(i) {
          if (i < 10) {
            i = "0" + i;
          }
          return i;
        }

        setInterval(function(){
        var heure    = new Date();
        var uminute = addZero(heure.getMinutes());
        var useconde = addZero(heure.getSeconds());
        var uheure = addZero(heure.getHours());
        document.getElementById('heure').innerHTML=uheure + ":" + uminute + ":" + useconde;}, 1);

      </script>
    </header>
    <main>
      <div class="Logo Logimg">
        <a href="accueil.php" ><img src="img/logo.png" title="Accueil"></img></a>
      </div>
