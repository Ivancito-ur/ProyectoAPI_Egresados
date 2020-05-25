<?php

class pruebasSaber11Dto{
    public $idSaber11;
    public $lectura;
    public $matematica;
    public $sociales;
    public $naturales;
    public $ingles;
  

    public function __construct($idSaber11, $lectura, $matematica, $sociales, $naturales, $ingles){
        $this->idSaber11 = $idSaber11;
        $this->lectura = $lectura;
        $this->matematica = $matematica;
        $this->sociales = $sociales;
        $this->naturales = $naturales;
        $this->ingles = $ingles;
       
    }

    public function getidSaber11(){
        return $this->idSaber11;
    }

    public function setidSaber11($idSaber11){
        $this ->idSaber11 = $idSaber11;
    }

    public function getLectura(){
        return $this->lectura;
    }

    public function setLectura($lectura){
        $this ->lectura = $lectura;
    }

    public function getMatematicas(){
        return $this->matematica;
    }

    public function setMatematicas($matematica){
        $this ->matematica = $matematica;
    }
    public function getSociales(){
        return $this->sociales;
    }

    public function setSociales($sociales){
        $this ->sociales = $sociales;
    }
    public function getNaturales(){
        return $this->naturales;
    }

    public function setNaturales($naturales){
        $this ->naturales = $naturales;
    }
    public function getIngles(){
        return $this->ingles;
    }

    public function setIngles($ingles){
        $this ->ingles = $ingles;
    }


}

?>