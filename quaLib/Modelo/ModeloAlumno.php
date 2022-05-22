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
        [$id, $nombre, $apellidos, $curso, $parcial1, $parcial2, $parcial3] = [$alumno->id, $alumno->nombre, $alumno->apellidos, $alumno->curso, $alumno->parcial1, $alumno->parcial2, $alumno->parcial3];
        self::consulta("INSERT INTO alumnos VALUES ($id, '$nombre', '$apellidos', '$curso', $parcial1, $parcial2,  $parcial3);");
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
    public static function modificar(Alumno $alumno): bool {
        $sql = "UPDATE alumnos SET ";
        $atributos = $alumno->getAtributos();
        foreach ($atributos as $clave => $valor) {
            $sql .= "$clave='$valor',";
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
    public static function numAlumnos() {
        $resultado = ModeloAlumno::consulta("SELECT COUNT(*) as numAlumnos FROM alumnos");
        $count = $resultado->fetch(PDO::FETCH_ASSOC);
        return intval($count['numAlumnos']);
    }

    public static function getClases(): array {
        $resultado = ModeloAlumno::consulta("SELECT curso FROM alumnos");
        $listaClases = [];
        while ($clase = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $listaClases[] = $clase;
        }
        return $listaClases;
    }
}