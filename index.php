<?php
session_start();
require_once("modele/forma/fonctions.inc.php");
require_once("modele/forma/class.pdoForma.inc.php");
require_once("vue/forma/v_entete.php");

if(!isset($_REQUEST['uc']))
{
	$uc = 'accueil';
}
else
{
	$uc = $_REQUEST['uc'];
}
if(isset($_SESSION['connexion']))
{
	include("vue/forma/v_headerAsso.php");
}
else {
	include("vue/forma/v_header.php");
}
/* Création d'une instance d'accès à la base de données */
$pdo = PdoForma::getPdoForma();
switch($uc)
{
	case 'accueil':
	{
		if(isset($_SESSION['connexion']))
		{
			include("vue/forma/v_interfaceAsso.php");
		}
		else
		{
			include("vue/forma/v_accueil.php");
		}
		break;
	}

	case 'sInscrire':
	{
		include("vue/forma/v_inscription.php");
		break;
	}

	case 'inscriptionAsso':
	{
		include("controleur/forma/c_inscriptionAsso.php");
		break;
	}
	case 'validationinscriptionAsso':
	{
		include("controleur/forma/c_validationinscriptionAsso.php");
		break;
	}
	case 'modalites':
	{
		include("vue/forma/v_modalites.php");
		break;
	}

	case 'seConnecter':
	{
		include("vue/forma/v_connexion.php");
		break;
	}

	case 'connexionAsso':
	{
		include("controleur/forma/c_connexionAsso.php");
		break;
	}

	case 'seDeconnecter':
	{
		session_destroy();
		header('Location: index.php');
		break;
	}

	case 'ajoutMembresAsso':
	{
		include("controleur/forma/c_ajoutUtilisateurAsso.php");
		break;
	}

	case 'supprUtilisateurAsso':
	{
		include("controleur/forma/c_supprUtilisateurAsso.php");
		break;
	}

	case 'inscriptionSessions':
	{
		include("controleur/forma/c_inscriptionSessions.php");
		break;
	}

	case 'panelAdmin':
	{
		include("vue/FORMA/v_administration.php");
		break;
	}
}
include("vue/forma/v_footer.php") ;
?>
