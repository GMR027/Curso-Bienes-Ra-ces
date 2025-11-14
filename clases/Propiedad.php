<?php 
namespace App;

use mysqli;

class Propiedad  {
  //Base de datos
  protected static $infoBasedatos;
  protected static $columnasDB = ['id','titulo', 'imagen', 'precio', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'Vendedores_id', 'creado'];

  public $id;
  public $titulo;
  public $imagen;
  public $precio;
  public $descripcion;
  public $habitaciones;
  public $wc;
  public $estacionamiento;
  public $Vendedores_id;
  public $creado;

  //Definir conexion a base datos
  public static function confDatabase($baseDatos) {
  self::$infoBasedatos = $baseDatos;
  }

  public function __construct($arreglo = [])
  {
    $this->id = $arreglo['id'] ?? '';
    $this->titulo = $arreglo['titulo'] ?? '';
    $this->imagen = $arreglo['imagen'] ?? 'imagen.jpg';
    $this->precio = $arreglo['precio'] ?? '';
    $this->descripcion = $arreglo['descripcion'] ?? '';
    $this->habitaciones = $arreglo['habitaciones'] ?? 0;
    $this->wc = $arreglo['wc'] ?? 0;
    $this->estacionamiento = $arreglo['estacionamiento'] ?? 0;
    $this->Vendedores_id = $arreglo['Vendedores_id'] ?? 0;
    $this->creado = date('Y/m/d');
  }
  
  

  public function guardar() {
    //Sanitizar los datos
    $atributos = $this->sanitizarDatos();

    // CORREGIDO: Orden correcto de columnas y sin comillas en números
    $query = " INSERT INTO propiedades (";
    $query .= join(', ', array_keys($atributos));
    $query .= ") VALUES ('"; 
    $query .= join("', '", array_values($atributos));
    $query .= "') ";


      
    $resultado = self::$infoBasedatos->query($query);
    debuguear($resultado);
  }

  //identificar y unir los atributos de la base de datos
  public function atributos() {
    $atributos = [];
    foreach(self::$columnasDB as $columna) {
      if($columna === 'id') continue;
      $atributos[$columna] = $this->$columna;
    }
    return $atributos;
  }

  public function sanitizarDatos() {
    $atributos = $this->atributos();
    $sanitizado = [];
    

    foreach($atributos as $key => $value) {
      $sanitizado[$key] = self::$infoBasedatos->escape_string($value);
    }

    //debuguear($sanitizado);
    return $sanitizado;
  }
}