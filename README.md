# Proyecto Pera

### Objetivo
Proyecto enfocado en la elaboracion de fichas socioeconomicas y ocupacionales para el ISTA.

### Lenguaje  
- PHP

### Base de datos
- Postgres

### Indicaciones de como funciona
**General**
- Al requerir un archivo se debe especificar desde el nivel de la carpeta src.
```php
require 'src/vista/templates/header.php';
require_once ("src/modelo/permisoingreso/permisoingreso.php");
```
- Para usar una accion desde nuestras vistas utilizamos la constante URL
```php
//Aqui indicamos una accion que se realizara en un metodo de nuestro controlador
<form class="" action="<?php echo constant('URL'); ?>permisoficha/guardar" method="post">
//Aqui utilizaremos archivos de nuestra carpeta publica
<link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/main.css">
```
- Archivos que estan cargados en la pagina desde el inicio, **No se necesitan requerirlas mas**
```php
//Si se requieren que mas archivos sean accedidos de manera global deben ser especificados en index.php
require_once 'config/config.php';
require_once 'src/utils/dctr.php';
require_once 'src/utils/controlador.php';
require_once 'src/utils/error.php';
require_once 'src/utils/bd.php';
require_once 'src/controlador/main.php';
```
- Todos los errores estaran en el archivos errores.php de la carpeta utils, son cargados desde el inicio asi que podran ser accedidos desde cualquier punto. Todos los metodos del mismo deben ser staticos.

**Base de datos**
- La conexion a la base de datos debe ser modificada en la carpeta config/config.php

**Controladores**
- Todos funcionaran para rutear.
- Todos deberan terminar con CTR.
```php
class PersonaCTR {

}
```
- Todos deben extender de CTR.
```php
class PersonaCTR extends CTR {

}
```
- Deben implementar la interfaz de DCTR e implementar el metodo inicio.
```php
class PersonaCTR extends CTR implements DCTR {

  //Metodo que debe sobreescribir
  public function inicio(){
    //En este metodo llamaremos a cargar todo y la tabla
  }
}
```
- Todos los controladores deberan requerir al inicio su correspondiente modelobd.
```php
require_once 'src/modelo/personas/personabd.php';
```
- Todos los links funcionan con el nombre del archivo y el nombre del metodo.
```php
-permisoficha
  -permisoficha.php
    -PermisoFichaCTR
      -guardar
```

**Vistas**
- Todas las vistas que no sean formulario deberan requerir header.php y footer.php.
```php
//Al inicio del documento
require 'src/vista/templates/header.php';

//Al final del documento
require 'src/vista/templates/footer.php';
```
- Todos las vistas que sean formulario deberan requerir headerform.php y footerform.php.
```php
//Al inicio del documento
require 'src/vista/templates/headerform.php';

//Al final del documento
require 'src/vista/templates/footerform.php';

```
**Modelos**
Para no tardarnos mucho en la creacion de los modelos no crearemos getters ni setters. (Esto no es obligatorio solo es un consejo para escribir mas rapido el codigo.).
- Los modelos deberan estar en su carpeta correspondiente.
```php
-permisoingreso
  -permisoingreso.php
  -permisoingresobd.php
```
- Ejemplo de un modelo.
```php
class ModeloMD {
  public $nombre;
  public $apellido;
  public $edad;
}
```
- Todos los que se conectan con base de datos deberan ser abstract ya que no las vamos a instanciar, todos sus metodos seran staticos.
- Todos los modelos bd deberan requerir el modelo correspondiente al inicio.
```php
require_once 'src/modelo/modelos/modelo.php';
```
- Ejemplo de un modelo para base de datos
```php
abstract class ModeloBD {
  static function guadar($modelo) {
    $sql = '
    INSERT INTO public."Modelos"(nombre, apellido, edad)
    VALUES(:nombre, :apellido, :edad);
    ';
    //Tenemos acceso a este metodo debido a que lo cargamos al inicio en el index.php
    $ct = getCon();
    if($ct != null){
      $s = $ct->prepare($sql);
      //Si se expresaron parametros en el insert se los mapea en este array con tipo llave valor
      $res = $s->execute([
          'nombre' => $modelo->nombre,
          'apellido' => $modelo->apellido,
          'edad' => $modelo->edad,
        ]);
      if($res != null){
        return true;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }
}
```

#### Sientanse libres de mejorar el codigo que se expone aqui, cualquier mejora debe se documentada detallando la fecha de modificacion y en los lugares en los que fueron implementados (El autor tambien seria importante.).
