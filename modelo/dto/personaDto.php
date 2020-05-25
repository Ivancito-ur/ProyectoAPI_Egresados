<?php

class personaDto{
    public $nombres;
    public $apellidos;
    public $documento;
    public $celular;
    public $telefono;
    public $direccion;
    public $correo;
    public $tipo_documento;


    public function __construct($nombres, $apellidos, $documento, $celular, $telefono, $direccion, $correo, $tipo_documento){
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->documento = $documento;
        $this->celular = $celular;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->correo = $correo;
        $this->tipo_documento = $tipo_documento;
    }

   

    public function getNombre(){
        return $this->nombres;
    }

    public function setNombre($nombres){
        $this ->nombres = $nombres;
    }

    public function getApellido(){
        return $this->apellidos;
    }

    public function setApellido($apellidos){
        $this ->apellidos = $apellidos;
    }
    public function getDocumento(){
        return $this->documento;
    }

    public function setDocumento($documento){
        $this ->documento = $documento;
    }

    public function getCelular(){
        return $this->celular;
    }

    public function setCelular($celular){
        $this ->celular = $celular;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function setTelefono($telefono){
        $this ->telefono = $telefono;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($direccion){
        $this ->direccion = $direccion;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function setCorreo($correo){
        $this ->correo = $correo;
    }


    public function getTipoDoc(){
        return $this->tipo_documento;
    }

    public function setTipoDoc($tipo_documento){
        $this ->tipo_documento = $tipo_documento;
    }

}

?>