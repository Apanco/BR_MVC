<?php
function conectarBD() : mysqli{
    // echo "Hola";
    $db = new mysqli($_ENV['DB_HOST'],$_ENV['DB_USER'],$_ENV['DB_PASS'],$_ENV['DB_NAME']);
    
    $db ->set_charset('utf8');
    if(!$db){
        echo "No se pudo conectar la base de datos";
        exit;
    }

    return $db;
}