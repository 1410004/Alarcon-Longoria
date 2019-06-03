CREATE DATABASE `practica07`;

USE `practica07`;

CREATE TABLE `practica07`.`alumnos` 
( `id` INT NOT NULL AUTO_INCREMENT , 
	`matricula` VARCHAR(255) NOT NULL , 
	`nombre` VARCHAR(255) NOT NULL , 
	`apellido` VARCHAR(255) NOT NULL , 
	`carrera` VARCHAR(255) NOT NULL , 
	`email` VARCHAR(255) NOT NULL , 
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;


CREATE TABLE `practica07`.`maestros` 
( `id` INT NOT NULL AUTO_INCREMENT , 
	`num_empleado` INT NOT NULL , 
	`carrera` VARCHAR(255) NOT NULL , 
	`nombre` VARCHAR(255) NOT NULL , 
	`apellido` VARCHAR(255) NOT NULL , 
	`email` VARCHAR(255) NOT NULL , 
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `practica07`.`grupos` 
( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`nombre` VARCHAR(255) NOT NULL , 
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `practica07`.`grupos_alumnos` 
( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`id_grupo` INT NOT NULL , 
	`id_alumno` INT NOT NULL , 
	PRIMARY KEY (`id`),
	FOREIGN KEY (`id_grupo`) REFERENCES `grupos`(`id`),
	FOREIGN KEY (`id_alumno`) REFERENCES `alumnos`(`id`) on delete cascade
) ENGINE = InnoDB;

CREATE TABLE `practica07`.`materias` 
( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`nombre` VARCHAR(255) NOT NULL , 
	`hora_inicio` time NOT NULL , 
	`hora_fin` time NOT NULL , 
	`id_grupo` INT NOT NULL , 
	`id_maestro` INT NOT NULL , 
	PRIMARY KEY (`id`),
	FOREIGN KEY (`id_grupo`) REFERENCES `grupos`(`id`),
	FOREIGN KEY (`id_maestro`) REFERENCES `maestros`(`id`)
) ENGINE = InnoDB;

/*CREATE TABLE `practica07`.`grupos_materias` 
( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`id_grupo` INT NOT NULL , 
	`id_materia` INT NOT NULL , 
	PRIMARY KEY (`id`)
	FOREIGN KEY (`id_grupo`) REFERENCES `grupo`(`id`),
	FOREIGN KEY (`id_materia`) REFERENCES `materia`(`id`),
) ENGINE = InnoDB;


*/