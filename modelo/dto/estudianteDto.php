<?php

class estudianteDto{
    public $codigoEstudiante;
    public $idEstudiante;
    public $semestreCursado;
    public $tipo;
    public $sexo;
    public $correo;
    public $idOferta;
    public $idHistorial;


    public function __construct($codigoEstudiante, $idEstudiante, $semestreCursado, $tipo, $sexo, $correo, $idOferta, $idHistorial){
        $this->codigoEstudiante = $codigoEstudiante;
        $this->idEstudiante = $idEstudiante;
        $this->semestreCursado = $semestreCursado;
        $this->tipo = $tipo;
        $this->sexo = $sexo;
        $this->correo = $correo;
        $this->idOferta = $idOferta;
        $this->idHistorial = $idHistorial;
    }

    public function getcodigoEstudiante(){
        return $this->codigoEstudiante;
    }

    public function setcodigoEstudiante($codigoEstudiante){
        $this ->codigoEstudiante = $codigoEstudiante;
    }

    public function getidEstudiante(){
        return $this->idEstudiante;
    }

    public function setidEstudiante($idEstudiante){
        $this ->idEstudiante = $idEstudiante;
    }

    public function getsemestreCursado(){
        return $this->semestreCursado;
    }

    public function setsemestreCursado($semestreCursado){
        $this ->semestreCursado = $semestreCursado;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this ->tipo = $tipo;
    }

    public function getSexo(){
        return $this->sexo;
    }

    public function setSexo($sexo){
        $this ->sexo = $sexo;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function setCorreo($correo){
        $this ->correo = $correo;
    }

    public function getidOferta(){
        return $this->idOferta;
    }

    public function setidOferta($idOferta){
        $this ->idOferta = $idOferta;
    }

    public function getidHistorial(){
        return $this->idHistorial;
    }

    public function setidHistorial($idHistorial){
        $this ->idHistorial = $idHistorial;
    }
}

?>