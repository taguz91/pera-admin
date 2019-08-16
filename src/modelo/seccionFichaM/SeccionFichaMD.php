<?php
declare(strict_types=1);

class SeccionFichaMD{

    private $idSeccionFicha;
    private $idTipoFicha;
    private $seccionFichaNombre;
    private $seccionFichaActiva;

    function __construct(int $idSeccionFicha=null, int $idTipoFicha, string $seccionFichaNombre, bool $seccionFichaActiva=true)
    {
        if($idSeccionFicha!=null){
            
            $this->idSeccionFicha=$idSeccionFicha;
        }
        $this->idTipoFicha=$idTipoFicha;
        $this->seccionFichaNombre=$seccionFichaNombre;
        $this->seccionFichaActiva=$seccionFichaActiva;
    }
    

    
    public function getIdSeccionFicha():int
    {
        return $this->idSeccionFicha;
    }

 
    public function setIdSeccionFicha(int $idSeccionFicha)
    {
        $this->idSeccionFicha = $idSeccionFicha;

        return $this;
    }

    public function getIdTipoFicha():int
    {
        return $this->idTipoFicha;
    }


    public function setIdTipoFicha(int $idTipoFicha)
    {
        $this->idTipoFicha = $idTipoFicha;

        return $this;
    }

    public function getSeccionFichaNombre():string
    {
        return $this->seccionFichaNombre;
    }


    public function setSeccionFichaNombre(string $seccionFichaNombre)
    {
        $this->seccionFichaNombre = $seccionFichaNombre;

        return $this;
    }

 
    public function getSeccionFichaActiva():bool
    {
        return $this->seccionFichaActiva;
    }


    public function setSeccionFichaActiva(bool $seccionFichaActiva)
    {
        $this->seccionFichaActiva = $seccionFichaActiva;

        return $this;
    }
}