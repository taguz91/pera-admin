<?php

class DevCTR extends CTR implements DCTR {

  function __construct(){
    parent::__construct("src/vista/static/");
  }

  function inicio(){
    include $this->cargarVista('devs.php');;
  }

}

 ?>
