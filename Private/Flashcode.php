<?php  require_once 'header.php'; ?>
      <div class="user3 clearfix">
        <div class="user_way">
          <div class="user_way-link">
            <a href="GestionOeuvres.php" alt="Retour Oeuvres"><i class="fas fa-arrow-alt-circle-left"></i> Retour Gestion des Oeuvres</a>
          </div>
          <div class="user_way-link">
            <a href="Oeuvres.php" alt="Retour Oeuvres"><i class="fas fa-arrow-alt-circle-left"></i> Retour Administration des Oeuvres</a>
          </div>
          <div class="cadre3 vue">
            <i class="fas fa-qrcode fa-10x"></i>
            
          </div>
        </div>
        <div class="cadre4">
          <h3>Flashcode des Oeuvres selon Exposition</h3>
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
                <th class="titre4"><span>FlashCode</span></th>
              </tr>
            <tbody id="tabflash">
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
          var url = "ajaxtable/tableflash.php?expo="+dansinput;
          xhttp.open("GET", url , true);
          xhttp.send();
          function MyFunction(tableau) {
            var element = document.getElementById('tabflash');
            out="";
            for(i=0; i<tableau.length; i++) {
              if (tableau[i]['Flash']=="No QR-Code") {
                var QRCode="<span class='qr-code-style'><a href='qrcode.php?ido="+tableau[i]['id']+"' title='Création du QR-Code'>Pas de QR-Code, Merci d'en créer un en cliquant ici</a></span>";
              } else {
                var QRCode="<img class='img-tab' src='img/flashcode/"+tableau[i]['Flash']+"' title='QR Code "+tableau[i]['Oeuvre']+"'></img>"
              }
              out+="<tr><td><span>"+tableau[i]['Oeuvre']+"</span><span><img class='img-tab' src='img/"+tableau[i]['exp']+"/"+tableau[i]['img']+"' title='"+tableau[i]['Oeuvre']+"'></img></span></td><td>"+QRCode+"</td></tr>";
            }
            element.innerHTML = out;
          }
        };

      </script>
    </main>
  </body>
</html>
