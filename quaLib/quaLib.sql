DROP DATABASE IF EXISTS quaLib;
CREATE DATABASE quaLib DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
CREATE USER IF NOT EXISTS staff@localhost IDENTIFIED BY 'adminadmin123456';
GRANT ALL ON quaLib.* TO 'staff'@'localhost';

use quaLib;

CREATE TABLE profesores (
    dni VARCHAR(9) NOT NULL,
    nombre VARCHAR(120) NOT NULL,
    apellidos VARCHAR(120) NOT NULL,
    password VARCHAR(120) NOT NULL,
    PRIMARY KEY(dni)
) ENGINE = INNODB;

CREATE TABLE alumnos (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(120) NOT NULL,
    apellidos VARCHAR(120) NOT NULL,
    asignatura VARCHAR(50) NOT NULL,
    nota FLOAT NOT NULL,
    PRIMARY KEY(id)
) ENGINE = INNODB;

INSERT INTO profesores VALUES 
('12345678A', 'Carlos', 'Pérez García', '123456'),
('12345678B', 'Jose', 'Martín Serrano', '123456'),
('12345678C', 'Laura', 'Vidal García', '123456'),
('12345678D', 'Maria', 'Gómez García', '123456'),
('12345678E', 'Fidel', 'Alterio Melero', '123456');

INSERT INTO alumnos VALUES 
(NULL, 'Dylan', 'Rodríguez Vidal', 'Matemáticas', 10),
(NULL, 'Pedro', 'Peralta Alvarez', 'Matemáticas', 7.5),
(NULL, 'Luis', 'Flores Martín', 'Matemáticas', 5),
(NULL, 'Angel', 'Luis Pérez', 'Matemáticas', 3.7),
(NULL, 'Cristo', 'Delgado Hernandez', 'Matemáticas', 6.2);

