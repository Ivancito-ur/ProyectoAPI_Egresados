<?php

class empresaDao extends Model{
    
    public function __construct(){
        parent::__construct();
    }



    function getHojaVidaE(){
        try{
            $statement = $this->db->connect()->prepare("SELECT e.promedio, h.archivo, p.nombres, p.apellidos, p.correo, p.telefono FROM hojavida h  INNER JOIN estudiante e ON 
            h.codigoEstudiante=e.codigoEstudiante INNER JOIN persona p ON e.documento=p.documento WHERE e.egresado=0 AND h.autorizar=1;");
            $statement->execute();
            $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }catch(PDOException $e){
            return null;
        }
    }

    function getHojaVidaA(){
        try{
            $statement = $this->db->connect()->prepare("SELECT e.promedio, h.archivo, p.nombres, p.apellidos, p.correo, p.telefono FROM hojavida h  INNER JOIN estudiante e ON 
            h.codigoEstudiante=e.codigoEstudiante INNER JOIN persona p ON e.documento=p.documento WHERE e.egresado=1 AND h.autorizar=1;");
            $statement->execute();
            $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }catch(PDOException $e){
            return null;
        }
    }


    function crearOferta($empleo, $jornada,$salario,$telefono, $descripcion,$requerimientos, $nitEmpresa)
    {
 
        $statement = $this->db->connect()->prepare("INSERT INTO oferta (empleo, jornada, salario, telefono, descripcion, requerimientos, nitEmpresa) 
        VALUES (:empleo,:jornada,:salario,:telefono, :descripcion,:requerimientos, :nitEmpresa)");
        try {
            $statement->execute([
                ':empleo' => $empleo,
                ':jornada' => $jornada,
                ':salario' => $salario,
                ':telefono' => $telefono,
                ':descripcion' => $descripcion,
                ':requerimientos' => $requerimientos,
                ':nitEmpresa' => $nitEmpresa,
            ]);
            $resultado = $statement->fetchAll();
            return true;
        } catch (\Throwable $th) {
            echo $th;
            return null;
        }
    }


    function listarOferta($codigo){

        try {
            $statement = $this->db->connect()->prepare("SELECT * FROM oferta WHERE nitEmpresa=$codigo");
            $statement->execute();
            $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
            return  $resultado;
        } catch (PDOException $e) {
            return null;
        }

    }


    function eliminarOferta($codigo){
        try {
            $statement = $this->db->connect()->prepare("DELETE FROM oferta WHERE id = $codigo");
            $statement->execute();
            return  true;
        } catch (PDOException $e) {
            return null;
        }


    }

}

?>
