<?php

/**
 * Sur la représentation ASCII
 * @link : https://www.php.net/manual/en/function.ord.php
 * @link : https://www.php.net/manual/en/function.decbin.php
 */

// Représentation 
$letterA = 'A';

//ord retourne le premier octet d'une chaine sous la forme d'un nombre codé sur 8 bits (entre 0 et 255)
//Code ASCII (compris entre 0 et 127, sur 7 bits), ie la position sur dans la table ASCII (character'set)
$asciiCode = ord($letterA);

var_dump($asciiCode);

//decbin retourne une chaine de caractère représentant le nombre binaire du chiffre (base 10) passé en argument
$binaryRepresentationOfA = decbin($asciiCode);

//Représentation binaire de la lettre 'A'
var_dump($binaryRepresentationOfA);