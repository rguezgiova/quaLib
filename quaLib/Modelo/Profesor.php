<?php
use Exception;
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
        if (!$this->validarCadena($dni, $nombre, $apellidos, $password)) {
            throw new Exception("Error al crear el Profesor");
        }
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