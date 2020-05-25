<?php  require_once 'header.php'; ?>
      <div class="user clearfix">
        <?php if ($donnee['Role']=='Users') { ?>
          <article class="cadre vue">
            <img src="img/expo.jpg" />
            <a href="GestionExpo.php" title="Expositions"><div class="cachee">
              <h2> Expositions</h2>
            </div></a>
          </article>
          <article class="cadre vue">
            <img src="img/oeuvres.jpg" />
            <a href="GestionOeuvres.php" title="Oeuvres"><div class="cachee">
              <h2> Oeuvres</h2>
            </div></a>
          </article>
          <article class="cadre vue">
            <img src="img/stat.jpg" />
            <a href="GestionStat.php" title="Statistiques"><div class="cachee">
              <h2> Statistiques</h2>
            </div></a>
          </article>
        <?php } else { ?>
          <article class="cadre2 vue">
            <img src="img/expo.jpg" />
            <a href="GestionExpo.php" title="Expositions"><div class="cachee">
              <h2> Expositions</h2>
            </div></a>
          </article>
          <article class="cadre2 vue">
            <img src="img/oeuvres.jpg" />
            <a href="GestionOeuvres.php" title="Oeuvres"><div class="cachee">
              <h2> Oeuvres</h2>
            </div></a>
          </article>
          <article class="cadre2 vue">
            <img src="img/stat.jpg" />
            <a href="GestionStat.php" title="Statistiques"><div class="cachee">
              <h2> Statistiques</h2>
            </div></a>
          </article>
          <article class="cadre2 vue">
            <img src="img/utilisateurs.jpg" />
            <a href="GestionLogin.php" title="Logins"><div class="cachee">
              <h2> Logins</h2>
            </div></a>
          </article>
        <?php } ?>
      </div>
    </main>
  </body>
</html>
