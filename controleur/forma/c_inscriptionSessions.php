<?php
// Récupération des varoables
$idSession = $_POST["choixSession"];
$lasession = $pdo->consultLaSession($idSession);
$utilisateur = $_POST["choixUtilisateur"];
$codeDom = $lasession["CODE_DOM"];
$codeForm = $lasession["CODE_FORM"];
// Inscription à la session
$inscription = $pdo->ajoutMembreSession($utilisateur, $codeDom, $codeForm, $idSession);
echo $inscription;

?>
