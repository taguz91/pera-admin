<?php
require_once 'src/modelo/usuario/usuariobd.php';

class LoginCTR extends CTR implements DCTR {

  //Pasamos la carpeta donde estan las vistas
  function __construct(){
    parent::__construct("src/vista/static/");
  }

  public function inicio() {
    require $this->cargarVista('login.php');
  }

  public function ingresar() {
    if(isset($_POST['ingresar'])){
      var_dump($_POST);
      $user = new UsuarioMD();
      var_dump($user);

      //Guardamos el usuario en la cookie
      setcookie('usuario', serialize($user), time()+360, '/');

      header("Location: ".constant('URL'));
    }

    if(isset($_POST['olvide'])){
      var_dump($_POST);
    }
  }

  public function salir() {
    echo "NO borramos";
    if(isset($_POST['salir'])){
      //Borramos la cookie
      if(isset($_COOKIE['usuario'])){
        setcookie('usuario', null , time() - 360, '/');
        echo "borramos la cookie<br>";
        var_dump($_COOKIE['usuario']);
        header("Location: ".constant('URL'));
      }else{
        header("Location: ".constant('URL'));
      }

    }
  }

}

 ?>
