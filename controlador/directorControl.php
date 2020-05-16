<?php
   

class directorControl extends Controller{
       
        

        function __construct(){
          parent::__construct();
          if(!isset($_SESSION['administrador'])){
            header('Location: ' . constant('URL'). 'loginControl');   
            return;
          }
          $this->view->datos =[];
        }


                    
        function render($ubicacion = null){
          $constr = "director";
          $this->cargaEstudianteTesis();
          if(isset($ubicacion[0])){
          $this->view->render($constr , $ubicacion[0]);
          }else{
          $this->view->render($constr, 'indexA');}
        }


    function cargarExcel($param = null){
     
     

            //$nombre = $_POST["prueba"];
            $conexion=null;
            $archivo = $_FILES["archivo"]["name"];
            $archivo_copiado = $_FILES["archivo"]["tmp_name"];
            $archivo_guardado = "archivos/copia_" . $archivo;

        
        
            // echo $archivo_guardado;
            // echo $archivo_copiado;
            
            $info = new SplFileInfo($archivo_guardado); //Informacion del archivo OBJECT
            $extension = $info->getExtension();
        
           
        
            if ($extension == "xlsx" || $extension == "xls") {
                if (copy($archivo_copiado, $archivo_guardado)) {
                    echo "si";
                } else {
                    echo " " . $extension;
                    echo "Hubo error";
                }
                if (file_exists($archivo_guardado)) {
        
        
        
                    $objPHPExcel = PHPExcel_IOFactory::load($archivo_guardado);
                    $objPHPExcel->setActiveSheetIndex(1);
        
                    $numRows = $objPHPExcel->setActiveSheetIndex(1)->getHighestRow();
        
                    for ($i = 2; $i <= $numRows; $i++) {
        
                        $lectura = $objPHPExcel->getActiveSheet()->getCell('A' . $i);
                        $razonamiento = $objPHPExcel->getActiveSheet()->getCell('B' . $i);
                        $sociales = $objPHPExcel->getActiveSheet()->getCell('C' . $i);
                        $comunicacion = $objPHPExcel->getActiveSheet()->getCell('D' . $i);
                        $ingles = $objPHPExcel->getActiveSheet()->getCell('E' . $i);
                        $id_saberPro = $objPHPExcel->getActiveSheet()->getCell('F' . $i);
        
                        if ($id_saberPro != "") {
                        
                          $this->model->insertar_saber_pro($id_saberPro, $lectura, $razonamiento, $sociales, $comunicacion, $ingles, $conexion);
                        }
                        
                    }
        
                    $objPHPExcel = PHPExcel_IOFactory::load($archivo_guardado);
                    $objPHPExcel->setActiveSheetIndex(2);
        
                    $numRows = $objPHPExcel->setActiveSheetIndex(2)->getHighestRow();
        
                    for ($i = 2; $i <= $numRows; $i++) {
        
                        $lectura = $objPHPExcel->getActiveSheet()->getCell('A' . $i);
                        $matematica = $objPHPExcel->getActiveSheet()->getCell('B' . $i);
                        $sociales = $objPHPExcel->getActiveSheet()->getCell('C' . $i);
                        $naturales = $objPHPExcel->getActiveSheet()->getCell('D' . $i);
                        $ingles = $objPHPExcel->getActiveSheet()->getCell('E' . $i);
                        $id_saber11 = $objPHPExcel->getActiveSheet()->getCell('F' . $i);
        
                        if ($id_saber11 != "") {
                            # code...
                            $this->model->insertar_saber_11($id_saber11, $lectura, $matematica, $sociales, $naturales, $ingles, $conexion);
                        }
                    }
        
        
        
                    $objPHPExcel = PHPExcel_IOFactory::load($archivo_guardado);
                    $objPHPExcel->setActiveSheetIndex(0);
        
                    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
                    $char = 'A';
                    for ($i = 2; $i <= $numRows; $i++) {
        
                        $codigo = $objPHPExcel->getActiveSheet()->getCell('A' . $i);
                        $nombres = $objPHPExcel->getActiveSheet()->getCell('B' . $i);
                        $apellidos = $objPHPExcel->getActiveSheet()->getCell('C' . $i);
                        $documento = $objPHPExcel->getActiveSheet()->getCell('D' . $i);
                        $celular = $objPHPExcel->getActiveSheet()->getCell('E' . $i);
                        $correo = $objPHPExcel->getActiveSheet()->getCell('F' . $i);
                        $telefono = $objPHPExcel->getActiveSheet()->getCell('G' . $i);
                        $direccion = $objPHPExcel->getActiveSheet()->getCell('H' . $i);
                        $tipo_documento = $objPHPExcel->getActiveSheet()->getCell('I' . $i);
        
        
                        $correo_institucional = $objPHPExcel->getActiveSheet()->getCell('J' . $i);
                        $semestre_cursado = $objPHPExcel->getActiveSheet()->getCell('K' . $i);
        
        
                        //Caso especial de fechas
                        $fecha_ingreso_g = $objPHPExcel->getActiveSheet()->getCell('L' . $i);
                        $fecha_ingreso = $fecha_ingreso_g->getValue();
                        if (PHPExcel_Shared_Date::isDateTime($fecha_ingreso_g)) {
                            $fecha_ingreso = date($format= "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($fecha_ingreso));
                        }
        
        
                        $fecha_egreso_g = $objPHPExcel->getActiveSheet()->getCell('M' . $i);
                        $fecha_egreso = $fecha_egreso_g->getValue();
                        if (PHPExcel_Shared_Date::isDateTime($fecha_egreso_g)) {
                            $fecha_egreso = date($format= "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($fecha_egreso));
                        }
        
        
                        ////////////////////////////////////
                        $egresado = $objPHPExcel->getActiveSheet()->getCell('N' . $i);
                        if (strcasecmp($egresado, "True") == 0 || strcasecmp($egresado, "Si" == 0)) {
                            $egresado = 0;
                        } else {
                            $egresado = 1;
                        }
                        $contraseña = $objPHPExcel->getActiveSheet()->getCell('O' . $i);
                        $materias_aprobadas = $objPHPExcel->getActiveSheet()->getCell('P' . $i);
                        $promedio = $objPHPExcel->getActiveSheet()->getCell('Q' . $i);
                        $codigo_icfes_11 = $objPHPExcel->getActiveSheet()->getCell('R' . $i);
                        $codigo_icfes_pro = $objPHPExcel->getActiveSheet()->getCell('S' . $i);
        
        
                        if ($documento != "") {
                          $this->model->insertar_persona($nombres, $apellidos, $documento, $celular, $telefono, $direccion, $correo, $tipo_documento, $conexion);
                        }
        
        
                        if ($codigo != "") {
                            # code... 
                           $aux = $this->model->validar_historial($codigo,$conexion);
                            if( $aux  =="true"){
                              $this->model->insertar_historial($materias_aprobadas, $promedio, $codigo_icfes_11, $codigo_icfes_pro, $codigo, $conexion);
                            }
                            $id_temp_historial =  $this->model->traer_id_historial($codigo, $conexion);
                           // echo  "xxxxxxxxxxxxxxxxxx". $id_temp_historial . "    xxxxxxxxxxxxxxxxxxx         ";
                            $this->model->insertar_estudiante($codigo, $correo_institucional, $documento, $semestre_cursado, $fecha_ingreso, $fecha_egreso, $egresado, $contraseña, $id_temp_historial, $conexion);
                        }
                    }
                    // echo $char++;    --> Esto para si no se sabe desde que parte del excel se encuentra especificar cordenadas 
                    //Se puede hacer mediante recepcion de datos de esos X y Y
                }
            } else {
                echo  $this->model->error_archivo_incorrecto();
            }
            
        
      }  

    function cargaEstudianteTesis(){
        $this->view->datos = $this->model->cargarEstuTesis();

    }

    function ListarEstudiante(){
        $estudiante = $this->model->listarEstudiantes();
        $json = array();
        foreach($estudiante as $est){
            $json[] = array(
                'codigoEstudiante'=> $est['codigoEstudiante'],
                'documento' => $est['documento'],
                'nombres' => $est['nombres'],
                'apellidos' => $est['apellidos'],
                'celular' => $est['celular'],
                'correoInstitucional' => $est['correoInstitucional'],
                'fechaIngreso' => $est['fechaIngreso'],
                'fechaEgreso' => $est['fechaEgreso']
            );

        }
        $JString = json_encode($json);
        echo $JString;

       

    }

    function buscarCodigo($param = null){
        $codigo = $param[0];
        $resultado = $this->model->getDatos($codigo);
        if(empty($resultado)){
            echo "0";
            return;
        }
        $json[] = array(
            'codigoEstudiante'=> $resultado['codigoEstudiante'],
            'nombres' => $resultado['nombres'],
            'fechaIngreso' => $resultado['fechaIngreso'],
            'fechaEgreso' => $resultado['fechaEgreso']
        );
        

        $JString = json_encode($json);
        echo $JString;

  
    }

     


      function actualizarFecha($param = null){
        $fecha = $param[0];
        $codigo = $param[1];
        $formato = "0000-00-00";

        $año = substr($fecha,0,4);
        $mes = substr($fecha,5,2);
        $dia = substr($fecha,8,2);

        $añoF = substr($formato,0,4);
        $mesF = substr($formato,5,2);
        $diaF = substr($formato,8,2);

        if((strlen($añoF)==strlen($año)) && (strlen($mes)==strlen($mesF)) && (strlen($dia)==strlen($diaF)) ){
            $this->model->uptadeFechaegreso($fecha, $codigo);
            echo "0";
        
        }else{
            echo "1";
        }

       
     

    }


    function buscarEstudiante($param=null){
        $codigo = $param[0];
        $resultado = $this->model->buscarEstudiantes($codigo);
        $json = array();
        foreach($resultado as $est){
            $json[] = array(
                'codigoEstudiante'=> $est['codigoEstudiante'],
                'documento' => $est['documento'],
                'nombres' => $est['nombres'],
                'apellidos' => $est['apellidos'],
                'celular' => $est['celular'],
                'correoInstitucional' => $est['correoInstitucional'],
                'fechaIngreso' => $est['fechaIngreso'],
                'fechaEgreso' => $est['fechaEgreso']
            );

        }
        $JString = json_encode($json);
        echo $JString;
    }

}

 
   
    
?>


