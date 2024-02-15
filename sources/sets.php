<?php

/**
 * Ce script définit un ensemble de fonctions permettant
 * d'effectuer du dénombrement sur un ensemble E de cardinal n : p-uplets, permutations,
 * arrangements, combinaisons, nombre de parties.
 * Note: Les algorithmes pour calculer les combinaisons et arrangements
 * sont basés sur des fonctions récursives et ne sont pas les algorithmes
 * les plus performants ! La méthode suivie est avant tout pédagogique
 * et pour introduire le raisonnement par récursion. 
 * Voir ici des implémentations plus 'clever' (notamment les algos de D. Knuth)
 * @see : https://charlesreid1.github.io/lets-generate-permutations.html
 */


/**
 * Retourne le factoriel de n
 * @return int
 */
function factoriel(int $n): int
{

    if ($n === 0) {
        return 1;
    }

    return $n * factoriel($n - 1);
}

/**
 * Retourne le nombre de p-uplets (liste de p éléments) réalisables à partir d'un ensemble
 * E de cardinal $n
 * @param int $p Taille de la liste
 * @param int $n Le cardinal de E
 * @return int
 */
function numberOfPuplets(int $p, int $n): int
{
    if ($p < 0 || $p > $n) {
        return null;
    }
    return pow($n, $p);
}

/**
 * Retourne le nombre de parties de E de cardinal n
 * @return int
 */
function numberOfParts(int $n): int
{
    if ($n < 0) {
        return null;
    }
    return pow(2, $n);
}

/**
 * Retourne le nombre de permutations d'un ensemble E de cardinal n
 */
function numberOfPermutations(int $n): int
{
    return factoriel($n);
}

/**
 * Retourne le nombre d'arrangements de p éléments d'un ensemble E
 * de cardinal n
 */
function numberOfArrangements(int $p, int $n): int
{

    if ($p < 0 || $p > $n) {
        return null;
    }

    return factoriel($n) / factoriel($n - $p);
}

/**
 * Retourne le nombre de combinaisons possibles de p éléments
 * parmi n (i.e le nombre de parties contenant p éléments d'un ensemble E de cardinal n)
 * @param int $p Le nombre d'éléments à choisir
 * @param int $n Le nombre d'éléments dans l'ensemble de départ
 * @return int Le nombre de combinaisons
 */
function numberOfCombinations(int $p, int $n): int
{
    if ($p > $n) {
        return null;
    }
    return numberOfArrangements($p, $n) / factoriel($p);
}

/**
 * Retourne un ensemble (éléments distincts) à partir d'une collection d'items
 * @return array
 */
function buildSet($collection): array
{
    $set = [];
    foreach ($collection as $item) {
        if (!in_array($item, $set)) {
            $set[] = $item;
        }
    }
    return $set;
}

/**
 * Retourne toutes les combinaisons de p éléments
 * d'un ensemble E de cardinal n (sous-parties de E contenant p éléments)
 * Remarque : p >= 0 et p <= n
 * @param array $set Un ensemble d'éléments distincts
 * @return array Une liste où chaque élément est une combinaison de p éléments
 */
function allCombinations(array $set, int $p)
{

    $n = count($set);

    // echo implode(',',$set) . ' n='. $n . ' p='. $p . PHP_EOL;

    //Condition d'arrêt : Par définition
    if ($n === 0 && $p === 0) {
        return [[]];
    }

    //Condition d'arrêt : Par définition, si p est égal à 0, il existe un ensemble, l'ensemble vide
    if ($p === 0) {
        return[[]];
    }

    //Stocke toutes les combinaisons
    $allCombinations = [];

    foreach ($set as $key => $element) {
        //Crée le sous-ensemble des éléments restants
        $otherElements = array_slice($set, $key + 1);
        //Appel récursif : combinaisons de p-1 éléments sur le sous-ensemble de cardinal n - 1
        $combinations = allCombinations($otherElements, $p - 1);
        //On ajoute l'élément courant à chaque sous-ensemble trouvé
        foreach ($combinations as $combination) {
            $combination[] = $element;
            $allCombinations[] = $combination;
        }
    }

    return $allCombinations;
}



/**
 * Retourne toutes les permutations possibles (listes ou n-uplets) d'un ensemble
 * @return array L'ensemble des permutations où chaque permutation est représentée par un tableau
 */
function permutations(array $set): array
{

    $n = count($set);

    //Condition d'arrêt
    if ($n === 1 || $n === 0) {
        return [$set];
    }

    $allPermutations = [];

    foreach ($set as $position => $element) {
        //On fabrique l'ensemble sans l'élément courant
        $rest = array_merge(array_slice($set, 0, $position), array_slice($set, $position + 1));

        //On calcule les permutations sur le sous-ensemble des éléments restants, de cardinal n - 1
        $permutations = permutations($rest);

        //On fabrique chaque permutation
        foreach ($permutations as $permutation) {
            //Attention, l'ordre compte ici, on ajoute l'élément en début de liste
            $allPermutations[] = array_merge([$element], $permutation);
        }
    }

    return $allPermutations;
}

/**
 * Retourne tous les arrangements possibles de p éléments d'un
 * ensemble E de cardinal n. Le cas p = n donne le nombre de permutations
 * @return array
 */
function pArrangements(array $set, int $p): array
{
    //On calcule d'abord toutes les combinaisons
    $combinations = allCombinations($set, $p);
    if (!isset($combinations)) {
        return null;
    }
    $arrangements = [];

    //Le pb devient de calculer toutes les permutations possibles d'une collection
    //(voir fonction permutations)
    //Pour chaque combinaison, on calcule tous les arrangements possibles
    foreach ($combinations as $combination) {
        $arrangements = array_merge($arrangements, permutations($combination));
    }
    return $arrangements;
}


// Quelques tests : 

print_r(allCombinations([1,2,3, 5, 7], 2));

print_r(permutations([1,2,3]));

print_r(pArrangements([1,2,3], 2));
