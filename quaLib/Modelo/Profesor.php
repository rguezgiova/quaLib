<?php
class Profesor {
    private $atributos = [];

    /**
     * Constructor de la clase Profesor
     * @param string $dni del profesor
     * @param string $nombre del profesor
     * @param string $apellidos del profesor
     * @param string $password del profesor
     * @throws Exception si no se valida correctamente
     */
    public function __construct(string $dni, string $nombre, string $apellidos, string $password) {
        $this->atributos['dni'] = $dni;
        $this->atributos['nombre'] = $nombre;
        $this->atributos['apellidos'] = $apellidos;
        $this->atributos['password'] = $password;
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
}