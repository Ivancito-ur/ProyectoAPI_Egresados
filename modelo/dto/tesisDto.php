<?php

class tesisDto{
    public $archivo;
    public $id;
    public $titulo;


    public function __construct($archivo, $id, $titulo){
        $this->archivo = $archivo;
        $this->id = $id;
        $this->titulo = $titulo;
    }
    

    public function getArchivo(){
        return $this->archivo;
    }

    public function setArchivo($archivo){
        $this ->archivo = $archivo;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this ->id = $id;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function setTitulo($titulo){
        $this ->titulo = $titulo;
    }



}

?>