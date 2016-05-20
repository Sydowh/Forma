<div class="" id="ajoutMembresAsso">
  <form method="POST" action="index.php?uc=ajoutMembresAsso">
    <div class="row">
      <div class="col s6">
        <div class="card medium">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="img/utilisateur.jpg">
          </div>
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">Inscription membre<i class="material-icons right">more_vert</i></span>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Inscription membre<br />
              <label>Uniquements les bénévoles ou salariés de votre association :</label>
              <i class="material-icons right">close</i>
            </span>
            <div class="input-field col s6">
              <i class="material-icons prefix">business</i>
              <input id="nomUtil" type="text" name="nomUtil" class="validate">
              <label for="nomUtil">Nom</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">sort_by_alpha</i>
              <input id="prenomUtil" type="text" name="prenomUtil" class="validate">
              <label for="prenomUtil">Prénom</label>
            </div>
            <br/><p>Catégorie membre</p>
            <ul class="collection">
              <li class="collection-item">
                <p>
                  <input class="with-gap" name="typeUtil" type="radio" value="Salarié" id="salarie"  />
                  <label for="salarie">Salarié</label>
                </p>
              </li>
              <li class="collection-item">
                <p>
                  <input class="with-gap" name="typeUtil" type="radio" value="Bénévole" id="benevole"  />
                  <label for="benevole">Bénévole</label>
                </p>
              </li>
            </ul>
            <button class="btn waves-effect waves-light" type="submit" name="action">Ajout
            </div>
          </div>
        </div>
      </form>

      <div class="" id="inscriptionSessions">
        <form method="POST" action="index.php?uc=inscriptionSessions">
          <div class="row">
            <div class="col s6">
              <div class="card medium">
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="img/meeting.jpg">
                </div>
                <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4">Inscription session<i class="material-icons right">more_vert</i></span>
                </div>
                <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4">Inscription session<i class="material-icons right">close</i></span>
                  <div class="input-field col s6">
                    <p>Sélectionner le domaine dans lequel inscrire des membres :</p>
                    <select name="choixSession" class="browser-default">
                      <?php
                      $lesSessions = $pdo->consultSessions();
                      foreach($lesSessions as $session)
                      {
                        echo '<option value="' . $session['NUM_SESSION'] . '">' . $session['LIBELLE_DOM'] . ' : ' . $session['LIBELLE_FORM'] . ' : ' . $session['PLACE_LIBRE'] . ' places restantes</option>';
                      }
                      ?>
                    </select>
                    <select name="choixUtilisateur" class="browser-default">
                      <?php
                      $lesUtilisateursInscriptions = $pdo->consultMembresAsso($_SESSION['icomAsso']);
                      foreach($lesUtilisateursInscriptions as $utilisateurInscriptions)
                      {
                        echo '<option value="' . $utilisateurInscriptions['CODE_UTIL'] . '">' . $utilisateurInscriptions['PRENOM_UTIL'] . ' ' . $utilisateurInscriptions['NOM_UTIL'] . '</option>';
                      }
                      ?>
                    </select>
                    <button class="btn waves-effect waves-light" type="submit" name="action2">Inscription
                    </div>
                  </div>
                </div>
              </div>
            </form>



            <div class="row">
              <div class="col s6">
                <div class="card medium">
                  <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="img/modification.png">
                  </div>
                  <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Modification association<i class="material-icons right">more_vert</i></span>
                  </div>
                  <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Modification membre<i class="material-icons right">close</i></span>
                    <div class="input-field col s6">
                      <i class="material-icons prefix">business</i>
                      <input id="nomUtil" type="text" name="nomUtil" class="validate">
                      <label for="nomUtil">Nom utilisateur</label>
                    </div>
                    <div class="input-field col s6">
                      <i class="material-icons prefix">sort_by_alpha</i>
                      <input id="prenomUtil" type="text" name="prenomUtil" class="validate">
                      <label for="prenomUtil">Prénom utilisateur</label>
                    </div>
                    <ul class="collection">
                      <li class="collection-item">
                        <p>
                          <input class="with-gap" name="typeUtil" type="radio" id="salarie"  />
                          <label for="salarie">Salarié</label>
                        </p>
                      </li>
                      <li class="collection-item">
                        <p>
                          <input class="with-gap" name="typeUtil" type="radio" id="benevole"  />
                          <label for="benevole">Bénévole</label>
                        </p>
                      </li>
                    </ul>
                    <button class="btn waves-effect waves-light" type="submit" name="action3">Connexion
                    </div>
                  </div>
                </div>

                <div class="col s6">
                  <form method="POST" action="index.php?uc=supprUtilisateurAsso">
                    <div class="card medium">
                      <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="img/delete.png">
                      </div>
                      <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Suppression membre<i class="material-icons right">more_vert</i></span>
                      </div>
                      <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Suppression membre<i class="material-icons right">close</i></span>
                        <label>Choisissez le membre à supprimer :</label>
                        <select name="supprUtilisateurAsso" class="browser-default">
                          <?php
                          $lesUtilisateurs = $pdo->consultMembresAsso($_SESSION['icomAsso']);
                          foreach($lesUtilisateurs as $utilisateur)
                          {
                            echo '<option value="' . $utilisateur['CODE_UTIL'] . '">' . $utilisateur['PRENOM_UTIL'] . ' ' . $utilisateur['NOM_UTIL'] . '</option>';
                          }
                          ?>
                        </select>
                        <!-- Confirmation de suppression -->
                        <div class="switch">
                          <label>Veuillez confirmer votre suppresion :</label>
                          <label>
                            Non
                            <input name="confirmationSupp" type="checkbox">
                            <span class="lever"></span>
                            Oui
                          </label>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="action4">Suppression
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
