<?php
  require_once 'config/config.php';
  require_once 'src/utils/dctr.php';
  require_once 'src/utils/controlador.php';
  require_once 'src/utils/error.php';
  require_once 'src/utils/bd.php';
  require_once 'src/controlador/main.php';

  $usuario = null;

  //Preguntamos si tenemos el usuario para cargarlo
  if(isset($_COOKIE['userperadmin'])){
    $usuario = unserialize($_COOKIE['userperadmin']);
  }

  $M = new Main();
  $M->obtenerUrl();
 ?>
