<?php

if(!isset($_COOKIE['langue'])) {
  require_once "choixLangue.php";
} else {
  require_once "bdd.php";

  ob_start();
  require_once "head.php";
  $buffer=ob_get_contents();
  ob_end_clean();

  $IdOeuvre=$_GET['idOeuvre'];

  $st=$bdd->query("SELECT IdOeuvre
  FROM oeuvre
  WHERE IdOeuvre=$IdOeuvre");
  $informationID=$st->fetch();
  // verification que l'ID de l'URL soit dans la BDD
  if ($informationID['IdOeuvre']){


  // incrément de la bdd pour les stats des oeuvres les plus vues
  // if (!isset($_COOKIE['oeuvre'])) {
  $bdd->query("UPDATE oeuvre SET FreqOeuvre = FreqOeuvre+1 WHERE oeuvre.IdOeuvre=$IdOeuvre");
  // }
  setcookie('oeuvre', $IdOeuvre,time()+36000);

  ?>



  <?php
  // affichage du nom de l'oeuvre + affichage dans l'onglet (title)
  if (isset($_COOKIE['langue']) && $_COOKIE['langue']== "francais" ) {
  $st=$bdd->query("SELECT NomOeuvreFr, exposition.IdExposition AS IdExposition
  FROM oeuvre
  INNER JOIN inscrire ON oeuvre.IdOeuvre = inscrire.IdOeuvre
  INNER JOIN exposition ON inscrire.IdExposition = exposition.IdExposition
  WHERE oeuvre.IdOeuvre=$IdOeuvre");
  $information=$st->fetch();
  $buffer=str_replace("%TITLE%",$information['NomOeuvreFr'],$buffer);
  echo $buffer;
  ?>

  <section>
      <!-- affichage fil d'ariane -->
      <div class="container">
        <p class="breadcrumbs"><a href="index.php">Home</a>  /  <a href="exposition.php?idExposition=<?php echo $information['IdExposition'] ?>">Exposition</a>  /  <?php echo $information['NomOeuvreFr'] ?></p>
      </div>

      <?php
      echo "<p class='textOnMiddle'>".$information['NomOeuvreFr']."</p>";

      // affichage du nom de l'oeuvre + affichage dans l'onglet (title)
      } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "english" ) {
      $st=$bdd->query("SELECT NomOeuvreEn, exposition.IdExposition AS IdExposition
      FROM oeuvre
      INNER JOIN inscrire ON oeuvre.IdOeuvre = inscrire.IdOeuvre
      INNER JOIN exposition ON inscrire.IdExposition = exposition.IdExposition
      WHERE oeuvre.IdOeuvre=$IdOeuvre");
      $information=$st->fetch();
      $buffer=str_replace("%TITLE%",$information['NomOeuvreEn'],$buffer);
      echo $buffer;
      ?>
      <!-- affichage fil d'ariane -->
      <div class="container">
        <p class="breadcrumbs"><a href="index.php">Home</a> / <a href="exposition.php?idExposition=<?php echo $information['IdExposition'] ?>">Exposition</a> / <?php echo $information['NomOeuvreEn'] ?></p>
      </div>
      <?php
      echo "<p class='textOnMiddle'>".$information['NomOeuvreEn']."</p>";

      // affichage du nom de l'oeuvre + affichage dans l'onglet (title)
      } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "deutsch" ) {
      $st=$bdd->query("SELECT NomOeuvreAll, exposition.IdExposition AS IdExposition
      FROM oeuvre
      INNER JOIN inscrire ON oeuvre.IdOeuvre = inscrire.IdOeuvre
      INNER JOIN exposition ON inscrire.IdExposition = exposition.IdExposition
      WHERE oeuvre.IdOeuvre=$IdOeuvre");
      $information=$st->fetch();
      $buffer=str_replace("%TITLE%",$information['NomOeuvreAll'],$buffer);
      echo $buffer;
      ?>
      <!-- affichage fil d'ariane -->
      <div class="container">
        <p class="breadcrumbs"><a href="index.php">Home</a> / <a href="exposition.php?idExposition=<?php echo $information['IdExposition'] ?>">Exposition</a> / <?php echo $information['NomOeuvreAll'] ?></p>
      </div>
      <?php
      echo "<p class='textOnMiddle'>".$information['NomOeuvreAll']."</p>";

      }
      ?>
    <div class="container">
      <!-- carousel dynamique -->
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">

            <!-- requete pour recuperer la premiere image -->
            <?php
            $st=$bdd->query("SELECT Media, exposition.NomExpositionFr AS NomExpositionFr
            FROM media
            INNER JOIN oeuvre ON media.IdOeuvre = oeuvre.IdOeuvre
            INNER JOIN type_media ON type_media.IdTypeMedia = media.IdTypeMedia
            INNER JOIN inscrire ON oeuvre.IdOeuvre = inscrire.IdOeuvre
            INNER JOIN exposition ON inscrire.IdExposition = exposition.IdExposition
            WHERE oeuvre.IdOeuvre=$IdOeuvre
            AND type_media.TypeMedia = 'image'
            LIMIT 1");
            $information=$st->fetch();
            ?>
            <img src="Private/img/<?php echo $information['NomExpositionFr'] ?>/<?php echo $information['Media'] ?>" class="d-block w-100" alt="<?php echo $information['Media'] ?>">
          </div>

            <!-- requete pour recuperer le reste des images -->
            <?php
            $query="SELECT Media, type_media.TypeMedia, exposition.NomExpositionFr AS NomExpositionFr
            FROM media
            INNER JOIN oeuvre ON media.IdOeuvre = oeuvre.IdOeuvre
            INNER JOIN type_media ON type_media.IdTypeMedia = media.IdTypeMedia
            INNER JOIN inscrire ON oeuvre.IdOeuvre = inscrire.IdOeuvre
            INNER JOIN exposition ON inscrire.IdExposition = exposition.IdExposition
            WHERE oeuvre.IdOeuvre=$IdOeuvre
            AND type_media.TypeMedia = 'image'
            LIMIT 100 OFFSET 1";
            $reponse=$bdd->query($query);
            foreach ($reponse as $info) {
            ?>
          <div class="carousel-item">
            <img src="Private/img/<?php echo $info['NomExpositionFr'] ?>/<?php echo $info['Media'] ?>" class="d-block w-100" alt="<?php echo $info['Media'] ?>">
          </div>
            <?php
            ;}
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <!-- affichage des possibles videos MP4 uniquement -->
      <?php
      $query="SELECT Media, type_media.TypeMedia, exposition.NomExpositionFr AS NomExpositionFr
      FROM media
      INNER JOIN oeuvre ON media.IdOeuvre = oeuvre.IdOeuvre
      INNER JOIN type_media ON type_media.IdTypeMedia = media.IdTypeMedia
      INNER JOIN inscrire ON oeuvre.IdOeuvre = inscrire.IdOeuvre
      INNER JOIN exposition ON inscrire.IdExposition = exposition.IdExposition
      WHERE oeuvre.IdOeuvre=$IdOeuvre
      AND type_media.TypeMedia = 'video'";
      $reponse=$bdd->query($query);
      foreach ($reponse as $info) {
      ?>
      <video src="Private/img/<?php echo $information['NomExpositionFr'] ?>/<?php echo $info['Media'] ?>" class="width100" controls></video>
      <?php
      ;}

      // affichage des possibles audios
      $query="SELECT Media, type_media.TypeMedia, exposition.NomExpositionFr AS NomExpositionFr
      FROM media
      INNER JOIN oeuvre ON media.IdOeuvre = oeuvre.IdOeuvre
      INNER JOIN type_media ON type_media.IdTypeMedia = media.IdTypeMedia
      INNER JOIN inscrire ON oeuvre.IdOeuvre = inscrire.IdOeuvre
      INNER JOIN exposition ON inscrire.IdExposition = exposition.IdExposition
      WHERE oeuvre.IdOeuvre=$IdOeuvre
      AND type_media.TypeMedia = 'audio'";
      $reponse=$bdd->query($query);
      foreach ($reponse as $info) {
      ?>
      <audio class="width100 paddingBotTop" controls src="Private/img/<?php echo $information['NomExpositionFr'] ?>/<?php echo $info['Media'] ?>"></audio>
      <?php
      ;}

      // affichage du photographe ou artiste

      $st=$bdd->query("SELECT NomArtiste, BioArtisteFr, BioArtisteEn, BioArtisteAll
      FROM oeuvre
      INNER JOIN artiste ON oeuvre.idArtiste = artiste.idArtiste
      WHERE oeuvre.IdOeuvre=$IdOeuvre");
      $information=$st->fetch();
      ?>
      <?php
      if (isset($_COOKIE['langue']) && $_COOKIE['langue']== "francais" ) {
        echo "<p class='fontSize20Bold'>Artiste ou photographe :</p>".$information['NomArtiste'];
        echo "<p>".$information['BioArtisteFr']."</p>";
        $st=$bdd->query("SELECT NomCollectif
        FROM oeuvre
        INNER JOIN artiste ON oeuvre.idArtiste = artiste.idArtiste
        INNER JOIN composer ON artiste.idArtiste = composer.idArtiste
        INNER JOIN collectif_artiste ON composer.IdCollectif = collectif_artiste.IdCollectif
        WHERE oeuvre.IdOeuvre=$IdOeuvre");
        $information2=$st->fetch();
        if ($information2) {
        echo " du collectif : ".$information2['NomCollectif']; }
      } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "english" ) {
        echo "<p class='fontSize20Bold'>Artist or photographer :</p>".$information['NomArtiste'];
        echo "<p>".$information['BioArtisteEn']."</p>";
        $st=$bdd->query("SELECT NomCollectif
        FROM oeuvre
        INNER JOIN artiste ON oeuvre.idArtiste = artiste.idArtiste
        INNER JOIN composer ON artiste.idArtiste = composer.idArtiste
        INNER JOIN collectif_artiste ON composer.IdCollectif = collectif_artiste.IdCollectif
        WHERE oeuvre.IdOeuvre=$IdOeuvre");
        $information2=$st->fetch();
        if ($information2) {
        echo " of the collective : ".$information2['NomCollectif']; }
      } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "deutsch" ) {
        echo "<p class='fontSize20Bold'>Künstler oder Fotograf :</p>".$information['NomArtiste'];
        echo "<p>".$information['BioArtisteAll']."</p>";
        $st=$bdd->query("SELECT NomCollectif
        FROM oeuvre
        INNER JOIN artiste ON oeuvre.idArtiste = artiste.idArtiste
        INNER JOIN composer ON artiste.idArtiste = composer.idArtiste
        INNER JOIN collectif_artiste ON composer.IdCollectif = collectif_artiste.IdCollectif
        WHERE oeuvre.IdOeuvre=$IdOeuvre");
        $information2=$st->fetch();
        if ($information2) {
        echo " des Kollektivs : ".$information2['NomCollectif']; }
      }

      // affichage de la description de l'oeuvre
      if (isset($_COOKIE['langue']) && $_COOKIE['langue']== "francais" ) {
      $st=$bdd->query("SELECT DescOeuvreFr
      FROM oeuvre
      WHERE oeuvre.IdOeuvre=$IdOeuvre");
      $information=$st->fetch();?>
      <div class="descriptionOeuvre">
        <?php
        echo "<p class='fontSize20Bold'>Description de l'oeuvre :</p>";
        echo nl2br($information['DescOeuvreFr']);
        ?>
      </div>

      <?php
      } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "english" ) {
      $st=$bdd->query("SELECT DescOeuvreEn
      FROM oeuvre
      WHERE oeuvre.IdOeuvre=$IdOeuvre");
      $information=$st->fetch();?>
      <div class="descriptionOeuvre">
        <?php
        echo "<p class='fontSize20Bold'>Description of the work :</p>";
        echo nl2br($information['DescOeuvreEn']);
        ?>
      </div>

      <?php
      } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "deutsch" ) {
      $st=$bdd->query("SELECT DescOeuvreDe
      FROM oeuvre
      WHERE oeuvre.IdOeuvre=$IdOeuvre");
      $information=$st->fetch();?>
      <div class="descriptionOeuvre">
        <?php
        echo "<p class='fontSize20Bold'>Beschreibung der Arbeit :</p>";
        echo nl2br($information['DescOeuvreDe']);?>
      </div>
      <?php }
        ?>





      <?php
      $st=$bdd->query("SELECT AnneeCreation, Longueur, Largeur, Profondeur
      FROM oeuvre
      WHERE oeuvre.IdOeuvre=$IdOeuvre");
      $information=$st->fetch();
      if ($information['AnneeCreation']){
        if (isset($_COOKIE['langue']) && $_COOKIE['langue']== "francais" ) {
          echo "Année de création : ".$information['AnneeCreation']."</br>";
        } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "english" ) {
          echo "Year of creation : ".$information['AnneeCreation']."</br>";
        } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "deutsch" ) {
          echo "Jahr der Schöpfung : ".$information['AnneeCreation']."</br>";
        }
      }
      if ($information['Longueur']){
        if (isset($_COOKIE['langue']) && $_COOKIE['langue']== "francais" ) {
          echo "Longueur de l'oeuvre : ".$information['Longueur']."</br>";
        } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "english" ) {
          echo "Length of the work : ".$information['Longueur']."</br>";
        } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "deutsch" ) {
          echo "Dauer der Arbeit : ".$information['Longueur']."</br>";
        }
      }
      if ($information['Largeur']){
        if (isset($_COOKIE['langue']) && $_COOKIE['langue']== "francais" ) {
          echo "Largeur de l'oeuvre : ".$information['Largeur']."</br>";
        } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "english" ) {
          echo "Width of the work : ".$information['Largeur']."</br>";
        } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "deutsch" ) {
          echo "Breite der Arbeit : ".$information['Largeur']."</br>";
        }
      }
      if ($information['Profondeur']){
        if (isset($_COOKIE['langue']) && $_COOKIE['langue']== "francais" ) {
          echo "Profondeur de l'oeuvre : ".$information['Profondeur']."</br>";
        } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "english" ) {
          echo "Depth of the work : ".$information['Profondeur']."</br>";
        } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "deutsch" ) {
          echo "Tiefe der Arbeit : ".$information['Profondeur']."</br>";
        }
      }

  } else {
    header('location: 404.php');
  }
?>
      </div>
    </div>
  </section>

<?php
require_once "footer.php"; }
?>
