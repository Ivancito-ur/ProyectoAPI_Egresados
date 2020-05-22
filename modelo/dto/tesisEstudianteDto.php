<?php

class tesisEstudianteDto{
    public $id_tesis;
    public $fecha;
    public $codigo;


    public function __construct($id_tesis, $fecha, $codigo){
        $this->id_tesis = $id_tesis;
        $this->fecha = $fecha;
        $this->codigo = $codigo;
    }
    

    public function getIdtesis(){
        return $this->id_tesis;
    }

    public function setIdtesis($id_tesis){
        $this ->id_tesis = $id_tesis;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($fecha){
        $this ->fecha = $fecha;
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function setCodigo($codigo){
        $this ->codigo = $codigo;
    }



}

?>