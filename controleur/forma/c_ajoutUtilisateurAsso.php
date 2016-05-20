<?php
if(!empty($_SESSION['icomAsso']) && !empty($_POST["nomUtil"]) && !empty($_POST["prenomUtil"]) && !empty($_POST["typeUtil"]))
{
  // Récupération des variables
  $icomAsso = $_SESSION['icomAsso'];
  $nomUtil = $_POST["nomUtil"];
  $prenomUtil = $_POST["prenomUtil"];
  $typeUtil = $_POST["typeUtil"];
  // Exécution de la requête d'insertion
  if($pdo->ajoutMembresAsso($icomAsso, $nomUtil, $prenomUtil, $typeUtil))
  {
    echo "Votre membre " . $nomUtil . " " . $prenomUtil . " a été ajouté";
  }
  else {
    echo "L'utilisateur n'a pas pu être enregistré";
  }
}
else
{
  echo "Vous n'avez pas remplis tous les champs";
}
?>
