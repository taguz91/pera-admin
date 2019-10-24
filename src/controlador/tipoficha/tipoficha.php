<?php
require_once 'src/modelo/tipoficha/tipofichabd.php';

class TipoFichaCTR extends CTR implements DCTR {

  function __construct(){
    parent::__construct("src/vista/tipoficha/");
  }

  function inicio(){
    $tiposfichas = TipoFichaBD::getAll();
    include $this->cargarVista('index.php');
  }

  function guardar() {
    $tf = $this->tipoFichaFromPOST();
    if($tf == null){
      include $this->cargarVista('guardar.php');
    } else {
        $res = TipoFichaBD::guardar($tf);

        $this->inicio();
    }

  }

  function editar() {
    if(isset($_GET['editar'])){
      $tf = TipoFichaBD::getPorId($_GET['editar']);
      include $this->cargarVista('editar.php');
    } else {
      $tf = $this->tipoFichaFromPOST();

      if ($tf != null) {
        $tf->id = isset($_POST['id']) ? $_POST['id'] : 0;
        echo $tf->id . '<br>';

        $res = TipoFichaBD::editar($tf);
      }

      $this->inicio();
    }
  }

  private function tipoFichaFromPOST() {
    if(
      isset($_POST['nombreficha']) &&
      isset($_POST['descripcionficha'])
    ){
      // No este nulo y que no este con codigo malisioso
      $tipo = $_POST['nombreficha'];
      $des = $_POST['descripcionficha'];
      if($tipo != '' && $des != ''){
        $tf = new TipoFichaMD();
        $tf->tipoFicha = $tipo;
        $tf->descripcion = $des;
        return $tf;
      }
    }
  }

}

 ?>
