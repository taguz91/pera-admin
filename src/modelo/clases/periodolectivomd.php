<?php
/**
 * 
 */
class PeriodoLectivoMD
{
	private $id;
	private $nombrePeriodo;
	private $fechaInicio;
	private $fechaFin;

	public function setId($id){
    	$this->id=$id;
    }

    public function getId(){
    	return $this->id;
    }

    public function setNombrePeriodo($nombrePeriodo){
    	$this->nombrePeriodo=$nombrePeriodo;
    }

    public function getNombrePeriodo(){
    	return $this->nombrePeriodo;
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
}
?>