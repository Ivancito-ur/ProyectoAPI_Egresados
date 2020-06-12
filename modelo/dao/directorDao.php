<?php



require 'modelo/dto/directorDto.php'; 
require 'modelo/dto/tesisDto.php'; 
require 'modelo/dto/tesisEstudianteDto.php'; 
require 'modelo/dto/personaDto.php'; 
require 'modelo/dto/estudianteDto.php'; 
require 'modelo/dto/historialDto.php'; 
require 'modelo/dto/pruebasSaber11Dto.php'; 
require 'modelo/dto/pruebasSaberProDto.php'; 



class directorDao extends Model{
    
    public function __construct(){
        parent::__construct();
    }

    function insertar_persona($nombres, $apellidos, $documento, $celular, $telefono, $direccion, $correo, $tipo_documento, $conexion)
    {
        $person = new personaDto($nombres, $apellidos, $documento, $celular, $telefono, $direccion, $correo, $tipo_documento);
        // insertar
        $query = $this->db->connect()->prepare("INSERT INTO persona (documento,nombres,apellidos,celular,correo,telefono,tipo_documento,direccion)
         values (:documento,:nombres,:apellidos,:celular,:correo,:telefono,:tipo_documento,:direccion)");
        try {
            $query->execute([
                ':documento' =>  $person->getDocumento(),
                ':nombres' =>  $person->getNombre(),
                ':apellidos' =>  $person->getApellido(),
                ':celular' =>  $person->getCelular(),
                ':correo' =>  $person->getCorreo(),
                ':telefono' =>  $person->getTelefono(),
                ':tipo_documento' =>  $person->getTipoDoc(),
                ':direccion' =>  $person->getDireccion()

            ]);
            $resultado = $query->fetchAll();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    function insertar_estudiante($codigo, $correo_institucional, $documento, $semestre_cursado, $fecha_ingreso, $promedio , $materias_aprobadas ,$fecha_egreso, $egresado, $contraseña, $id_historial, $conexion)
    {

        $estu = new estudianteDto();
        $estu->setcodigoEstudiante($codigo);
        $estu->setDocumento($documento);
        $estu->setContrasena($contraseña);
        $estu->setEgresado($egresado);
        $estu->setCorreo($correo_institucional);
        $estu->setsemestreCursado($semestre_cursado);
        $estu->setfechaIngreso($fecha_ingreso);
        $estu->setfechaEgreso($fecha_egreso);
        $estu->setidHistorial($id_historial);
        $estu->setPromedio($promedio);
        $estu->setMateriaAp($materias_aprobadas);


      
        $query = $this->db->connect()->prepare("INSERT INTO estudiante (codigoEstudiante,contrasena,documento,egresado,correoInstitucional,semestreCursado,materiasAprobadas,promedio,fechaIngreso,fechaEgreso,id_historial)
         values (:codigo,:contrasena,:documento,:egresado,:correo_institucional,:semestre_cursado,:materiasAprobadas,:promedio,:fecha_ingreso,:fecha_egreso,:id_historial)");
        try {
            $query->execute([
                ':codigo' =>  $estu->getcodigoEstudiante(),
                ':contrasena' =>  $estu->getContrasena(),
                ':documento' =>  $estu->getDocumento(),
                ':egresado' =>  $estu->getEgresado(),
                ':correo_institucional' =>  $estu->getCorreo(),
                ':semestre_cursado' =>   $estu->getsemestreCursado(),
                ':materiasAprobadas' =>  $estu->getMateriaAp(),
                ':promedio' =>   $estu->getPromedio(),
                ':fecha_ingreso' => $estu->getfechaIngreso(),
                ':fecha_egreso' =>  $estu->getfechaEgreso(),
                ':id_historial' =>   $estu->getidHistorial()

            ]);
            $resultado = $query->fetchAll();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    function insertar_historial($materias_aprobadas, $promedio, $id_saber11, $id_saberPro, $codigo, $conexion)
    {
        $histo = new historialDto($materias_aprobadas, $promedio, $codigo, $id_saberPro, $id_saber11);
        // insertar
        $query = $this->db->connect()->prepare("INSERT INTO historial (materiasAprobadas,promedio,idSaberPro,idSaber11,codigoEstudiante)
         values (:materias_aprobadas,:promedio,:id_saberPro,:id_saber11,:codigo)");
        try {
            $query->execute([
                ':materias_aprobadas' =>   $histo->getmateriasAprobadas(),
                ':promedio' => $histo->getPromedio(),
                ':id_saberPro' =>  $histo->getidSaberPro(),
                ':id_saber11' =>  $histo->getidSaber11(),
                ':codigo' => $histo->getcodigoEstudiante()
            ]);
            $resultado = $query->fetchAll();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    function insertar_saber_11($id_saber11, $lectura, $matematica, $sociales, $naturales, $ingles, $conexion)
    {
        $pruebasSaber11 = new pruebasSaber11Dto($id_saber11, $lectura, $matematica, $sociales, $naturales, $ingles);
        $query = $this->db->connect()->prepare("INSERT INTO pruebassaber11 (idSaber11,lectura_critica,matematica,sociales_ciudadanas,naturales,ingles)
         values (:id_saber11,:lectura,:matematica,:sociales,:naturales,:ingles)");
        try {
            $query->execute([
                ':id_saber11' => $pruebasSaber11->getidSaber11(),
                ':lectura' => $pruebasSaber11->getLectura(),
                ':matematica' =>  $pruebasSaber11->getMatematicas(),
                ':sociales' =>  $pruebasSaber11->getSociales(),
                ':naturales' => $pruebasSaber11->getNaturales(),
                ':ingles' => $pruebasSaber11->getIngles()
            ]);
            $resultado = $query->fetchAll();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }



    function insertar_saber_pro($id_saberPro, $lectura, $razonamiento, $sociales, $comunicacion, $ingles, $conexion)
    {

        $pruebasSaberPro = new pruebasSaberProDto($id_saberPro, $lectura, $razonamiento, $sociales, $comunicacion, $ingles);
        $query = $this->db->connect()->prepare("INSERT INTO pruebassaberpro (idSaberPro,lectura_critica,razonamiento_cuantitativo,competencias_ciudadana,comunicacion_escrita,ingles)
         VALUES (:id_saberPro,:lectura,:razonamiento,:sociales,:comunicacion,:ingles)");
        try {
            $query->execute([
                ':id_saberPro' => $pruebasSaberPro->getidSaberpro(),
                ':lectura' => $pruebasSaberPro->getLectura(),
                ':razonamiento' => $pruebasSaberPro->getRazonamiento(),
                ':sociales' =>  $pruebasSaberPro->getSociales(),
                ':comunicacion' => $pruebasSaberPro->getComunicacion(),
                ':ingles' => $pruebasSaberPro->getIngles()
            ]);
            $resultado = $query->fetchAll();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    function traer_id_historial($codigo, $conexion)
    {
        try {
            $statement = $this->db->connect()->prepare("SELECT id FROM historial WHERE codigoEstudiante = :codigo");
            $statement->execute(array(
                ':codigo' => $codigo
            ));
            $resultado = $statement->fetch();
            return $resultado['id'];
        } catch (PDOException $e) {
            return null;
        }
    }


    function validar_historial($codigo, $conexion)
    {
        try {
            $statement = $this->db->connect()->prepare("SELECT id FROM historial WHERE codigoEstudiante = :codigo");
            $statement->execute(array(
                ':codigo' => $codigo
            ));
            $resultado = $statement->fetch();

            return "true";
        } catch (PDOException $e) {
            return null;
        }
    }

    function error_archivo_incorrecto()
    {

        $error =
            "  Archivo invalido ,  Tiene que se EXCEL (xlsx o xls)";

        return $error;
    }
    function falla_formato($hoja){
    
        if ($hoja == 1) {
            $error =
                " Verifique que el formato de excel corresponda - Problema con la Hoja ICFES PRO";
            return $error;
        } elseif ($hoja == 2) {
            $error =
                " Verifique que el formato de excel corresponda - Problema con la Hoja ICFES SABER 11";
            return $error;
        } else {
            $error =
                " Verifique que el formato de excel corresponda - Problema con la Hoja Estudiantes";
            return $error;
        }
    }

    public function getDatos($codigo)
    {
        try {
            $statement = $this->db->connect()->prepare("SELECT e.codigoEstudiante, p.nombres, p.apellidos,  e.fechaIngreso, e.fechaEgreso FROM estudiante e INNER JOIN persona p ON e.documento= p.documento WHERE e.codigoEstudiante=:codigoEstudiante");
            $statement->execute(array(
                ':codigoEstudiante' =>  $codigo
            ));
            $resultado = $statement->fetch();
            return  $resultado;
        } catch (PDOException $e) {
            return null;
        }
    }

        //carga a los estudiante sin tesis
        function cargarEstuTesis(){
            try{
                $statement = $this->db->connect()->prepare("SELECT p.nombres, p.apellidos, e.codigoEstudiante FROM estudiante e INNER JOIN persona p ON e.documento = p.documento WHERE e.codigoEstudiante NOT IN (SELECT et.codigoEstudiante FROM tesis_estudiante et)");
                $statement->execute();
                $resultado = $statement->fetchAll(PDO::FETCH_ASSOC); 
                return $resultado;
            }catch(PDOException $e){
                return null;
            }
        }
    



    function uptadeFechaegreso($fecha, $codigo)
    {
        try {
            $query = $this->db->connect()->prepare('UPDATE estudiante SET fechaEgreso = :fecha , egresado=0 WHERE codigoEstudiante = :codigoEstudiante');
            $query->execute([
                ':codigoEstudiante' => $codigo,
                ':fecha' => $fecha
            ]);

            $aux =  $query->rowCount();
            return substr($aux, 0, 1);
        } catch (PDOException $e) {
            return false;
        }
    }


    function listarEstudiantes()
    {
        try {
            $statement = $this->db->connect()->prepare("SELECT e.codigoEstudiante, e.documento, p.nombres, p.apellidos, p.celular, e.correoInstitucional, e.fechaIngreso, e.fechaEgreso , e.promedio FROM estudiante e INNER JOIN persona p ON e.documento= p.documento");
            $statement->execute();
            $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
            return  $resultado;
        } catch (PDOException $e) {
            return null;
        }
    }

    function listarEstudiantesActualizar($codigo)
    {
        try {
            $statement = $this->db->connect()->prepare("SELECT e.codigoEstudiante, p.nombres, p.apellidos,  e.fechaIngreso, e.promedio, h.idSaberPro, h.idSaber11 , e.semestreCursado, e.materiasAprobadas FROM estudiante e INNER JOIN persona p ON e.documento= p.documento INNER JOIN historial h ON e.codigoEstudiante=h.codigoEstudiante  WHERE e.codigoEstudiante=$codigo LIMIT 1");
            $statement->execute();
            $resultado = $statement->fetch(PDO::FETCH_ASSOC);
            return  $resultado;
        } catch (PDOException $e) {
            return null;
        }
    }

    
    function estudiantesActualizar($codigoP , $codigo, $nombre , $apellido,  $fechaI , $promedio , $codigoPro , $codigo11 , $semestre , $materias )
    {
        try {
            $statement = $this->db->connect()->prepare("UPDATE estudiante e  INNER JOIN persona p ON e.documento= p.documento INNER JOIN historial h ON e.codigoEstudiante=h.codigoEstudiante SET e.codigoEstudiante=:codigo , p.nombres=:nombres,
              p.apellidos=:apellido, e.fechaIngreso=:fechaI, e.promedio=:promedio, h.idSaberPro=:codigoPro, h.idSaber11=:codigo11, e.semestreCursado=:semestre, e.materiasAprobadas=:materias ,
               h.materiasAprobadas=:materiasApro, h.promedio=:promedioApro, h.codigoEstudiante=:codigoApro  WHERE e.codigoEstudiante=:codigoP");
            $statement->execute([
                ':codigo'=>$codigo,
                ':nombres'=> $nombre,
                ':apellido'=>$apellido,
                ':fechaI'=>$fechaI,
                ':promedio'=> $promedio,
                ':codigoPro'=>$codigoPro,
                ':codigo11'=>$codigo11,
                ':semestre'=> $semestre,
                ':materias'=>$materias,
                ':materiasApro'=> $materias,
                ':promedioApro'=>$promedio,
                ':codigoApro'=>$codigo,
                ':codigoP'=>$codigoP
                
            ]);//,,   
            $aux =  $statement->rowCount();
            return substr($aux, 0, 1);
        } catch (PDOException $e) {
            return null;
        }
    }


    function buscarEstudiantes($codigo)
    {

        try {
            $statement = $this->db->connect()->prepare("SELECT e.codigoEstudiante, e.documento, p.nombres, p.apellidos, p.celular, e.correoInstitucional, e.fechaIngreso, e.fechaEgreso FROM estudiante e INNER JOIN persona p ON e.documento= p.documento WHERE e.codigoEstudiante LIKE '$codigo%' ");
            $statement->execute();
            $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
            return  $resultado;
        } catch (PDOException $e) {
            return null;
        }
    }

    function verificarCodigoPruebapro($codigo){
        try {
            $statement = $this->db->connect()->prepare("SELECT h.idSaberPro  FROM historial h WHERE  h.idSaberPro=$codigo");
            $statement->execute();
            $resultado = $statement->fetch(PDO::FETCH_ASSOC);
            return  $resultado;
        } catch (PDOException $e) {
            return null;
        }
    }

     function verificarCodigoPrueba11($codigo){
        try {
            $statement = $this->db->connect()->prepare("SELECT h.idSaber11  FROM historial h WHERE  h.idSaber11=$codigo");
            $statement->execute();
            $resultado = $statement->fetch(PDO::FETCH_ASSOC);
            return  $resultado;
        } catch (PDOException $e) {
            return null;
        }
    }



    

        function verificarEstudiantes($codigo){
           
            try{
                $statement = $this->db->connect()->prepare("SELECT e.codigoEstudiante, p.nombres, p.apellidos FROM estudiante e INNER JOIN persona p ON e.documento= p.documento WHERE e.codigoEstudiante=$codigo ");
                $statement->execute();
                $resultado = $statement->fetch(PDO::FETCH_ASSOC);
                return  $resultado;
            }catch(PDOException $e){
                return null;
            }
        }


    
        function getPruebaE($codigo)
    {
        try {
            $statement = $this->db->connect()->prepare("SELECT pp.lectura_critica as lecturaPP, pp.razonamiento_cuantitativo as razonamientoPP , pp.comunicacion_escrita as comunicacionPP, pp.competencias_ciudadana as competenciasPP, pp.ingles as inglesPP 
                , p11.lectura_critica as lecturaP11, p11.matematica as razonamientoP11 , p11.naturales as naturalesP11, p11.sociales_ciudadanas as competenciasP11, p11.ingles as inglesP11 FROM pruebassaberpro pp, pruebassaber11 p11 WHERE pp.idSaberPro =((SELECT h.idSaberPro FROM historial h INNER JOIN estudiante e ON h.codigoEstudiante=e.codigoEstudiante 
                WHERE e.codigoEstudiante=$codigo LIMIT 1)) AND p11.idSaber11 =((SELECT h.idSaber11 FROM historial h INNER JOIN estudiante e ON h.codigoEstudiante=e.codigoEstudiante WHERE e.codigoEstudiante=$codigo LIMIT 1)) ");
            $statement->execute();
            $resultado = $statement->fetch(PDO::FETCH_ASSOC);
            return  $resultado;
        } catch (PDOException $e) {
            return null;
        }
    }


        function insertTesis($destino, $titulo){
           $tesis = new tesisDto($destino,"", $titulo);
           $query = $this->db->connect()->prepare("INSERT INTO tesis (archivo, titulo)
           values (:archivo,:titulo)");
           try{
               $query->execute([
                   ':archivo' => $tesis->getArchivo(),
                   ':titulo' => $tesis->getTitulo()
               ]);
               $resultado = $query->fetchAll();
               return true;
           }catch(PDOException $e){
               return false;
           }

        }

        function getMaxIdTesis(){
            $query = $this->db->connect()->prepare("SELECT MAX(id) as id FROM tesis");
            try{
                $query->execute();
                $resultado = $query->fetch();
                return  $resultado;
            }catch(PDOException $e){
                return false;
            }
 
         }

         function getCodigosTesis($codigo){
            $query = $this->db->connect()->prepare("SELECT id_tesis  FROM tesis_estudiante WHERE codigoEstudiante = $codigo");
            try{
                $query->execute();
                $resultado = $query->fetch();
                return  $resultado;
            }catch(PDOException $e){
                return false;
            }
 
         }

        function insertEstudiante_Tesis($id_tesis, $fecha, $codigo){
            $tesis = new tesisEstudianteDto($id_tesis,$fecha, $codigo);
            $query = $this->db->connect()->prepare("INSERT INTO tesis_estudiante (fecha_asignacion, codigoEstudiante, id_tesis)
            values (:fecha_asignacion,:codigoEstudiante,:id_tesis)");
            try{
                $query->execute([
                    ':fecha_asignacion' => $tesis->getFecha(),
                    ':codigoEstudiante' => $tesis->getCodigo(),
                    ':id_tesis' => $tesis->getIdtesis()
                ]);
                $resultado = $query->fetchAll();
                return $resultado;
            }catch(PDOException $e){
                return false;
            }
 
         }


          function getTesis(){
            try{
                $statement = $this->db->connect()->prepare("SELECT t.titulo, t.archivo FROM tesis t ");
                $statement->execute();
                $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            }catch(PDOException $e){
                return null;
            }
        }

    function getCorreos($opcion)
    {

        if ($opcion == 1) {
            $statement = $this->db->connect()->prepare("SELECT correoInstitucional FROM estudiante WHERE egresado=0");
            $statement->execute();
            $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
            return  $resultado;
        } elseif ($opcion == 2) {
            $statement = $this->db->connect()->prepare("SELECT correoInstitucional FROM estudiante WHERE egresado=1");
            $statement->execute();
            $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
            return  $resultado;
        }
        try {
            $statement = $this->db->connect()->prepare("SELECT correoInstitucional FROM estudiante");
            $statement->execute();
            $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
            return  $resultado;
        } catch (PDOException $e) {
            return null;
        }
    }


    function listarEstudiantesAlumnos()
    {
        try {
            $statement = $this->db->connect()->prepare("SELECT e.codigoEstudiante, e.documento, p.nombres, p.apellidos, p.celular, e.correoInstitucional, e.fechaIngreso, e.fechaEgreso , e.promedio FROM estudiante e INNER JOIN persona p ON e.documento= p.documento WHERE e.egresado=1");
            $statement->execute();
            $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
            return  $resultado;
        } catch (PDOException $e) {
            return null;
        }
    }

    function listarEstudiantesEgresados()
    {
        try {
            $statement = $this->db->connect()->prepare("SELECT e.codigoEstudiante, e.documento, p.nombres, p.apellidos, p.celular, e.correoInstitucional, e.fechaIngreso, e.fechaEgreso , e.promedio FROM estudiante e INNER JOIN persona p ON e.documento= p.documento WHERE e.egresado=0");
            $statement->execute();
            $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
            return  $resultado;
        } catch (PDOException $e) {
            return null;
        }
    }


    function listarEstudiantesANotasPRO(){
        try {
            $statement = $this->db->connect()->prepare("SELECT e.codigoEstudiante, pro.lectura_critica, 
            pro.razonamiento_cuantitativo, pro.competencias_ciudadana, pro.comunicacion_escrita, pro.ingles , 
            p.nombres , p.apellidos FROM estudiante e INNER JOIN historial h ON e.codigoEstudiante=h.codigoEstudiante INNER JOIN pruebassaberpro pro 
            ON h.idSaberPro=pro.idSaberPro  INNER JOIN persona p ON p.documento=e.documento WHERE e.egresado=1 ORDER BY e.codigoEstudiante  ASC ");
            $statement->execute();
            $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
            return  $resultado;
        } catch (PDOException $e) {
            return null;
        }

    }

    
    function listarEstudiantesANotas11(){
        try {
            $statement = $this->db->connect()->prepare("SELECT e.codigoEstudiante, p11.lectura_critica,
             p11.matematica, p11.sociales_ciudadanas, p11.naturales, p11.ingles , p.nombres , p.apellidos FROM estudiante e INNER JOIN historial h ON e.codigoEstudiante=h.codigoEstudiante INNER JOIN pruebassaber11 p11 ON p11.idSaber11=h.idSaber11 INNER JOIN persona p ON p.documento=e.documento WHERE e.egresado=1 ORDER BY e.codigoEstudiante  ASC");
            $statement->execute();
            $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
            return  $resultado;
        } catch (PDOException $e) {
            return null;
        }

    }


    function listarEgresadosANotasPRO(){
        try {
            $statement = $this->db->connect()->prepare("SELECT e.codigoEstudiante, pro.lectura_critica, 
            pro.razonamiento_cuantitativo, pro.competencias_ciudadana, pro.comunicacion_escrita, pro.ingles , 
            p.nombres , p.apellidos FROM estudiante e INNER JOIN historial h ON e.codigoEstudiante=h.codigoEstudiante INNER JOIN pruebassaberpro pro 
            ON h.idSaberPro=pro.idSaberPro  INNER JOIN persona p ON p.documento=e.documento WHERE e.egresado=0 ORDER BY e.codigoEstudiante  ASC ");
            $statement->execute();
            $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
            return  $resultado;
        } catch (PDOException $e) {
            return null;
        }

    }

    
    function listarEgresadosANotas11(){
        try {
            $statement = $this->db->connect()->prepare("SELECT e.codigoEstudiante, p11.lectura_critica,
             p11.matematica, p11.sociales_ciudadanas, p11.naturales, p11.ingles , p.nombres , p.apellidos FROM estudiante e INNER JOIN historial h ON e.codigoEstudiante=h.codigoEstudiante 
             INNER JOIN pruebassaber11 p11 ON p11.idSaber11=h.idSaber11 INNER JOIN persona p ON p.documento=e.documento WHERE e.egresado=0 ORDER BY e.codigoEstudiante  ASC");
            $statement->execute();
            $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
            return  $resultado;
        } catch (PDOException $e) {
            return null;
        }

    }


    
    function promedioNotasAlumno(){
        try {
            $statement = $this->db->connect()->prepare("SELECT AVG(p.lectura_critica) as lectura_critica,AVG(p.matematica) as matematicas ,AVG(p.sociales_ciudadanas) as sociales_ciudadanas,AVG(p.naturales) as naturales ,AVG(p.ingles) as ingles,AVG(pp.lectura_critica) as lectura_criticaPro,AVG(pp.razonamiento_cuantitativo) as razonamiento_cuantitativoPro,AVG(pp.competencias_ciudadana) as competencias_ciudadanaPro,AVG(pp.comunicacion_escrita) as comunicacion_escritaPro,AVG(pp.ingles) as inglesPro FROM pruebassaber11 p INNER JOIN historial h ON h.idSaber11=p.idSaber11 INNER JOIN estudiante e ON h.codigoEstudiante=e.codigoEstudiante INNER JOIN pruebassaberpro pp ON pp.idSaberPro=h.idSaberPro WHERE e.egresado=0 ");
            $statement->execute();
            $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
            return  $resultado;
        } catch (PDOException $e) {
            return null;
        }

    }


    function promedioNotasEgresado(){
        try {
            $statement = $this->db->connect()->prepare("SELECT AVG(p.lectura_critica) as lectura_critica,AVG(p.matematica) as matematicas ,AVG(p.sociales_ciudadanas) as sociales_ciudadanas,AVG(p.naturales) as naturales ,AVG(p.ingles) as ingles,AVG(pp.lectura_critica) as lectura_criticaPro,AVG(pp.razonamiento_cuantitativo) as razonamiento_cuantitativoPro,AVG(pp.competencias_ciudadana) as competencias_ciudadanaPro,AVG(pp.comunicacion_escrita) as comunicacion_escritaPro,AVG(pp.ingles) as inglesPro FROM pruebassaber11 p INNER JOIN historial h ON h.idSaber11=p.idSaber11 INNER JOIN estudiante e ON h.codigoEstudiante=e.codigoEstudiante INNER JOIN pruebassaberpro pp ON pp.idSaberPro=h.idSaberPro WHERE e.egresado=1");
            $statement->execute();
            $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
            return  $resultado;
        } catch (PDOException $e) {
            return null;
        }

    }


    



 

 
}