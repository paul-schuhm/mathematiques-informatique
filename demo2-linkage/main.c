
#include "stdio.h"
#include "mylib.h"

int main()
{
    // J'utilise la librairie mylib
    struct Foo *a = createFoo(1);
    struct Foo *b = createFoo(2);

    printf("La somme des deux struct vaut %d\n", add(a, b));
    //printf("La différence des deux struct vaut %d\n", substract(a, b));

    // En C, la gestion de la mémoire est à la charge du développeur·se, pour le meilleur et pour le pire
    destroyFoo(a);
    destroyFoo(b);

    return 0;
}
