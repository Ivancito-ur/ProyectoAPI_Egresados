<?php

class hojaVidaDto{
    public $archivo;
    public $codigoEstudiante;


    public function __construct($archivo, $codigoEstudiante){
        $this->archivo = $archivo;
        $this->codigoEstudiante = $codigoEstudiante;
    }

    public function getArchivo(){
        return $this->archivo;
    }

    public function setArchivo($archivo){
        $this ->archivo = $archivo;
    }

    public function getcodigoEstudiante(){
        return $this->codigoEstudiante;
    }

    public function setcodigoEstudiante($codigoEstudiante){
        $this ->codigoEstudiante = $codigoEstudiante;
    }

    

}

?>