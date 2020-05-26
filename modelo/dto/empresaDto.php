<?php

class personaDto{
    public $nitEmpresa;
    public $nombre;
    public $correo;
    public $telefono;
    public $celular;
    public $direccion;
    public $fechaRegistro;
    public $contrasena;

    public function __construct($nitEmpresa, $nombre, $correo, $telefono,$celular, $direccion, $fechaRegistro, $contrasena){
        $this->nitEmpresa = $nitEmpresa;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->celular = $celular;
        $this->direccion = $direccion;
        $this->fechaRegistro = $fechaRegistro;
        $this->contrasena = $contrasena;
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

    ////////////////////////////


    public function getCelular(){
        return $this->celular;
    }

    public function setCelular($celular){
        $this ->celular = $celular;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($direccion){
        $this ->direccion = $direccion;
    }

    public function getFechaR(){
        return $this->fechaRegistro;
    }

    public function setFechaR($fechaRegistro){
        $this ->fechaRegistro = $fechaRegistro;
    }


    public function getContrasena(){
        return $this->contrasena;
    }

    public function setContrasena($contrasena){
        $this ->contrasena = $contrasena;
    }

}

?>