<?php  require_once 'header.php'; ?>
      <div class="user3 clearfix">
        <div class="user_way">
          <div class="user_way-link">
            <a href="GestionOeuvres.php" alt="Retour Oeuvres"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Oeuvres</a>
          </div>
          <div class="user_way-link">
            <a href="GestionArtistes.php" alt="Retour Artiste"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Artistes</a>
          </div>
          <div class="cadre3 vue">
            <img src="img/artiste.jpg" />

          </div>
        </div>
        <div class="cadre4">
          <h3>Vue d'un Artiste</h3>
          <?php
            $ida=$_GET['ida'];
            $reqmeda="SELECT artiste.*, NomCollectif
                      FROM artiste
                         INNER JOIN composer ON composer.idArtiste=artiste.idArtiste
                         INNER JOIN collectif_artiste ON composer.IdCollectif=collectif_artiste.IdCollectif
                      Where artiste.idArtiste=$ida";
            $repmeda=$bdd->query($reqmeda);
            $infomeda=$repmeda->fetch();
          ?>
            <div class='titre-art'>
              <?php
                echo "<p><strong>".$infomeda['NomArtiste']."</strong> <a class='icon_hover' href='Modifart.php?ida=".$infomeda['idArtiste']."' title='Modifier ".$infomeda['NomArtiste']."'><i class='fas fa-pencil-alt'></i></a></p>" ;
                echo "<p>Il fait partie du groupe : ".$infomeda['NomCollectif']."</p>";
              ?>
            </div>
            <div class="photo-art clearfix">
              <?php
                $reqmedoart= "SELECT oeuvre.* FROM oeuvre WHERE idArtiste=$ida ORDER BY NomOeuvreFr";
                $repmedoart=$bdd->query($reqmedoart);
                foreach ($repmedoart as $donmoa) {
                  echo "<div class='art-oeuvre'>";
                    echo "<p class='art-oeuvre-titre'>".htmlentities($donmoa['NomOeuvreFr'], ENT_QUOTES)."  <a class='icon_hover' href='Modifoeuvre.php?ido=".$donmoa['IdOeuvre']."' title='Modifier ".$donmoa['NomOeuvreFr']."'><i class='fas fa-pencil-alt fa-1x'></i></a>";
                      $oeuv=$donmoa['IdOeuvre'];
                      $reqmedo="SELECT media.*, type_media.*, NomExpositionFr, NomOeuvreFr
                                FROM media
                                  INNER JOIN type_media ON type_media.IdTypeMedia=media.IdTypeMedia
                                  INNER JOIN oeuvre ON media.IdOeuvre=oeuvre.IdOeuvre
                                  INNER JOIN inscrire ON inscrire.IdOeuvre=oeuvre.IdOeuvre
                                  INNER JOIN exposition ON exposition.IdExposition=inscrire.IdExposition
                                Where media.IdOeuvre=$oeuv";
                      $repmedo=$bdd->query($reqmedo);
                      echo "<div class='art-vue clearfix'>";
                      foreach ($repmedo as $donmo) {
                          echo "<div class='med-art'>";
                            if ($donmo['TypeMedia']=="audio") {
                              echo "<audio controls src='img/".$donmo['NomExpositionFr']."/".$donmo['Media']."'></audio>";
                            } else if ($donmo['TypeMedia']=="vidéo") {
                              echo "<video controls width='100%' height='100%'><source src='img/".$donmo['NomExpositionFr']."/".$donmo['Media']."' type='video/mp4'></video>";
                            } else {
                              echo "<img class='img-oeuv' src='img/".$donmo['NomExpositionFr']."/".$donmo['Media']."' title='".$donmo['NomOeuvreFr']."'></img>";
                            }
                          echo "</div>";
                      }
                    echo "</div>";
                  echo "</div>";
                }
              ?>
            </div>
            <div class="bioArt">
              <div class="BioArt-article">
                <p><strong>Biographie de l'artiste en Français</strong></p>
                <?php
                  echo htmlentities($infomeda['BioArtisteFr'], ENT_QUOTES);
                ?>
              </div>
              <div class="BioArt-article">
                <p><strong>Biographie de l'artiste en Anglais</strong></p>
                <?php
                  echo $infomeda['BioArtisteEn'];
                ?>
              </div>
              <div class="BioArt-article">
                <p><strong>Biographie de l'artiste en Allemand</strong></p>
                <?php
                  echo $infomeda['BioArtisteAll'];
                ?>
              </div>
            </div>
        </div>
      </div>
    </main>
  </body>
</html>
