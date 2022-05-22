<?php
class Alumno {
    private $atributos = [];

    /**
     * Constructor de la clase Alumno
     * @param string $nombre del alumno
     * @param string $apellidos del alumno
     * @param string $curso del alumno
     * @param float $parcial1 del alumno
     * @param float $parcial2 del alumno
     * @param float $parcial3 del alumno
     * @param int|null $id del alumno
     */
    public function __construct(string $nombre, string $apellidos, string $curso, float $parcial1, float $parcial2, float $parcial3, int $id = null) {
        $this->atributos['nombre'] = $nombre;
        $this->atributos['apellidos'] = $apellidos;
        $this->atributos['curso'] = $curso;
        $this->atributos['parcial1'] = $parcial1;
        $this->atributos['parcial2'] = $parcial2;
        $this->atributos['parcial3'] = $parcial3;
        $this->atributos['id'] = $id;
    }

    /**
     * Función que recoge un Alumno con sus datos
     * @param array $alumno a recoger
     * @return Alumno Con sus datos
     */
    public static function getAlumno(array $alumno): Alumno {
        [$id, $nombre, $apellidos, $curso, $parcial1, $parcial2, $parcial3] = [$alumno['id'], $alumno['nombre'], $alumno['apellidos'], $alumno['curso'], $alumno['parcial1'], $alumno['parcial2'], $alumno['parcial3']];
        return new Alumno($nombre, $apellidos, $curso, $parcial1, $parcial2, $parcial3, $id);
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
     * @param mixed $atributo que se recoge
     * @return mixed atributo recogido
     */
    public function __get($atributo) {
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
     * Función que calcula la nota según los parciales
     * @return float|int nota calculada
     */
    public function calcularNota() {
        return round(($this->parcial1 + $this->parcial2 + $this->parcial3) / 3, 1);
    }
}