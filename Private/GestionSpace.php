<?php  require_once 'header.php'; ?>
      <div class="user3 clearfix">
        <div class="user_way">
          <div class="user_way-link">
            <a href="GestionOeuvres.php" alt="Retour Oeuvres"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Oeuvres</a>
          </div>
          <div class="cadre3 vue">
            <img src="img/visageart.jpg" />
            <a href="CreationEsp.php" title="Création d'un Espace"><div class="cachee">
              <h2>Création Espace</h2>
            </div></a>
          </div>
        </div>
        <div class="cadre4">
            <table style="width:65%">
              <h3>Les Espaces</h3>
              <tr>
               <th class="titre1"><span>Espaces</span></th>
               <th class="titre2"><span>Modifier</span></th>
               <th class="titre3"><span>Supprimer</span></th>
              </tr>
              <?php
                $reqesp = "SELECT * From espace order by IdEspace";
                $repesp = $bdd -> query($reqesp);

                  foreach ($repesp as $info) {
                    echo "<tr>";
                    echo "<td><span>".$info['NomEspace']."</span></td>";
                    echo "<td><a class='icon_hover' href='Modifesp.php?ides=".$info['IdEspace']."'><i class='fas fa-pencil-alt fa-2x'></i></a></td> ";
                    echo "<td><a class='icon_hover' href='javascript:confirmation(".$info['IdEspace'].")'><i class='fas fa-trash-alt fa-2x'></i></a></td>";
                    echo "</tr>";
                  }
              ?>
            </table>
        </div>
      </div>
      <script type="text/javascript">
        function confirmation(elem) {
          var msg = "Etes-vous sur de vouloir supprimer cet espace ?";
          if (confirm(msg)){
            window.location.href="Suppression/Suppesp.php?ides="+elem;
          }else{
            window.location.href="GestionSpace.php";
          }
        }
      </script>
    </main>
  </body>
</html>
