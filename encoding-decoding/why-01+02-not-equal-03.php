<?php

/*
   Programme qui discute pourquoi 0.1 + 0.2 n'est pas égal à 0.3 sur un ordinateur utilisant la base 2 pour encoder de l'information
*/

echo (0.1 + 0.2) == 0.3 ? 'Oui' : 'Non !' . PHP_EOL;
/*
   Pourquoi ? Vu en cours. Raison fondamentale : encodage en base 2. 0.1, 0.2 ou 0.3 ne peuvent pas être représentés
   avec un nombre fini de chiffres en base 2, comme 1/3 ne peut l'être en base 10
*/

//Inspectons plus précisemment les valeurs
echo number_format(0.1 + 0.2, 22). PHP_EOL;

//Solution pour comparer des nombres flottants : définir une précision

//Précision (epsilon, un tout petit nombre)
$eps = 1e-10;

$a = 0.1 + 0.2;

//Si |a-b|<eps, on les considère égaux.
echo ( abs($a - 0.3) < $eps) ? 'Oui !' : 'Non !' .PHP_EOL;
