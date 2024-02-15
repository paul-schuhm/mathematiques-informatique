<?php

namespace Paul\Calculators;

class DecimalToBinaryConvertor
{
    /**
     * Convertit un nombre décimal (base 10) en nombre binaire (base 2)
     * sous forme de chaîne de caractère.
     * @param int $decimalInteger Entier naturel à convertir
     * @return string
     */
    function convertProcedural(int $decimalInteger): string
    {

        //On utilise ici la méthode d'Euclide pour construire
        //le nombre binaire à l'envers pas divisions successives par 2

        $binaryString = '';

        do {
            $division = intdiv($decimalInteger, 2);
            $remainder = $decimalInteger % 2;
            $binaryString = $remainder . $binaryString;
            $decimalInteger = $division;
        } while ($decimalInteger !== 0);

        return $binaryString;
    }

    /**
     * Convertit un nombre décimal (base 10) en nombre binaire (base 2)
     * sous forme de chaîne de caractère.
     * @param int $decimalInteger Entier naturel à convertir
     * @return string
     */
    function convertRecursive(int $decimalInteger): string
    {
        ///Cas limite : si le nombre à convertir est 0
        if ($decimalInteger === 0)
            return '0';

        $quotient = intdiv($decimalInteger, 2);

        if ($quotient === 0)
            return '1';

        $remainder = strval($decimalInteger % 2);

        return $this->convertRecursive($quotient) . $remainder;
    }
}
