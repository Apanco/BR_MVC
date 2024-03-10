<?php
//Aqui se almacenaran todos los controladores y rutas
namespace MVC;
class Router{
    //Atributos
    public $rutasGET = [];
    public $rutasPOST = [];
    //Metodos
    public function get($url, $funcion){
        $this->rutasGET[$url] = $funcion;
    }
    public function post($url, $funcion){
        $this->rutasPOST[$url] = $funcion;
    }
    public function comprobarRutas(){
        session_start();
        $auth = $_SESSION['login'] ?? null;
        //Arreglo de rutas protegidas
        $rutas_protegidas = [
            '/admin',
            '/propiedades/crear',
            '/propiedades/actualizar',
            '/propiedades/eliminar',
            '/vendedores/crear',
            '/vendedores/actualizar',
            '/vendedores/eliminar'
        ];
        

        $url_actual = $_SERVER['REQUEST_URI'] ?? "/";
        //Tambien validara el post o get
        $metodo = $_SERVER['REQUEST_METHOD'];
        if($metodo === "GET"){
            $url_actual = explode('?',$url_actual)[0];
            $funcion = $this->rutasGET[$url_actual] ?? null;
        }
        else if($metodo === "POST"){
            $url_actual = explode('?',$url_actual)[0];
            $funcion = $this->rutasPOST[$url_actual] ?? null;
        }

        //Proteger las rutas
        if(in_array($url_actual, $rutas_protegidas) && !$auth ){
            header('location:/');
        }
        
        if($funcion){
            //La funcion existe y tiene una funcion asociada
            call_user_func($funcion, $this);//Permite llamar una funcion cuando no sabemos como se llama
        }
        else if(!$funcion){
            //No existe funcion asociada a la URL [Error 404]
            echo "Error 404";
        }
    }
    //mostrar vista
    public function render($view, $datos = []){
        foreach($datos as $key => $value){
            $$key = $value;//creara variable
        }
        ob_start();//Inicia almacenamiento en memoria
        include __DIR__ . "/views/$view.php";//Almacena esta vista
        $contenido = ob_get_clean();//Limpia la memoria previamente creada
        if(isset($principal)){
            include __DIR__ . "/views/layoutS.php" ;
        } else{
            include __DIR__ . "/views/layoutP.php" ;
        }
    }

}