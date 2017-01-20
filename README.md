# Simulation-Buddy_System
Simulacion mediante web el algoritmo Buddy System

# Autor : Abdullah Amin
# Fecha : 8 de diciembre de 2015
# Tema : Simulador de Buddy System O.S.
#

No me gustaria almacenar este programa que no me iso dormir hoy, asi que se los envio a todos ustedes, pq 
al parecer no existe uno asi por internet, si! si estuve buscando por dos horas y nada aparece :(
asi que ise uno para la clase de Sistemas Operativos  y lo presente y ya no lo requiero mas.
Espero que se lo disfruten :) FELIZ NAVIDAD  A TODOS  :)


# se requiere un servidor local para su funcionamieto
# name de servidor: root
# pwd de servidor: ""
# db de servidor: "binary"
# Esta hoja de php requiere una base de dato local
# con una db llamada 'binary' y una tabla llamada 'tree'
# La tabla 'tree' requiere de los siguientes campos:
# id(int-> 11 length/set auto), padre(varchar-> 50 length/set), 
# valor(varchar-> 750 length/set), letra (varchar-> 50 length/set), 
#valor_letra (varchar-> 50 length/set);
#
# Aqui les dejo un SQL para crear la base de datos;


CREATE TABLE `tree` (
	`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`padre` VARCHAR(50) NULL DEFAULT NULL,
	`valor` VARCHAR(750) NULL DEFAULT NULL,
	`letra` VARCHAR(50) NULL DEFAULT NULL,
	`valor_letra` VARCHAR(50) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=50
;

# Que se lo disfruten :P
