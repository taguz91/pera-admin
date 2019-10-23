<?php
require_once 'src/modelo/permisoingreso/permisoingresobd.php';

class RespuestaCTR extends CTR implements DCTR {

  public function __construct() {
      parent::__construct("src/vista/respuesta/");
  }

  function inicio() {
    $res = PermisoIngresoBD::getParaReporte();
    require $this->cargarVista('index.php');
  }

  function reporte() {
    $idPermiso = isset($_GET['idPermiso']) ? $_GET['idPermiso'] : 0;
    $res = json_decode(file_get_contents('http://localhost/pera-public/api/v1/respuesta/reporte?id_permiso=' . $idPermiso ), true);
    if($res['statuscode'] == 200){
      $reportes = $res['items'];
      $reportes = $reportes[0];
      
      include $this->cargarVista('reporte.php');
    }else{
      echo "No obtuvimos resultados";
    }
  }

}

 ?>
