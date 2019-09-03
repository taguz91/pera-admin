<?php

class RespuestaCTR extends CTR implements DCTR {

  public function __construct()
  {
      parent::__construct("src/vista/respuesta/");
  }

  function inicio() {
    require $this->cargarVista('fs.php');
  }

}

 ?>
