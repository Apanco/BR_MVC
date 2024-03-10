<?php
// require 'app.php';
$raiz = "/bienesraices_inicio/";
define('TEMPLATES_URL',__DIR__. '/templates');
define('FUNCIONES_URL',__DIR__. 'funciones.php');
define('CARPETAS_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . "/imagenes/");

//crear carpeta
$carpetaImagenes = '../../imagenes/';
if(!is_dir($carpetaImagenes)){//Verifica la existencia de la carpeta
    mkdir($carpetaImagenes);//Crea la carpeta si no existe
    chmod($carpetaImagenes,0777);
}

function incluirTemplate($nombre){
    include TEMPLATES_URL . "/${nombre}.php";
}

function incluirBotones($boton, $direccion, $color){
    include TEMPLATES_URL."/botones.php";
}

function alertaExito(){
    ?>
    <div class="contenedor-alertas">
            <div class="alerta alerta-exito autocierre">
                <div class="alerta-contenido">
                    <div class="icono"><i class="fa-solid fa-square-check"></i></i></div>
                    <div class="alerta-texto">
                        <p class="alerta-titulo">Completado</p>
                        <p class="alerta-descripcion">La propiedad se creo correctamente</p>
                    </div>
                </div>
                <button class="alerta-btn-cerrar"><i class="fa-regular fa-circle-xmark"></i></button>
            </div>
        </div>
        <?php
}

function vendedorCreado(){
    ?>
    <div class="contenedor-alertas">
            <div class="alerta alerta-exito autocierre">
                <div class="alerta-contenido">
                    <div class="icono"><i class="fa-solid fa-square-check"></i></i></div>
                    <div class="alerta-texto">
                        <p class="alerta-titulo">Completado</p>
                        <p class="alerta-descripcion">El vendedor se registro correctamente</p>
                    </div>
                </div>
                <button class="alerta-btn-cerrar"><i class="fa-regular fa-circle-xmark"></i></button>
            </div>
        </div>
        <?php
}
function alertaActualizado(){
    ?>
    <div class="contenedor-alertas">
            <div class="alerta alerta-exito autocierre">
                <div class="alerta-contenido">
                    <div class="icono"><i class="fa-solid fa-square-check"></i></i></div>
                    <div class="alerta-texto">
                        <p class="alerta-titulo">Actualizado</p>
                        <p class="alerta-descripcion">La propiedad se actualizo correctamente</p>
                    </div>
                </div>
                <button class="alerta-btn-cerrar"><i class="fa-regular fa-circle-xmark"></i></button>
            </div>
        </div>
        <?php
}
function alertaError(){
    ?>
    <div class="contenedor-alertas">
            <div class="alerta alerta-error autocierre">
                <div class="alerta-contenido">
                    <div class="icono"><i class="fa-solid fa-circle-exclamation"></i></i></div>
                    <div class="alerta-texto">
                        <p class="alerta-titulo">Error</p>
                        <p class="alerta-descripcion">Llene los campos correctamente</p>
                    </div>
                </div>
                <button class="alerta-btn-cerrar"><i class="fa-regular fa-circle-xmark"></i></button>
            </div>
        </div>
        <?php
}
function alertaEliminado(){
    ?>
    <div class="contenedor-alertas">
            <div class="alerta alerta-exito autocierre">
                <div class="alerta-contenido">
                    <div class="icono"><i class="fa-solid fa-square-check"></i></div>
                    <div class="alerta-texto">
                        <p class="alerta-titulo">Correcto</p>
                        <p class="alerta-descripcion">Propiedad eliminada correctamente</p>
                    </div>
                </div>
                <button class="alerta-btn-cerrar"><i class="fa-regular fa-circle-xmark"></i></button>
            </div>
        </div>
        <?php
}
function vendedorEliminado(){
    ?>
    <div class="contenedor-alertas">
            <div class="alerta alerta-exito autocierre">
                <div class="alerta-contenido">
                    <div class="icono"><i class="fa-solid fa-square-check"></i></div>
                    <div class="alerta-texto">
                        <p class="alerta-titulo">Correcto</p>
                        <p class="alerta-descripcion">Vendedor(a) eliminado correctamente</p>
                    </div>
                </div>
                <button class="alerta-btn-cerrar"><i class="fa-regular fa-circle-xmark"></i></button>
            </div>
        </div>
        <?php
}
function vendedorActualizado(){
    ?>
    <div class="contenedor-alertas">
            <div class="alerta alerta-exito autocierre">
                <div class="alerta-contenido">
                    <div class="icono"><i class="fa-solid fa-square-check"></i></div>
                    <div class="alerta-texto">
                        <p class="alerta-titulo">Correcto</p>
                        <p class="alerta-descripcion">Vendedor(a) actualizado correctamente</p>
                    </div>
                </div>
                <button class="alerta-btn-cerrar"><i class="fa-regular fa-circle-xmark"></i></button>
            </div>
        </div>
        <?php
}

function alertaDinamica($titulo,$mensaje, $tipo){
    ?>
    <div class="contenedor-alertas">
            <div class="alerta <?php
            if($tipo == "rojo"){
                echo "alerta-error";
            } else if($tipo == "verde"){
                echo "alerta-exito";
            }
            ?> autocierre">
                <div class="alerta-contenido">
                    <div class="icono"><i class="fa-solid fa-square-check"></i></div>
                    <div class="alerta-texto">
                        <p class="alerta-titulo"><?php echo $titulo;  ?></p>
                        <p class="alerta-descripcion"><?php echo $mensaje;  ?></p>
                    </div>
                </div>
                <button class="alerta-btn-cerrar"><i class="fa-regular fa-circle-xmark"></i></button>
            </div>
        </div>
        <?php
}

function autenticado() : bool{
    session_start();
    if(!$_SESSION['login']){
        header('location:/bienesraices_inicio/index.php');
    }else{
        return false;
    }
}

function debuguear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

//Escapa el html
function s($html) : string{//Sanitiza
    $s = htmlspecialchars($html);
    return $s;
}
//Validar el tipo de contenido
function validarContenido($tipo){
    $tipos = ['vendedor', 'propiedad'];
    return in_array($tipo, $tipos);
}
function validarOredireccionar(string $url){
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id){
        //Si no hay id nos regresa al inicio
        header("Location:${url}");
    }
    return $id;
}