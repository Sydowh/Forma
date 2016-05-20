<?php
/**
* Classe d'accès aux données.
* Utilise les services de la classe PDO
* pour l'application Vanille
* Les attributs sont tous statiques,
* les 4 premiers pour la connexion
* $monPdo de type PDO
* $monPdoForma qui contiendra l'unique instance de la classe
*
* @package default
* @author slam5
* @version    1.0

*/

class PdoForma
{
  private static $serveur='mysql:host=gillesfeawgilles.mysql.db';
  private static $bdd='dbname=gillesfeawgilles';
  private static $user='gillesfeawgilles' ;
  private static $mdp='5du8z9pA' ;
  private static $monPdo;
  private static $monPdoForma = null;
  /**
  * Constructeur privé, crée l'instance de PDO qui sera sollicitée
  * pour toutes les méthodes de la classe
  */
  private function __construct()
  {
    PdoForma::$monPdo = new PDO(PdoForma::$serveur.';'.PdoForma::$bdd, PdoForma::$user, PdoForma::$mdp);
    PdoForma::$monPdo->query("SET CHARACTER SET utf8");
  }
  public function _destruct(){
    PdoForma::$monPdo = null;
  }
  /**
  * Fonction statique qui crée l'unique instance de la classe
  *
  * Appel : $instancePdoForma = PdoForma::getPdoForma();
  * @return l'unique objet de la classe PdoForma
  */
  public static function getPdoForma()
  {
    if(PdoForma::$monPdoForma == null)
    {
      PdoForma::$monPdoForma= new PdoForma();
    }
    return PdoForma::$monPdoForma;
  }
  /**
  * Fonction statique vérifie la connexion d'un utilisateur
  *
  * param : $identifiant et $motdepasse
  */

  /**
  * Fonction statique qui inscrit l'inscription d'une association
  *
  * param : $icom, $nomAsso, $nomIntend, $prenomIntend, $mailAsso, $telAsso, $faxAsso, $mdpAsso, $moda
  * @return true ou false en fonction de la creation
  */
  public static function inscriptionAsso($icom,$nomAsso,$nomIntend,$prenomIntend,$mailAsso,$telAsso,$faxAsso,$mdpAsso)
  {
    $req = "INSERT INTO association(NUM_ICOM,NOM_ASSO,NOMINT_ASSO,PRENOMINT_ASSO,COURRIEL_ASSO,TEL_ASSO,FAX_ASSO,DATE_INSCR,MDP_ASSO) VALUES ('$icom','$nomAsso','$nomIntend','$prenomIntend','$mailAsso','$telAsso','$faxAsso', NOW(), '$mdpAsso')";
    PdoForma::$monPdo->exec($req);
  }

  /**
  * Fonction statique qui vérifier les identifiants d'une association
  *
  * param : $identifiant, $motdepasse
  * @return true ou false si les identifiants sont bons
  */
  public static function connexionAsso($identifiant, $motdepasse)
  {
    $req = "SELECT * FROM association WHERE NUM_ICOM='$identifiant' AND MDP_ASSO='$motdepasse'";
    $resultat = PdoForma::$monPdo->query($req);
    $ligne = $resultat->fetch();
    return $ligne;
  }

  /**
  * Fonction statique qui insère un utilisateur dans l'association
  *
  * param : $icomAsso,$nomUtil, $prenomUtil, $typeUtil
  * @return true ou false si l'insertion est faite
  */
  public static function ajoutMembresAsso($icomAsso, $nomUtil, $prenomUtil, $typeUtil)
  {
    $req = "INSERT INTO utilisateur(NUM_ICOM, NOM_UTIL, PRENOM_UTIL, FONC_UTIL) VALUES('$icomAsso', '$nomUtil', '$prenomUtil', '$typeUtil')";
    $resultat = PdoForma::$monPdo->exec($req);
    if($resultat == 1)
    {
      $resultat = true;
    }
    else
    {
      $resultat = false;
    }
    return $resultat;
  }

  /**
  * Fonction statique qui consulte tous les utilisateurs de l'association
  *
  * param : $icomAsso
  * @return un tableau d'enregistrement
  */
  public static function consultMembresAsso($icomAsso)
  {
    $req = "SELECT * FROM utilisateur WHERE NUM_ICOM='$icomAsso'";
    $resultat = PdoForma::$monPdo->query($req);
    $ligne = $resultat->fetchAll();
    return $ligne;
  }

  /**
  * Fonction statique qui supprime un utilisateur dans l'association
  *
  * param : $idUtilisateur
  */
  public static function supprMembreUtilisateur($idUtilisateur)
  {
    $req = "DELETE FROM utilisateur WHERE CODE_UTIL='$idUtilisateur'";
    PdoForma::$monPdo->exec($req);
  }

  /**
  * Fonction statique qui renvoit la liste des domaines
  *
  * @return un tableau d'enregistrement
  */
  public static function consultDomaines()
  {
    $req = "SELECT * FROM DOMAINE";
    $resultat = PdoForma::$monPdo->query($req);
    $ligne = $resultat->fetchAll();
    return $ligne;
  }

  /**
  * Fonction statique qui renvoit la liste des formations en fonction du domaine selectionné
  *
  * @return un tableau d'enregistrement
  */
  public static function consultFormations($codeDom)
  {
    $req = "SELECT * FROM FORMATION WHERE CODE_DOM = $codeDom";
    $resultat = PdoForma::$monPdo->query($req);
    $ligne = $resultat->fetchAll();
    return $ligne;
  }

  /**
  * Fonction statique qui renvoit la liste des sessions
  *
  * @return un tableau d'enregistrement
  */
  public static function consultSessions()
  {
    // Jointure pour récupéré la formation et le domaine
    $req = "SELECT NUM_SESSION, LIBELLE_DOM, LIBELLE_FORM, PLACE_LIBRE, LIEU_SESSION, DATE_HEURE_SESSION FROM session as S, domaine as D, formation as F WHERE S.CODE_DOM = D.CODE_DOM AND S.CODE_FORM = F.CODE_FORM";
    $resultat = PdoForma::$monPdo->query($req);
    $ligne = $resultat->fetchAll();
    return $ligne;
  }

  /**
  * Fonction statique qui renvoit une des sessions
  * param : $idSession
  * @return un tableau d'enregistrement
  */
  public static function consultLaSession($idSession)
  {
    // Jointure pour récupéré la formation et le domaine
    $req = "SELECT * FROM SESSION WHERE NUM_SESSION = '$idSession'";
    $resultat = PdoForma::$monPdo->query($req);
    $ligne = $resultat->fetch();
    return $ligne;
  }

  /**
  * Fonction statique qui insère un utilisateur dans une session
  *
  * param : $utilisateur,$codedom,$codeform,$session
  * @return true ou false si l'insertion est faite
  */
  public static function ajoutMembreSession($utilisateur, $codedom, $codeform, $session)
  {
    // Nb places est-il supérieur a zéro ?
    $req0 = "SELECT PLACE_LIBRE FROM SESSION WHERE NUM_SESSION = '$session'";
    $resultat0 = PdoForma::$monPdo->query($req0);
    $ligne = $resultat0->fetch();
    if($ligne["PLACE_LIBRE"] > 0)
    {
      // Si oui on insére et on -1 nbplaces
      $req1 = "INSERT INTO participe(CODE_UTIL, CODE_DOM, CODE_FORM, NUM_SESSION) VALUES('$utilisateur', '$codedom', '$codeform', '$session')";
      $resultat1 = PdoForma::$monPdo->exec($req1);
      if($resultat1 == 1)
      {
        $req2 = "UPDATE session SET PLACE_LIBRE = PLACE_LIBRE-1 WHERE NUM_SESSION = '$session'";
        PdoForma::$monPdo->exec($req2);
        $resultat1 = "Votre membre a été inscrit à cette session.";
      }
      else
      {
        $resultat1 = "Votre membre est déja inscrit à cete session.";
      }
    }
    else
    {
      $resultat1 = "Il n'y plus de place disponible pour cette session.";
    }
    return $resultat1;
  }
}
?>
