<?php
if($_REQUEST["uc"] == "inscriptionAsso")
{
    // Inscription de l'association
    // On stocke les paramètres
    $numIcom = $_POST["numIcom"];
    $nomAsso = $_POST["nomAsso"];
    $nomIntendant = $_POST["nomIntendant"];
    $prenomIntendant = $_POST["prenomIntendant"];
    $mailAsso = $_POST["mailAsso"];
    $remailAsso = $_POST["remailAsso"];
    $telAsso = $_POST["telAsso"];
    $faxAsso = $_POST["faxAsso"];
    $mdpAsso = $_POST["mdpAsso"];
    $remdpAsso = $_POST["remdpAsso"];
    // On vérifier les paramètres
    if(isset($_POST["valideMod"]))
    {
        if(!empty($numIcom) && !empty($nomAsso) &&  !empty($nomIntendant) && !empty($prenomIntendant) && !empty($mailAsso) && !empty($telAsso) && !empty($faxAsso) && !empty($mdpAsso) && !empty($remailAsso) && !empty($remdpAsso))
        {
            if($remailAsso == $mailAsso)
            {
                if($remdpAsso == $mdpAsso)
                {
                    // On peut lancer la requête
                    $pdo->inscriptionAsso($numIcom, $nomAsso, $nomIntendant, $prenomIntendant, $mailAsso, $telAsso, $faxAsso, $mdpAsso);
                    $message = "Votre association a bien été enregristré";
                }
                else
                {
                    $message = "Veuillez entrer deux fois le même mot de passe";    
                }
            }
            else
            {
                $message = "Veuillez entrer deux fois le même mail";
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
        $message = "Vous n'avez pas validé les modalités d'inscription pour votre association";
    }
    if(isset($message))
    {
        echo $message;
    }
}
?>