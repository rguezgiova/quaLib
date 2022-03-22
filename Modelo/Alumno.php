<?php
use Exception;
class Alumno {
    private $atributos = [];

    /**
     * Constructor de la clase Alumno
     * @param int $id del alumno
     * @param string $nombre del alumno
     * @param string $apellidos del alumno
     * @param string $asignatura del alumno
     * @param float $nota del alumno
     * @throws Exception si no se valida correctamente
     */
    public function __construct(int $id, string $nombre, string $apellidos, string $asignatura, float $nota) {
        if (!$this->validarCadena($id, $nombre, $apellidos, $asignatura || $nota <= 0)) {
            throw new Exception("Error al crear el Alumno");
        }
        $this->atributos['id'] = $id;
        $this->atributos['nombre'] = $nombre;
        $this->atributos['apellidos'] = $apellidos;
        $this->atributos['asignatura'] = $asignatura;
        $this->atributos['nota'] = $nota;
    }

    /**
     * Función con los setters de la clase
     * @param string $atributo a setear
     * @param string $valor a setear
     */
    public function __set(string $atributo, $valor) {
        $this->atributos[$atributo] = $valor;
    }

    /**
     * Función con los getters de la clase
     * @param string $atributo que se recoge
     * @return mixed atributo recogido
     */
    public function __get(string $atributo) {
        return $this->atributos[$atributo];
    }

    /**
     * Función que retorna los atributos
     * @return array con los atributos
     */
    public function getAtributos() {
        return $this->atributos;
    }

    /**
     * Función que recoge un Alumno con sus datos
     * @param array $alumno a recoger
     * @return Alumno Con sus datos
     * @throws Exception si no se valida correctamente
     */
    public static function getAlumno(array $alumno): Alumno {
        [$id, $nombre, $apellidos, $asignatura, $nota] = [$alumno['id'], $alumno['nombre'], $alumno['apellidos'], $alumno['asignatura'], $alumno['nota']];
        return new Alumno($id, $nombre, $apellidos, $asignatura, $nota);
    }

    /**
     * Función que valida si una cadena está vacía
     * @param string $cadenas a validar
     * @return bool true|false según esté vacía o no
     */
    public function validarCadena(... $cadenas):bool {
        foreach ($cadenas as $cadena) {
            if ($cadena == null || $cadena == "") {
                return false;
            }
        }
        return true;
    }
}