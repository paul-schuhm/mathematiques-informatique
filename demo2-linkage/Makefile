# Makefile de la démo 2 sur le linkage et la création/distribution de library.
# Build la librairie partagée ainsi que l'application qui l'utilise


LIB_NAME=mylib
TARGET_LIB=lib$(LIB_NAME).so
TARGET_APP=myapp
DIR_TO_INSTALL_LIBS=/usr/local/lib

$(TARGET_LIB): mylib.c
	gcc -c $(LIB_NAME).c -o $(LIB_NAME).o
	gcc -shared $(LIB_NAME).o -o lib$(LIB_NAME).so
	@#On installe la librairie sur le système (path des libs)
	sudo cp lib$(LIB_NAME).so $(DIR_TO_INSTALL_LIBS)
	@echo "La librarie $(LIB_NAME) a été compilée et installée avec succès!"
	
$(TARGET_APP): main.c $(TARGET_LIB)
	gcc -c main.c -o $(TARGET_APP).o
	@#On fait le link avec la librairie installée
	gcc -L$(PWD) $(TARGET_APP).o -l$(LIB_NAME) -o $(TARGET_APP)
	@echo "Le projet $(TARGET_APP) a été compilé avec succès !"

clean:
	rm -f *.o *.so $(TARGET_APP)
