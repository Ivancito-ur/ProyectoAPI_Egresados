<?php
class historialDto{
    public $idHistorial;
    public $materiasAprobadas;
    public $promedio;
    public $codigoEstudiante;
    public $idSaberPro;
    public $idSaber11;



    public function __construct($idHistorial, $materiasAprobadas, $promedio, $codigoEstudiante, $idSaberPro, $idSaber11){
        $this->idHistorial = $idHistorial;
        $this->materiasAprobadas = $materiasAprobadas;
        $this->promedio = $promedio;
        $this->codigoEstudiante = $codigoEstudiante;
        $this->idSaberPro = $idSaberPro;
        $this->idSaber11 = $idSaber11;
    }

    public function getidHistorial(){
        return $this->idHistorial;
    }

    public function setidHistorial($idHistorial){
        $this ->idHistorial = $idHistorial;
    }

    public function getmateriasAprobadas(){
        return $this->materiasAprobadas;
    }

    public function setmateriasAprobadas($materiasAprobadas){
        $this ->materiasAprobadas = $materiasAprobadas;
    }

    public function getPromedio(){
        return $this->promedio;
    }

    public function setPromedio($promedio){
        $this ->promedio = $promedio;
    }

    public function getcodigoEstudiante(){
        return $this->codigoEstudiante;
    }

    public function setcodigoEstudiante($codigoEstudiante){
        $this ->codigoEstudiante = $codigoEstudiante;
    }

    public function getidSaberPro(){
        return $this->idSaberPro;
    }

    public function setidSaberPro($idSaberPro){
        $this ->idSaberPro = $idSaberPro;
    }

    public function getidSaber11(){
        return $this->idSaber11;
    }

    public function setidSaber11($idSaber11){
        $this ->idSaber11 = $idSaber11;
    }
}
?>