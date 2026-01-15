<?php

/*
   Ce programme convertit un ou plusieurs nombres entiers positifs exprimé en base 10 en nombre binaire (base 2).
   usage : php decimal2binary.php 12 6 125 8
   Exercice : Complèter le programme pour qu'il puisse convertir un nombre flottant (par ex 12.25)
 */

if(!isset($argv[1])){
  exit("Fournir au moins un nombre en base 10 à convertir. Usage : php decimal2binary.php 12 100 3");
}

$numbers_to_convert = [];

//Filtrer les inputs fournis par l'utilisateur
//Pointeur sur chaque input
$input = 1;
while(isset($argv[$input])){
  $number = $argv[$input];
  //Ignore nombre négatif ou nombre décimal
  if($number >= 0 && intval($number) == $number)
    $numbers_to_convert[] = intval($argv[$input]);
  $input++;
}

foreach($numbers_to_convert as $number){
  //Conversion a lieu ici
  //Exercice : restructurer le code ci dessous pour extraire la fonction 'dec2bin(int $input): string' réalisant la conversion

  $decimal = $number;

  //stocker le résultat de la conversion
  $binary = "";

  do{
    $binary .= $decimal % 2 ;
    $decimal = intdiv($decimal, 2);

  }while($decimal != 0);

  //Reverse la chaine pour obtenir le nombre en base 2.
  //Algo : Reverse 'sur place' (en modifiant la chaine existante). Swap symétrique entre deux pointeurs i et j : [i][][][j]  -> [r][i][j][r] -> [r][r][r][r]
  $size = strlen($binary);
  //répeter TAILLE - 1 fois, sinon on fait un tour complet et laisse la chaine inchangée !
  for ($i = 0, $j = $size - 1; $i < $j; $i++, $j--) {
    $tmp = $binary[$i];
    $binary[$i] = $binary[$j];
    $binary[$j] = $tmp;
  }

  //Ou utiliser la fonction native php strrev()
  //$binary = strrev($binary);

  echo "$number vaut $binary en base 2" . PHP_EOL;
}
