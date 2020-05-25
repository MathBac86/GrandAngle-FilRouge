<?php require_once 'header.php' ?>
      <div class="page_expo">
        <div class="page_expo-menu">
          <div class="user_way-link2">
            <a href="GestionExpo.php" alt="Retour Expo"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Expo</a>
          </div>
          <div class="expo_menu-print">
            <button id="cprint">Print</button>
          </div>
        </div>
        <div id="print">
          <!-- <img class="logo_print" src="img/logo.png" title="Accueil"></img> -->
          <?php
            $ide = $_GET['ide'];
            $reqPr = "SELECT exposition.*
                      FROM exposition
                      WHERE IdExposition = $ide ";
            $repPr=$bdd->query($reqPr);
            $info=$repPr->fetch();

              echo " <div class='print_exp'>";
                echo "<div class='Logimg'>";
                  echo "<img src='img/logo.png' title='Accueil'></img>";
                echo "</div>";
                echo "<p class='Titre'>".$info['NomExpositionAll']."<p><br>";
                echo "<p class='date'>Vom ".strftime( '%d/%m/%Y', strtotime($info['DateDebut']))." bis ".strftime( '%d/%m/%Y', strtotime($info['DateFin']))."</p><br>";
                echo "<div class='imgexp'>";
                  echo "<img class='imgprint2' src='img/".htmlentities($info['NomExpositionFr'], ENT_QUOTES)."/expo.jpg' title='".$info['NomExpositionFr']."'></img>";
                echo "</div>";
                echo "<div class='print_descript'>";
                  echo "<p><strong>Beschreibung </strong> : ".$info['DescriptionExpositionAll']."</p><br>";
                  echo "<p><strong> Der Eintritt in die Ausstellung '".$info['NomExpositionAll']."' beträgt ".$info['Tarif']." €.</strong></p><br>";
                  echo "<p><strong>Guter Besuch</strong></p>";
                echo "</div>";
              echo "</div>";

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
