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
     * @return array Un tableau contenant un chiffre (possiblement écrit sur plusieurs caractères) à chaque position
     */
    public function digitsOf(string $number): array
    {

        // Vérifie la cohérence des crochets
        $openCount = substr_count($number, '[');
        $closeCount = substr_count($number, ']');
        if ($openCount !== $closeCount) {
            throw new \Exception(sprintf("Symbole %s mal formé.", $number));
        }

        // Extrait tous les chiffres simples ou encadrés en conservant l'ordre
        if (!preg_match_all('/\[(\d+)\]|(\d)/', $number, $matches, PREG_SET_ORDER)) {
            throw new \Exception(sprintf("Symbole %s mal formé. Aucun chiffre détecté.", $number));
        }

        $digits = [];
        foreach ($matches as $m) {
            // $m[1] contient la capture entre crochets si présente, sinon $m[2] contient le chiffre simple
            if (isset($m[1]) && $m[1] !== '') {
                $digits[] = $m[1];
            } else {
                $digits[] = $m[2];
            }
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
        $decimalNumber = 0;
        $maxPower = count($digits) - 1;

        foreach ($digits as $position => $digit) {
            $value = intval($digit);
            if ($value >= $originBase) {
                throw new \Exception(sprintf("Le symbole [%s] n'existe pas dans la base %d", $digit, $originBase));
            }
            $power = $maxPower - $position;
            $decimalNumber += $value * ($originBase ** $power);
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
        if ($number === 0) {
            return "0";
        }

        $digits = [];

        do {
            $remainder = $number % $targetBase;
            $number = intdiv($number, $targetBase);

            if ($targetBase > 10 && $remainder >= 10) {
                $digits[] = sprintf("[%d]", $remainder);
            } else {
                $digits[] = (string)$remainder;
            }
        } while ($number > 0);

        return implode('', array_reverse($digits));
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
        return "Convertisseur d'une base à une autre. Usage :\nconvert --from={base de départ} --to={base d'arrivée} {nombre à convertir}.\nPar exemple, convert --from=2 --to=10 10 est égal à 2.\nPour une base supérieure à la base 10, un chiffre est représenté sur deux caractères entre crochets. Par exemple, 10 (base 10) s'écrit '[10]' en base 11. " ;
    }
}
