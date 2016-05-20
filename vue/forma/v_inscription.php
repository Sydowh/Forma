<div class="container" id="formInscription">
  <p>Avant d'inscrire votre association veuillez consulter les <a href="index.php?uc=modalites">modalités d'inscription</a>.</p>
  <form action="index.php?uc=inscriptionAsso" method="POST">
    <div class="row">
      <form class="col s12">

        <div class="row">
          <div class="input-field col s6">
            <i class="material-icons prefix">business</i>
            <input id="numIcom" type="text" name="numIcom" length="13" class="validate">
            <label for="numIcom">Numéro ICOM</label>
          </div>
          <div class="input-field col s6">
            <i class="material-icons prefix">sort_by_alpha</i>
            <input id="nomAsso" type="text" name="nomAsso" class="validate">
            <label for="nomAsso">Nom association</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s6">
            <i class="material-icons prefix">account_circle</i>
            <input id="nomIntendant" type="text" name="nomIntendant" class="validate">
            <label for="nomIntendant">Nom intendant</label>
          </div>
          <div class="input-field col s6">
            <i class="material-icons prefix">account_circle</i>
            <input id="prenomIntendant" type="text" name="prenomIntendant" class="validate">
            <label for="prenomIntendant">Prénom intendant</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s6">
            <i class="material-icons prefix">print</i>
            <input type="tel" id="faxAsso" type="tel" name="faxAsso" class="validate">
            <label for="faxAsso">Fax</label>
          </div>
          <div class="input-field col s6">
            <i class="material-icons prefix">phone</i>
            <input type="tel" id="telAsso" type="tel" name="telAsso" class="validate">
            <label for="telAsso">Téléphone</label>
          </div>

        </div>

        <div class="row">
          <div class="input-field col s6">
            <i class="material-icons prefix">email</i>
            <input id="mailAsso" type="email" name="mailAsso" class="validate">
            <label for="mailAsso" data-error="Invalide" data-success="Valide">E-mail</label>
          </div>
          <div class="input-field col s6">
            <i class="material-icons prefix">email</i>
            <input id="remailAsso" type="email" name="remailAsso" class="validate">
            <label for="remailAsso" data-error="Invalide" data-success="Valide">Validation E-mail</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s6">
            <i class="material-icons prefix">https</i>
            <input id="mdpAsso" type="password" name="mdpAsso" length="6" class="validate">
            <label for="mdpAsso">Mot de passe</label>
          </div>
          <div class="input-field col s6">
            <i class="material-icons prefix">https</i>
            <input id="remdpAsso" type="password" name="remdpAsso" length="6" class="validate">
            <label for="remdpAsso">Validation mot de passe</label>
          </div>
        </div>


      </form>
      <p>
        <input type="checkbox" id="valideMod" name="valideMod"/><label for="valideMod">Je reconnais avoir lu et accepté </label><a class="modal-trigger" href="#modal1"> les modalités d'inscription</a><br/>
      </p>
      <button class="btn waves-effect waves-light" type="submit" name="action">Inscrire
      </div>

      <!-- Structure du modal -->
      <div id="modal1" class="modal">
        <div class="modal-content">
          <h4>Modalité d'inscription</h4>
          <p>  senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui.</p>
        </div>
        <div class="modal-footer">
          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Fermer</a>
        </div>
      </div>
    </form>

  </div>
