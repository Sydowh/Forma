<div class="container" id="formConnexion">
  <form method="POST" action="index.php?uc=connexionAsso">
    <div class="row">
      <form class="col s12">
        <div class="row">
          <div class="input-field col s4">
            <i class="material-icons prefix">perm_identity</i>
            <input id="identifiant" type="text" name="identifiant" class="validate">
            <label for="first_name">Identifiant</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s4">
            <i class="material-icons prefix">vpn_key</i>
            <input id="motdepasse" type="password" name="motdepasse" class="validate">
            <label for="motdepasse">Mot de passe</label>
          </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Connexion
        </form>
      </div>
    </form>
  </div>
