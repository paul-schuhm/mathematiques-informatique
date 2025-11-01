# Structures de données - Fiche d'exercices

Version : 2

```{=html}
<hr>
```
## Module 1 - Les codes et le langage des machines

### Exercice 1 : Manipuler les puissances

Donnez le résultat en base décimale. Ex : $10^1=10$

1.  $10^2$
2.  $10^{-3}$
3.  $10^{0}$
4.  $3 \cdot 10^{6}$

Décomposez les nombres suivants en somme de puissances de 10

5.  12847
6.  80,02
7.  0,0123

Donnez le résultat sous la forme la plus compacte possible en puissance
de $10$ ou de $2$

8.  $10^5 \cdot 10^7$
9.  $10^2 \cdot 10^{-3}$
10. ${10^3}/{10^{3}}$
11. ${10^2}/{10^{5}}$
12. ${10^12}/{10^{-14}}$
13. $2^5 + 2^5$
14. $2^5 \cdot 2^5$
15. $4^{-1} + 7 \cdot 4^{-1}$
16. $\left(2^5 \cdot 4^2\right)/(2 \cdot 2^6)$
17. ${\left(10^4\right)}^2 \cdot 10^{-2}$
18. ${{\left(2^2\right)}^2}^2$
19. $4^3 \cdot 4^4$

Une personne dérobe une carte bancaire et va au distributeur pour
essayer de retirer de l'argent. Elle ne connaît pas le code à 4
chiffres. Quelle est la probabilité qu'elle réussisse à retirer de
l'argent en supposant que la victime n'ait pas fait opposition ? Donner
le résultat sous forme de puissance de 10 puis en pourcentage. Comparez
cette probabilité à celle de tirer l'as de coeur du premier coup dans un
jeu de 52 cartes bien mélangées.

### Exercice 2 : Changer de base. La base 4 ou système quaternaire

Nous avons vu que la base 10, ou système décimal, était un choix
complètement arbitraire de base pour *représenter* (encoder à l'écrit)
les nombres. Si nous avions eu 2 doigts à chaque main (ou si nous étions
des crabes) nous aurions certainement choisi une base 4 pour compter.

1.  Comptez en base 4, ou système quaternaire, jusqu'à $20_{\text{10}}$
    (20 en base 10) : $0_4, 1_4, 2_4, \ldots$
2.  Comptez en base 4, de 4 en 4 jusqu'à $52_{\text{10}}$. Comment
    s'écrit $50_{\text{10}}$ en base 4 ? Comment s'écrit
    $100_{\text{10}}$ en base 4 ?
3.  Décomposez le nombre $31232_{\text{4}}$ en somme de puissance de 4.
4.  Combien vaut $31232_{\text{4}}$ en base décimale ?
5.  Combien vaut $123_4+100_4$ en base 4 ? en base 10 ?
6.  Donner la table de multiplication de la base 4.
7.  Combien vaut $33_4 \cdot 200_4$ en base 4 ? en base 10 ?
8.  Exprimez en base 10 puis en base 4 les quantités suivantes :
    1.  Le nombre d'heures dans une journée
    2.  Le nombre de joueurs titulaires dans une équipe de foot
    3.  Le nombre de joueurs titulaires dans l'équipe de rugby les *All
        Blacks*
    4.  Le nombre de couleurs dans un jeu de cartes standard

### Exercice 3 : Système binaire (base 2)

1.  Combien valent $2^3$ $2^8$, $2^11$ ?
2.  Comptez en base 2, ou système binaire, jusqu'à $10_{\text{10}}$ (10
    en base 10) : $0_2, 1_2, \ldots$
3.  Donnez les représentations décimales des nombres binaires suivants :
    $110011$, $0101101$, $1100010$
4.  Donnez les représentations binaires des nombres en base 10 suivants
    : $14_10$, $78_10$, $1964_10$
5.  Donnez les représentations décimales des nombres binaires suivants :
    $10$, $100$, $1000$, $10000$. Que remarquez-vous ?
6.  Indiquer le nombre binaire qui suit $10111$.
7.  Calculez les nombres binaires suivants :
    1.  $1010 + 10$
    2.  $10101010 + 1111$
    3.  $111 + 001$
    4.  $1010 \cdot 1010$
    5.  $110011 \cdot 10$
    6.  $1111011 \cdot 111$
    7.  $100-01$
    8.  $100-11$
    9.  $1101-1010$
    10. La division entière $100 / 10$
    11. La division entière $1000 / 10$
    12. La division entière $10101 / 11$
8.  Combien faut-il de bits pour compter jusqu'à $511$ ?
9.  Avec 3 bits, combien de codes différents peut-on représenter ? Quels
    entiers positifs peut-on représenter en base décimale ? Quels
    entiers positifs et négatifs peut-on représenter ? ``{=html}

### Exercice 4 : Programmation de convertisseurs de base

1.  A l'aide de votre langage favori, écrivez un programme qui permet de
    convertir un nombre représenté en base binaire vers un nombre
    représenté en base décimale. Le programme prend en entrée un input
    utilisateur et écrit sur la sortie standard le résultat :

``` bash
#Affiche 2
binary-to-decimal 10
2
```

2.  Programmez un convertisseur qui réalise l'opération inverse, de la
    base décimale à la base binaire.

``` bash
#Affiche 1010
decimal-to-binary 10
1010
```

3.  Programmez un convertisseur qui permet de convertir de n'importe
    quelle base vers n'importe quelle autre base (généralisation).
    `convert --from=10 --to=2 10` affiche `1010`,
    `convert --from=8 --to=10 12` affiche `10`.

``` bash
#Retourne la représentation de 10(en base 10) en base 2
convert --from=10 --to=2 10
1010
#Retourne la représentation de 12(en base 8) en base 10
convert --from=8 --to=10 12
10
```

### Exercice 5 : Programmation d'une calculatrice binaire

1.  A l'aide de votre langage favori, programmez une calculatrice
    binaire qui réalise les opérations d'addition, de soustraction, de
    multiplication et de division entre deux nombres binaires. Le
    programme accepte sur l'entrée standard l'expression à évaluer
    écrite [en notation
    préfixée](https://fr.wikipedia.org/wiki/Notations_infix%C3%A9e,_pr%C3%A9fix%C3%A9e,_polonaise_et_postfix%C3%A9e)
    (ou notation polonaise préfixée) commençant par un opérateur suivi
    de deux opérandes

``` bash
binary-calculator + 10 10
100
binary-calculator - 100 10
10
binary-calculator * 10 10
100
binary-calculator / 10 10
1
```

2.  Bonus : Modifier le programme pour qu'il accepte un nombre
    indéterminé d'opérandes. Par exemple,
    `binary-calculator + 10 100 1000 1110101`

## Module 2 - Théorie des ensembles et dénombrement

### Exercice 6

1.  Est-ce que les **ensembles** $\{1, 2\}$, $\{2, 1\}$ et
    $\{1, 1, 2, 2, 2, 2\}$ sont égaux ?
2.  Est ce que les **ensembles** $A = \{1, 2, 3\}$ et $B = \{3, 2, 1\}$
    sont égaux ?
3.  Est ce que les **triplets** $A=(a, b, c)$ et $B=(b, c, a)$ sont
    égaux ? Même question pour $C=(1,2)$ et $D=(1, 1, 2, 2, 2)$ ?
4.  Donner le **cardinal** des ensembles suivants :
    1.  $\{1, 1, 2, 2, 2, 2, 3, 3, 3, 3\}$
    2.  L'ensemble vide
    3.  L'ensemble des *couleurs* d'un jeu de carte
    4.  L'ensemble $\mathbb{N_n}$
    5.  L'ensemble $\mathbb{R}$
    6.  L'ensemble des cases d'un échiquier
    7.  L'ensemble $\mathbb{B}$
    8.  L'alphabet latin
    9.  Du **nombre de parties** de l'ensemble $E=\{1, 2\}$.

### Exercice 7

Montrer que $\mathcal{P}\left(A\right) \subset \mathcal{P}(B)$ quand
$A \subset B$.

> Notation : on note $\mathcal{P}\left(E\right)$ les parties d'un
> ensemble $E$.

### Exercice 8

Est ce que $\{a\} \in \{a, b, c\}$ ? Former la liste des parties de
$\{a, b, c\}$.

### Exercice 9

On rappelle que les éléments de $\mathbb{B}$ sont 0 et 1.

1.  A-t-on $\mathbb{B} \in \mathbb{B}$ ?
2.  Quels sont les éléments de $\mathcal{P}(\mathbb{B})$ ?
3.  Quels sont les éléments de $\mathcal{P}(\mathcal{P}(\mathbb{B}))$ ?

### Exercice 10

Quels sont les éléments de $\mathcal{P}(\mathbb{\varnothing})$ ? Quels
sont ceux de $\mathcal{P}(\mathcal{P}(\mathbb{\varnothing}))$ ?

### Exercice 11

Dans chacun des cas suivants, déterminer si les ensembles A et B sont
égaux.

1.  $A=\{x \in \mathbb{R} \mid x > 0\}$ et
    $B=\{x \in \mathbb{R} \mid x \ge |x|\}$
2.  $A=\{x \in \mathbb{R} \mid x > 0\}$ et
    $B=\{x \in \mathbb{R} \mid x \le |x|\}$
3.  $A=\mathbb{Z}$ et
    $B=\{x \in \mathbb{Z} \mid x^2 - x \textrm{ pair} \}$

### Exercice 12

Définir les ensembles suivants en compréhension

1.  $A=\{1, 2, 4, 8, 16, 32, 64 \}$
2.  $B=\{1, 2, 7, 14\}$

### Exercice 13

Définir les ensembles suivants en extension

1.  $A=\{x \in \mathbb{R} \mid x(x+5) = 14\}$
2.  $A=\{x \in \mathbb{N} \mid x(2x+3) = 14\}$

### Exercice 14

Interpréter chacune des situations suivantes au moyen d'une fonction.
Pour cela, on définira deux ensembles A et B, et une fonction
$f \text{ : } A \longrightarrow B$

1.  Le résultat d'une course de tiercé (3 premiers chevaux à l'arrivée)
2.  Le registre d'un hôtel qui possède 55 chambres (chaque entrée d'un
    registre est une association entre une personne et une chambre)
3.  La parité d'un entier naturel
4.  Un emploi du temps
5.  La table des matières d'un livre

### Exercice 15

Dans chaque cas, dire si l'application
$f \text{ : } A \longrightarrow B$ est *injective*, *surjective* ou
*bijective*. Quand elle est bijective, déterminer l'application
réciproque $f^{\minus 1}$.

1.  $A=\mathbb{R}$, $B=\mathbb{R}$, $f \left( x \right) = x+7$
2.  $A=\mathbb{R}$, $B=\mathbb{R}$, $f \left( x \right) = x^2 + 2x - 3$
3.  $A=\{x \in \mathbb{R} \mid 4 \le x \le 9\}$,
    $B=\{x \in \mathbb{R} \mid 21 \le x \le 96\}$,
    $f \left( x \right) = x^2 + 2x - 3$
4.  $A=\mathbb{R}$, $B=\mathbb{R}$,
    $f \left( x \right) = 3x -2 \vert x \vert$
5.  $A=\mathbb{N}$, $B=\mathbb{N}$, $f \left( x \right) = x(x+1)$

### Exercice 16

On considère les deux applications $f$ et $g$ de $\mathbb{N_9}$ vers lui
même définies par leurs tables des valeurs :

  $x$      1   2   3   4   5   6   7   8   9
  -------- --- --- --- --- --- --- --- --- ---
  $f(x)$   6   4   7   8   9   3   5   1   2

et

  $x$      1   2   3   4   5   6   7   8   9
  -------- --- --- --- --- --- --- --- --- ---
  $g(x)$   1   2   7   4   5   6   3   8   9

1.  Représentez de la même façon les applications suivantes :
    $g \circ g$, $g \circ f$, $f \circ f$, $f \circ g$.
2.  Montrer que $f$ est bijective. Représenter de la même façon son
    application réciproque $f^{-1}$.

### Exercice 17

L'ADN est composé d'une alternance de molécules de sucre et de
phosphate. Les barreaux de l'échelle entre les deux brins sont fixés aux
sucres de chaque montant et sont formés de deux bases azotées qui se
font face. Il existe 4 bases différentes : Adénine (A), Thymine (T),
Cytosine (C) et Guanine (G). Une base A ne peut s'associer qu'avec une
bases T, et une base C ne peut s'associer qu'avec une base G.

1.  Écrire l'application $f$ qui associe une base à l'autre sous forme
    de table de valeurs. Définir l'ensemble de départ $E$ et l'ensemble
    d'arrivée $F$. Est-ce que $E$ est égal à $F$ ?
2.  Est-ce que $f$ est injective ? surjective ? bijective ?
3.  Combien de brins d'ADN différents de longueur $n$ (composé de n
    bases azotées) peut-on former ?
4.  Combien de permutations de E existe-il ? ``{=html} ``{=html}

### Exercice 18

On souhaite changer l'intervalle de définitions d'un ensemble de données
(remise à l'échelle). On récupère un ensemble de valeurs comprises entre
$a$ et $b$ que l'on souhaite transformer sur l'intervalle
$[\text{min}:\text{max}]$ de sorte que $f(a)=\text{min}$ et
$f(b)=\text{max}$.

1.  Écrire l'application $f$ qui permet de passer de
    $A=\{x \in \mathbb{R} \mid a \le x \le b \}$ à
    $B=\{x \in \mathbb{R} \mid \text{min} \le x \le \text{max} \}$
2.  Cette application est-elle bijective ?

### Exercice 19

1.  Qu'est ce qu'une fonction de hachage cryptographique ?
2.  Donner un exemple d'utilisation d'une telle fonction en
    informatique.
3.  Une fonction de hachage est-elle *bijective* ? Si oui, peut-on
    trouver son application réciproque ?

### Exercice 20

Soient les deux applications $f \text{ : } E \longrightarrow F$ et
$g \text{ : } F \longrightarrow E$, telles que $f \circ g = \text{Id}_F$
et $g \circ f = \text{Id}_E$.

1.  Montrer que $f$ et $g$ sont bijectives.
2.  Montrer que $g^{-1}=f$ et que $f^{-1}=g$.

### Exercice 21

On suppose que l'ensemble de tous les ensembles qui ne sont pas des
éléments d'eux-même existe, et on l'appelle $X$. Autrement dit,
$X=\{x \mid x \notin x\}$.

1.  A-t-on $X \in X$ ? A-t-on $X \notin X$ ?
2.  Quel est lien avec le paradoxe de Russel ?

### Exercice 22

A l'aide de votre langage de programmation favori, écrire un programme
(ensemble de fonctions) qui réalise les tâches suivantes :

1.  Calculer le factoriel d'un nombre entier naturel passé en argument;
2.  Calculer le cardinal et les parties d'un ensemble passé en argument;
3.  Calculer le nombre de tirages possibles de p éléments dans un
    ensemble de cardinal n avec remise, et sans remise. Le programme
    doit afficher le nombre de tirages possibles et afficher la liste
    des *p-uplets*;
4.  Calculer le nombre et afficher toutes les permutations d'un ensemble
    de cardinal n;
5.  Calculer le nombre d'arrangements et afficher tous les arrangements
    de p éléments d'un ensemble de cardinal n;
6.  Calculer le nombre de combinaisons et afficher toutes les
    combinaisons possibles de p éléments d'un ensemble de cardinal n.

### Exercice 23 : Algèbre booléenne

Sur une plateforme de vidéos en ligne, les vidéos sont notées de 0 à 5
par les utilisateur·ices. Après une période d'observation, les
administrateurs de la plateforme décident de mettre une vidéo sur la
page d'accueil lorsqu'elle satisfait au moins l'un des critères suivants
:

-   La vidéo a obtenu la note 5 et comptabilise un nombre de vues
    supérieur ou égal à 200;
-   La vidéo a obtenu la note 5 et est récente
-   La vidéo comptabilise un nombre de vues strictement inférieur à 200
    et est récente
-   La vidéo n'a pas obtenu la note 5 et comptabilise un nombre de vues
    supérieur ou égal à 200.

On définit les 3 variables booléennes $a$, $b$ et $c$ suivantes :

-   $a=1$ si la vidéo a obtenu la note 5, $a=0$ sinon
-   $b=1$ si la vidéo comptabilise un nombre de vues supérieur ou égal à
    200, $b=0$ sinon
-   $c=1$ si la vidéo est récente, $c=0$ sinon

1.  L'administrateur·ice de la plateforme a traduit les conditions pour
    qu'une vidéo soit mise sur la page d'accueil par l'expression
    booléenne $E$. Donner une expression de $E$ à l'aide des variables
    booléennes.
2.  Représenter $E$ dans une table de vérité. ``{=html}
3.  Écrire $E$ sous la forme simplifiée d'une somme de deux termes.
4.  Interpréter cette expression simplifiée de $E$ dans le contexte du
    problème donné.
5.  Une vidéo qui n'est pas récente, qui n'a pas obtenu la note 5 et qui
    comptabilise un nombre de vues strictement inférieur à 200
    sera-t-elle mise sur la page d'accueil ?
6.  Donner une expression de $E'$ (opposé de E, $1-E$) à l'aide des
    variables booléennes $a$, $b$ et $c$. En déduire une définition des
    vidéos qui ne seront pas mises sur la page d'accueil.

## Sources

Certains exercices sont tirés de l'ouvrage [Méthodes mathématiques pour
l'informatique - 3e
édition](https://www.dunod.com/sciences-techniques/methodes-mathematiques-pour-informatique-cours-et-exercices-corriges),
Jacques Vélu, publié chez Dunod, 2000.

## Ressources utiles

-   [Convertisseur de base en
    ligne](https://wims.univ-cotedazur.fr/wims/fr_tool~number~baseconv.fr.html),
    convertisseur qui permet de passer d'une base à l'autre, publié par
    Université Côte d'Azur. Utilisez-le pour vérifier vos calculs.
