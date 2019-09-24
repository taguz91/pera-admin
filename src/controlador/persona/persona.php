<?php
require_once 'src/modelo/persona/personabd.php';

class PersonaCTR extends CTR implements DCTR {
  function __construct() {
    parent::__construct("src/vista/persona/");
  }

  public function inicio($mensaje = null) {
    $personas = PersonaBD::getAll();
    require $this->cargarVista('index.php');
  }


}

 ?>
