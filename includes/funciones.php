<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL',__DIR__ . 'funciones.php');

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
