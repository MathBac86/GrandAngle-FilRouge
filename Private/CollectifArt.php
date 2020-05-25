<?php
  require_once 'connectbdd.php';
  // ----si champ vide----
  if (empty($_GET['CollArt']) ) {
    $status = " Merci de remplir correctement les champs.";
  } else {
    $NCol=addslashes($_GET['CollArt']);

    // ----Appel requête de création exposition----
    $reqcoart="INSERT iNTO collectif_artiste(NomCollectif)
            Value('".$NCol."')";
    $repcoart=$bdd->query($reqcoart);


    // ----Retour au à la gestion des expos----
    header("location: CollectifArt.php");
    exit();

  }
?>
<?php  require_once 'header.php'; ?>
      <div class="user clearfix">
        <div class="user_way">
          <div class="user_way-link">
            <a href="GestionOeuvres.php" alt="Retour Oeuvres"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Oeuvres</a>
          </div>
          <div class="user_way-link">
            <a href="GestionArtistes.php" alt="Retour Artiste"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Artistes</a>
          </div>
          <div class="cadre3 vue">
            <img src="img/artiste.jpg" />

          </div>
        </div>
        <div class="cadre4">
          <div class="infocol">
            <?php
            $reqExpo = "SELECT * From exposition order by DateDebut";
            $repExpo = $bdd -> query($reqExpo);
            ?>
            <form method="post">
              <p>Nom de L'exposition<p>
              <select name="expo" id="expo">
                <option value='0'>Merci de choisir une exposition</option>
                <?php
                  foreach ($repExpo as $info) {
                    echo "<option value='".$info['IdExposition']."'>".$info['NomExpositionFr']."</option>";
                  }
                ?>
              </select>
              <br><br>
              <button id="oeuv-button" class="champ1" type="button" name="button" onclick="LoadDoc()">Valider</button>
            </form>
            <table>
              <h3>Liste des Collectifs d'artistes par exposition<h3>
              <tr>
               <th class="titre1"><span>Expositions</span></th>
               <th class="titre2"><span>Collectifs</span></th>
               <th class="titre3"><span>Modifier</span></th>
               <th class="titre4"><span>Supprimer</span></th>
              </tr>
              <tbody id="tabcol">
              </tbody>
            </table>
          </div>
          <br><div class="delimiteur"></div>
          <div class="colart">
            <h3>Création d'un Collectif d'Artiste</h3>
            <div id="status"><?php echo $status; ?></div>
            <form action="" action="get">
              <fieldset>
                <legend> Collectif d'Artiste </legend>
                  <fieldset>
                    <p><input class="champ2" type="text" name="CollArt" placeholder="Nom Collectif d'Artiste"></p>
                  </fieldset>

              </fieldset>
              <input class="champ1" type="submit" value="Créer Collectif Artiste">
            </form>
          </div>
        </div>
      </div>
    </main>
    <script type="text/javascript">
    function LoadDoc() {
      var xhttp = new XMLHttpRequest();
      var dansinput = document.getElementById('expo').value;
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          var tableauc = JSON.parse(this.responseText);
          MyFunction(tableauc);
        }
      };
      var url = "ajaxtable/tablecol.php?expo="+dansinput;
      xhttp.open("GET", url , true);
      xhttp.send();
      function MyFunction(tableauc) {
        var element = document.getElementById('tabcol');
        outc="";
        for(i=0; i<tableauc.length; i++) {
          outc+="<tr><td><span style='font-size:110%;'>"+tableauc[i]['exp']+"<span></td><td><span style='font-size:110%;'>"+tableauc[i]['Collectif']+"<span></td><td><a class='icon_hover' href='ModifColArt.php?idcol="+tableauc[i]['id']+"' title='Modifier "+tableauc[i]['Collectif']+"'><i class='fas fa-pencil-alt fa-2x'></i></a></td><td><a class='icon_hover' href='javascript:confirmation("+tableauc[i]['id']+")' title='Supprimer "+tableauc[i]['Collectif']+"'><i class='fas fa-trash-alt fa-2x'></i></a></td></tr>";
        }
        element.innerHTML = outc;
      }
    };

      function confirmation(elem) {
        var msg = "Etes-vous sur de vouloir supprimer ce collectif Artiste ?";
        if (confirm(msg)){
          window.location.href="Suppression/SuppColArt.php?idcol="+elem;
        }else{
          window.location.href="CollectifArt.php";
        }
      }
    </script>
  </body>
</html>
