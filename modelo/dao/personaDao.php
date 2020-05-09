<?php


require 'modelo/dto/personaDto.php'; 
class personaDao extends Model{
    
    public function __construct(){
        parent::__construct();
      
       
    }

    public function insert($datos){
    $person = new personaDto($datos['usuario'], $datos['nombre'], $datos['correo'], $datos['contrasenia']);
        // insertar
        $query = $this->db->connect()->prepare('INSERT INTO PERSONA (usuario, nombre, correo, contrasenia) VALUES (:usuario, :nombre, :correo, :contrasenia)');
        try{
            $query->execute([
                'usuario' => $person->getUsuario(),
                'nombre' => $person->getNombre(),
                'correo' => $person->getCorreo(),
                'contrasenia' => $person->getContrasenia()
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
        
    }

    public function getValidar($usuario, $password){
        try{
            $statement = $this->db->connect()->prepare("SELECT * FROM persona WHERE (usuario = :usuario OR correo = :correo) AND contrasenia = :contrasenia ");
            $statement->execute(array(
                ':usuario' =>  $usuario,
                ':correo' => $usuario,
                ':contrasenia' => $password 
            ));
            $resultado = $statement->fetch();
            return  $resultado;
        }catch(PDOException $e){
            return null;
        }
    }

    public function getExiste($usuario, $correo){
        try{
            $statement = $this->db->connect()->prepare("SELECT * FROM persona WHERE (usuario = :usuario OR correo = :correo)");
            $statement->execute(array(
                ':usuario' =>  $usuario,
                ':correo' => $correo
            ));
            $resultado = $statement->fetch();
            if(!empty($resultado)){
                $resultado = new personaDto($resultado['usuario'], $resultado['nombre'], $resultado['correo'], $resultado['contrasenia']);}
            return  $resultado;
        }catch(PDOException $e){
            return null;
        }
    }

    
    public function updateCon($item){
        try{
            $query = $this->db->connect()->prepare('UPDATE PERSONA SET contrasenia = :contrasenia WHERE usuario = :usuario');
            $query->execute([
                'usuario' => $item['usuario'],
                'contrasenia' => $item['contrasenia']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function updateUser($item){   
         try{
            $query = $this->db->connect()->prepare('UPDATE persona SET usuario = :usuario WHERE correo = :correo
            AND NOT EXISTS (SELECT usuario FROM persona WHERE usuario = :usuario2 )');
             $query->execute([
                 ':usuario' => $item['usuario'],
                 ':correo' => $item['correo'],
                 ':usuario2' => $item['usuario']
             ]);
             
             $aux =  $query->rowCount(); 
             return substr($aux,0,1);
         }catch(PDOException $e){
             return false;
         }
    }

    


}

?>