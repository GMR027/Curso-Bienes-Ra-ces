<?php

function conectarBD() : mysqli {
  $baseDatos = mysqli_connect('localhost', 'root', '2705', 'bienes_raices-crud');

  //Forma para validar conexion
  // if($baseDatos) {
  //   echo 'Se conecto a la base de datos';
  // } else {
  //   echo 'No se pudo conectar a la base de datos';
  // }

  if(!$baseDatos) {
    echo 'Error en conexion base de datos';
    exit;
  }

  return $baseDatos;
}