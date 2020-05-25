<?php  require_once 'header.php'; ?>
      <div class="user3 clearfix">
        <div class="user_way">
          <div class="cadre3 vue">
            <img src="img/utilisateurs.jpg" />
            <a href="CreationLog.php" title="Création Login"><div class="cachee">
              <h2>Création Login</h2>
            </div></a>
          </div>
        </div>
        <div class="cadre4">
          <?php
            $requeteLog = "SELECT * FROM users order by login";
            $reponseLog = $bdd -> query($requeteLog);
            $donnees = $reponseLog -> fetch();

            if ( $donnees['Role'] == 'Admin' ){
          ?>
            <table style="width:55%">
              <h3>Les membres de Grand Angle</h3>
              <tr>
               <th>Login</th>
               <th>Modifier</th>
               <th>Supprimer</th>
              </tr>
            <?php
              $req6 = "SELECT * From users order by Login";
              $rep6 = $bdd -> query($req6);
                foreach ($rep6 as $info) {
                  echo "<tr>";
                  echo "<td><span>".$info['Login']."</span></td>";
                  echo "<td><a class='icon_hover' href='Modiflogin.php?idl=".$info['ID']."'><i class='fas fa-pencil-alt fa-2x'></i></a></td> ";
                  echo "<td><a class='icon_hover' href='javascript:confirmation(".$info['ID'].")'><i class='fas fa-trash-alt fa-2x'></i></a></td>";

                  echo "</tr>";
                }

            } else {

            }
            ?>

            </table>
        </div>
      </div>
      <script type="text/javascript">
        function confirmation(elem) {
          var msg = "Etes-vous sur de vouloir supprimer ce login ?";
          if (confirm(msg)){
            window.location.href="Suppression/Supplogin.php?idl="+elem;
          }else{
            window.location.href="GestionLogin.php";
          }
        }
      </script>
    </main>
  </body>
</html>
