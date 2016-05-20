<?php
if($_REQUEST["uc"] == "connexionAsso")
{
  // Connexion de l'association
  if(!isset($_SESSION['connexion']))
  {
    // On stocke les paramètres
    $identifiant = $_POST["identifiant"];
    $motdepasse = $_POST["motdepasse"];
    // On vérifier les paramètres
    if(!empty($identifiant) && !empty($motdepasse))
    {
      $connexion = $pdo->connexionAsso($identifiant, $motdepasse);
      if(!empty($connexion))
      {
        // Connexion validée
        $_SESSION['connexion'] = "on";
        // Récupération des données de l'utilisateur et de son association
        $_SESSION['prenomnomIntend'] = $connexion["PRENOMINT_ASSO"] . " " . $connexion["NOMINT_ASSO"];
        $_SESSION['nomAsso'] = $connexion["NOM_ASSO"];
        $_SESSION['icomAsso'] = $connexion["NUM_ICOM"];
        header("location: index.php?uc=accueil");
        //var_dump($connexion);
      }
      else
      {
        $message = 'Erreur d\'identifiant ou de mot de passe<br />Si vous n\'êtes pas redirigé vers la page de connexion <a href="index.php?uc=seConnecter">cliquez-ici</a>';
        header("refresh:1.5;url=index.php?uc=seConnecter");
      }
    }
    else
    {
      // Message car les champs ne sont pas tous remplis
      $message = "Vous n'avez pas remplis tout les champs";
    }
  }
  else
  {
    include("vue/FORMA/v_interfaceAsso.php");
  }
}



if(isset($message))
{
  echo $message;
}

?>
