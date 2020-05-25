<?php

class estudianteDto{
    public $codigoEstudiante;
    public $contrasena;
    public $documento;
    public $egresado;
    public $correoInstitucional;
    public $semestreCursado;
    public $promedio ;
    public $materias_aprobadas;
    public $fechaIngreso;
    public $fechaEgreso;
    public $idHistorial;


    public function __construct(){
    }

   


    public function getcodigoEstudiante(){
        return $this->codigoEstudiante;
    }

    public function setcodigoEstudiante($codigoEstudiante){
        $this ->codigoEstudiante = $codigoEstudiante;
    }

    public function getContrasena(){
        return $this->contrasena;
    }

    public function setContrasena($contrasena){
        $this ->contrasena = $contrasena;
    }

    public function getDocumento(){
        return $this->documento;
    }

    public function setDocumento($documento){
        $this ->documento = $documento;
    }

    public function getEgresado(){
        return $this->egresado;
    }

    public function setEgresado($egresado){
        $this ->egresado = $egresado;
    }

    public function getCorreo(){
        return $this->correoInstitucional;
    }

    public function setCorreo($correoInstitucional){
        $this ->correoInstitucional = $correoInstitucional;
    }

    public function getsemestreCursado(){
        return $this->semestreCursado;
    }

    public function setsemestreCursado($semestreCursado){
        $this ->semestreCursado = $semestreCursado;
    }

    public function getfechaIngreso(){
        return $this->fechaIngreso;
    }

    public function setfechaIngreso($fechaIngreso){
        $this ->fechaIngreso = $fechaIngreso;
    }

    public function getfechaEgreso(){
        return $this->fechaEgreso;
    }

    public function setfechaEgreso($fechaEgreso){
        $this ->fechaEgreso = $fechaEgreso;
    }

    public function getidHistorial(){
        return $this->idHistorial;
    }

    public function setidHistorial($idHistorial){
        $this ->idHistorial = $idHistorial;
    }

    public function getPromedio(){
        return $this->promedio;
    }

    public function setPromedio($promedio){
        $this ->promedio = $promedio;
    }

    public function getMateriaAp(){
        return $this->materias_aprobadas;
    }

    public function setMateriaAp($materias_aprobadas){
        $this ->materias_aprobadas = $materias_aprobadas;
    }
}

?>