<?php

/*
   This program convert binary number to decimal number from the command line.
*/

echo "Binary 2 Decimal converter\n";
echo "Enter an empty number to stop the program (or Ctr + D)\n";

function bin2dec(string $binary): int{

  //Validation input et gestion des erreurs : Check que des 0 et 1 dans la chaine
  foreach(str_split($binary) as $bit){
    if(!in_array($bit, ['0', '1'])){
      echo "Error ! Invalid binary number $ans. The number should contains only 0 or 1" . PHP_EOL;
      exit(1);
    }
  }

  $decimal = 0;
  $max_power = strlen($binary) - 1;

  for($i = 0; $i < strlen($binary) ; $i++){
    $decimal += $binary[$i] * pow(2, $max_power - $i);
  }

  return $decimal ;

}


do{
  $ans = readline("Enter a (positive) binary number : ");
  $binary = $ans;
  $decimal = bin2dec($binary);
  echo "Decimal : $decimal" . PHP_EOL;
}while($ans != false);




