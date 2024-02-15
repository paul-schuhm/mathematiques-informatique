/**
 * Ma librairie mylib à partager
 * Header : déclarations uniquement, pas d'implémentations (encapsulation) ! 
 * Ce que verront les utilisateurs de ma librairie. 
 */

/**
 * Forward declaration : ma librairie manipule cette structure de données
 */
struct Foo;

/**
 * Alloue de la mémoire à une struct Foo
*/
struct Foo* createFoo(int);

/**
 * Libère la mémoire d'une struct Foo
*/
void destroyFoo(struct Foo*);

/**
 * Retourne "la somme" de deux structures Foo
 */
int add(struct Foo* a, struct Foo* b);
