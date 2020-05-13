<?php

class directorDto{
    public $codigoDirector;
    public $contraseña;
    public $correo;
    public $documneto;



    public function __construct(){
       
    }

    public function getcodigoDirector(){
        return $this->codigoDirector;
    }

    public function setcodigoDirector($codigoDirector){
        $this ->codigoDirector = $codigoDirector;
    }

    public function getDocumento(){
        return $this->documneto;
    }

    public function setDocumento($documneto){
        $this ->documneto = $documneto;
    }

    public function getContraseña(){
        return $this->contraseña;
    }

    public function setcontraseña($contraseña){
        $this ->contraseña = $contraseña;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function setCorreo($correo){
        $this ->correo = $correo;
    }

}

?>