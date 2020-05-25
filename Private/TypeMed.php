<?php  require_once 'header.php'; ?>
      <div class="user3 clearfix">
        <div class="user_way">
          <div class="user_way-link">
            <a href="GestionOeuvres.php" alt="Retour Oeuvres"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Oeuvres</a>
          </div>
          <div class="user_way-link">
            <a href="GestionMedias.php" alt="Retour Média"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Médias</a>
          </div>
          <div class="cadre3 vue">
            <img src="img/média.jpg" />
            <a href="CreationTypM.php" title="Création d'un type Média"><div class="cachee">
              <h2>Création Type Média</h2>
            </div></a>
          </div>
        </div>
        <div class="cadre4">
          <table style="width:65%">
            <h3>Les Types de Médias</h3>
            <tr>
             <th class="titre1"><span>Typologie</span></th>
             <th class="titre2"><span>Supprimer </span></th>
            </tr>
            <?php
              $reqTM = "SELECT * From type_media order by IdTypeMedia";
              $repTM = $bdd -> query($reqTM);

                foreach ($repTM as $info) {
                  echo "<tr>";
                  echo "<td><span>".$info['TypeMedia']."</span></td>";
                  echo "<td><a class='icon_hover' href='javascript:confirmation(".$info['IdTypeMedia'].")'title='supprimer ".$info['TypeMedia']."'><i class='fas fa-trash-alt fa-2x'></i></a></td>";
                  echo "</tr>";
                }
            ?>
          </table>
        </div>
      </div>
      <script>
        function confirmation(elem) {
          var msg = "Etes-vous sur de vouloir supprimer ce type de média ?";
          if (confirm(msg)){
            window.location.href="Suppression/Supptmedia.php?idtm="+elem;
          }else{
            window.location.href="TypeMed.php";
          }
        };
      </script>
    </main>
  </body>
</html>
