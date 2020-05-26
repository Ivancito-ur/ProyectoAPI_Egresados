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

    public function verificarEmpresa($codigo, $contraseña){
        try{
            $statement = $this->db->connect()->prepare("SELECT nitEmpresa FROM empresas WHERE  nitEmpresa = :codigo AND contrasena = :contrasena ");
            $statement->execute(array(
                ':codigo' => $codigo,
                ':contrasena' => $contraseña 
            ));
            $resultado = $statement->fetch();
            return $resultado;
        }catch(PDOException $e){
            return null;
        }
    }


    function getCodigoDirector($codigo, $correo){
        try{
            $statement = $this->db->connect()->prepare("SELECT codigoDirector, correoInstitucional FROM director WHERE  codigoDirector = :codigo AND correoInstitucional = :correo");
            $statement->execute(array(
                ':codigo' => $codigo,
                ':correo' => $correo
            ));
            $resultado = $statement->fetch();
            return $resultado;
        }catch(PDOException $e){
            return null;
        }
    }


    

    function getCodigoEstudiante($codigo,$correo){
        try{
            $statement = $this->db->connect()->prepare("SELECT codigoEstudiante, correoInstitucional FROM estudiante WHERE  codigoEstudiante = :codigo AND correoInstitucional = :correo");
            $statement->execute(array(
                ':codigo' => $codigo,
                ':correo' => $correo
            ));
            $resultado = $statement->fetch();
            return $resultado;
        }catch(PDOException $e){
            return null;
        }
    }


    public function updateContraseñaEstudiante($codigo, $contraseña){
        try{
            $query = $this->db->connect()->prepare('UPDATE estudiante   SET  contrasena= :contrasena WHERE  codigoEstudiante=:codigo');
            $query->execute([
                ':codigo' =>$codigo,
                ':contrasena' =>$contraseña 
            ]);
            $aux =  $query->rowCount(); 
            return substr($aux,0,1);
        }catch(PDOException $e){
            return false;
        }
    }

    public function updateContraseñaDirector($codigo, $contraseña){
        try{
            $query = $this->db->connect()->prepare('UPDATE director  SET  contrasena= :contrasena WHERE  codigoDirector=:codigo');
            $query->execute([
                ':contrasena' =>$contraseña ,
                ':codigo' =>$codigo
               
            ]);
            $aux =  $query->rowCount(); 
            return substr($aux,0,1);
        }catch(PDOException $e){
            return false;
        }
    }






}

?>