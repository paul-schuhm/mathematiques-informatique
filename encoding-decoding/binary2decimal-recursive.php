<?php

/*
   This program convert binary number to decimal number from the command line. Recursive version.
 */

echo "Binary 2 Decimal converter\n";
echo "Enter an empty number to stop the program (or Ctr + D)\n";

function bin2dec(string $binary, int $position = 0): int{

  if($position === strlen($binary))
    return 0;

  $decimal = $binary[$position] * pow(2, strlen($binary) - $position - 1 );

  return $decimal + bin2dec(substr($binary, $position + 1));
}


do{
  $ans = readline("Enter a (positive) binary number : ");
  $binary = $ans;
  $decimal = bin2dec($binary);
  echo "Decimal : $decimal" . PHP_EOL;
}while($ans != false);




