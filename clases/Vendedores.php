<?php

namespace App;

class Vendedores extends ActiveRecord {
  protected static $tabla = 'Vendedores';
  protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

  public $id;
  public $nombre;
  public $apellido;
  public $telefono;


  public function __construct($arreglo = [])
  {
    $this->id = $arreglo['id'] ?? null;
    $this->nombre = $arreglo['nombre'] ?? '';
    $this->apellido = $arreglo['apellido'] ?? '';
    $this->telefono = $arreglo['telefono'] ?? '';
  }


  public function validarErrores() {
    if(!$this->nombre) {
      self::$errores[] = 'Debes ingresar un nombre';
    }

    if(!$this->apellido) {
      self::$errores[] = 'Debes ingresar un apellido';
    }

    if(!$this->telefono) {
      self::$errores[] = 'Debes ingresar un telefono';
    }

    if(!preg_match('/[0-9]{10}/', $this->telefono)) {
      self::$errores[] = 'Formato no valido';
    }

    return self::$errores;

  }

}