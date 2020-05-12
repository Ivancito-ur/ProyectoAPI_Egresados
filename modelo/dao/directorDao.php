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
                    "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Archivo invalido</strong> Tiene que se EXCEL (xlsx o xls)
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
            </div>
            ";

                return $error;
            }



}

?>