<?php

class personaDto{
    public $nitEmpresa;
    public $nombre;
    public $correo;
    public $telefono;


    public function __construct($nitEmpresa, $nombre, $correo, $telefono){
        $this->nitEmpresa = $nitEmpresa;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->telefono = $telefono;
    }

    public function getnitEmpresa(){
        return $this->nitEmpresa;
    }

    public function setnitEmpresa($nitEmpresa){
        $this ->nitEmpresa = $nitEmpresa;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this ->nombre = $nombre;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function setCorreo($correo){
        $this ->correo = $correo;
    }


    public function getTelefono(){
        return $this->telefono;
    }

    public function setTelefono($telefono){
        $this ->telefono = $telefono;
    }

}

?>