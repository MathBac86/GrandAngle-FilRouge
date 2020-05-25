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
                  echo "<p class='Titre'>".$info['NomOeuvreEn']."<p>";
                  echo "<p class='exposition'>Exhibition : ".$info['NomExpositionEn']."</p><br>";
                echo "</div>";
                echo "<div class='info-oeuv clearfix'>";
                  echo "<div class='oeuv-info'>";
                    echo "<p class='oeuv-info-annee'><strong> Year of creation : </strong>".$info['AnneeCreation']."</p><br>";
                    echo "<p class='oeuv-info-nature'> It is a  ".$info['TypeEn']." made of ".$info['MatiereOeuvreEn']."</p><br>";
                    if (empty($info['Longueur']) || empty($info['Largeur']) || empty($info['Profondeur'])) {
                      echo "<p class='oeuv-info-dim'></p><br>";
                    }else {
                      echo "<p class='oeuv-info-dim'><strong> Size of the work :";
                      echo "<ul>";
                        echo "<li>Length : </strong>".$info['Longueur']." cm</li>";
                        echo "<li><strong>Width : </strong>".$info['Largeur']." cm</li>";
                        echo "<li><strong>Depth : </strong>".$info['Profondeur']." cm</li>";
                      echo "</ul></p>";
                    }
                    echo "<p class='oeuv-esp'><strong>Provision : </strong> ".$info['NomEspace']."</p>";
                  echo "</div>";
                  echo "<div class='oeuv-art'>";
                    echo "<p class='p-artiste'><strong> The artist : </strong>".$info['NomArtiste']."</p>";
                    if (!empty($info['NomCollectif'])) {
                      echo "<p class='colartiste'> The artist is part of the group ".$info['NomCollectif']."</p><br>";
                    }else{
                      echo "<p class='colartiste'></p><br>";
                    }
                    echo "<p class='desc-art'><strong> Biography of the artist: </strong>".substr($info['BioArtisteEn'],0,150)."... <strong>(To read more, Thank you for photographing the QR-Code)</strong></p><br>";
                  echo "</div>";
                echo "</div>";
                echo "<div class='print_desc'>";
                  echo "<p><strong>Description </strong> : ".substr($info['DescOeuvreEn'],0,300)."... <strong>(To read more, Thank you for photographing the QR-Code)</strong></p><br>";
                  echo "<p><strong>Good visit</strong></p>";
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
