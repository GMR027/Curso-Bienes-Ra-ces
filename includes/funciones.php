<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL',__DIR__ . 'funciones.php');
define('CARPETA_IMG', __DIR__ . '/../imagenes/');

function incluirTemplate (string $nombre,bool $inicio = false) {
  include TEMPLATES_URL . "/{$nombre}.php";
}


function estadoLogin() : bool {
    session_start();

    if(!$_SESSION['login']) {
      header('location: /');
    } 

    return false;
}

function debuguear($dato){
  echo "<pre>";
  var_dump($dato);
  echo "</pre>";
  exit;
}

//Sanitizar datos ingresados en formularios
function limpiar($input) : string {
  $limpiar = htmlspecialchars($input);

  return $limpiar;
}

//validar tipo de contenido
function validarTipo ($tipo) {
  $tipos = ['vendedor', 'propiedad'];
  return  in_array($tipo, $tipos);
}

//mensajes en admin
function mostrarMensajes ($codigo) {
  $mensaje = '';
  switch($codigo) {
    case 1:
      $mensaje = 'Creado correctamente';
      break;
    case 2:
      $mensaje = 'Actualizado correctamente';
      break;
    case 3:
      $mensaje = ' Eliminado correctamente';
      break;
    case 4:
      $mensaje = 'Inicio de sesion correctamente';
      break;
    default:
      $mensaje = false;
      break;
  }
  return $mensaje;
}
