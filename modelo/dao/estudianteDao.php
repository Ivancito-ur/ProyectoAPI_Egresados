<?php


require 'modelo/dto/estudianteDto.php'; 
require 'modelo/dto/hojaVidaDto.php'; 
class estudianteDao extends Model{
    
    public function __construct(){
        parent::__construct();
    }

    public function getEstudiante($codigo){
        try{
            $statement = $this->db->connect()->prepare("SELECT * FROM estudiante e INNER JOIN persona p ON e.documento= p.documento  WHERE e.codigoEstudiante=:codigoEstudiante" );
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
            $query = $this->db->connect()->prepare('UPDATE estudiante e INNER JOIN persona p ON e.documento = :documento
             SET p.telefono = :telefono, p.celular=:celular , p.direccion= :direccion , p.correo= :correo WHERE p.documento=e.documento');
            $query->execute([
                ':documento' => $item['documento'],
                ':telefono' => $item['telefono'],
                ':celular' => $item['celular'],
                ':direccion' => $item['direccion'],
                ':correo' => $item['correo']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }


    public function insertHoja($archivo , $codigo){
        $hoja = new hojaVidaDto($archivo, $codigo);
        $query = $this->db->connect()->prepare('INSERT INTO hojavida (archivo, codigoEstudiante) VALUES (:archivo, :codigoEstudiante)');
        try{
            $query->execute([
                ':archivo' => $hoja->getArchivo(),
                ':codigoEstudiante' => $hoja->getcodigoEstudiante()
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function existHoja($codigo){
        try{
            $statement = $this->db->connect()->prepare("SELECT archivo FROM  hojavida  WHERE codigoEstudiante=:codigoEstudiante" );
            $statement->execute(array(
                ':codigoEstudiante' => $codigo
            ));
            $resultado = $statement->fetch();
            return $resultado;
        }catch(PDOException $e){
            return null;
        }
    }


    public function existTesis($codigo){
        try{
            $statement = $this->db->connect()->prepare("SELECT t.titulo, t.archivo FROM tesis t INNER JOIN tesis_estudiante et ON t.id=et.id_tesis WHERE et.codigoEstudiante =:codigoEstudiante LIMIT 1" );
            $statement->execute(array(
                ':codigoEstudiante' => $codigo
            ));
            $resultado = $statement->fetch();
            return $resultado;
        }catch(PDOException $e){
            return null;
        }
    }


    public function Permiso($codigo){
        try{
            $statement = $this->db->connect()->prepare("SELECT t.autorizar FROM hojavida t WHERE t.codigoEstudiante=$codigo " );
            $statement->execute();
            $resultado = $statement->fetch();
            return $resultado;
        }catch(PDOException $e){
            return null;
        }
    }

    
    function otorgarPermiso($codigo, $validar){
        if($validar==0){
            try{
                $statement = $this->db->connect()->prepare("UPDATE hojavida SET autorizar='0' WHERE codigoEstudiante=$codigo ");
                $statement->execute();
            }catch(PDOException $e){
                return null;
            }
        }
        if($validar==1){
            try{
                $statement = $this->db->connect()->prepare("UPDATE hojavida SET autorizar='1' WHERE codigoEstudiante=$codigo ");
                $statement->execute();
            }catch(PDOException $e){
                return null;
            }
        }
       
    }



    function listarOferta(){
        try{
            $statement = $this->db->connect()->prepare("SELECT * FROM oferta o INNER JOIN empresas e ON o.nitEmpresa=e.nitEmpresa ");
            $statement->execute();
            $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }catch(PDOException $e){
            return null;
        }
    }


    function getOferta($codigo){
        try{
            $statement = $this->db->connect()->prepare("SELECT * FROM oferta o INNER JOIN empresas e ON o.nitEmpresa=e.nitEmpresa WHERE o.id=$codigo ");
            $statement->execute();
            $resultado = $statement->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }catch(PDOException $e){
            return null;
        }
    }

    function listarEvento($participan){
       // echo $particpan;
        try{
            $statement = $this->db->connect()->prepare("SELECT * FROM evento WHERE (destinatario= :participan or destinatario='TODOS')");
            $statement->execute([
                ':participan'=>$participan
            ]);
            $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }catch(PDOException $e){
            return null;
        }
    }

    function getEvento($codigo){
        try{
            $statement = $this->db->connect()->prepare("SELECT * FROM evento WHERE id=$codigo ");
            $statement->execute();
            $resultado = $statement->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }catch(PDOException $e){
            return null;
        }
    }

    function listarNoticias($participan){
        try{
            $statement = $this->db->connect()->prepare("SELECT * FROM noticia WHERE (destinatario= :participan or destinatario='TODOS')");
            $statement->execute([
                ':participan'=>$participan
            ]);
            $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }catch(PDOException $e){
            return null;
        }
    }

    function getNoticia($codigo){
        try{
            $statement = $this->db->connect()->prepare("SELECT * FROM noticia WHERE id=$codigo ");
            $statement->execute();
            $resultado = $statement->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }catch(PDOException $e){
            return null;
        }
    }


    function getUltimaNoticia($participan){
        try{
            $statement = $this->db->connect()->prepare("SELECT MAX(id) as id , fecha_publicacion, titulo, cuerpo, autor, destinatario FROM noticia WHERE (destinatario= :participan or destinatario='TODOS')");
            $statement->execute([
                ':participan'=>$participan
            ]);
            $resultado = $statement->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }catch(PDOException $e){
            return null;
        }
    }

    public function getActuEstudiante($codigo){
        try{
            $statement = $this->db->connect()->prepare("SELECT CASE WHEN ee.empresaNit IS NULL THEN 0 ELSE ee.empresaNit END AS empresaNit, e.correoInstitucional,e.egresado, p.celular, p.correo, p.telefono, p.direccion, p.nombres, p.apellidos, e.fechaIngreso, e.fechaEgreso FROM estudiante e INNER JOIN persona p ON e.documento= p.documento LEFT JOIN empresa_estudiante ee ON ee.codigoEstudiante=e.codigoEstudiante WHERE e.codigoEstudiante=:codigoEstudiante" );
            $statement->execute(array(
                ':codigoEstudiante' => $codigo
            ));
            $resultado = $statement->fetch();
            return $resultado;
        }catch(PDOException $e){
            return null;
        }
    }

    function listarEmpresa($codigo){
        try {
            $statement = $this->db->connect()->prepare("SELECT * FROM empresas WHERE nitEmpresa=:codigoE");
            $statement->execute(array(
                ':codigoE' => $codigo
            ));
            $resultado = $statement->fetch(PDO::FETCH_ASSOC);
            return  $resultado;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function insertEstEmp($codigoE, $fecha, $empresaNit){
 
        $query = $this->db->connect()->prepare('INSERT INTO empresa_estudiante (codigoEstudiante, fecha_registro, empresaNit) VALUES (:codigoEstudiante, :fecha_registro, :empresaNit)');
        try{
            $query->execute([
                ':codigoEstudiante' =>$codigoE ,
                ':fecha_registro' => $fecha,
                ':empresaNit' => $empresaNit
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }




    
  
    

}

?>