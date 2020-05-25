<?php  require_once 'header.php'; ?>
        <div class="user3 clearfix">
          <div class="user_way">
            <div class="user_way-link">
              <a href="GestionOeuvres.php" alt="Retour Oeuvres"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Oeuvres</a>
            </div>
            <div class="cadre3 vue">
              <img src="img/artiste.jpg" />
              <a href="CreationArt.php" title="Création Artiste"><div class="cachee">
                <h2> 1- Création Artiste</h2>
              </div></a>
            </div>
            <div class="cadre3 vue">
              <img src="img/artiste.jpg" />
              <a href="CollectifArt.php" title="Création Artiste"><div class="cachee">
                <h2> 2- Collectif artiste</h2>
              </div></a>
            </div>
          </div>
          <div class="cadre4">
            <h3>Les Artistes</h3>
            <button id="oeuv-button" class="champ1" type="button" name="button" onclick="LoadTA()">Voir tous les Artistes</button>
            <br><br>
            <table id="oeuvres" style="width:90%" method="post">
              <tr>
                <th class="titre1"><span>Artistes</span></th>
                <th class="titre2"><span>Modifier</span></th>
                <th class="titre3"><span>Supprimer</span></th>
                <th class="titre4"><span>Voir</span></th>
              </tr>
              <tbody id="arts">
              </tbody>
            </table>

            <br><div class="delimiteur"></div>

            <h3>Les Artistes Par Exposition</h3>
            <?php
            $reqExpo = "SELECT * From exposition order by NomExpositionFr";
            $repExpo = $bdd -> query($reqExpo);
            ?>
            <form method="post">
              <p>Nom de L'exposition</p>
              <select name="expo" id="expo">
                <option value='0'>Merci de choisir une exposition</option>
                <?php
                  foreach ($repExpo as $info) {
                    echo "<option value='".$info['IdExposition']."'>".$info['NomExpositionFr']."</option>";
                  }
                ?>
              </select>
              <br><br>
              <button id="oeuv-button" class="champ1" type="button" name="button" onclick="LoadArt()">Valider</button>
            </form>

            <div id="artiste" class="artiste clearfix"></div>

            <br><div class="delimiteur"></div>

            <h3>Les Oeuvres par Artistes</h3>
            <?php
            $reqArt = "SELECT * From artiste order by NomArtiste";
            $repArt = $bdd -> query($reqArt);
            ?>
            <form method="post">
              <p>Nom de L'artiste<p>
              <select name="Art" id="Art">
                <option value='0'>Merci de choisir un artiste</option>
                <?php
                  foreach ($repArt as $info) {
                    echo "<option value='".$info['idArtiste']."'>".$info['NomArtiste']."</option>";
                  }
                ?>
              </select>
              <br><br>
              <button id="oeuv-button" class="champ1" type="button" name="button" onclick="LoadAO()">Valider</button>
            </form>

            <div id="Aoeuvre" class="Aoeuvre clearfix"></div>
          </div>
        </div>
        <script type="text/javascript">
          function LoadTA() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                var tableauta = JSON.parse(this.responseText);
                MyFunction(tableauta);
              }
            };
            var url = "ajaxtable/tabletart.php";
            xhttp.open("GET", url , true);
            xhttp.send();
            function MyFunction(tableauta) {
              var element = document.getElementById('arts');
              outta="";
              for(i=0; i<tableauta.length; i++) {
                outta+="<tr><td><span>"+tableauta[i]['Artiste']+"</span></td><td><a class='icon_hover' href='Modifart.php?ida="+tableauta[i]['ida']+"' title='Modifier "+tableauta[i]['Artiste']+"'><i class='fas fa-pencil-alt fa-2x'></i></a></td><td><a class='icon_hover' href='javascript:confirmation("+tableauta[i]['ida']+")' title='Supprimer "+tableauta[i]['Artiste']+"'><i class='fas fa-trash-alt fa-2x'></i></a></td><td><a class='icon_hover' href='Vueart.php?ida="+tableauta[i]['ida']+"' title='Description de "+tableauta[i]['Artiste']+"'><i class='fas fa-info-circle fa-2x'></i></a></td></tr>";
              }
              element.innerHTML = outta;
            }
          };


          function LoadArt() {
            var xhttp = new XMLHttpRequest();
            var dansinput = document.getElementById('expo').value;
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                var tableaua = JSON.parse(this.responseText);
                MyFunction(tableaua);
              }
            };
            var url = "ajaxtable/tableart.php?expo="+dansinput;
            xhttp.open("GET", url , true);
            xhttp.send();
            function MyFunction(tableaua) {
              var element = document.getElementById('artiste');
              outa="";
              for(i=0; i<tableaua.length; i++) {
                outa+="<div class='artmed'><div class='medoeuv'>"+tableaua[i]['Oeuvre']+"</div><div class='medimg'><img class='img-med' src='img/"+tableaua[i]['exp']+"/"+tableaua[i]['img']+"' title='"+tableaua[i]['oeuv']+"'></img></div><p>Photographié(e) par </p><p>"+tableaua[i]['art']+"</p><span><a class='icon_hover' href='Modifart.php?ida="+tableaua[i]['ida']+"' title='Modifier "+tableaua[i]['art']+"'><i class='fas fa-pencil-alt fa-2x'></i></a></span><span><a class='icon_hover' href='javascript:confirmation("+tableaua[i]['ida']+")' title='Supprimer "+tableaua[i]['art']+"'><i class='fas fa-trash-alt fa-2x'></i></a></span><span><a class='icon_hover' href='Vueart.php?ida="+tableaua[i]['ida']+"' title='Description de "+tableaua[i]['art']+"'><i class='fas fa-info-circle fa-2x'></i></a></span></div>";
              }
              element.innerHTML = outa;
            }
          };


          function LoadAO() {
            var xhttp = new XMLHttpRequest();
            var dansinput = document.getElementById('Art').value;
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                var tableauao = JSON.parse(this.responseText);
                MyFunction(tableauao);
              }
            };
            var url = "ajaxtable/tableAO.php?Art="+dansinput;
            xhttp.open("GET", url , true);
            xhttp.send();
            function MyFunction(tableauao) {
              var element = document.getElementById('Aoeuvre');
              outao="";
              for(i=0; i<tableauao.length; i++) {
                outao+="<div class='artmed'><div class='medoeuv'>"+tableauao[i]['Oeuvre']+" <a class='icon_hover' href='Printoeuvfr.php?ido="+tableauao[i]['id']+"' title='Description de "+tableauao[i]['Oeuvre']+"'><i class='fas fa-info-circle'></i></a></div><div class='medimg'><img class='img-med' src='img/"+tableauao[i]['exp']+"/"+tableauao[i]['img']+"' title='"+tableauao[i]['oeuv']+"'></img></div></div>";
              }
              element.innerHTML = outao;
            }
          };


          function confirmation(elem) {
            var msg = "Etes-vous sur de vouloir supprimer cet artiste ? Avant de supprimer, vérifier que l'artiste en question ne soit attribué à aucune oeuvre. Merci";
            if (confirm(msg)){
              window.location.href="Suppression/Suppart.php?idart="+elem;
            }else{
              window.location.href="GestionArtistes.php";
            }
          };
        </script>
      </main>
    </body>
  </html>
