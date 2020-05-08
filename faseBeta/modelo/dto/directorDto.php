<?php

class directorDto{
    public $codigoDirector;
    public $nombre;
    public $correo;


    public function __construct($codigoDirector, $nombre, $correo){
        $this->codigoDirector = $codigoDirector;
        $this->nombre = $nombre;
        $this->correo = $correo;
    }

    public function getcodigoDirector(){
        return $this->codigoDirector;
    }

    public function setcodigoDirector($codigoDirector){
        $this ->codigoDirector = $codigoDirector;
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

}

?>