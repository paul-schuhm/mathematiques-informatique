<?php

/**
 * PHP utilise le format floating point number sur 64 bits définis par le standard IEEE754
 * @see : https://docs.oracle.com/cd/E19957-01/806-3568/ncg_goldberg.html
 * @see : https://www.php.net/manual/fr/language.types.float.php
 * @see : https://floating-point-gui.de/basic/
 */

// 0.1 et 0.2 n'ont pas de représentation exacte en binaire (séq infinie). Le résultat est donc arrondi et surprenant
var_dump(0.1 + 0.2);
// Car 0.8 ne peut être représenté de manière exacte en binaire (séq infinie, comme 0.1 ou 0.7)
// O.1 + 0.7 < 0.8 et le résultat est surprenant.
var_dump(floor((0.1 + 0.7) * 10));

var_dump(floor(-2.5), round(-2.5), ceil(-2.5));

