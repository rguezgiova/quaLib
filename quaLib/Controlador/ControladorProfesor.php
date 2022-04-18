<?php
require_once("../Modelo/Alumno.php");
require_once("../Modelo/ModeloAlumno.php");

class ControladorProfesor {
    public static function listar($numPag = 1, $tamPag = 10): array {
        return ModeloAlumno::listar($numPag, $tamPag);
    }

    public static function insertar($datos): bool {
        return ModeloAlumno::insertar($datos);
    }

    public static function eliminar($id) {
        return ModeloAlumno::eliminar($id);
    }

    public static function modificiar($datos) {
        return ModeloAlumno::modificar($datos);
    }

    public static function numAlumnos() {
        return ModeloAlumno::numAlumnos();
    }
}

if (isset($_POST['operacion']) && $_POST['operacion'] == 'insertar')  {
    $atributos = [
        "id" => $_POST['id'],
        "nombre" => $_POST['nombre'],
        "apellidos" => $_POST['apellidos'],
        "asignatura" => $_POST['asignatura'],
        "nota" => $_POST['nota'],
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
    $codigo = $_POST['codigo'];
    $resultado = ModeloAlumno::eliminar($codigo);
    if ($resultado) {
        echo '{"response": true}';
    } else {
        echo '{"response": false}';
    }
}

if (isset($_POST['operacion']) && $_POST['operacion'] == 'actualizar')  {
    $atributos = [
        "id" => $_POST['id'],
        "nombre" => $_POST['nombre'],
        "apellidos" => $_POST['apellidos'],
        "asignatura" => $_POST['asignatura'],
        "nota" => $_POST['nota'],
    ];
    $alumno = Alumno::getAlumno($atributos);
    $resultado = ModeloAlumno::modificar($alumno);
    if ($resultado) {
        echo '{"response": true}';
    } else {
        echo '{"response": false}';
    }
}