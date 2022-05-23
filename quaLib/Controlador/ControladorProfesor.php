<?php
require_once("../Modelo/Alumno.php");
require_once("../Modelo/ModeloAlumno.php");

class ControladorProfesor {
    /**
     * Función que lista los alumnos y los almacena en una lista
     * @param $numPag
     * @param int $tamPag
     * @return array
     */
    public static function listar(int $tamPag = 20): array {
        return ModeloAlumno::listar($tamPag);
    }

    public static function insertar($datos): bool {
        return ModeloAlumno::insertar($datos);
    }

    public static function eliminar($id): bool {
        return ModeloAlumno::eliminar($id);
    }

    public static function modificiar($datos): bool {
        return ModeloAlumno::modificar($datos);
    }

    public static function numAlumnos(): int {
        return ModeloAlumno::numAlumnos();
    }

    public static function getClases(): array {
        return ModeloAlumno::getClases();
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