<?php

class pruebasSaberProDto{
    public $id_saberPro;
    public $lectura;
    public $razonamiento;
    public $sociales;
    public $comunicacion;
    public $ingles;
  

    public function __construct($id_saberPro, $lectura, $razonamiento, $sociales, $comunicacion, $ingles){
        $this->id_saberPro = $id_saberPro;
        $this->lectura = $lectura;
        $this->razonamiento = $razonamiento;
        $this->sociales = $sociales;
        $this->comunicacion = $comunicacion;
        $this->ingles = $ingles;
       
    }

    public function getidSaberpro(){
        return $this->id_saberPro;
    }

    public function setidSaberpro($id_saberPro){
        $this ->id_saberPro = $id_saberPro;
    }

    public function getLectura(){
        return $this->lectura;
    }

    public function setLectura($lectura){
        $this ->lectura = $lectura;
    }

    public function getRazonamiento(){
        return $this->razonamiento;
    }

    public function setRazonamiento($razonamiento){
        $this ->razonamiento = $razonamiento;
    }
    public function getSociales(){
        return $this->sociales;
    }

    public function setSociales($sociales){
        $this ->sociales = $sociales;
    }
    public function getComunicacion(){
        return $this->comunicacion;
    }

    public function setComunicacion($comunicacion){
        $this ->comunicacion = $comunicacion;
    }
    public function getIngles(){
        return $this->ingles;
    }

    public function setIngles($ingles){
        $this ->ingles = $ingles;
    }



}

?>