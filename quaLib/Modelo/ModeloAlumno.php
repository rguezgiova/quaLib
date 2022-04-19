<?php
use PDO, PDOException;
require_once("Alumno.php");

class ModeloAlumno {
    /**
     * Función que consulta a la Base de Datos según una consulta
     * @param string $sql consulta sql
     * @return false|PDOStatement|void Según el resultado de la consulta
     */
    public static function consulta(string $sql) {
        [$host, $usuario, $password, $bd] = ['localhost', 'staff', 'adminadmin123456', 'quaLib'];
        try {
            $conexion = new PDO("mysql:host=$host;dbname=$bd;charset=utf8", $usuario, $password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $resultado = $conexion->query($sql);
        } catch (PDOException $exception) {
            exit($exception);
        }
        return $resultado;
    }

    /**
     * Función que inserta un nuevo alumno en la Base de Datos
     * @param Alumno $alumno a insertar
     * @return bool True|False según el resultado
     */
    public static function insertar(Alumno $alumno):bool {
        if ($alumno->id != null) {
            $resultado = self::consulta("SELECT * FROM alumnos WHERE id='".$alumno->id."'");
            if ($resultado->fetch(PDO::FETCH_ASSOC) != null) {
                return false;
            }
        }
        [$id, $nombre, $apellidos, $asignatura, $nota] = [$alumno->id, $alumno->nombre, $alumno->apellidos, $alumno->asignatura, $alumno->nota];
        self::consulta("INSERT INTO alumnos VALUES ($id, '$nombre', '$apellidos', '$asignatura', $nota);");
        return true;
    }

    /**
     * Función que elimina un alumno de la Base de Datos
     * @param int $id del alumno a eliminar
     * @return bool True|False según el resultado
     */
    public static function eliminar(int $id) {
        $resultado = self::consulta("DELETE FROM alumnos WHERE id='$id'");
        if ($resultado->rowCount() == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Función que modifica a un alumno de la Base de Datos
     * @param Alumno $alumno a modificar
     * @return bool True|False según el resultado
     */
    public static function modificar(Alumno $alumno) {
        $sql = "UPDATE alumnos SET";
        $atributos = $alumno->getAtributos();
        foreach ($atributos as $clave => $valor) {
            $sql += "$clave='$valor',";
        }
        $sql = substr($sql, 0, strlen($sql) - 1);
        $sql .= "WHERE id='".$alumno->id."'";
        $resultado = self::consulta($sql);
        if ($resultado->rowCount() == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Función que lista a los alumnos de la Base de Datos
     * @param int $numPag número de página
     * @param int $tamPag tamaño de página
     * @return array Con los datos de los alumnos
     * @throws Exception si no se valida correctamente
     */
    public static function listar(int $numPag = 1, int $tamPag = 10): array {
        $comienzo = ($numPag - 1) * $tamPag;
        $resultado = ModeloAlumno::consulta("SELECT * FROM alumnos LIMIT $comienzo, $tamPag");
        $listaAlumnos = [];
        while ($alumno = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $listaAlumnos[] = Alumno::getAlumno($alumno);
        }
        return $listaAlumnos;
    }

    /**
     * Función que calcula el total de alumnos en la Base de Datos
     * @return int número total de alumnos
     */
    public static function numAlumnos():int {
        $resultado = ModeloAlumno::consulta("SELECT COUNT(*) as NumAlumnos FROM alumnos");
        $count = $resultado->fetch(PDO::FETCH_ASSOC);
        return intval($count['numAlumnos']);
    }

    /**
     * Función que recoge un alumno determinadoe
     * @param $id del alumno a recoger
     * @return Alumno con sus datos
     * @throws Exception si no se valida correctamente
     */
    public static function getAlumno($id) {
        $resultado = self::consulta("SELECT * FROM alumnos WHERE id='".$id."'");
        return Alumno::getAlumno($resultado->fetch(PDO::FETCH_ASSOC));
    }
}