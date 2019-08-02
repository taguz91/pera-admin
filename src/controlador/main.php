<?php

class Main {

  private $usuario;

  function __construct(){
    //Preguntamos si tenemos el usuario para cargarlo
    if(isset($_COOKIE['usuario'])){
      $this->usuario = unserialize($_COOKIE['usuario']);
    } else {
      $this->usuario = null;
    }
  }

  function obtenerUrl(){
    $url = isset($_GET['url']) ? $_GET['url']: NULL;

    if($url != null){
      $url = rtrim($url, '/');
      $url = explode('/', $url);

      if(isset($url[0])){
        $this->cargarClase($url);
      }

    }else{
      //require 'src/vista/static/login.php';

      if($this->usuario != null){
          require 'src/vista/static/home.php';
      }else{
          header("Location: ".constant('URL')."login");
      }

      //echo "<h1>No tenemos url</h1>";
    }
  }

  function cargarClase($url){
    $nombre = $url[0];

    $dir = 'src/controlador/'.$nombre.'/'.$nombre.'.php';
    if(file_exists($dir)){
      require_once $dir;
      $nombre = $nombre . 'CTR';
      $modelo = new $nombre();

      //Validamos si esta iniciado session
      if ($this->usuario != null OR isset($_POST['ingresar'])) {
        if(isset($url[1])){
          $this->llamarMetodo($url, $modelo);
        }else{
          $modelo->inicio();
        }
      } else {
        require_once 'src/vista/static/login.php';
      }


    }else{
        Errores::error404();
        echo "<h1>No pudimos obtener la clase</h1>";
        //header("Location: ".constant('URL'));
    }

  }

  function llamarMetodo($url, $modelo){
    $metodo = $url[1];

    if(isset($url[2])){
      $this->llamarMetodoConParametro($url, $modelo);
    }else{
      try{
        $modelo->{$metodo}();
      }catch(\Exception $e){
        echo "<h1>No pudimos enontrar el metodo </h1>".$e->getMessage();
      }
    }

  }

  function llamarMetodoConParametro($url, $modelo){
    $metodo = $url[1];
    $parametro = $url[2];
    //Preguntamos si existe mas de un parametro
    if (strpos($parametro, '-') !== false) {
      $parametro = explode('-', $parametro);
      //var_dump($parametro);
      $modelo->{$metodo}($parametro);
    }else{
      $modelo->{$metodo}($parametro);
    }
  }
}

 ?>
