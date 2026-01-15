<?php

//Ce programme convertit un nombre binaire en base décimale.

//type 'string'
$input = '100000';

//str_split(string) : array
//Valide input (gestion des erreurs) : l'input doit contenir que des 0 ou des 1
foreach(str_split($input) as $char){
	if($char != '0' && $char != '1'){
		//Fonction qui termine le programme (peut afficher un message).
		//Ecrit sur la sortie standard (STDOUT)
	        echo "Nombre binaire invalide.";
		exit(1);
	} 
}

$binary = $input;
$max_power = strlen($binary);
$decimal = 0 ;
for($i = 0 ; $i < $max_power; $i++){
	$decimal += $binary[$i] * pow(2, $max_power -1 - $i );
}

echo $decimal;


