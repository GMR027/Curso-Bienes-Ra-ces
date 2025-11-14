<?php 
///SE RECOMIENDA BORRAR ESTE ARCHIVO DEBIDO A QUE PUEDE SER PERJUDICIAL TENERLO EN EL CODIGO


//Importar la conexion
require 'includes/app.php';
$baseDatos = conectarBD();

//Crear email y pasword
$email = 'e.gm27@outlook.com';
$pasword = 'XQObkfmTofSsGHPg';
$paswordhas = password_hash($pasword, PASSWORD_DEFAULT);


var_dump($paswordhas);

//Query para crear el usuario
$queryCuenta = "INSERT INTO usuarios (email, pasword) values ('$email', '$paswordhas')";
echo $queryCuenta;



//Agregarlo a la base de datos
mysqli_query($baseDatos, $queryCuenta);
?>