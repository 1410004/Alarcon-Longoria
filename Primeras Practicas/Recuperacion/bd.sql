CREATE TABLE `recu`.`alumnos` 
( `id` INT NOT NULL AUTO_INCREMENT , 
	`matricula` VARCHAR(255) NOT NULL , 
	`nombre` VARCHAR(255) NOT NULL , 
	`apellido` VARCHAR(255) NOT NULL , 
	`carrera` VARCHAR(255) NOT NULL , 
	`email` VARCHAR(255) NOT NULL , 
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;


CREATE TABLE `recu`.`maestros` 
( `id` INT NOT NULL AUTO_INCREMENT , 
	`num_empleado` INT NOT NULL , 
	`carrera` VARCHAR(255) NOT NULL , 
	`nombre` VARCHAR(255) NOT NULL , 
	`apellido` VARCHAR(255) NOT NULL , 
	`email` VARCHAR(255) NOT NULL , 
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;
