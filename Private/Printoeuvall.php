<?php require_once 'header.php' ?>
      <div class="page_oeuv">
        <div class="page_oeuv-menu">
          <div class="user_way-link2">
            <a href="Oeuvres.php" alt="Retour Oeuvres"><i class="fas fa-arrow-alt-circle-left"></i> Retour aux Oeuvres</a>
          </div>
          <div class="oeuv_menu-print">
            <button id="cprint">Print</button>
          </div>
        </div>

        <div id="print">
          <?php
            $ido=$_GET['ido'];
            $reqPO="SELECT oeuvre.*, media.*, exposition.*, artiste.*, collectif_artiste.*, typeoeuvre.*, matiereoeuvre.*, espace.*
                    FROM oeuvre
                     INNER JOIN media ON media.IdOeuvre = oeuvre.IdOeuvre
                     INNER JOIN type_media ON type_media.IdTypeMedia = media.IdTypeMedia
                     INNER JOIN inscrire ON inscrire.IdOeuvre = oeuvre.IdOeuvre
                     INNER JOIn exposition ON exposition.IdExposition = inscrire.IdExposition
                     INNER JOIN artiste ON artiste.idArtiste = oeuvre.idArtiste
                     INNER JOIN composer ON composer.idArtiste = composer.idArtiste
                     INNER JOIN collectif_artiste ON collectif_artiste.IdCollectif = composer.IdCollectif
                     INNER JOIN typeoeuvre ON typeoeuvre.IdType = oeuvre.IdType
                     INNER JOIN matiereoeuvre ON matiereoeuvre.IdMatiereOeuvre = oeuvre.IdMatiereOeuvre
                     INNER JOIN espace ON inscrire.IdEspace=espace.IdEspace
                    WHERE oeuvre.IdOeuvre=$ido
                    AND TypeMedia='image'
                    ORDER BY media.IdMedia LIMIT 1 ";
            $repPO=$bdd->query($reqPO);

            foreach ($repPO as $info) {
              echo " <div class='print_exp'>";
                echo "<div class='img clearfix'>";
                  echo "<div class='img-log-code'>";
                    echo "<div class='Logimg'>";
                      echo "<img src='img/logo.png' title='Accueil'></img>";
                    echo "</div>";
                    echo "<div class='code'>";
                      echo "<img class='code-img' src='img/flashcode/".$info['Flashcode']."'></img>";
                    echo "</div>";
                  echo "</div>";
                  echo "<div class='photo'>";
                    echo "<img class='photoprint' src='img/".$info['NomExpositionFr']."/".$info['Media']."' title='".$info['NomOeuvreFr']."'></img>";
                  echo "</div>";
                echo "</div>";
                echo "<div class='titre-oeuv'>";
                  echo "<p class='Titre'>".$info['NomOeuvreAll']."<p>";
                  echo "<p class='exposition'>Belichtung : ".$info['NomExpositionAll']."</p><br>";
                echo "</div>";
                echo "<div class='info-oeuv clearfix'>";
                  echo "<div class='oeuv-info'>";
                    echo "<p class='oeuv-info-annee'><strong> Jahr der Schöpfung : </strong>".$info['AnneeCreation']."</p><br>";
                    echo "<p class='oeuv-info-nature'> Es ist eine ".$info['TypeAll']." aus ".$info['MatiereOeuvreAll']."</p><br>";
                    if (empty($info['Longueur']) || empty($info['Largeur']) || empty($info['Profondeur'])) {
                      echo "<p class='oeuv-info-dim'></p><br>";
                    }else {
                      echo "<p class='oeuv-info-dim'><strong> Größe der Arbeit :";
                      echo "<ul>";
                        echo "<li>Länge : </strong>".$info['Longueur']." cm</li>";
                        echo "<li><strong>Breite : </strong>".$info['Largeur']." cm</li>";
                        echo "<li><strong>Tiefe : </strong>".$info['Profondeur']." cm</li>";
                      echo "</ul></p>";
                    }
                    echo "<p class='oeuv-esp'><strong>Bereitstellung : </strong> ".$info['NomEspace']."</p>";
                  echo "</div>";
                  echo "<div class='oeuv-art'>";
                    echo "<p class='p-artiste'><strong> Der Künstler : </strong>".$info['NomArtiste']."</p>";
                    if (!empty($info['NomCollectif'])) {
                      echo "<p class='colartiste'> Der Künstler ist Teil der Gruppe ".$info['NomCollectif']."</p><br>";
                    }else{
                      echo "<p class='colartiste'></p><br>";
                    }
                    echo "<p class='desc-art'><strong> Biografie des Künstlers : </strong>".substr($info['BioArtisteAll'],0,150)."... <strong>(Um mehr zu erfahren, Vielen Dank für das Fotografieren des QR-Codes)</strong></p><br>";
                  echo "</div>";
                echo "</div>";
                echo "<div class='print_desc'>";
                  echo "<p><strong>Beschreibung </strong> : ".substr($info['DescOeuvreDe'],0,300)."... <strong>(Um mehr zu erfahren, Vielen Dank für das Fotografieren des QR-Codes)</strong></p><br>";
                  echo "<p><strong>Guter Besuch</strong></p>";
                echo "</div>";
              echo "</div>";

            }
          ?>

        </div>
      </div>
      <script>
        $('#cprint').on('click', function () {
          print();
        });
      </script>
    </main>
  </body>
</html>
