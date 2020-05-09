<?php

class pruebasSaberProDto{
    public $idSaberPro;
    public $codigoEstudiante;


    public function __construct($idSaberPro, $codigoEstudiante){
        $this->idSaberPro = $idSaberPro;
        $this->codigoEstudiante = $codigoEstudiante;
    }

    public function getidSaberPro(){
        return $this->idSaberPro;
    }

    public function setidSaberPro($idSaberPro){
        $this ->idSaberPro = $idSaberPro;
    }

    public function getcodigoEstudiante(){
        return $this->codigoEstudiante;
    }

    public function setcodigoEstudiante($codigoEstudiante){
        $this ->codigoEstudiante = $codigoEstudiante;
    }


}

?>