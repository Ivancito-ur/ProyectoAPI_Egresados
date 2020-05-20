<?php


require 'modelo/dto/directorDto.php'; 
class directorDao extends Model{
    
    public function __construct(){
        parent::__construct();
    }

    function insertar_persona($nombres, $apellidos, $documento, $celular, $telefono, $direccion, $correo, $tipo_documento, $conexion)
    {
         // insertar
         $query = $this->db->connect()->prepare("INSERT INTO persona (documento,nombres,apellidos,celular,correo,telefono,tipo_documento,direccion)
         values (:documento,:nombres,:apellidos,:celular,:correo,:telefono,:tipo_documento,:direccion)");
         try{
             $query->execute([
                 ':documento' => $documento,
                 ':nombres' => $nombres,
                 ':apellidos' => $apellidos,
                 ':celular' => $celular,
                 ':correo' => $correo,
                 ':telefono' => $telefono,
                 ':tipo_documento' => $tipo_documento,
                 ':direccion' => $direccion
                 
             ]);
             $resultado = $query->fetchAll();
             return true;
         }catch(PDOException $e){
             return false;
         }
    }


    function insertar_estudiante($codigo, $correo_institucional, $documento, $semestre_cursado, $fecha_ingreso, $fecha_egreso, $egresado, $contraseña, $id_historial, $conexion)
    {

         // insertar
         $query = $this->db->connect()->prepare("INSERT INTO estudiante (codigoEstudiante,contrasena,documento,egresado,correoInstitucional,semestreCursado,fechaIngreso,fechaEgreso,id_historial)
         values (:codigo,:contrasena,:documento,:egresado,:correo_institucional,:semestre_cursado,:fecha_ingreso,:fecha_egreso,:id_historial)");
         try{
             $query->execute([
                 ':codigo' => $codigo,
                 ':contrasena' => $contraseña,
                 ':documento' => $documento,
                 ':egresado' => $egresado,
                 ':correo_institucional' => $correo_institucional,
                 ':semestre_cursado' => $semestre_cursado,
                 ':fecha_ingreso' => $fecha_ingreso,
                 ':fecha_egreso' => $fecha_egreso,
                 ':id_historial' => $id_historial
                 
             ]);
             $resultado = $query->fetchAll();
             return true;
         }catch(PDOException $e){
             return false;
         }
    }


    function insertar_historial($materias_aprobadas, $promedio, $id_saber11, $id_saberPro, $codigo, $conexion)
    {

         // insertar
         $query = $this->db->connect()->prepare("INSERT INTO historial (materiasAprobadas,promedio,idSaberPro,idSaber11,codigoEstudiante)
         values (:materias_aprobadas,:promedio,:id_saberPro,:id_saber11,:codigo)");
         try{
             $query->execute([
                 ':materias_aprobadas' => $materias_aprobadas,
                 ':promedio' => $promedio,
                 ':id_saberPro' => $id_saberPro,
                 ':id_saber11' => $id_saber11,
                 ':codigo' => $codigo
             ]);
             $resultado = $query->fetchAll();
             return true;
         }catch(PDOException $e){
             return false;
         }
    }


    function insertar_saber_11($id_saber11, $lectura, $matematica, $sociales, $naturales, $ingles, $conexion)
    {
         // insertar
         $query = $this->db->connect()->prepare("INSERT INTO pruebassaber11 (idSaber11,lectura_critica,matematica,sociales_ciudadanas,naturales,ingles)
         values (:id_saber11,:lectura,:matematica,:sociales,:naturales,:ingles)");
         try{
             $query->execute([
                 ':id_saber11' => $id_saber11,
                 ':lectura' => $lectura,
                 ':matematica' => $matematica,
                 ':sociales' => $sociales,
                 ':naturales' => $naturales,
                 ':ingles' => $ingles
             ]);
             $resultado = $query->fetchAll();
             return true;
         }catch(PDOException $e){
             return false;
         }
    }



    function insertar_saber_pro($id_saberPro, $lectura, $razonamiento, $sociales, $comunicacion, $ingles, $conexion)
    {

         // insertar
         $query = $this->db->connect()->prepare("INSERT INTO pruebassaberpro (idSaberPro,lectura_critica,razonamiento_cuantitativo,competencias_ciudadana,comunicacion_escrita,ingles)
         VALUES (:id_saberPro,:lectura,:razonamiento,:sociales,:comunicacion,:ingles)");
         try{
             $query->execute([
                 ':id_saberPro' => $id_saberPro,
                 ':lectura' => $lectura,
                 ':razonamiento' => $razonamiento,
                 ':sociales' => $sociales,
                 ':comunicacion' => $comunicacion,
                 ':ingles' => $ingles
             ]);
             $resultado = $query->fetchAll();
             return true;
         }catch(PDOException $e){
             return false;
         }
    }

    function traer_id_historial($codigo, $conexion)
    {
        try{
            $statement = $this->db->connect()->prepare("SELECT id FROM historial WHERE codigoEstudiante = :codigo");
            $statement->execute(array(
                ':codigo' => $codigo
            ));
            $resultado = $statement->fetch();
            return $resultado['id'];
        }catch(PDOException $e){
            return null;
        }
    
    }


    function validar_historial($codigo,$conexion)
    {
        try{
            $statement = $this->db->connect()->prepare("SELECT id FROM historial WHERE codigoEstudiante = :codigo");
            $statement->execute(array(
                ':codigo' => $codigo
            ));
            $resultado = $statement->fetch();
            
              return "true";
            
            
        }catch(PDOException $e){
            return null;
        }
    }

        function error_archivo_incorrecto()
        {

                $error =
                    "  Archivo invalido ,  Tiene que se EXCEL (xlsx o xls)";

                return $error;
        }

        public function getDatos($codigo){
            try{
                $statement = $this->db->connect()->prepare("SELECT e.codigoEstudiante, p.nombres, e.fechaIngreso, e.fechaEgreso FROM estudiante e INNER JOIN persona p ON e.documento= p.documento WHERE e.codigoEstudiante=:codigoEstudiante");
                $statement->execute(array(
                    ':codigoEstudiante' =>  $codigo
                ));
                $resultado = $statement->fetch();
                return  $resultado;
            }catch(PDOException $e){
                return null;
            }
        }

        //carga a los estudiante con tesis
        function cargarEstuTesis(){
            try{
                $statement = $this->db->connect()->prepare("SELECT  p.nombres, p.apellidos, e.codigoEstudiante FROM estudiante e INNER JOIN persona p ON e.documento = p.documento INNER JOIN tesis_estudiante et ON e.codigoEstudiante = et.codigoEstudiante  ORDER BY(e.codigoEstudiante)");
                $statement->execute();
                $resultado = $statement->fetchAll(PDO::FETCH_ASSOC); 
                return $resultado;
            }catch(PDOException $e){
                return null;
            }
        }


        function uptadeFechaegreso($fecha, $codigo){
            try{
                $query = $this->db->connect()->prepare('UPDATE estudiante SET fechaEgreso = :fecha WHERE codigoEstudiante = :codigoEstudiante');
                 $query->execute([
                     ':codigoEstudiante' => $codigo,
                     ':fecha' => $fecha
                 ]);
                 
                 $aux =  $query->rowCount(); 
                 return substr($aux,0,1);
             }catch(PDOException $e){
                 return false;
             }
        }


        function listarEstudiantes(){
            try{
                $statement = $this->db->connect()->prepare("SELECT e.codigoEstudiante, e.documento, p.nombres, p.apellidos, p.celular, e.correoInstitucional, e.fechaIngreso, e.fechaEgreso FROM estudiante e INNER JOIN persona p ON e.documento= p.documento");
                $statement->execute();
                $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
                return  $resultado;
            }catch(PDOException $e){
                return null;
            }
        }


        function buscarEstudiantes($codigo){
           
            try{
                $statement = $this->db->connect()->prepare("SELECT e.codigoEstudiante, e.documento, p.nombres, p.apellidos, p.celular, e.correoInstitucional, e.fechaIngreso, e.fechaEgreso FROM estudiante e INNER JOIN persona p ON e.documento= p.documento WHERE e.codigoEstudiante LIKE '$codigo%' ");
                $statement->execute();
                $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
                return  $resultado;
            }catch(PDOException $e){
                return null;
            }
        }


        function getPruebaE($codigo){
            try{
                $statement = $this->db->connect()->prepare("SELECT pp.lectura_critica as lecturaPP, pp.razonamiento_cuantitativo as razonamientoPP , pp.comunicacion_escrita as comunicacionPP, pp.competencias_ciudadana as competenciasPP, pp.ingles as inglesPP 
                , p11.lectura_critica as lecturaP11, p11.matematica as razonamientoP11 , p11.naturales as naturalesP11, p11.sociales_ciudadanas as competenciasP11, p11.ingles as inglesP11 FROM pruebassaberpro pp, pruebassaber11 p11 WHERE pp.idSaberPro =((SELECT h.idSaberPro FROM historial h INNER JOIN estudiante e ON h.codigoEstudiante=e.codigoEstudiante 
                WHERE e.codigoEstudiante=$codigo LIMIT 1)) AND p11.idSaber11 =((SELECT h.idSaber11 FROM historial h INNER JOIN estudiante e ON h.codigoEstudiante=e.codigoEstudiante WHERE e.codigoEstudiante=$codigo LIMIT 1)) ");
                $statement->execute();
                $resultado = $statement->fetch(PDO::FETCH_ASSOC);
                return  $resultado;
            }catch(PDOException $e){
                return null;
            }
        }



        function getCorreos($opcion){

            if ($opcion==1) {
                $statement = $this->db->connect()->prepare("SELECT correoInstitucional FROM estudiante WHERE egresado=0");
                $statement->execute();
                $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
                return  $resultado;
            }
            elseif ($opcion==2) {
                $statement = $this->db->connect()->prepare("SELECT correoInstitucional FROM estudiante WHERE egresado=1");
                $statement->execute();
                $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
                return  $resultado;
            }
            try{
                $statement = $this->db->connect()->prepare("SELECT correoInstitucional FROM estudiante");
                $statement->execute();
                $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
                return  $resultado;
            }catch(PDOException $e){
                return null;
            }
        }



        





}

?>