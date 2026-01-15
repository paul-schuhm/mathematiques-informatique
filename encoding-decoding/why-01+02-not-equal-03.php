<?php

echo (0.1 + 0.2) == 0.3 ? 'Oui' : 'Non !' . PHP_EOL;
//Pourquoi ? Vu en cours. Raison fondamentale : encodage en base 2.

//Inspectons plus précisemment les valeurs
echo number_format(0.1 + 0.2, 22). PHP_EOL;

//Solution :
//Définir une précision
$eps = 1e-10;

$a = 0.1 + 0.2;

echo ( abs($a - 0.3) < $eps) ? 'Oui !' : 'Non !' .PHP_EOL;
