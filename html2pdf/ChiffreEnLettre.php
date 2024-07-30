<?php

// fonction pour transformer les montants chiffre => montant en lettre
function convertir($Montant,$Monnaie,$Langue){

	// Valeur en anglais et en français
	if ($Langue == "en"){
		$grade = array(0 => "Zero ",1=>" Billions ",2=>" Millions ",3=>" Thousands ");
	}else{
		$grade = array(0 => "Zero ",1=>" Milliards ",2=>" Millions ",3=>" Mille ");
	}
	
	// les différente Monnaie
	if ($Monnaie == "Ar"){
		$Mon = array(0=>" Ariary",1=>" Ariary",2=>" Ariary",3=>" Ariary");
	}elseif ($Monnaie == "CAD"){
		$Mon = array(0=>" Dollar",1=>" Dollars",2=>" Cent",3=>" Cents");
	}elseif ($Monnaie == "GBP"){
		$Mon = array(0=>" Pound",1=>" Pounds",2=>" Penny",3=>" Pence");
	}else{
		$Mon = array(0=>" Euro",1=>" Euros",2=>" Cent",3=>" Cents");
	}

	// Mise au format pour les chéque et le SWI

	$Montant = number_format($Montant,2,".","");

	// Si montant = Zero
	if ($Montant == 0){
		$result = $grade[0].$Mon[0];
	}else{

		$result = "";

		// Calcule des Unités
		$montant = intval($Montant);

		// Calcule des centimes
		$centime = round(($Montant * 100) - ($montant * 100),0);

		// Traitement pour les Milliards
		$nombre = $montant / 1000000000;
		$nombre = intval($nombre);
		if ($nombre > 0){
			if ($nombre > 1){
				$result = $result.cenvtir($nombre,$Langue).$grade[1];
			}else{
				if ($Langue == "en"){
					$result = $result." One ".$grade[1];
					$result = substr($result,0,13)." ";
				}else{
					$result = $result." Un ".$grade[1];
					$result = substr($result,0,13)." ";
				}
			}
			$montant = $montant - ($nombre * 1000000000);
		}

		// Traitement pour les Millions
		$nombre = $montant / 1000000;
		$nombre = intval($nombre);
		if ($nombre > 0){
			if ($nombre > 1){
				$result = $result.cenvtir($nombre,$Langue).$grade[2];
			}else{
				if ($Langue == "en"){
					$result = $result." One ".$grade[2];
					$result = substr($result,0,13)." ";
				}else{
					$result = $result." Un ".$grade[2];
					$result = substr($result,0,12)." ";
				}
			}
			$montant = $montant - ($nombre * 1000000);
		}

		// Traitement pour les Milliers
		$nombre = $montant / 1000;
		$nombre = intval($nombre);
		if ($nombre > 0){
			if ($nombre > 1){
				$result = $result.cenvtir($nombre,$Langue).$grade[3];
			}else{
				if ($Langue == "en"){
					$result = $result." One ".$grade[3];
					$result = substr($result,0,12)." ";
				}else{
					$result = $result.$grade[3];
				}
			}
			$montant = $montant - ($nombre * 1000);
		}

		// Traitement pour les Centaines & centimes
		$nombre = $montant;
		if ($nombre>0){
			$result = $result.cenvtir($nombre,$Langue);
		}

		// Traitement si le montant = 1
		if ((substr($result,0,6) == " et Un" and strlen($result) == 6) or (substr($result,0,4) == " One" and strlen($result) == 4)){
			if ($Langue != "en"){
				$result = substr($result,3,3);
			}
			$result = $result.$Mon[0];
			if (intval($centime) != 0){
				$differ = cenvtir(intval($centime),$Langue);
				if (substr($differ,0,6) == " et Un" or substr($differ,0,4) == " One"){
					if ($result != ""){
						if ($Langue == "en"){
							$differ = " and ".$differ;
						}
					}else{
						if ($Langue != "en"){
							$differ = substr($differ,3);
						}
					}
					$result = $result." ".$differ.$Mon[2];
				}else{
					if ($Langue != "en"){
						$result = $result." et ".$differ.$Mon[3];
					}else{
						$result = $result." and ".$differ.$Mon[3];
					}
				}
			}
		// Traitement si le montant > 1 ou = 0
		}else{
			if ($result != ""){
				$result = $result.$Mon[1];
			}
			if (intval($centime) != 0){
				$differ = cenvtir(intval($centime),$Langue);
				if (substr($differ,0,6) == " et Un" or substr($differ,0,4) == " One"){
					if ($result != ""){
						if ($Langue == "en"){
							$differ = " and ".$differ;
						}
					}else{
						if ($Langue != "en"){
							$differ = substr($differ,3);
						}
					}
					$result = $result." ".$differ.$Mon[2];
				}else{
					if ($result != ""){
						if ($Langue != "en"){
							$result = $result." et ".$differ.$Mon[3];
						}else{
							$result = $result." and ".$differ.$Mon[3];
						}
					}else{
						$result = $differ.$Mon[3];
					}
				}
			}
		}
	}
	return $result;
}

// fonction de convertion d'un chiffre à 3 digits en lettre
function cenvtir($Valeur,$Langue){

	$code = "";

	if ($Langue == "en"){

		//text en claire pour l'anglais
		$SUnit = "One      Two      Three    Four     Five     Six      Seven    Eight    Nine     Ten      Eleven   Twelve   Thirteen Fourteen Fifteen  Sixteen  SeventeenEighteen Nineteen ";
		$SDiz = "Twenty Thirty Forty  Fifty  Sixty  SeventyEighty Ninety ";

		if ($Valeur>99) {
			$N1= intval($Valeur/100);
			if ($N1>1){
				$code = $code.trim(substr($SUnit,($N1-1)*9,9));
			}
			$Valeur = $Valeur - ($N1*100);
			if ($code != ""){
				$code = $code." Hundreds ";
			}else{
				$code = " One Hundred ";
			}
		}
		if ($Valeur != 0){
			if ($Valeur > 19) {
				$N1 = intval($Valeur/10);
				$code = $code.trim(substr($SDiz,($N1-2)*7,7));

				$N1 = intval($Valeur/10)*10;
				$Valeur = $Valeur - $N1;
			}
			if ($Valeur > 0){
				$code = $code." ".trim(substr($SUnit,(intval($Valeur)-1)*9,9));
			}

		}
	}else{

		//text en claire pour le français
		$SUnit = "et Un   Deux    Trois   Quatres Cinq    Six     Sept    Huit    Neuf    Dix     Onze    Douze   Treize  QuatorzeQuinze  Seize   Dix-SeptDix-HuitDix-Neuf";
		$SDiz = "Vingt       Trente      Quarante    Cinquante   Soixante    Soixante    Quatre VingtQuatre Vingt";

		if ($Valeur>99) {
			$N1= intval($Valeur/100);
			if ($N1>1){
				$code = $code.trim(substr($SUnit,($N1-1)*8,8));
			}
			$Valeur = $Valeur - ($N1*100);
			if ($code != ""){
				$code = $code." Cents ";
			}else{
				$code = " Cent ";
			}
		}
		if ($Valeur != 0){
			if ($Valeur > 19) {
				$N1 = intval($Valeur/10);
				$code = $code.trim(substr($SDiz,($N1-2)*12,12));

				$N1 = intval($Valeur/10)*10;
				if (($Valeur>=70) and($Valeur<80)or($Valeur>=90)){
					$Valeur = $Valeur + 10;
				}
				$Valeur = $Valeur - $N1;
			}
			if ($Valeur > 0){
				$code = $code." ".trim(substr($SUnit,(intval($Valeur)-1)*8,8));
			}

		}
	}
	return $code;
}

?>