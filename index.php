<?php

if(!isset($_COOKIE['langue'])) {
require_once "choixLangue.php"; } else {

require_once "bdd.php";
ob_start();
require_once "head.php";
$buffer=ob_get_contents();
ob_end_clean();
$buffer=str_replace("%TITLE%","Grand Angle",$buffer);
echo $buffer;
?>
<section>
  <div class="container">
    <div class="presentationGrandAngle">
      <?php
      if(isset($_COOKIE['langue']) && $_COOKIE['langue']== "english" ) { ?><p class="fontSize20Bold">Presentation of Grand Angle :</p><p>The association Grand Angle manages since 1996 an exhibition space dedicated to the culture located in Tours. Very active in terms of cultural development in the region, Grand Angle regularly offers artists the use of its premises.</p><?php ;}
       elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "francais" ) { ?><p class="fontSize20Bold">Présentation de Grand Angle :</p><p>L'association Grand Angle gère depuis 1996 un espace d'exposition dédié à la culture situé à Tours. Très active sur le plan du développement culturel de la région, Grand Angle propose régulièrement à des artistes l'utilisation de ses locaux.</p><?php ;
       } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "deutsch" ) { ?><p class="fontSize20Bold">Präsentation von Grand Angle :</p><p>Der Verein Grand Angle verwaltet seit 1996 einen Ausstellungsraum, der der in Tours gelegenen Kultur gewidmet ist. Grand Angle ist sehr aktiv in der kulturellen Entwicklung der Region und bietet Künstlern regelmäßig die Nutzung seiner Räumlichkeiten an.</p><?php
       } ?>
    </div>
    <!-- affichage du nom de l'exposition du moment + lien -->
    <?php
    if(isset($_COOKIE['langue']) && $_COOKIE['langue']== "francais" ) {
    $st=$bdd->query("SELECT NomExpositionFr, SUBSTRING(DescriptionExpositionFr,1,200) AS DescriptionExpositionFr, DateFin, IdExposition
    FROM exposition
    WHERE CURRENT_DATE BETWEEN DateDebut AND DateFin LIMIT 1");
    $information=$st->fetch();
    ?><div class="expositionDuMoment">
      <p class="fontSize20Bold">Exposée en ce moment :</p>
      <a href="exposition.php?idExposition=<?php echo $information['IdExposition'] ?>"><p class="fontSize20Bold"><?php echo $information['NomExpositionFr'] ?></p></a>
      <!-- affichage description expo du moment -->
      <?php echo $information['DescriptionExpositionFr']."...</br>";
    } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "english" ) {
      $st=$bdd->query("SELECT NomExpositionEn, SUBSTRING(DescriptionExpositionEn,1,200) AS DescriptionExpositionEn, DateFin
      FROM exposition
      WHERE CURRENT_DATE BETWEEN DateDebut AND DateFin LIMIT 1");
      $information=$st->fetch();
      ?><div class="expositionDuMoment">
        <p class="fontSize20Bold">Exposed right now :</p><?php
        echo $information['NomExpositionEn']."</br>";
        echo $information['DescriptionExpositionEn']."...</br>";
    } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "deutsch" ) {
      $st=$bdd->query("SELECT NomExpositionAll, SUBSTRING(DescriptionExpositionAll,1,200) AS DescriptionExpositionAll, DateFin
      FROM exposition
      WHERE CURRENT_DATE BETWEEN DateDebut AND DateFin LIMIT 1");
      $information=$st->fetch();
      ?><div class="expositionDuMoment">
        <p class="fontSize20Bold">Jetzt ausgesetzt :</p><?php
        echo $information['NomExpositionAll']."</br>";
        echo $information['DescriptionExpositionAll']."...</br>";
    }
    ?>
    </div>
    <!-- affichage planning expo -->
    <div class="planningExposition">
      <?php
      if(isset($_COOKIE['langue']) && $_COOKIE['langue']== "english" ) { ?><p class="fontSize20Bold">Planning of future exhibitions :</p><?php ;}
       elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "francais" ) { ?><p class="fontSize20Bold">Planning des futures expositions :</p><?php ;
       } elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "deutsch" ) { ?><p class="fontSize20Bold">Planung zukünftiger Ausstellungen :</p><?php
       }
      if (isset($_COOKIE['langue']) && $_COOKIE['langue']== "english" ) {?>
      <table class="table-sm">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Start on</th>
            <th scope="col">Ends the</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query='SELECT IdExposition, NomExpositionEn, DateDebut, DateFin FROM exposition WHERE NOW()<DateFin ORDER BY DateDebut';
          $reponse=$bdd->query($query);
          foreach ($reponse as $info) {
            $datedeb = strftime( "%d/%m/%Y", strtotime($info['DateDebut']));
            $datefin = strftime( "%d/%m/%Y", strtotime($info['DateFin']));?>
            <tr>
            <th scope="row"><a href="exposition.php?idExposition=<?php echo $info['IdExposition'] ?>"><?php echo $info['NomExpositionEn']?></a></th>
            <td><?php echo $datedeb ?></td>
            <td><?php echo $datefin ?></td>
            </tr>
          <?php ;} ?>
        </tbody>
      </table>
      <?php ;}
      elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "francais" ) {?>
      <table class="table-sm">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Débute le</th>
            <th scope="col">Termine le</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query='SELECT IdExposition, NomExpositionFr, DateDebut, DateFin FROM exposition WHERE NOW()<DateFin ORDER BY DateDebut';
          $reponse=$bdd->query($query);
          foreach ($reponse as $info) {
            $datedeb = strftime( "%d/%m/%Y", strtotime($info['DateDebut']));
            $datefin = strftime( "%d/%m/%Y", strtotime($info['DateFin']));?>
            <tr>
            <th scope="row"><a href="exposition.php?idExposition=<?php echo $info['IdExposition'] ?>"><?php echo $info['NomExpositionFr']?></a></th>
            <td><?php echo $datedeb ?></td>
            <td><?php echo $datefin ?></td>
            </tr>
          <?php ;} ?>
        </tbody>
      </table>
      <?php ;}
      elseif (isset($_COOKIE['langue']) && $_COOKIE['langue']== "deutsch" ) {?>
      <table class="table-sm">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Beginnen sie mit</th>
            <th scope="col">Beendet die</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query='SELECT IdExposition, NomExpositionAll, DateDebut, DateFin FROM exposition WHERE NOW()<DateFin ORDER BY DateDebut';
          $reponse=$bdd->query($query);
          foreach ($reponse as $info) {
            $datedeb = strftime( "%d/%m/%Y", strtotime($info['DateDebut']));
            $datefin = strftime( "%d/%m/%Y", strtotime($info['DateFin']));?>
            <tr>
            <th scope="row"><a href="exposition.php?idExposition=<?php echo $info['IdExposition'] ?>"><?php echo $info['NomExpositionAll']?></a></th>
            <td><?php echo $datedeb ?></td>
            <td><?php echo $datefin ?></td>
            </tr>
          <?php ;} ?>
        </tbody>
      </table>
      <?php ;} ?>
    </div>


  </div>
</section>
<?php
require_once "footer.php"; }
?>
