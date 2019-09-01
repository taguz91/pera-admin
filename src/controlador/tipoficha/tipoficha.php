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
      include $this->cargarVista('form.php');
    } else {
      //guardamos
      $res = TipoFichaBD::guardar($tf);
    }

  }

  function editar() {
    if(isset($_GET['editar'])){
      $tf = TipoFichaBD::getPorId($_GET['editar']);
      include $this->cargarVista('form.php');
    } else {
      $tf = $this->tipoFichaFromPOST();
    }

  }

  function eliminar() {
    if(isset($_GET['eliminar'])){
      $res = TipoFichaBD::eliminar($_GET['eliminar']);
    }
  }


  private function tipoFichaFromPOST() {
    if(
      isset($_POST['nombreficha']) &&
      isset($_POST['descripcionficha'])
    ){
      $tf = new TipoFichaMD();
      $tf->tipoFicha = $_POST['nombreficha'];
      $tf->descripcion = $_POST['descripcionficha'];
      return $tf;
    }
  }

}

 ?>
