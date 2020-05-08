<?php


require 'modelo/dto/estudianteDto.php'; 
class estudianteDao extends Model{
    
    public function __construct(){
        parent::__construct();
    }

    public function verificarEstudiante($codigo, $documento, $contraseña){
        try{
            $statement = $this->db->connect()->prepare("");
            $statement->execute(array(
                ':' => $codigo,
                ':' => $documento,
                ':' => $contraseña 
            ));
            return  true;
        }catch(PDOException $e){
            return false;
        }
    }



}

?>