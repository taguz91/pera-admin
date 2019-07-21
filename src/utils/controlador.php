<?php

abstract class CTR {

  private $dirVista;

  function __construct($dirVista){
    $this->dirVista = $dirVista;
  }

    protected function cargarVista($file){
      $file = $this->dirVista.$file;
      if(file_exists($file)){
        return $file;
      }else {
        Errores::error404();
      }
    }


}
