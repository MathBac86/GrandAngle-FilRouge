<?php  require_once 'header.php'; ?>
      <div class="user3 clearfix">
        <div class="user_way">
          <div class="user_way-link">
            <a href="GestionOeuvres.php" alt="Retour Oeuvres"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Oeuvres</a>
          </div>
          <div class="cadre3 vue">
            <img src="img/matioeuvre.jpg" />
            <a href="CreationMat.php" title="Création Matiere"><div class="cachee">
              <h2>Création Matière</h2>
            </div></a>
          </div>
        </div>
        <div class="cadre4">
          <table style="width:65%">
            <h3>Les Matières des Oeuvres</h3>
            <tr>
             <th class="titre1"><span>Matières</span></th>
             <th class="titre2"><span>Modifier </span></th>
             <th class="titre3"><span>Supprimer </span></th>
            </tr>
            <?php
              $reqmatoeuv = "SELECT * From matiereoeuvre order by IdMatiereOeuvre";
              $repmatoeuv = $bdd -> query($reqmatoeuv);

                foreach ($repmatoeuv as $info) {
                  echo "<tr>";
                  echo "<td><span>".$info['MatiereOeuvreFr']."</span></td>";
                  echo "<td><a class='icon_hover' href='Modifmat.php?idm=".$info['IdMatiereOeuvre']."'><i class='fas fa-pencil-alt fa-2x'></i></a></td> ";
                  echo "<td><a class='icon_hover' href='javascript:confirmation(".$info['IdMatiereOeuvre'].")'><i class='fas fa-trash-alt fa-2x'></i></a></td>";
                  echo "</tr>";
                }
            ?>
          </table>

        </div>
      </div>
      <script type="text/javascript">
        function confirmation(elem) {
          var msg = "Etes-vous sur de vouloir supprimer cete matière d'Oeuvre ?";
          if (confirm(msg)){
            window.location.href="Suppression/Suppmat.php?idm="+elem;
          }else{
            window.location.href="GestionMat.php";
          }
        }
      </script>
    </main>
  </body>
</html>
