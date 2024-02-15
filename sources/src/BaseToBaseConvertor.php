<?php

namespace Paul\Calculators;

class BaseToBaseConvertor
{

    /**
     * Retourne un tableau dont chaque élément est un 'chiffre' positionné, pouvant s'étendre sur plusieurs
     * caractères. En effet, au delà de la base 10, il faut un symbole spécial pour représenter le chiffre sur une
     * seule position. On choisit ici de le représenter par une représentation décimale entre crochets. 
     * Par exemple, '10' en base 10 est représenté par '[10]' en base 11 ou supérieure à 10. Cette convention est semblable a choisir une lettre à la place. Il faut donc faire attention que ces chiffres ne soient pas interprétés sur plusieurs positions
     * mais bien sur une seule.
     * @param string Le nombre a découper
     * @return array Un tableau contenant un chiffre (possiblement sur plusieurs caractères) à chaque position
     */
    public function digitsOf(string $number): array
    {

        $posOpeningBracket = strpos($number, '[');
        $posClosingBracket = strpos($number, ']');

        if ($posOpeningBracket !== false && $posClosingBracket === false) {
            throw new \Exception(sprintf("Symbole %s mal formé. Il manque un crochet fermant ']'", $number));
        }

        if ($posClosingBracket !== false && $posOpeningBracket === false) {
            throw new \Exception(sprintf("Symbole %s mal formé. Il manque un crochet ouvrant '['", $number));
        }

        $numberIsSymbol = $posClosingBracket !== false && $posOpeningBracket !== false;

        if ($numberIsSymbol) {

            $symbol = substr($number, $posOpeningBracket + 1, $posClosingBracket - $posOpeningBracket - 1);

            if (empty($symbol)) {
                throw new \Exception(sprintf("Symbole %s mal formé. Le symbole ne peut pas être vide", $number));
            }

            $digits = array($symbol);
        } else {

            $digits =  str_split($number);
        }

        return $digits;
    }

    /**
     * Convertit un nombre exprimé dans la base $originBase, représenté sous forme d'une chaîne
     * de caractères, en nombre exprimé en base 10.
     * @param string $number Le nombre à convertir en base 10
     * @param int $originBase La base dans lequel $number est exprimé
     * @return string
     */
    public function convertFromBaseToDecimal(string $number, int $originBase): string
    {
        $digits = $this->digitsOf($number);

        $maxPower = count($digits) - 1;

        $decimalNumber = 0;

        foreach ($digits as $position => $digit) {
            $power = $maxPower - $position;
            $decimalNumber += intval($digit) * pow($originBase, $power);
        }

        return strval($decimalNumber);
    }

    /**
     * Convertit un nombre décimal (base 10) en un nombre dans une base $targetBase
     * sous forme de chaîne de caractère.
     * @param int $number L'entier naturel à convertir
     * @param int $targetBase La base cible
     * @return string
     */
    public function convertFromDecimalTo(int $number, int $targetBase): string
    {
        //On garde une copie du nombre original à convertir (il est modifié directement dans le do/while)
        $originalNumber = $number;

        //On utilise ici la méthode d'Euclide pour construire
        //le nombre à l'envers pas divisions successives par $targetBase

        $targetNumber = '';

        do {
            $division = intdiv($number, $targetBase);
            $remainder = $number % $targetBase;
            $targetNumber = $remainder . $targetNumber;
            $number = $division;
        } while ($number !== 0);

        //Si le nombre à convertir est plus petit que la base d'arrivée, on l'écrit entre crochets
        //pour indiquer que c'est un "chiffre" dans la base cible, qui tient sur une position. 
        //Par exemple, 15 (base 10) est égal à [15] en base 16 ou supérieure.
        //On pourrait l'écrire avec un autre caractère, comme une lettre de l'alphabet (comme en hexadecimal).
        if ($originalNumber < $targetBase && $targetBase > 10) {
            $targetNumber = sprintf("[%s]", $targetNumber);
        }

        return $targetNumber;
    }

    /**
     * Convertit le nombre $number de la base $originBase vers la base $targetBase
     * @param string $originBase La base de départ
     * @param string $targetBase La base d'arrivée
     * @param string $number Le nombre à convertir, exprimé dans la base de départ
     * @return string
     * @throws Exception Si les bases de départ et d'arrivée ne sont pas des valeurs numériques
     * @throws Exception Si le symbole $number n'est pas définir dans la base $originBase
     */
    public function convert(string $originBase, string $targetBase, string $number): string
    {

        if (!is_numeric($originBase) || !is_numeric($targetBase)) {
            throw new \Exception("Les bases de départ et d'arrivée doivent être des nombres entiers naturels");
        }

        if (intval($originBase) < 10 && strlen($number) == 1 && $number >= intval($originBase)) {
            throw new \Exception(sprintf("Le symbole %s n'est pas défini dans la base %s", $number, $originBase));
        }

        //Pour passer de la base $originBase à $targetBase, on passe par la base 10
        $decimalNumber  = $this->convertFromBaseToDecimal($number, intval($originBase));
        $convertedNumber = $this->convertFromDecimalTo(intval($decimalNumber), intval($targetBase));
        return $convertedNumber;
    }

    /**
     * Retourne le 'manuel' de la commande convert
     */
    public function __toString(): string
    {
        return "Convertisseur d'une base à une autre. Usage :\nconvert --from={base de départ} --to={base d'arrivée} {nombre à convertir}.\nPar exemple, convert --from=2 --to=10 1000.\nPour une base supérieure à la base 10, un chiffre est représenté sur deux caractères entre crochets. Par exemple, 10 (base 10) s'écrit [10] en base 11.";
    }
}
