<?php

//Quelques fonctions natives de PHP pour travailler d'une base à l'autre.

//dec2bin
echo decbin(26) . PHP_EOL;
//bin2dec
echo bindec(10101) . PHP_EOL;
//base2base
echo base_convert('a37', 16, 10) . PHP_EOL;

//Les littéraux de base (binaire, hexa, octal): https://www.php.net/manual/en/language.types.integer.php

//0b101 est un littéral binaire (0b), PHP le convertit directement en binaire en interne et fournit sa valeur en base 10. PHP ne conserve aucune info de base.

$a = 0b101;
$a += 0b1 ;

echo $a . PHP_EOL;
echo $a >> 1 . PHP_EOL;
echo decbin($a) . PHP_EOL;
echo (int)$a . PHP_EOL;
echo intval($a) . PHP_EOL;
