<?php


require 'modelo/dto/estudianteDto.php'; 
class estudianteDao extends Model{
    
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
              
            }
            return $solu;
        }catch(PDOException $e){
            return null;
        }
    }



}

?>