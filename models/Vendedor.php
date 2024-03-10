<?php

namespace Model;

class Vendedor extends ActiveRecord{
    protected static $tabla = 'vendedores';
    protected static $columnasDB =['id', 'nombre', 'apellido', 'telefono'];
    //Atributos
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    //constructor
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        self::$hasErrors = false;
    }
    //Validar numero
    public function validarNumero(){
        if(!preg_match('/[0-9]{10}/', $this->telefono)){
            self::$hasErrors = true;
            return false;
        }
        else{
            return true;
        }
    }
}