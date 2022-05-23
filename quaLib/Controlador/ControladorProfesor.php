<?php
require_once("../Modelo/Alumno.php");
require_once("../Modelo/ModeloAlumno.php");

class ControladorProfesor {
    /**
     * Función que lista los alumnos y los almacena en una lista
     * @param int $tamPag números de registros por página
     * @return array con la lista de los alumnos
     */
    public static function listar(int $tamPag = 20): array {
        return ModeloAlumno::listar($tamPag);
    }

    /**
     * Función que inserta nuevo alumno en la DDBB
     * @param $datos Alumno que se insertan
     * @return bool true/false según se inserte o no
     */
    public static function insertar($datos): bool {
        return ModeloAlumno::insertar($datos);
    }

    /**
     * Función que elimina a un alumno de la DDBB
     * @param $id int del alumno que se elimina
     * @return bool true/false según se elimine o no
     */
    public static function eliminar($id): bool {
        return ModeloAlumno::eliminar($id);
    }

    /**
     * Función que modifica a un alumno existente en la DDBB
     * @param $datos Alumno que se modifican
     * @return bool true/false según se modifique o no
     */
    public static function modificar($datos): bool {
        return ModeloAlumno::modificar($datos);
    }
}

if (isset($_POST['operacion']) && $_POST['operacion'] == 'insertar')  {
    $atributos = [
        "id" => intval($_POST['id']),
        "nombre" => $_POST['nombre'],
        "apellidos" => $_POST['apellidos'],
        "curso" => $_POST['curso'],
        "parcial1" => floatval($_POST['parcial1']),
        "parcial2" => floatval($_POST['parcial2']),
        "parcial3" => floatval($_POST['parcial3']),
    ];
    $alumno = Alumno::getAlumno($atributos);
    $resultado = ModeloAlumno::insertar($alumno);
    if ($resultado) {
        echo '{"response": true}';
    } else {
        echo '{"response": false}';
    }
}

if (isset($_POST['operacion']) && $_POST['operacion'] == 'eliminar')  {
    $id = intval($_POST['id']);
    $resultado = ModeloAlumno::eliminar($id);
    if ($resultado) {
        echo '{"response": true}';
    } else {
        echo '{"response": false}';
    }
}

if (isset($_POST['operacion']) && $_POST['operacion'] == 'modificar')  {
    $atributos = [
        "id" => intval($_POST['id']),
        "nombre" => $_POST['nombre'],
        "apellidos" => $_POST['apellidos'],
        "curso" => $_POST['curso'],
        "parcial1" => floatval($_POST['parcial1']),
        "parcial2" => floatval($_POST['parcial2']),
        "parcial3" => floatval($_POST['parcial3']),
    ];
    $alumno = Alumno::getAlumno($atributos);
    $resultado = ModeloAlumno::modificar($alumno);
    if ($resultado) {
        echo '{"response": true}';
    } else {
        echo '{"response": false}';
    }
}