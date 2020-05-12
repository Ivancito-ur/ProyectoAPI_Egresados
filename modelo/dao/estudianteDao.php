<?php


require 'modelo/dto/estudianteDto.php'; 
class estudianteDao extends Model{
    
    public function __construct(){
        parent::__construct();
    }

    public function getEstudiante($codigo){
        try{
            $statement = $this->db->connect()->prepare("SELECT * FROM estudiante e INNER JOIN persona p ON e.documento= p.documento WHERE e.codigoEstudiante=:codigoEstudiante" );
            $statement->execute(array(
                ':codigoEstudiante' => $codigo
            ));
            $resultado = $statement->fetch();
            return $resultado;
        }catch(PDOException $e){
            return null;
        }
    }

    public function updateDatos($item){
        try{
            $query = $this->db->connect()->prepare('UPDATE estudiante e INNER JOIN persona p ON e.documento = :documento SET p.telefono = :telefono, p.direccion= :direccion , p.correo= :correo');
            $query->execute([
                ':documento' => $item['documento'],
                ':telefono' => $item['telefono'],
                ':direccion' => $item['direccion'],
                ':correo' => $item['correo']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }




}

?>