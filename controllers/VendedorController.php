<?php
namespace Controllers; // Corregido el espacio de nombres
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;
class VendedorController{
    public static function crear(Router $router){
        $isReload = false;
        $vendedor = new Vendedor();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $vendedor = new Vendedor($_POST);
            $telefonoValido = $vendedor->validarNumero();
            $vendedor->setErrores();
            $errores = $vendedor->validar();
            alertaError();
            if(!$errores){
                $resultado = $vendedor->crear();
                if($resultado){
                    // Redireccionar al usuario
                    header("Location:/admin?resultado=5"); //Esta funcion sirva para redireccionar a un usuario
                }
            }
        }
        $router->render('vendedores/crear', [
            "vendedor" => $vendedor,
            "isReload" => $isReload
        ]);
    }
    public static function actualizar(Router $router){
        $isReload = true;
        $id = validarOredireccionar("/admin");
        $vendedor = Vendedor::find($id);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sincroniza los datos ingresados con el objeto en memoria
            $vendedor->sincronizar($_POST);
            // debuguear($vendedor);
            $telefonoValido = $vendedor->validarNumero();
            //Crea el arreglo de errores en el objeto (Actua como constructor, marcara los errores como false)
            $vendedor->setErrores();
            //Aqui identificara errores y los marcara como true en el arreglo previamente creado -> Validacion
            $errores = $vendedor->validar();
            alertaError();
    
            //Revisar que el arreglo de errores este vacio
            if(!$errores){
                $resultado = $vendedor->guardar();
                // debuguear($resultado);
                if($resultado){
                    // Redireccionar al usuario
                    header("Location:/admin?resultado=6"); //Esta funcion sirva para redireccionar a un usuario
                }
            }
        }

        $router->render("vendedores/actualizar", [
            "vendedor" => $vendedor,
            "isReload" => $isReload
        ]);
    }
    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $tipo = $_POST['tipo'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if($id){
                if(validarContenido($tipo)){
                    $vendedor = Vendedor::find($id);
                    //Eliminar ven$vendedor de la base de datos
                    $vendedor->eliminar();
                }
            }
        }
    }

}