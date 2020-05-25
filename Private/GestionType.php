<?php  require_once 'header.php'; ?>
      <div class="user3 clearfix">
        <div class="user_way">
          <div class="user_way-link">
            <a href="GestionOeuvres.php" alt="Retour Oeuvres"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Oeuvres</a>
          </div>
          <div class="cadre3 vue">
            <img src="img/typeoeuvre.jpg" />
            <a href="CreationTypo.php" title="Création Type"><div class="cachee">
              <h2>Création Typologie</h2>
            </div></a>
          </div>
        </div>
        <div class="cadre4">
          <table style="width:65%">
            <h3>Les Types des Oeuvres</h3>
            <tr>
             <th class="titre1"><span>Typologie</span></th>
             <th class="titre2"><span>Modifier </span></th>
             <th class="titre3"><span>Supprimer </span></th>
            </tr>
            <?php
              $reqmatoeuv = "SELECT * From typeoeuvre order by IdType";
              $repmatoeuv = $bdd -> query($reqmatoeuv);

                foreach ($repmatoeuv as $info) {
                  echo "<tr>";
                  echo "<td><span>".$info['TypeFr']."</span></td>";
                  echo "<td><a class='icon_hover' href='Modiftypo.php?idt=".$info['IdType']."'><i class='fas fa-pencil-alt fa-2x'></i></a></td> ";
                  echo "<td><a class='icon_hover' href='javascript:confirmation(".$info['IdType'].")'><i class='fas fa-trash-alt fa-2x'></i></a></td>";
                  echo "</tr>";
                }
            ?>
          </table>

        </div>
      </div>
      <script type="text/javascript">
        function confirmation(elem) {
          var msg = "Etes-vous sur de vouloir supprimer ce type d'Oeuvre ?";
          if (confirm(msg)){
            window.location.href="Suppression/Supptypo.php?idt="+elem;
          }else{
            window.location.href="Gestiontype.php";
          }
        }
      </script>
    </main>
  </body>
</html>
