#include "mylib.h"
#include <stdlib.h>

/**
 * Je fournis une implémentation à ma librairie pour chaque déclaration du header (mylib.h)
 */

/**
 * Détails d’implémentation de ma structure Foo
 */
struct Foo
{
    int bar;
    char baz;
};

/**
 * Retourne la somme de deux structures Foo
 */
int add(struct Foo *a, struct Foo *b)
{
    return a->bar + b->bar;
}


struct Foo *createFoo(int bar)
{
    struct Foo *foo = malloc(sizeof(struct Foo));
    foo->bar = bar;
    return foo;
}

void destroyFoo(struct Foo *foo)
{
    if (foo != NULL)
    {
        free(foo);
    }
}

