<?php
//require_once("../clases/periodolectivomd.php");
require './src/modelo/sql.php';
class PermisoIngresoFichasMD
{
    private $id;
    private $fechaInicio;
    private $fechaFin;
    private $activo;
    private $idPeriodo;
    private $idTipoFicha;


    public function setId($id){
    	$this->id=$id;
    }

    public function getId(){
    	return $this->id;
    }

    public function setFechaInicio($fechaInicio){
    	$this->fechaInicio=$fechaInicio;
    }
    public function getFechaInicio(){
    	return $this->fechaInicio;
    }

    public function setFechaFin($fechaFin){
    	$this->fechaFin=$fechaFin;
    }
    public function getFechaFin(){
    	return $this->fechaFin;
    }

    public function setActivo($activo){
    	$this->activo=$activo;
    }
    public function getActivo(){
    	return $this->activo;
    }

    public function setIdPeriodo($idPeriodo) {
        $this->idPeriodo=$idPeriodo;
    }

    public function getIdPeriodo(){
        return $this->idPeriodo;
    }

    public function setIdTipoFicha($idTipoFicha) {
        $this->idTipoFicha=$idTipoFicha;
    }

    public function getIdTipoFicha(){
        return $this->idTipoFicha;
    }
}

?>