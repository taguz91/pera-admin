<?php

require_once 'src/utils/json.php';

class Main {

  function __construct(){
  }

  function obtenerUrl(){
    $url = isset($_GET['url']) ? $_GET['url']: NULL;

    global $usuario;

    if($url != null){
      $url = rtrim($url, '/');
      $url = explode('/', $url);

      if(isset($url[0])){
        $this->cargarClase($url);
      }

    }else{
      //Si ya tenemos el usuario lo enviamos al home
      if($usuario != null){
          require 'src/vista/static/home.php';
      }else{
          header("Location: ".constant('URL')."login");
      }

    }
  }

  function cargarClase($url){
    global $usuario;

    //Nombre de la clase que llamaremos
    $nombre = $url[0];

    $dir = 'src/controlador/'.$nombre.'/'.$nombre.'.php';

    if(file_exists($dir)){
      require_once $dir;
      //Iniciamos el nombre de la clase
      $nombre = $nombre . 'CTR';
      //Creamos el objeto
      $modelo = new $nombre();

      //Validamos si esta iniciado session
      if ($usuario != null OR
      (isset($_POST['txtUsuario']) AND isset($_POST['txtPass'])) ) {
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
