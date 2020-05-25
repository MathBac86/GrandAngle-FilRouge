<?php

if(!isset($_COOKIE['langue'])) {
  require_once "choixLangue.php";
} else {
require_once "bdd.php";

ob_start();
require_once "head.php";
$buffer=ob_get_contents();
ob_end_clean();

$idExposition=$_GET['idExposition'];


$st=$bdd->query("SELECT IdExposition
FROM exposition
WHERE IdExposition=$idExposition");
$informationID=$st->fetch();

// verification que l'ID de l'URL soit dans la BDD
if ($informationID['IdExposition']){
// affichage du nom et de la description de l'expo

  if (isset($_COOKIE['langue']) && $_COOKIE['langue']== "francais" ) {
    $st=$bdd->query("SELECT NomExpositionFr, DescriptionExpositionFr, PlanExposition, exposition.IdExposition
    FROM oeuvre
    INNER JOIN inscrire ON oeuvre.IdOeuvre = inscrire.IdOeuvre
    INNER JOIN exposition ON inscrire.IdExposition = exposition.IdExposition
    WHERE exposition.IdExposition=$idExposition");
    $information=$st->fetch();


    $buffer=str_replace("%TITLE%",$information['NomExpositionFr'],$buffer);
    echo $buffer;
    ?>
    <section>
      <div class="container">
        <!-- affichage fil d'ariane français + titre expo + description expo-->
        <p class="breadcrumbs"><a href="index.php">Accueil</a> / Exposition</p>
        <!-- affichage nom expo -->
        <?php echo "<h4 class='textOnMiddle'>".$information['NomExpositionFr']."</h4>"; ?>
        <div class="descriptionExposition">
          <?php echo $information['DescriptionExpositionFr']; ?>
        </div>

  <?php
  } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "english" ) {
    $st=$bdd->query("SELECT NomExpositionEn, DescriptionExpositionEn, PlanExposition
    FROM oeuvre
    INNER JOIN inscrire ON oeuvre.IdOeuvre = inscrire.IdOeuvre
    INNER JOIN exposition ON inscrire.IdExposition = exposition.IdExposition
    WHERE exposition.idExposition=$idExposition");
    $information=$st->fetch();
    $buffer=str_replace("%TITLE%",$information['NomExpositionEn'],$buffer);
    echo $buffer;
    ?>

    <section>
      <div class="container">
        <!-- affichage fil d'ariane anglais + titre expo + description expo -->
        <p class="breadcrumbs"><a href="index.php">Home</a> / Exposure</p>
        <?php echo "<h4 class='textOnMiddle'>".$information['NomExpositionEn']."</h4>"; ?>
        <div class="descriptionExposition">
          <?php echo $information['DescriptionExpositionEn']; ?>
        </div>

  <?php
  } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "deutsch" ) {
    $st=$bdd->query("SELECT NomExpositionAll, DescriptionExpositionAll, PlanExposition
    FROM oeuvre
    INNER JOIN inscrire ON oeuvre.IdOeuvre = inscrire.IdOeuvre
    INNER JOIN exposition ON inscrire.IdExposition = exposition.IdExposition
    WHERE exposition.idExposition=$idExposition");
    $information=$st->fetch();
    $buffer=str_replace("%TITLE%",$information['NomExpositionAll'],$buffer);
    echo $buffer;
    ?>

    <section>
      <div class="container">
        <!-- affichage fil d'ariane allemand + titre expo + description expo -->
        <p class="breadcrumbs"><a href="index.php">Home</a> / Belichtung</p>
        <?php echo "<h4 class='textOnMiddle'>".$information['NomExpositionAll']."</h4>"; ?>
        <div class="descriptionExposition">
          <?php echo $information['DescriptionExpositionAll']; } ?>
        </div>
      </div>



      <!-- affichage du plan de l'exposition -->

      <div class="container">
        <img src="img/<?php echo $information['PlanExposition']?>" alt="Plan" class="width100">
      </div>

      <!-- affichage de toutes les oeuvres par espace dans l'expo -->

      <div class="container">
        <?php
        if (isset($_COOKIE['langue']) && $_COOKIE['langue']== "francais" ) {
          echo "<p class='fontSize20Bold'> Voici les oeuvres de l'exposition réparties dans leurs espaces respectifs :</br></p>";
        } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "english" ) {
          echo "<p class='fontSize20Bold'> Here are the artworks of the exposition distributed in their respective spaces :</br></p>";
        } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "deutsch" ) {
          echo "<p class='fontSize20Bold'> Hier sind die Werke der Ausstellung in ihren jeweiligen Räumen verteilt :</br></p>";
        }
          $query="SELECT DISTINCT NomEspace
          FROM espace
          INNER JOIN inscrire ON espace.IdEspace = inscrire.IdEspace
          INNER JOIN oeuvre ON inscrire.IdOeuvre = oeuvre.IdOeuvre
          WHERE inscrire.IdExposition=$idExposition";
          $reponse=$bdd->query($query);
          $i=0;

            foreach ($reponse as $info) {
              ?><div class="espace"><?php

              echo "<p class='fontSize20Bold'>".$info['NomEspace']." :</p>";
              $i++;

              if (isset($_COOKIE['langue']) && $_COOKIE['langue']== "francais" ) {
                $query2="SELECT DISTINCT NomEspace, oeuvre.IdOeuvre, oeuvre.NomOeuvreFr
                FROM espace
                INNER JOIN inscrire ON espace.IdEspace = inscrire.IdEspace
                INNER JOIN oeuvre ON inscrire.IdOeuvre = oeuvre.IdOeuvre
                WHERE inscrire.IdExposition=$idExposition
                AND espace.IdEspace=$i";
                $reponse2=$bdd->query($query2);

                  foreach ($reponse2 as $info) {
                    ?><a href="oeuvre.php?idOeuvre=<?php echo $info['IdOeuvre'] ?>"><?php echo $info['NomOeuvreFr'] ?></a></br><?php
                  }
                ?></div><?php
              } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "english" ) {
                $query2="SELECT DISTINCT NomEspace, oeuvre.IdOeuvre, oeuvre.NomOeuvreFr
                FROM espace
                INNER JOIN inscrire ON espace.IdEspace = inscrire.IdEspace
                INNER JOIN oeuvre ON inscrire.IdOeuvre = oeuvre.IdOeuvre
                WHERE inscrire.IdExposition=$idExposition
                AND espace.IdEspace=$i";
                $reponse2=$bdd->query($query2);

                  foreach ($reponse2 as $info) {
                    ?><a href="oeuvre.php?idOeuvre=<?php echo $info['IdOeuvre'] ?>"><?php echo $info['NomOeuvreEn'] ?></a></br><?php
                  }
                ?></div><?php
              } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "deutsch" ) {
                $query2="SELECT DISTINCT NomEspace, oeuvre.IdOeuvre, oeuvre.NomOeuvreFr
                FROM espace
                INNER JOIN inscrire ON espace.IdEspace = inscrire.IdEspace
                INNER JOIN oeuvre ON inscrire.IdOeuvre = oeuvre.IdOeuvre
                WHERE inscrire.IdExposition=$idExposition
                AND espace.IdEspace=$i";
                $reponse2=$bdd->query($query2);

                  foreach ($reponse2 as $info) {
                    ?><a href="oeuvre.php?idOeuvre=<?php echo $info['IdOeuvre'] ?>"><?php echo $info['NomOeuvreAll'] ?></a></br><?php
                  }
                ?></div><?php
              }
            }
            $st=$bdd->query("SELECT Tarif, DateDebut, DateFin FROM exposition WHERE IdExposition=$idExposition");
            $information=$st->fetch();
            ?> <div class="espace"> <?php
            if (isset($_COOKIE['langue']) && $_COOKIE['langue']== "francais" ) {
              $datedeb = strftime( "%d/%m/%Y", strtotime($information['DateDebut']));
              $datefin = strftime( "%d/%m/%Y", strtotime($information['DateFin']));
              echo "L'exposition démarre le : ".$datedeb." et se termine le : ".$datefin."</br>";
              echo "Prix d'entrée : ".$information['Tarif']."€";
            } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "english" ) {
              $datedeb = strftime( "%d/%m/%Y", strtotime($information['DateDebut']));
              $datefin = strftime( "%d/%m/%Y", strtotime($information['DateFin']));
              echo "The exhibition starts on : ".$datedeb." and ends on : ".$datefin."</br>";
              echo "Admission price : ".$information['Tarif']."€";
            } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "deutsch" ) {
              $datedeb = strftime( "%d/%m/%Y", strtotime($information['DateDebut']));
              $datefin = strftime( "%d/%m/%Y", strtotime($information['DateFin']));
              echo "Die Ausstellung beginnt am : ".$datedeb." und endet am : ".$datefin."</br>";
              echo "Eintrittspreis : ".$information['Tarif']."€";
            }
            ?> </div> <?php
  } else {
    header('location: 404.php');
  }
}
        ?>
    </div>
</section>

<?php
require_once "footer.php";
?>
