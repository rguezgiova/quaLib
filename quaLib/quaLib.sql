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
    id INT(7) NOT NULL,
    nombre VARCHAR(120) NOT NULL,
    apellidos VARCHAR(120) NOT NULL,
    curso VARCHAR(3) NOT NULL,
    parcial1 FLOAT NOT NULL,
    parcial2 FLOAT NOT NULL,
    parcial3 FLOAT NOT NULL,
    PRIMARY KEY(id)
) ENGINE = INNODB;

INSERT INTO profesores VALUES 
('12345678A', 'Carlos', 'Pérez García', '$2y$10$t1Q/VK1xESMpe/6MgXV5VuaLv106hoLGRt9c78q1dKyUqPKY3X.ci');

INSERT INTO alumnos VALUES 
(345729, 'Dylan', 'Rodríguez Vidal', '3ºA', 6.5, 5.4, 7),
(563198, 'Pedro', 'Peralta Alvarez', '5ºC', 3.3, 4.6, 5),
(141401, 'Luis', 'Flores Martín', '2ºB', 7.5, 8.2, 7.7),
(753219, 'Angel', 'Luis Pérez', '5ºC', 6.1, 5, 4.2),
(986134, 'Cristo', 'Delgado Hernandez', '2ºB', 3.4, 6, 5.2),
(287401, 'Dayanara', 'López Casares', '3ºA', 6.3, 7, 5.9),
(923716, 'Lucas', 'Mariano Gímenez', '2ºB', 8.2, 7.5, 9.3),
(812934, 'María', 'Ruano García', '3ºA', 6.3, 7, 6.8),
(862173, 'Jorge','Cuesta Pio', '3ºA', 5.5, 4.9, 3.5),
(238654, 'Laia', 'Sánchez Ruiz', '3ºA', 10, 8.9, 7.6),
(912673, 'Guacimara', 'Hoz Rey', '5ºC', 2.8, 3.3, 1.9),
(231574, 'Francisco', 'Medina Muñoz', '5ºC', 5.8, 6.1, 5),
(342179, 'Irati', 'Franco García', '5ºC', 7.3, 6.8, 8),
(611347, 'Jesús', 'Vidal Álvarez', '2ºB', 8.9, 9, 10),
(102365, 'Mariano', 'Delgado Rueda', '2ºB', 5.3, 6, 4.9);

