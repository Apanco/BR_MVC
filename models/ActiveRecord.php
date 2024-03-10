<?php
namespace Model;

class ActiveRecord{
    //Base de datos
    protected static $db;
    protected static $columnasDB =[];
    protected static $tabla = '';
    //Errores
    protected static $errores = [];
    protected static $hasErrors;
    //Atributos
    public $id;
    public $imagen;

    //Metodos
    //Definir la conexion a la base de datos
    public static function setDB($database){
        self::$db = $database;
    }
    //Eliminar un registro
    public function eliminar(){
        $query="DELETE FROM " . static::$tabla ." WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1;";
        $resultado = self::$db->query($query);
        if($resultado){
            
            if(static::$tabla == "propiedades"){
                $this->borrarImagen();
                header('location:/admin?resultado=3');
            }
            if(static::$tabla == "vendedores"){
                header('location:/admin?resultado=4');
            }
        }
    }


    public function atributos(){
        $atributos = [];
        foreach(static::$columnasDB as $columna){
            if($columna != "id"){
                $atributos[$columna] = $this->$columna;
            }   
        }
        return $atributos;
    }


    //Sanitizar los datos
    public function sanitizar(){
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }


    public function guardar(){
        if( isset($this->id)){
            //Actualizar
            return $this->actualizar();
        }
        else{
            // Creando objeto
            return $this->crear();
        }
    }


    //Alamcenar en la base de datos
    public function crear(){
        $atributos = $this->sanitizar();
        $columnas = join (', ',array_keys($atributos));
        $valores = join("', '", array_values($atributos));
        $query = "INSERT INTO ". static::$tabla . " ( ";
        $query .= $columnas;
        $query .= " ) VALUES ( '";
        $query .= $valores;
        $query .="' );";
        // debuguear($query);
        $resultado = self::$db->query($query);
        return $resultado;
    }


    public function actualizar(){
        $atributos = $this->sanitizar();
        $valores = [];
        foreach($atributos as $key => $value){
            $valores[] = "{$key} = '{$value}'";
        }
        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ',$valores);
        $query .= "WHERE id = '" . self::$db->escape_string($this->id). "' ";
        $query .= "LIMIT 1;";
        $resultado = self::$db->query($query);
        return $resultado;
    }


    //Validacion
    public static function getErrores(){

    }


    public function setErrores(){
        foreach(static::$columnasDB as $columna){
            if($columna != "id"){
                self::$errores[$columna] = false;
            }
        }
    }


    public function validar(){
        $atributos = $this->atributos();
        foreach($atributos as $key => $value){
            if(!$this->$key){
                self::$errores[$key] = true;
                self::$hasErrors = true;
            }
        }
        return static::$hasErrors;
    }


    //Acceder a errores
    public function getError($elemento){
        return static::$errores[$elemento];
    }


    //Subida de archivos
    public function setImagen($imagen){
        //Elimina la imagen  previa
        if(isset($this->id)){
            $this->borrarImagen();
        }
        //Asignar atributo imagen
        if($imagen){
            $this->imagen = $imagen;
        }
    }

    //Eliminar archivo
    public function borrarImagen(){
        //Comprobar si existe un archivo
        $existeArchivo = file_exists(CARPETAS_IMAGENES . $this->imagen);    
        if($existeArchivo){
            unlink(CARPETAS_IMAGENES . $this->imagen);
        }
    }

    //Lista todas las propiedades
    public static function all(){
        $query = "SELECT * FROM " . static::$tabla . ";";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }


    // Busca propiedad por id
    public static function find($id){
        $query = "SELECT * FROM " . static::$tabla ." WHERE id = ${id}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }


    public static function consultarSQL($query){
        //Consultar la base de datos
        $resultado = self::$db->query($query);
        
        //Iterar los datos
        $array = [];
        while( $registro = $resultado->fetch_assoc() ){
            $array[] = static::crearObjeto($registro);
        }

        //Liberar la memoria
        $resultado -> free();

        //Retornar los resultados
        return $array;
    }


    //Creara objetos
    protected static function crearObjeto($registro){
        $objeto = new static;
        foreach($registro as $key => $value){
            if( property_exists($objeto, $key)){ //Si existe, comparando atributos del objeto con key del arreglo
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }


    //Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar( $array = []){
        foreach($array as $key => $value){
            if(property_exists($this, $key) && !is_null($value)){//compara el atributo de esta clase con la key del arreglo asociativo
                $this->$key = $value;                            //Asigna el valor del atributo del objeto
            }
        }
    }
    public static function VerificarId($id){
        $query = "SELECT id FROM " . static::$tabla . ";";
        $ids = [];
        $resultado = self::consultarSQL($query);
        // debuguear($resultado);
        foreach($resultado as $objeto){
            $ids[] = $objeto->id;
        }
        $isExist = in_array($id, $ids);
        return $isExist;
    }
}