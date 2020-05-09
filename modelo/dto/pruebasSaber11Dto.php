<?php

class pruebasSaber11Dto{
    public $idSaber11;
    public $codigoEstudiante;


    public function __construct($idSaber11, $codigoEstudiante){
        $this->idSaber11 = $idSaber11;
        $this->codigoEstudiante = $codigoEstudiante;
    }

    public function getidSaber11(){
        return $this->idSaber11;
    }

    public function setidSaber11($idSaber11){
        $this ->idSaber11 = $idSaber11;
    }

    public function getcodigoEstudiante(){
        return $this->codigoEstudiante;
    }

    public function setcodigoEstudiante($codigoEstudiante){
        $this ->codigoEstudiante = $codigoEstudiante;
    }


}

?>