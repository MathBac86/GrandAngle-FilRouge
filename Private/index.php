<?php require_once 'header.php'; ?>
      <div id="login-button">
        <img src="https://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png"></img>
      </div>
      <div id="container">
        <h1>Log In</h1>
        <span class="close-btn">
          <i class="fas fa-times-circle"></i>
        </span>

        <div class="Formulaire">
          <form action="veriflogin.php" action="get">
            <input class="champ" type="text" name="Log" placeholder="votre username">
            <input class="champ" type="password" name="pswd" id="password" placeholder="votre mot de passe"><i style="cursor:pointer;" onclick="MDP()" class="far fa-eye" id="eye"></i>
            <div class="center">
              <input class="champ1" type="submit" value="Connecter">
            </div>
          </form>
        </div>
      </div>
    </main>
    <script src="script/script.js"></script>
  </body>
</html>
