<?php

class personaDto{
    public $cedula;
    public $nombre;
    public $celular;
    public $correo;


    public function __construct($cedula, $nombre, $celular, $correo){
        $this->cedula = $cedula;
        $this->nombre = $nombre;
        $this->celular = $celular;
        $this->correo = $correo;
    }

    public function getCedula(){
        return $this->cedula;
    }

    public function setCedula($cedula){
        $this ->cedula = $cedula;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this ->nombre = $nombre;
    }

    public function getCelular(){
        return $this->celular;
    }

    public function setCelular($celular){
        $this ->celular = $celular;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function setCorreo($correo){
        $this ->correo = $correo;
    }

}

?>