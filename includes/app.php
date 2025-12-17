<?php 

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';
//conectarnos a la base de datos
$solicudBaseDatos = conectarBD();

use App\ActiveRecord;

ActiveRecord::confDatabase($solicudBaseDatos);
