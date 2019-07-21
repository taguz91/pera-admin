<?php
abstract class Errores{

  static function error404(){
    echo "<h1>No encontramos esta vista</h1>";
  }

  static function errorVariableNoEncontrada(){
    echo "<h1>No encontramos la variable</h1>";
  }

  static function errorEditar($nombre){
    echo "<h1>No podemos editar $nombre</h1>";
  }

  static function errorEliminar($nombre){
    echo "<h1>No podemos eliminar $nombre</h1>";
  }
}

 ?>
