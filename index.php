<?php
session_start();
//incluimos el autoload para incluir todas las clases//
include_once 'autoload.php';
//base de datos
require_once 'config/db.php';
//utilidades para las sesiones
include_once 'helpers/utils.php';
//incluimos las vistas//
require_once 'config/parameters.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';

//funcion para error 
function show_error(){
    $error = new errorController();
    $error->index();
}

//Generamos unas condiciones para manejar por barra URL//
if(isset($_GET['controller'])){
$nombre_controlador = $_GET['controller'] . 'controller';
        }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $nombre_controlador = controller_default;
        }else{
    show_error();
    exit();
}



if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador();

    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        $action = $_GET['action'];
        $controlador->$action();
            }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
        $action_default = action_default;
        $controlador->$action_default();
            }else{  
        show_error();
    }}else{ 
    show_error();
}
//footer//
include_once 'views/layout/footer.php';

?> 