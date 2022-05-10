<?php
use PDO, PDOException;
require_once("Profesor.php");

class ModeloProfesor {
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
     * Función que inserta un nuevo profesor en la Base de Datos
     * @param Profesor $profesor a insertar
     * @return bool True|False según el resultado
     */
    public static function insertar(Profesor $profesor):bool {
        if ($profesor->dni != null) {
            $resultado = self::consulta("SELECT * FROM profesores WHERE dni='".$profesor->dni."'");
            if ($resultado->fetch(PDO::FETCH_ASSOC) != null) {
                return false;
            }
        }
        [$dni, $nombre, $apellidos, $asignatura, $password] = [$profesor->dni, $profesor->nombre, $profesor->apellidos, $profesor->asignatura, $profesor->password];
        self::consulta("INSERT INTO profesores VALUES ('$dni', '$nombre', '$apellidos', '$asignatura', '$password');");
        return true;
    }

    /**
     * Función que elimina un profesor de la Base de Datos
     * @param string $dni del profesor a eliminar
     * @return bool True|False según el resultado
     */
    public static function eliminar(string $dni) {
        $resultado = self::consulta("DELETE FROM profesores WHERE dni='$dni'");
        if ($resultado->rowCount() == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Función que modifica a un profesor de la Base de Datos
     * @param Profesor $profesor a modificar
     * @return bool True|False según el resultado
     */
    public static function modificar(Profesor $profesor): bool {
        $sql = "UPDATE profesores SET ";
        $atributos = $profesor->getAtributos();
        foreach ($atributos as $clave => $valor) {
            $sql .= "$clave='$valor',";
        }
        $sql = substr($sql, 0, strlen($sql) - 1);
        $sql .= "WHERE dni='".$profesor->dni."'";
        $resultado = self::consulta($sql);
        if ($resultado->rowCount() == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Función que lista a los profesores de la Base de Datos
     * @param int $numPag número de página
     * @param int $tamPag tamaño de página
     * @return array Con los datos de los profesores
     */
    public static function listar(int $numPag = 1, int $tamPag = 10): array {
        $comienzo = ($numPag - 1) * $tamPag;
        $resultado = ModeloProfesor::consulta("SELECT * FROM profesores LIMIT $comienzo, $tamPag");
        $listaProfesores = [];
        while ($profesor = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $listaProfesores[] = Profesor::getProfesor($profesor);
        }
        return $listaProfesores;
    }

    /**
     * Función que calcula el total de profesores en la Base de Datos
     * @return int número total de profesores
     */
    public static function numProfesores() {
        $resultado = ModeloProfesor::consulta("SELECT COUNT(*) as numProfesores FROM profesores");
        $count = $resultado->fetch(PDO::FETCH_ASSOC);
        return intval($count['numProfesores']);
    }
}