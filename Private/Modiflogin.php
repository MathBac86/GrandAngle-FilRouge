
<?php  require_once 'header.php'; ?>
      <div class="user3 clearfix">
        <div class="user_way">
          <div class="user_way-link">
            <a href="GestionLogin.php" alt="Retour Login"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Logins</a>
          </div>
          <div class="cadre3 vue">
            <img src="img/utilisateurs.jpg" />

          </div>
        </div>
        <div class="cadre4">
          <h3>Modification Login</h3>
          <form action="Modification/modiflog.php" action="get">
            <fieldset>
              <legend> Compte </legend>
              <?php
                $ilog=$_GET['idl'];
                $reqmlog = "SELECT *  FROM users WHERE ID=$ilog";
                $repmlog=$bdd->query($reqmlog);
                foreach($repmlog as $info) {
                  echo "<input class='champ' type='hidden' name='idlog' value=".$info['ID']."></p>";
                  echo "<p>Login : </p>";
                  echo "<input class='champ' type='text' name='nomlog' value='".$info['Login']."'>";
                  echo "<p>Mot de passe : </p>";
                  echo "<input class='champ' type='text' name='mdp' value=".$info['MotDePasse'].">";
                  echo "<p>Rôle dans l'association : <br/>
                    Pour Administrateur : Admin <br>
                    Pour Utilisateur : Users <br/></p>";
                  echo "<input class='champ' type='text' name='rolelog' value=".$info['Role'].">";
                }
              ?>
                <input class="champ1" type="submit" value="Modifier le Login">
            </fieldset>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
