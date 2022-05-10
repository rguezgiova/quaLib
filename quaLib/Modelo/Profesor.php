<?php
class Profesor {
    private $atributos = [];

    /**
     * Constructor de la clase Profesor
     * @param string $dni del profesor
     * @param string $nombre del profesor
     * @param string $apellidos del profesor
     * @param string $asignatura del profesor
     * @param string $password del profesor
     */
    public function __construct(string $dni, string $nombre, string $apellidos, string $asignatura, string $password) {
        $this->atributos['dni'] = $dni;
        $this->atributos['nombre'] = $nombre;
        $this->atributos['apellidos'] = $apellidos;
        $this->atributos['asignatura'] = $asignatura;
        $this->atributos['password'] = $password;
    }

    /**
     * Función que recoge un Profesor con sus datos
     * @param array $profesor a recoger
     * @return Profesor Con sus datos
     */
    public static function getProfesor(array $profesor): Profesor {
        [$dni, $nombre, $apellidos, $asignatura, $password] = [$profesor['dni'], $profesor['nombre'], $profesor['apellidos'], $profesor['asignatura'], $profesor['password']];
        return new Profesor($dni, $nombre, $apellidos, $asignatura, $password);
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
}