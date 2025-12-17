<?php 
namespace App;

class Propiedad extends ActiveRecord  {
  protected static $tabla = 'propiedades';
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


  public function __construct($arreglo = [])
  {
    $this->id = $arreglo['id'] ?? null;
    $this->titulo = $arreglo['titulo'] ?? '';
    $this->imagen = $arreglo['imagenCargada'] ?? '';
    $this->precio = $arreglo['precio'] ?? '';
    $this->descripcion = $arreglo['descripcion'] ?? '';
    $this->habitaciones = $arreglo['habitaciones'] ?? '';
    $this->wc = $arreglo['wc'] ?? '';
    $this->estacionamiento = $arreglo['estacionamiento'] ?? '';
    $this->Vendedores_id = $arreglo['Vendedores_id'] ?? '';
    $this->creado = date('Y/m/d');
  }

  public function validarErrores() {
    if(!$this->titulo) {
      self::$errores[] = 'Debes ingresar un titulo';
    }

    if(!$this->precio) {
      self::$errores[] = 'Debes ingresar un precio';
    }

    if(strlen($this->descripcion) < 50) {  //< indica menor que
      self::$errores[] = 'Debes ingresar una descripcion mas amplia mayor a 50 caracteres';
    }

    if(!$this->habitaciones) {
      self::$errores[] = 'Debes ingresar el numero de habitaciones';
    }

    if(!$this->wc) {
      self::$errores[] = 'Debes ingresar el numero de sanitarios';
    }

    if(!$this->estacionamiento) {
      self::$errores[] = 'Debes ingresar si cuenta con estacionamientos';
    }

    if(!$this->imagen) {
      self::$errores[] = 'La imagen es obligatoria';
    }

    return self::$errores;

  }
}

