<?php  require_once 'header.php'; ?>
      <div class="user3 clearfix">
        <div class="user_way">
          <div class="user_way-link">
            <a href="GestionOeuvres.php" alt="Retour Oeuvres"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Oeuvres</a>
          </div>
          <div class="cadre3 vue">
            <img src="img/oeuvres.jpg" />
            <a href="CreationOeuv.php" title="Création Oeuvre"><div class="cachee">
              <h2>Création Oeuvre</h2>
            </div></a>
          </div>
          <div class="cadre3 vue">
            <i class="fas fa-qrcode fa-10x"></i>
            <a href="Flashcode.php" title="Flashcode"><div class="cachee">
              <h2>Flashcode</h2>
            </div></a>
          </div>
        </div>
        <div class="cadre4">
          <h3>Les Oeuvres</h3>
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
          <table id="oeuvres" style="width:95%" method="post">
            <h3>Les Oeuvres</h3>
              <tr>
                <th class="titre1"><span>Oeuvres</span></th>
                <th class="titre2"><span>Modifier</span></th>
                <th class="titre3"><span>Supprimer</span></th>
                <th class="titre4"><span>Imprimer</span></th>
              </tr>
            <tbody id="taboeuvre">
            </tbody>
          </table>
        </div>
      </div>
      <script type="text/javascript">
        function LoadDoc() {
          var xhttp = new XMLHttpRequest();
          var dansinput = document.getElementById('expo').value;
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              console.log(this.responseText);
              var tableau = JSON.parse(this.responseText);
              MyFunction(tableau);
            }
          };
          var url = "ajaxtable/tableoeuvre.php?expo="+dansinput;
          xhttp.open("GET", url , true);
          xhttp.send();
          function MyFunction(tableau) {
            var element = document.getElementById('taboeuvre');
            out="";
            for(i=0; i<tableau.length; i++) {
              out+="<tr><td><span>"+tableau[i]['Oeuvre']+"</span><span><img class='img-tab' src='img/"+tableau[i]['exp']+"/"+tableau[i]['img']+"' title='"+tableau[i]['Oeuvre']+"'></img></span></td><td><a class='icon_hover' href='Modifoeuvre.php?ido="+tableau[i]['id']+"' title='Modifier "+tableau[i]['Oeuvre']+"'><i class='fas fa-pencil-alt fa-2x'></i></a></td><td><a class='icon_hover' href='javascript:confirmation("+tableau[i]['id']+")' title='Supprimer "+tableau[i]['Oeuvre']+"'><i class='fas fa-trash-alt fa-2x'></i></a></td><td class='drapeau'><a class='icon_hover' href='Printoeuvfr.php?ido="+tableau[i]['id']+"'><img src='img/france.png' title='Français'></a><a class='icon_hover' href='Printoeuven.php?ido="+tableau[i]['id']+"'><img src='img/unitedkingdom.png' title='Anglais'></a><a class='icon_hover' href='Printoeuvall.php?ido="+tableau[i]['id']+"'><img src='img/germany.png' title='Allemand'></a></td></tr>";
            }
            element.innerHTML = out;
          }
        };

        function confirmation(elem) {
          var msg = "Etes-vous sur de vouloir supprimer cette oeuvre ?";
          if (confirm(msg)){
            window.location.href="Suppression/Suppoeuv.php?ido="+elem;
          }else{
            window.location.href="Oeuvres.php";
          }
        };
      </script>
    </main>
  </body>
</html>
