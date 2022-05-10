<?php
require_once("../Modelo/Alumno.php");
require_once("../Modelo/ModeloAlumno.php");
require_once("../Modelo/Profesor.php");
require_once("../Modelo/ModeloProfesor.php");

class ControladorAdmin {
    public static function listarAlumnos($numPag = 1, $tamPag = 10): array {
        return ModeloAlumno::listar($numPag, $tamPag);
    }

    public static function insertarAlumno($datos): bool {
        return ModeloAlumno::insertar($datos);
    }

    public static function eliminarAlumno($id): bool {
        return ModeloAlumno::eliminar($id);
    }

    public static function modificiarAlumno($datos): bool {
        return ModeloAlumno::modificar($datos);
    }

    public static function numAlumnos(): int {
        return ModeloAlumno::numAlumnos();
    }

    public static function listarProfesores($numPag = 1, $tamPag = 10): array {
        return ModeloProfesor::listar($numPag, $tamPag);
    }

    public static function insertarProfesor($datos): bool {
        return ModeloProfesor::insertar($datos);
    }

    public static function eliminarProfesor($id): bool {
        return ModeloProfesor::eliminar($id);
    }

    public static function modificiarProfesor($datos): bool {
        return ModeloProfesor::modificar($datos);
    }

    public static function numProfesores(): int {
        return ModeloProfesor::numProfesores();
    }
}

if (isset($_POST['operacion']) && $_POST['operacion'] == 'insertarAlumno')  {
    $atributos = [
        "id" => intval($_POST['id']),
        "nombre" => $_POST['nombre'],
        "apellidos" => $_POST['apellidos'],
        "asignatura" => $_POST['asignatura'],
        "nota" => floatval($_POST['nota']),
    ];
    $alumno = Alumno::getAlumno($atributos);
    $resultado = ModeloAlumno::insertar($alumno);
    if ($resultado) {
        echo '{"response": true}';
    } else {
        echo '{"response": false}';
    }
}

if (isset($_POST['operacion']) && $_POST['operacion'] == 'eliminarAlumno')  {
    $id = intval($_POST['id']);
    $resultado = ModeloAlumno::eliminar($id);
    if ($resultado) {
        echo '{"response": true}';
    } else {
        echo '{"response": false}';
    }
}

if (isset($_POST['operacion']) && $_POST['operacion'] == 'modificarAlumno')  {
    $atributos = [
        "id" => intval($_POST['id']),
        "nombre" => $_POST['nombre'],
        "apellidos" => $_POST['apellidos'],
        "asignatura" => $_POST['asignatura'],
        "nota" => floatval($_POST['nota']),
    ];
    $alumno = Alumno::getAlumno($atributos);
    $resultado = ModeloAlumno::modificar($alumno);
    if ($resultado) {
        echo '{"response": true}';
    } else {
        echo '{"response": false}';
    }
}

if (isset($_POST['operacion']) && $_POST['operacion'] == 'insertarProfesor')  {
    $atributos = [
        "dni" => $_POST['dni'],
        "nombre" => $_POST['nombre'],
        "apellidos" => $_POST['apellidos'],
        "asignatura" => $_POST['asignatura'],
        "password" => $_POST['password'],
    ];
    $profesor = Profesor::getProfesor($atributos);
    $resultado = ModeloProfesor::insertar($profesor);
    if ($resultado) {
        echo '{"response": true}';
    } else {
        echo '{"response": false}';
    }
}

if (isset($_POST['operacion']) && $_POST['operacion'] == 'eliminarProfesor')  {
    $dni = $_POST['dni'];
    $resultado = ModeloProfesor::eliminar($dni);
    if ($resultado) {
        echo '{"response": true}';
    } else {
        echo '{"response": false}';
    }
}

if (isset($_POST['operacion']) && $_POST['operacion'] == 'modificarProfesor')  {
    $atributos = [
        "dni" => $_POST['dni'],
        "nombre" => $_POST['nombre'],
        "apellidos" => $_POST['apellidos'],
        "asignatura" => $_POST['asignatura'],
        "password" => $_POST['password'],
    ];
    $profesor = Profesor::getProfesor($atributos);
    $resultado = ModeloProfesor::modificar($profesor);
    if ($resultado) {
        echo '{"response": true}';
    } else {
        echo '{"response": false}';
    }
}