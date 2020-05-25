<?php
  require_once 'connectbdd.php';
  if (empty($_GET['login']) || empty($_GET['mdp'])) {
    $status = " Merci de remplir correctement les champs.";
  } else {
    $log=$_GET['login'];
    $password=$_GET['mdp'];

    if ($_GET['role']=="Admin"){
      $irole="Admin";
    } else {
      $irole="Users";
    }

       $requs="INSERT iNTO users(Login, MotDePasse, Role) Value('".$log."','".$password."','".$irole."')";
       $repus=$bdd->query($requs);

       header("location: GestionLogin.php");
       exit();

  }
?>
<?php  require_once 'header.php';?>
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
          <h3>Création Login</h3>
          <div id="status"><?php echo $status; ?></div>
          <form action="" action="get">
            <fieldset>
              <legend> Compte </legend>
                <p><input class="champ2" type="text" name="login" placeholder="Un Login"></p>
                <p><input class="champ2" type="password" name="mdp" placeholder="Un mot de passe"></p>
                <p>Role dans l'association :<br/>
                <input type="radio" name="role" value="Admin"/><label for="Admin">Administrateur</label><br>
                <input type="radio" name="role" value="Users" checked/><label for="Users">Utilisateur</label> </p>

                <input class="champ1" type="submit" value="Créer le Login">
            </fieldset>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
