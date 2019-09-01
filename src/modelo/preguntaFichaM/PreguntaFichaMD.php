<?php
declare(strict_types=1);

class PreguntaFichaMD{

    private $idPreguntaFicha;
    private $idSeccionFicha;
    private $preguntaFicha;
    private $preguntaFichaAyuda;
    private $preguntaFichaTipo;
    private $preguntaFichaRespuestaTipo;
    private $preguntaFichaActiva;


    function __construct(int $idPreguntaFicha=null, int $idSeccionFicha=null, string $preguntaFicha=null,string $preguntaFichaAyuda=null,
                             int $preguntaFichaTipo=null, int $preguntaFichaRespuestaTipo=null ,bool $preguntaFichaActiva=true)
    {
        
        if($idPreguntaFicha!=null){
            $this->idPreguntaFicha=$idPreguntaFicha;
        }

        $this->idSeccionFicha=$idSeccionFicha;
        $this->preguntaFicha=$preguntaFicha;
        $this->preguntaFichaAyuda=$preguntaFichaAyuda;
        $this->preguntaFichaTipo=$preguntaFichaTipo;
        $this->preguntaFichaRespuestaTipo=$preguntaFichaRespuestaTipo;
        $this->preguntaFichaActiva=$preguntaFichaActiva;

    }


    public function getIdPreguntaFicha():int
    {
        return $this->idPreguntaFicha;
    }


    public function setIdPreguntaFicha($idPreguntaFicha)
    {
        $this->idPreguntaFicha = $idPreguntaFicha;

        return $this;
    }


    public function getIdSeccionFicha():int
    {
        return $this->idSeccionFicha;
    }
 

    public function setIdSeccionFicha($idSeccionFicha)
    {
        $this->idSeccionFicha = $idSeccionFicha;

        return $this;
    }


    public function getPreguntaFicha():string
    {
        return $this->preguntaFicha;
    }


    public function setPreguntaFicha($preguntaFicha)
    {
        $this->preguntaFicha = $preguntaFicha;

        return $this;
    }


    public function getPreguntaFichaAyuda():string
    {
        return $this->preguntaFichaAyuda;
    }


    public function setPreguntaFichaAyuda($preguntaFichaAyuda)
    {
        $this->preguntaFichaAyuda = $preguntaFichaAyuda;

        return $this;
    }


    public function getPreguntaFichaTipo():int
    {
        return $this->preguntaFichaTipo;
    }


    public function setPreguntaFichaTipo($preguntaFichaTipo)
    {
        $this->preguntaFichaTipo = $preguntaFichaTipo;

        return $this;
    }


    public function getPreguntaFichaRespuestaTipo():int
    {
        return $this->preguntaFichaRespuestaTipo;
    }


    public function setPreguntaFichaRespuestaTipo($preguntaFichaRespuestaTipo)
    {
        $this->preguntaFichaRespuestaTipo = $preguntaFichaRespuestaTipo;

        return $this;
    }

    public function getPreguntaFichaActiva():bool
    {
        return $this->preguntaFichaActiva;
    }


    public function setPreguntaFichaActiva($preguntaFichaActiva)
    {
        $this->preguntaFichaActiva = $preguntaFichaActiva;

        return $this;
    }

}