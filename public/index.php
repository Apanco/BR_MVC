<?php 
require_once __DIR__ . "/../includes/app.php";

use Controllers\LoginController;
use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\PaginasController;

$router = new Router;
$router->get('/admin', [PropiedadController::class, "index"]);
//URL´S Privadas

//Propiedades

//URL'S get
$router->get('/propiedades/crear', [PropiedadController::class, "crear"]);
$router->get('/propiedades/actualizar', [PropiedadController::class, "actualizar"]);

//URL'S post
$router->post('/propiedades/crear', [PropiedadController::class, "crear"]);
$router->post('/propiedades/actualizar', [PropiedadController::class, "actualizar"]);
$router->post('/propiedades/eliminar', [PropiedadController::class, "eliminar"]);

//Vendedores

//URL'S get
$router->get('/vendedores/crear', [VendedorController::class, "crear"]);
$router->get('/vendedores/actualizar', [VendedorController::class, "actualizar"]);

//URL'S post
$router->post('/vendedores/crear', [VendedorController::class, "crear"]);
$router->post('/vendedores/actualizar', [VendedorController::class, "actualizar"]);
$router->post('/vendedores/eliminar', [VendedorController::class, "eliminar"]);


//URL'S Publicas
$router->get('/',[PaginasController::class, "index"]);
$router->get('/nosotros',[PaginasController::class, "nosotros"]);
$router->get('/anuncios',[PaginasController::class, "anuncios"]);
$router->get('/propiedades',[PaginasController::class, "propiedades"]);
$router->get('/propiedad',[PaginasController::class, "propiedad"]);
$router->get('/blog',[PaginasController::class, "blog"]);
$router->get('/entrada',[PaginasController::class, "entrada"]);
$router->get('/contacto',[PaginasController::class, "contacto"]);
$router->post('/contacto',[PaginasController::class, "contacto"]);

//Login y autenticacion

$router->get("/login", [LoginController::class, 'login']);
$router->get("/logout", [LoginController::class, 'logout']);

//post
$router->post("/login", [LoginController::class, 'login']);


$router->comprobarRutas();