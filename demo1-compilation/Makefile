TARGET=say-hi

build: compile assemble link
	@echo "Le programme $(TARGET) a été compilé avec succès !"

compile:
	@echo "Compile"
	gcc -S main.c -o main.s
assemble: compile
	@echo "Assemble"
	gcc -c main.s -o main.o
link: assemble
	@echo "Link"
	gcc main.o -o $(TARGET)

clean:
	rm -f *.o *.s a.out
