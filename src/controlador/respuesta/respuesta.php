<?php

class RespuestaCTR extends CTR implements DCTR {

  public function __construct()
  {
      parent::__construct("src/vista/respuesta/");
  }

  function inicio() {
    require $this->cargarVista('fs.php');
  }

  function reporte() {
    $res = json_decode(file_get_contents('http://localhost/pera-public/api/v1/respuesta/reporte'), true);
    if($res['statuscode'] == 200){
      $personas = $res['items'];
      include cargarVista('respuesta/reporte.php');
    }else{
      echo "No obtuvimos resultados";
    }
  }

}

 ?>
