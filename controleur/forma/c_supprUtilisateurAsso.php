<?php
// On récupère l'id de l'employe selectionné
$idUtilisateur = $_POST["supprUtilisateurAsso"];
// Suppression de l'utilisateur
if(isset($_POST["confirmationSupp"]))
{
  $pdo->supprMembreUtilisateur($idUtilisateur);
  echo "Le membre a bien été supprimé";
}
else
{
  echo "Veuillez confirmer la suppresion";
}
?>
