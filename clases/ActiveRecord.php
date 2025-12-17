<?php

namespace App;


class ActiveRecord {
   //Base de datos
  protected static $infoBasedatos;
  protected static $columnasDB = [];
  protected static $errores = [];
  protected static $tabla = '';

  //Definir conexion a base datos
  public static function confDatabase($baseDatos) {
  self::$infoBasedatos = $baseDatos;
  }


   //identificar y unir los atributos de la base de datos
  public function atributos() {
    $atributos = [];
    foreach(static::$columnasDB as $columna) {
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

  public function guardar() {
    if(!is_null($this->id)) {
      //Actualizar
      $this->actualizar();
    } else { //Creando nuevo registro
      $this->crear();
    }
  }
  
  public function crear() {
    //Sanitizar los datos
    $atributos = $this->sanitizarDatos();

    // CORREGIDO: Orden correcto de columnas y sin comillas en números
    $query = " INSERT INTO " . static::$tabla . " (";
    $query .= join(', ', array_keys($atributos));
    $query .= ") VALUES ('"; 
    $query .= join("', '", array_values($atributos));
    $query .= "') ";


      
    $resultado = self::$infoBasedatos->query($query);

    if($resultado) {
      header('Location: /admin?resultado=1');
    }
  }

  public function actualizar() {
    //debuguear('Actualizando');
    $atributos = $this->sanitizarDatos();

    $valores = [];
    foreach($atributos as $key => $value) {
      $valores[] = "$key='$value'";
    }

    //debuguear(join(', ', $valores));
    $formatovalores = join(', ', $valores);

    $query = "UPDATE " .  static::$tabla . " SET ";
    $query .= $formatovalores;
    $query .= " WHERE id = '" . self::$infoBasedatos->escape_string($this->id) . " ' ";
    $query .= " LIMIT 1";

    //debuguear($query);
    $resultado = self::$infoBasedatos->query($query);

    if($resultado) {
        header('Location: /admin?resultado=2');
      }
  }

  //Mostrar errores en pantalla
  public static function getErrores() {
    return static::$errores;
  }

  public function validarErrores() {
    static::$errores = [];
    return static::$errores;
  }

  //Setear imagen y eliminar imagen en actualizar
  public function setImage($imagenCargada) {
    //Elimina la imagen previa, revision de imagen
    //debuguear($this->imagen);
    if(!is_null($this->id)) {
      //Comprobar si existe el archivo
      $this->borrarImagen();
    }

    if($imagenCargada) {
      $this->imagen = $imagenCargada;
    }
  }

   //Eliminar archivo imagen para metodo eliminar
  public function borrarImagen() {
    //debuguear('Eliminando imagen....');
    $archivo = file_exists(CARPETA_IMG . $this->imagen);
    if($archivo) {
      unlink(CARPETA_IMG . $this->imagen);
    }
  }

  //Mostrar todas las propiedades o datos
  public static function all() {
    $query = "SELECT * FROM " . static::$tabla;
    

    //debuguear($query);
    $resultado = self::consultaSQL($query);

    return $resultado;
  }

  public static function consultaSQL ($query){
    $resultado = self::$infoBasedatos->query($query);
    //debuguear($resultado);

    $array = [];
    while($registroDB = $resultado->fetch_assoc()) {
      //debuguear($registroDB);
      $array[] = static::crearObjeto($registroDB);
    }

    //debuguear($array);
    return $array;
  }


  protected static function crearObjeto($registro) {
    $objeto = new static;
    //debuguear($objeto);

    foreach($registro as $key => $value) {
      //debuguear($key);
      if(property_exists($objeto, $key)) {
        $objeto->$key = $value;
      }
    }
    return $objeto;
  }


  //Buscar propiedad por id
  public static function find($id) {
    $consulta = "SELECT * FROM " . static::$tabla . " WHERE id = $id";
    $resultado = self::consultaSQL($consulta);

    //debuguear(array_shift($resultado)); //retornar 1 resultado
    return array_shift($resultado);
  }


  //Sincronizar objeto en memoria con los cambios realizados por el usuario
  public function sincronizar($args = []) {
    //echo 'Sincronizando....';
    //debuguear($args);
    foreach($args as $key => $value) {
      if(property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }

  public function eliminar() {
    //debuguear('Eliminando...' . $this->id);
    $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$infoBasedatos->escape_string($this->id) . " LIMIT 1";
    //debuguear($query);
    $resultado = self::$infoBasedatos->query($query);

    if($resultado) {
        $this->borrarImagen();
        header('location: /admin?resultado=3');
      }
  }


  //Mostrar numero de publicaciones
  public static function mostrar($cantidad) {
    $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
    //debuguear($query);
    

    //debuguear($query);
    $resultado = self::consultaSQL($query);

    return $resultado;
  }
}