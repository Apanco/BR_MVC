<?php
namespace Model;

class Admin extends ActiveRecord{
    protected static $columnasDB = ['id','email', 'password'];
    protected static $tabla = "usuarios";
    //Atributos
    public $id;
    public $email;
    public $password;

    public $E_email;
    public $E_password;

    //Metodos
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? "";
        $this->password = $args['password'] ?? "";
        $this->E_email = false;
    }
    public function compararBD(){
        //Buscara los datos de este objeto con en la base de datos
        $this->E_email = $this->findEmail();
        if($this->E_email){
            $this->E_password = $this->compararPassword();
            if($this->E_email && $this->E_password){
                return true;
            }
        }
        return false;
    }
    public function findEmail(){
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '";
        $query .= $this->email . "';";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }
    public function compararEmail(){
        $resultado = $this->findEmail();
        if(!$resultado){
            return false;
        } else{
            $objetoBD = array_shift($resultado);
            if($objetoBD->email == $this->email){
                return true;
            }
        }
        return false;
    }
    public function compararPassword(){
        $resultado = $this->findEmail();
        if(!$resultado){
            return false;
        } else{
            $objetoBD = array_shift($resultado);
            if(password_verify($this->password, $objetoBD->password)){
                return true;
            }
        }
        return false;
    }
    public function hasErrors(){
        return self::$hasErrors;
    }
    public function autenticar(){
        session_start();
        //Llenar arreglo de sesion
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;
        header("location:/admin");
    }
}