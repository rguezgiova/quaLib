DROP DATABASE IF EXISTS quaLib;
CREATE DATABASE quaLib DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
CREATE USER IF NOT EXISTS staff@localhost IDENTIFIED BY 'adminadmin123456';
GRANT ALL ON quaLib.* TO 'staff'@'localhost';

use quaLib;

CREATE TABLE profesores (
    dni VARCHAR(9) NOT NULL,
    nombre VARCHAR(120) NOT NULL,
    apellidos VARCHAR(120) NOT NULL,
    asignatura VARCHAR(120) NOT NULL,
    password VARCHAR(120) NOT NULL,
    PRIMARY KEY(dni)
) ENGINE = INNODB;

CREATE TABLE alumnos (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(120) NOT NULL,
    apellidos VARCHAR(120) NOT NULL,
    curso VARCHAR(3) NOT NULL,
    parcial1 FLOAT NOT NULL,
    parcial2 FLOAT NOT NULL,
    parcial3 FLOAT NOT NULL,
    PRIMARY KEY(id)
) ENGINE = INNODB;

INSERT INTO profesores VALUES 
('12345678A', 'Carlos', 'Pérez García', 'Matemáticas', '$2y$10$t1Q/VK1xESMpe/6MgXV5VuaLv106hoLGRt9c78q1dKyUqPKY3X.ci');

INSERT INTO alumnos VALUES 
(NULL, 'Dylan', 'Rodríguez Vidal', '3ºA', 6.5, 5.4, 7),
(NULL, 'Pedro', 'Peralta Alvarez', '5ºC', 3.3, 4.6, 5),
(NULL, 'Luis', 'Flores Martín', '2ºB', 7.5, 8.2, 7.7),
(NULL, 'Angel', 'Luis Pérez', '4ºC', 6.1, 5, 4.2),
(NULL, 'Cristo', 'Delgado Hernandez', '1ºB', 3.4, 6, 5.2);