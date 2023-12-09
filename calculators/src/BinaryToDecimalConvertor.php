<?php

namespace Paul\Calculators;

class BinaryToDecimalConvertor
{
    /**
     * Retourne vrai si la représentation en chaîne de caractères du nombre 
     * binaire est valide, faux sinon 
     * @param string $binaryNumber Le nombre binaire sous forme de chaîne de caractères
     * @return bool
     */
    public function  isAValidBinaryNumber(string $binaryNumber): bool
    {
        foreach (str_split($binaryNumber) as $bit) {
            if (!in_array($bit, ['0', '1'])) {
                return false;
            }
        }
        return true;
    }

    /**
     * Convertit un nombre binaire (base 2), représenté sous forme d'une chaîne
     * de caractères, en nombre décimal (base 10). Retourne le résultat sous forme
     * de chaîne de caractères. Méthode procédurale
     * @param string $binaryNumber
     * @return string
     */
    function convertToDecimalProcedural(string $binaryNumber): string
    {
        $maxPowerOfTwo = strlen($binaryNumber) - 1;

        $decimalNumber = 0;

        foreach (str_split($binaryNumber) as $position => $bit) {
            $powerOfTwo = $maxPowerOfTwo - $position;
            $decimalNumber += $bit * pow(2, $powerOfTwo);
        }

        return strval($decimalNumber);
    }

    /**
     * Convertit un nombre binaire (base 2), représenté sous forme d'une chaîne
     * de caractères inversée, en nombre décimal (base 10). Méthode récursive
     * @param string $reversedBinaryNumber Nombre binaire à convertir
     * @return string
     */
    public function convertToDecimalRecursive(string $binaryNumber): string
    {
        $reversedBinaryNumber = strrev($binaryNumber);
        return strval($this->convertToDecimalRecursiveWrapped($reversedBinaryNumber));
    }

    /**
     * Méthode récursive. Appelée par convertToDecimalRecursive qui se charge d'inverse le nombre binaire
     * et de préparer l'appel récursif.
     * @param string $reversedBinaryNumber Nombre binaire inversé
     * @param int $position Position du chiffre à convertir
     */
    private function convertToDecimalRecursiveWrapped(string $reversedBinaryNumber, int $position = 0): int
    {
        if ($position === strlen($reversedBinaryNumber))
            return 0;

        $decimalNumber = $reversedBinaryNumber[$position] * pow(2, $position);

        return $decimalNumber + $this->convertToDecimalRecursiveWrapped($reversedBinaryNumber, $position + 1);
    }
}
