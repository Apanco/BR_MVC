<?php
namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController{
    public static function login(Router $router){
        $errores = 0;
        $email = '';
        $password = '';
        $usuarioCorrecto = false;
        $admin = new Admin();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // debuguear($admin);
            $admin = new Admin($_POST);
            $admin -> setErrores();
            $campos_llenados = !$admin -> validar();
            if($campos_llenados){
                $campos_correctos = $admin->compararBD();
                if($campos_correctos){
                    //Autenticar al usuario
                    $admin->autenticar();
                }
            }
        }


        $router->render("auth/login", [
            "admin" => $admin,
            "usuarioCorrecto" => $usuarioCorrecto
        ]);

    }
    public static function logout(){
        session_start();
        $_SESSION =[];
        header('Location:/');
    }
}