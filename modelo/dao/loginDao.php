<?php


require 'modelo/dto/estudianteDto.php'; 
require 'modelo/dto/directorDto.php'; 
class loginDao extends Model{
    
    public function __construct(){
        parent::__construct();
    }

    public function verificarEstudiante($codigo, $documento, $contraseña){
        try{
            $statement = $this->db->connect()->prepare("SELECT codigoEstudiante, documento, contrasena FROM estudiante WHERE  codigoEstudiante = :codigoEstudiante AND documento = :documento AND contrasena = :contrasena ");
            $statement->execute(array(
                ':codigoEstudiante' => $codigo,
                ':documento' => $documento,
                ':contrasena' => $contraseña 
            ));
            $resultado = $statement->fetch();
            $solu = null;
            if(!empty($resultado)){
                $solu = new estudianteDto();
                $solu->setcodigoEstudiante($resultado['codigoEstudiante']);
                $solu->setDocumento($resultado['documento']);
              
            }
            return $solu;
        }catch(PDOException $e){
            return null;
        }
    }

    public function verificarDirector($codigo, $documento, $contraseña){
        try{
            $statement = $this->db->connect()->prepare("SELECT codigoDirector, documento, contrasena FROM director WHERE  codigoDirector = :codigo AND documento = :documento AND contrasena = :contrasena ");
            $statement->execute(array(
                ':codigo' => $codigo,
                ':documento' => $documento,
                ':contrasena' => $contraseña 
            ));
            $resultado = $statement->fetch();
            $solu = null;
            if(!empty($resultado)){
                $solu = new directorDto();
                $solu->setcodigoDirector($resultado['codigoDirector']);
                $solu->setDocumento($resultado['documento']);
              
            }
            return $solu;
        }catch(PDOException $e){
            return null;
        }
    }



}

?>