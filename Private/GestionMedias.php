<?php  require_once 'header.php'; ?>
      <div class="user3 clearfix">
        <div class="user_way">
          <div class="user_way-link">
            <a href="GestionOeuvres.php" alt="Retour Oeuvres"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Oeuvres</a>
          </div>
          <div class="cadre3 vue">
            <img src="img/media.jpg" />
            <a href="CreationMed.php" title="Création d'un Média"><div class="cachee">
              <h2>Attribution Média</h2>
            </div></a>
          </div>
          <div class="cadre3 vue">
            <img src="img/média.jpg" />
            <a href="TypeMed.php" title="Type du Média"><div class="cachee">
              <h2>Type de Média</h2>
            </div></a>
          </div>
        </div>
        <div class="cadre4">
          <h3>Les Médias</h3>
          <!-- Je récupère le nom des expositions via requète -->
          <?php
          $reqExpo = "SELECT * From exposition order by NomExpositionFr";
          $repExpo = $bdd -> query($reqExpo);
          ?>
          <p>Nom de L'exposition<p>
          <form method="post" >
            <!-- Les informations de la requète sont renvoyées sous forme de select avec un foreach
            qui permet d'utiliser le nombre adéquat de balise option selon le nombre d'exposition -->
            <select id="expo" name="expo">
              <option value='0'>Merci de choisir une exposition</option>
              <?php
                foreach ($repExpo as $info) {
                  echo "<option value=".$info['IdExposition'].">".$info['NomExpositionFr']."</option>";
                }
              ?>
            </select>
            <br><br>
            <!-- La création d'un bouton me permettra de valider ma demande et d'appeler les oeuvres selon l'exposition demandée
            Cela se fera via le biais d'un code javascript en AJAX qui se nomme LoadDoc -->
            <button id="oeuv-button" class="champ1" type="button" name="button" onclick="LoadDoc()">Valider</button>
          </form>

          <p>Nom de L'oeuvre<p>
            <!-- Je ne fais pas de requète pour appeler les oeuvres, c'est le javascript qui le fera.
            J'instore seulement la notion de select.
            C'est au moment d'appuyer sur le bouton de validation d'une oeuvre où on pourra voir les oeuvres associées -->
            <form method="get">
              <select id="oeuvre" name="oeuvre">
                <option value='0'>Merci de choisir une oeuvre</option>
              </select>
              <br><br>
              <!-- La création d'un bouton me permettra de valider ma demande et d'appeler les médias selon l'oeuvre demandée
              Cela se fera via le biais d'un code javascript en AJAX qui se nomme LoadMed -->
              <button id="med-button" class="champ1" type="button" name="button" onclick="LoadMed()">Valider</button>
            </form>

          <div id="media" class="media clearfix"></div>

        </div>
      </div>
      <script>
        function LoadDoc() {
          var xhttp = new XMLHttpRequest();  // utilisation d'une variable pour récupérer facilement des données via HTTP
          var dansinput = document.getElementById('expo').value; // variabilisation du champ choisit dans le select exposition
          xhttp.onreadystatechange = function() { // Cela appelle le résultat voulu sous forme de tableau des oeuvres dans la feuille tableoeuvre.php
            if (this.readyState == 4 && this.status == 200) {
              console.log(this.responseText);
              var tableau = JSON.parse(this.responseText);
              MyFunction(tableau);
            }
          };
          var url = "ajaxtable/tableoeuvre.php?expo="+dansinput; // Recherche du résultat dans le fichier voulu avec l'id de l'exposition
          xhttp.open("GET", url , true);
          xhttp.send();
          function MyFunction(tableau) { // Le résultat de la demande sera sous forme de balise option avec les informations prise dans tableoeuvre
            var element = document.getElementById('oeuvre');
            out="";
            for(i=0; i<tableau.length; i++) {
              out+="<option value='"+tableau[i]['id']+"'>"+tableau[i]['Oeuvre']+"</option>";
            }
            element.innerHTML = out;
          }
        };

        function LoadMed() {
          var xhttp = new XMLHttpRequest();  // utilisation d'une variable pour récupérer facilement des données via HTTP
          var dansinputo = document.getElementById('oeuvre').value; // variabilisation du champ choisit dans le select oeuvre
          xhttp.onreadystatechange = function() { // Cela appelle le résultat voulu sous forme de tableau des médias dans la feuille tablemedia.php
            if (this.readyState == 4 && this.status == 200) {
              console.log(this.responseText);
              var tableaum = JSON.parse(this.responseText);
              MyFunction(tableaum);
            }
          };
          var url = "ajaxtable/tablemedia.php?oeuvre="+dansinputo; // Recherche du résultat dans le fichier voulu avec l'id de l'oeuvre
          xhttp.open("GET", url , true);
          xhttp.send();
          function MyFunction(tableaum) {// Le résultat de la demande sera sous forme de balise option avec les informations prise dans tablemedia
            var element = document.getElementById('media');
            outm="";
            for(i=0; i<tableaum.length; i++) {
              if (tableaum[i]['TMedia'] == 'audio') {
                var med = "<audio controls src='img/"+tableaum[i]['exp']+"/"+tableaum[i]['Media']+"'></audio>";
              } else if (tableaum[i]['TMedia'] == 'vidéo') {
                var med = "<video controls width='100%' height='100%'><source src='img/"+tableaum[i]['exp']+"/"+tableaum[i]['Media']+"' type='video/mp4'></video>";
              } else {
                var med = "<img class='img-med' src='img/"+tableaum[i]['exp']+"/"+tableaum[i]['Media']+"' title='"+tableaum[i]['oeuv']+"'></img>";
              }
              outm+= "<div class='artmed'><div class='medoeuv'>"+tableaum[i]['oeuv']+"</div><div class='medimg'>"+med+"</div><a class='icon_hover' href='javascript:confirmation("+tableaum[i]['idm']+")' title='Supprimer "+tableaum[i]['Media']+"'><i class='fas fa-trash-alt fa-2x'></i></a></div>";
            }

            element.innerHTML = outm;
          }
        };

        function confirmation(elem) {
          var msg = "Etes-vous sur de vouloir supprimer ce media ?";
          if (confirm(msg)){
            window.location.href="Suppression/Suppmedia.php?idm="+elem;
          }else{
            window.location.href="GestionMedias.php";
          }
        };
      </script>
    </main>
  </body>
</html>
