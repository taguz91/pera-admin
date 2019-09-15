<?php
require_once 'src/modelo/usuario/usuariobd.php';

class LoginCTR extends CTR implements DCTR {

  //Pasamos la carpeta donde estan las vistas
  function __construct(){
    parent::__construct("src/vista/static/");
  }

  public function inicio() {
    global $usuario;
    if ($usuario == null) {
      require $this->cargarVista('login.php');
    } else {
      require $this->cargarVista('sesion.php');
    }

  }

  public function ingresar() {
    if(isset($_POST['ingresar'])){
      var_dump($_POST);
      $user = new UsuarioMD();
      $per = new PersonaMD();
      $user->user = 'PRUEBA';

      $per->primerNombre = 'Johnny';
      $per->segundoNombre = 'Gustavo';
      $per->primerApellido = 'Garcia';
      $per->segundoApellido = 'Inga';
      $per->identificacion = '0107390270';
      $per->correo = 'gus199811@gmail.com';
      $per->celular = '0968796010';

      $user->persona = $per;
      var_dump($user);
      //Guardamos el usuario en la cookie
      setcookie('usuario', serialize($user), time()+360000, '/');
      header("Location: ".constant('URL'));
    }

    if(isset($_POST['olvide'])){
      var_dump($_POST);
    }
  }

  public function salir() {
    //Borramos la cookie
    if(isset($_COOKIE['usuario'])){
      setcookie('usuario', null , time() - 360, '/');
    }
    header("Location: ".constant('URL'));
  }

}

 ?>
