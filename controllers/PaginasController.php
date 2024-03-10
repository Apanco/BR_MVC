<?php
namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{
    public static function index(Router $router){
        $propiedades = Propiedad::all();
        $router->render("paginas/index", [
            "principal" => true,
            "propiedades" => $propiedades
        ]);
    }
    public static function nosotros(Router $router){
        
        $router->render("paginas/nosotros",[

        ]);
    }
    public static function anuncios(Router $router){
        $propiedades = Propiedad::all();
        $router->render("paginas/anuncios", [
            "propiedades" => $propiedades
        ]);
    }
    public static function propiedad(Router $router){
        $id = validarOredireccionar("/");
        $isExist = Propiedad::VerificarId($id);
        if(!$isExist){
            header("location:/");
        }
        $propiedad = Propiedad::find($id);
        $router->render("paginas/propiedad",[
            "propiedad" => $propiedad
        ]);
    }
    public static function blog(Router $router){
        
        $router->render("paginas/blog", [

        ]);
    }
    public static function entrada(Router $router){
        $router->render("paginas/entrada", [

        ]);
    }
    public static function contacto(Router $router){
        $resultado = 0;
        $mensaje = '';
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $resultado = 1;
            $respuestas = $_POST['contacto'];
            //Crear instancia de PHPmailer
            $mail = new PHPMailer();
            //Configurar SMPT
            $mail->isSMTP();//Se usara smpt
            $mail->Host = $_ENV["EMAIL_HOST"];//Conexion con el servidor/hosting, en este caso mailtrap
            $mail->SMTPAuth = true;//Indica autenticacion
            $mail->Username = $_ENV["EMAIL_USER"];
            $mail->Password = $_ENV["EMAIL_PASS"];
            $mail->SMTPSecure = 'tls';//trasport layer security
            $mail->Port = $_ENV["EMAIL_PORT"];
            //Configurar contenido del email
            $mail->setFrom('dperezapanco@gmail.com');//Quien envia el email
            $mail->addAddress('dperezapanco@gmail.com', 'bienesraices.com');//A que email va a llegar
            $mail->Subject = 'Tienes un nuevo mensaje';//Mensaje, lo primero que va a leer        
            //Habilitar html
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';//Habilitara extensiones del lenguaje español
            //Definir contenido
            $contenido = "<html>";
            $contenido .=" <p>Tienes un nuevo mensaje </p>";
            $contenido .=" <p>Nombre: " . $respuestas["nombre"] . " </p>";
            

            //Enviar de forma condicional algunos campos
            if($respuestas["contacto"] === "telefono"){
                $contenido .=" <p>Eligio ser contactado por telefono </p>";
                $contenido .=" <p>Telefono: " . $respuestas["telefono"] . " </p>";
                $contenido .=" <p>Fecha: " . $respuestas["fecha"] . " </p>";
                $contenido .=" <p>Hora: " . $respuestas["hora"] . " </p>";
            }else{
                $contenido .=" <p>Eligio ser contactado por email </p>";
                $contenido .=" <p>Email: " . $respuestas["email"] . " </p>";
            }

            
            $contenido .=" <p>Mensaje: " . $respuestas["mensaje"] . " </p>";
            $contenido .=" <p>Vende o compra: " . $respuestas["tipo"] . " </p>";
            $contenido .=" <p>Precio o presupuesto: $" . $respuestas["precio"] . " </p>";
            $contenido .=" <p>Prefiere ser contactado por: " . $respuestas["contacto"] . " </p>";
            
            $contenido .=" </html>";
            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin html';
            //Enviar el email
            if($mail->send()){
                $resultado = 1;
            }else{
                $resultado = 2;
            }
        }

        $router->render("paginas/contacto", [
            "resultado" => $resultado
        ]);
    }
}