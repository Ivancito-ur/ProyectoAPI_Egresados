<?php

class ofertaLaboralDto{
    public $idOferta;
    public $cargo;
    public $ciudad;
    public $sueldo;
    public $estado;
    public $fecha;
    public $fechaAceptacion;
    public $nitEmpresa;


    public function __construct($idOferta, $cargo, $ciudad, $sueldo, $estado, $fecha, $fechaAceptacion, $nitEmpresa){
        $this->idOferta = $idOferta;
        $this->cargo = $cargo;
        $this->ciudad = $ciudad;
        $this->sueldo = $sueldo;
        $this->estado = $estado;
        $this->fecha = $fecha;
        $this->fechaAceptacion = $fechaAceptacion;
        $this->nitEmpresa = $nitEmpresa;
    }

    public function getidOferta(){
        return $this->idOferta;
    }

    public function setidOferta($idOferta){
        $this ->idOferta = $idOferta;
    }

    public function getCargo(){
        return $this->cargo;
    }

    public function setCargo($cargo){
        $this ->cargo = $cargo;
    }

    public function getCiudad(){
        return $this->ciudad;
    }

    public function setCiudad($ciudad){
        $this ->ciudad = $ciudad;
    }

    public function getSueldo(){
        return $this->sueldo;
    }

    public function setSueldo($sueldo){
        $this ->sueldo = $sueldo;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this ->estado = $estado;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($fecha){
        $this ->fecha = $fecha;
    }

    public function getfechaAceptacion(){
        return $this->fechaAceptacion;
    }

    public function setfechaAceptacion($fechaAceptacion){
        $this ->fechaAceptacion = $fechaAceptacion;
    }

    public function getnitEmpresa(){
        return $this->nitEmpresa;
    }

    public function setnitEmpresa($nitEmpresa){
        $this ->nitEmpresa = $nitEmpresa;
    }


}

?>