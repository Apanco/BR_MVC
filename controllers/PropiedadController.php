<?php
namespace Controllers; // Corregido el espacio de nombres
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;
class PropiedadController { // Corregido el nombre de la clase 
    public static function index(Router $router){
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        $resultado = $_GET['resultado'] ?? null;
        $router->render("propiedades/admin", [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' =>$vendedores
        ]);
    }
    public static function crear(Router $router){//CCrear-----------------
        $isReload = false;
        $vendedores = Vendedor::all();
        $propiedad = new Propiedad;
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Crear instancia
            $propiedad = new Propiedad($_POST);

            //Generar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true)).".jpg";

            //Reliza un resize a la imagen con intervention
            if($_FILES['imagen']['tmp_name']){
                $image = Image::make($_FILES['imagen']['tmp_name']);
                $image->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }
            
            //Validacion de datos
            $propiedad->setErrores();
            $errores = $propiedad->validar();
            alertaError();
            
            if(!$errores){
                //Crear carpeta para subir imagenes
                //crear carpeta
                $carpetaImagenes =CARPETAS_IMAGENES;
                if(!is_dir($carpetaImagenes)){//Verifica la existencia de la carpeta
                    mkdir($carpetaImagenes);//Crea la carpeta si no existe
                    chmod($carpetaImagenes,0777);
                }
                //Guardar imagen
                $image->save($carpetaImagenes . $nombreImagen);
                //Subir a base de datos
                $resultado = $propiedad->crear();
                if($resultado){
                    // Redireccionar al usuario
                    header("Location:/admin?resultado=1"); //Esta funcion sirva para redireccionar a un usuario
                }
            }
        }
        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'isReload' => $isReload,
            'resultado' => 1
        ]);
    }
    public static function actualizar(Router $router){
        $isReload = true;
        $id = validarOredireccionar("/admin");
        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();
        $isLoadImage = false;
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sincroniza los datos ingresados con el objeto en memoria
            $propiedad->sincronizar($_POST);
            //Crea el arreglo de errores en el objeto (Actua como constructor, marcara los errores como false)
            $propiedad->setErrores();
            //Aqui identificara errores y los marcara como true en el arreglo previamente creado -> Validacion
            $errores = $propiedad->validar();
            //Subida de archivos
            
            //Generar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true)).".jpg";
    
            if($_FILES['imagen']['tmp_name']){
                $image = Image::make($_FILES['imagen']['tmp_name']);
                $image->fit(800,600);
                $propiedad->setImagen($nombreImagen);
                $isLoadImage = true;
            }
            alertaError();
            //Revisar que el arreglo de errores este vacio
            if(!$errores){
                $carpetaImagenes =CARPETAS_IMAGENES;
                $resultado = $propiedad->guardar();
                if($isLoadImage){
                    $image->save($carpetaImagenes . $nombreImagen);
                }
                // debuguear($resultado);
                if($resultado){
                    // Redireccionar al usuario
                    header("Location:/admin?resultado=2"); //Esta funcion sirva para redireccionar a un usuario
                }
            }
            
            
        }
    
        $router->render('/propiedades/actualizar',[
            'propiedad' =>$propiedad,
            'vendedores' =>$vendedores,
            'isReload' => true
        ]);
    }
    public static function eliminar(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $id = $_POST['id'];
            $tipo = $_POST['tipo'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if($id){
                if(validarContenido($tipo)){
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }
}