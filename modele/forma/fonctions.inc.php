<?php
/* Traduit une date au format US vers le format FR */
	function dateUS_toFR($dateUS)
	{
		$dateUS = explode(' ' , $dateUS);
		$tabDate = explode('-' , $dateUS[0]);
	  $dateenFR = $tabDate[2].'/'.$tabDate[1].'/'.$tabDate[0] . ' ' . $dateUS[1];
	  return $dateenFR;
	}


	/* Traduit une date au format FR vers le format US */
	function dateFR_toUS($dateFR)
	{
		list($jour, $mois, $annee) = split('[/.]', $dateFR);
		$dateUS=$annee."-".$mois."-".$jour;
		return $dateUS;
	}
	?>
