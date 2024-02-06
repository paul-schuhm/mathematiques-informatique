# Programmes de calcul sur les changements de base

Propositions de programmes pour les exercices 4 et 5 (code source en PHP).

- [Programmes de calcul sur les changements de base](#programmes-de-calcul-sur-les-changements-de-base)
  - [Prérequis](#prérequis)
  - [Exercice 4 : Programmation de convertisseurs de base](#exercice-4--programmation-de-convertisseurs-de-base)
    - [Convertisseur binaire (base 2) vers décimal (base 10)](#convertisseur-binaire-base-2-vers-décimal-base-10)
    - [Convertisseur décimal (base 10) vers binaire (base 2)](#convertisseur-décimal-base-10-vers-binaire-base-2)
    - [Convertisseur base a vers base b](#convertisseur-base-a-vers-base-b)
  - [Exercice 5 : Programmation d’une calculatrice binaire](#exercice-5--programmation-dune-calculatrice-binaire)
  - [Exécuter/Modifier les tests](#exécutermodifier-les-tests)
  - [Exercice 22](#exercice-22)
  - [Ressources](#ressources)


## Prérequis

- Installer PHP8.0+
- Installer [Composer](https://getcomposer.org/), le gestionnaire de dépendances de PHP
- [Cloner le dépôt](https://github.com/paul-schuhm/mathematiques-informatique)
- Installer les dépendances avec Composer :

~~~bash
#A la racine du projet
composer update
~~~


## Exercice 4 : Programmation de convertisseurs de base



### Convertisseur binaire (base 2) vers décimal (base 10)

Deux propositions, une procédurale (avec états locaux et boucles), une récursive (avec une fonction récursive)

~~~bash
#Rendre les scripts executables
chmod +x binary-to-decimal-procedural binary-to-decimal-recursive
./binary-to-decimal-procedural 101
./binary-to-decimal-recursive 101
~~~

ou alors en invoquant explicitement php

~~~bash
php binary-to-decimal-procedural 101
php binary-to-decimal-recursive 101
~~~

Ces deux programmes utilisent la classe [`BinaryToDecimalConvertor`](./src/BinaryToDecimalConvertor.php).

> Remarque : le coeur des programmes est écrit sous forme de classes pour s'inscrire dans la manière moderne de développer en PHP avec le gestionnaire de paquet Composer. Cette convention est encouragée car elle permet notamment de bénéficier du chargement automatique des classes (*autoloading*). C'est par pure convention et un détail d'implémentation ici, on aurait pu tout laisser dans de simples fonctions, cela n'apporte pas d’intérêt supplémentaire ici.

### Convertisseur décimal (base 10) vers binaire (base 2)

Deux propositions, une procédurale (avec états locaux et boucles), une récursive (avec une fonction récursive)

~~~bash
#Rendre les scripts executables
chmod +x decimal-to-binary-procedural decimal-to-binary-recursive
./decimal-to-binary-procedural 65
1000001
./decimal-to-binary-recursive 65
1000001
~~~

### Convertisseur base a vers base b

Un convertisseur généralisé, permettant de passer d'une base `a` arbitraire à une base `b` arbitraire.

Pour les bases supérieurs à 10, on utilise ici les nombres entre crochets comme symbole d'un chiffre (équivalent à un caractère). Par exemple, 15 (base 10) est égal à `[15]` en base 16 ou supérieure. 10 (base 10) est égal à `[10]` en base 11 ou supérieure. 

- Base hexadécimale (base 16), telle qu'elle est représentée usuellement : `1, 2, 3, 4, 5, 6, 7, 8, 9, A, B, C, D, E, F, 10`
- Base hexadécimale (base 16), telle qu'elle est représentée par le système choisi ici : `1, 2, 3, 4, 5, 6, 7, 8, 9, [10], [11], [12], [13], [14], [15], 10`

> Comme nous fabriquons notre propre interpréteur, nous ne sommes pas obligés de représenter les symboles des bases supérieures à 10 comme cela est fait en mémoire par les machines (sur un octet). Nous pouvons fabriquer n'importe quel système arbitraire.

~~~bash
chmod +x convert
#Exemple : convertir 18 (base 18) en base 2
./convert --from=18 --to=2 18
11010
./convert --from=10 --to=16 18
12
./convert --from=10 --to=16 10
[10]
~~~

## Exercice 5 : Programmation d’une calculatrice binaire

## Exécuter/Modifier les tests

Une suite de tests unitaires couvre les fonctions de conversion, réalisée avec [PHPUnit](https://docs.phpunit.de/en/10.5/index.html). Les tests sont implémentés dans le fichier `tests/TestConverters.php`.

Executer la suite de tests

~~~bash
#Installer PHPUnit
composer update
#Executer les tests unitaires
./vendor/bin/phpunit tests/TestConverters.php
~~~

## Exercice 22

[Ce programme](./sets.php) définit un ensemble de fonctions permettant
d'effectuer du dénombrement sur un ensemble E de cardinal n : p-uplets, permutations,
arrangements, combinaisons, nombre de parties.

> Note: Les algorithmes pour calculer les combinaisons et arrangements sont basés sur des fonctions récursives et ne sont pas les algorithmes les plus performants ! La méthode suivie est avant tout pédagogique et pour introduire le raisonnement par récursion. [Voir ici des implémentations](https://charlesreid1.github.io/lets-generate-permutations.html) plus performantes et *intelligentes*.

~~~bash
php sets.php
~~~

## Ressources

- [Installer PHP8.0+](https://www.php.net/manual/fr/install.php)
- [Installer Composer](https://getcomposer.org/download/)