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