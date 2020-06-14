<?php


class directorControl extends Controller
{

    function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['administrador'])) {
            header('Location: ' . constant('URL') . 'loginControl');
            return;
        }
        $this->view->datos = [];
        $this->view->cantidad = [];
        $this->view->cantidadTesis = [];
    }


    function render($ubicacion = null)
    {
        $constr = "director";
        $this->cargaEstudianteTesis();
        if (isset($ubicacion[0])) {
            $this->view->render($constr, $ubicacion[0]);
        } else {
            $this->view->render($constr, 'indexA');
        }
    }


    function cargarExcel($param = null)
    {



        //$nombre = $_POST["prueba"];
        $conexion = null;
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


                static $PUNTERO = 1;
                $objPHPExcel = PHPExcel_IOFactory::load($archivo_guardado);
                $objPHPExcel->setActiveSheetIndex(1);
                $numRows = $objPHPExcel->setActiveSheetIndex(1)->getHighestRow();

                # code...
                for ($i = 1; $i <= $numRows; $i++) {

                    $lectura = $objPHPExcel->getActiveSheet()->getCell('A' . $i);
                    $razonamiento = $objPHPExcel->getActiveSheet()->getCell('B' . $i);
                    $sociales = $objPHPExcel->getActiveSheet()->getCell('C' . $i);
                    $comunicacion = $objPHPExcel->getActiveSheet()->getCell('D' . $i);
                    $ingles = $objPHPExcel->getActiveSheet()->getCell('E' . $i);
                    $id_saberPro = $objPHPExcel->getActiveSheet()->getCell('F' . $i);
                    if ($i == 1) {
                        if (
                            $lectura != "LECTURA" || $razonamiento != "RAZONAMIENTO" || $sociales != "SOCIALES" || $comunicacion != "COMUNICACION"
                            || $ingles != "INGLES" || $id_saberPro != "ID"
                        ) {
                            echo  $this->model->falla_formato(1);;
                            return;
                        }
                    }
                    if ($i != 1) {
                        if ($id_saberPro != "") {
                            $this->model->insertar_saber_pro($id_saberPro, $lectura, $razonamiento, $sociales, $comunicacion, $ingles, $conexion);
                        }
                    }
                }




                //Carga de pruebas Saber 11//                    
                $objPHPExcel = PHPExcel_IOFactory::load($archivo_guardado);
                $objPHPExcel->setActiveSheetIndex(2);

                $numRows = $objPHPExcel->setActiveSheetIndex(2)->getHighestRow();


                for ($i = 1; $i <= $numRows; $i++) {

                    $lectura = $objPHPExcel->getActiveSheet()->getCell('A' . $i);
                    $matematica = $objPHPExcel->getActiveSheet()->getCell('B' . $i);
                    $sociales = $objPHPExcel->getActiveSheet()->getCell('C' . $i);
                    $naturales = $objPHPExcel->getActiveSheet()->getCell('D' . $i);
                    $ingles = $objPHPExcel->getActiveSheet()->getCell('E' . $i);
                    $id_saber11 = $objPHPExcel->getActiveSheet()->getCell('F' . $i);


                    if ($i == 1) {
                        if (
                            $lectura != "LECTURA" || $matematica != "MATEMATICAS" || $sociales != "SOCIALES" || $naturales != "NATURALES"
                            || $ingles != "INGLES" || $id_saber11 != "ID"
                        ) {
                            echo  $this->model->falla_formato(2);
                            return;
                        }
                    }
                    if ($i != 1) {

                        if ($id_saber11 != "") {
                            # code...
                            $this->model->insertar_saber_11($id_saber11, $lectura, $matematica, $sociales, $naturales, $ingles, $conexion);
                        }
                        # code...
                    }
                }


                //Carga de estudiantes//
                $objPHPExcel = PHPExcel_IOFactory::load($archivo_guardado);
                $objPHPExcel->setActiveSheetIndex(0);

                $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
                $char = 'A';



                for ($i = 1; $i <= $numRows; $i++) {

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
                        $fecha_ingreso = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($fecha_ingreso));
                    }


                    $fecha_egreso_g = $objPHPExcel->getActiveSheet()->getCell('M' . $i);
                    $fecha_egreso = $fecha_egreso_g->getValue();
                    if (PHPExcel_Shared_Date::isDateTime($fecha_egreso_g)) {
                        $fecha_egreso = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($fecha_egreso));
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


                    if ($i == 1) {
                        if (
                            $codigo != "CODIGO" || $nombres != "NOMBRE" || $apellidos != "APELLIDOS" || $documento != "CEDULA" || $celular != "CELULAR"
                            || $telefono != "TELEFONO" || $direccion != "DIRECCION" || $tipo_documento != "TIPO DOCUMENTO" || $correo_institucional != "CORREO INSTITUCIONAL"
                            || $correo != "CORREO" || $semestre_cursado != "SEMESTRE CURSADO" || $fecha_ingreso_g != "FECHA INGRESO" || $fecha_egreso_g != "FECHA EGRESO"
                            || $contraseña != "CONTRASENA" || $materias_aprobadas != "MATERIAS APROBADAS" || $promedio != "PROMEDIO" || $codigo_icfes_11 != "CODIGO ICFES 11"
                            || $codigo_icfes_pro != "CODIGO ICFES PRO" || $egresado != "EGRESADO"
                        ) {

                            echo  $this->model->falla_formato(3);
                            return;
                        }

                        # code...
                    }

                    if ($i != 1) {

                        if ($documento != "") {
                            $this->model->insertar_persona($nombres, $apellidos, $documento, $celular, $telefono, $direccion, $correo, $tipo_documento, $conexion);
                        }


                        if ($codigo != "") {
                            # code... 
                            $aux = $this->model->validar_historial($codigo, $conexion);
                            if ($aux  == "true") {
                                $this->model->insertar_historial($materias_aprobadas, $promedio, $codigo_icfes_11, $codigo_icfes_pro, $codigo, $conexion);
                            }
                            $id_temp_historial =  $this->model->traer_id_historial($codigo, $conexion);

                            $this->model->insertar_estudiante($codigo, $correo_institucional, $documento, $semestre_cursado, $fecha_ingreso,  $promedio, $materias_aprobadas, $fecha_egreso, $egresado, $contraseña, $id_temp_historial, $conexion);
                        }
                    }
                }
                // echo $char++;    --> Esto para si no se sabe desde que parte del excel se encuentra especificar cordenadas 
                //Se puede hacer mediante recepcion de datos de esos X y Y
            }
        } else {
            echo  $this->model->error_archivo_incorrecto();
        }
    }

    function ListarEstudiante()
    {
        $estudiante = $this->model->listarEstudiantes();
        $json = array();
        foreach ($estudiante as $est) {
            $json[] = array(
                'codigoEstudiante' => $est['codigoEstudiante'],
                'documento' => $est['documento'],
                'nombres' => $est['nombres'],
                'apellidos' => $est['apellidos'],
                'celular' => $est['celular'],
                'correoInstitucional' => $est['correoInstitucional'],
                'fechaIngreso' => $est['fechaIngreso'],
                'fechaEgreso' => $est['fechaEgreso'],
                'promedio' => $est['promedio']

            );
        }
        $JString = json_encode($json);
        echo $JString;
    }


    function ListarEstudianteActualizar($param)
    {
        $est = $this->model->listarEstudiantesActualizar($param[0]);


        $json[] = array(
            'codigoEstudiante' => $est['codigoEstudiante'],
            'nombres' => $est['nombres'],
            'apellidos' => $est['apellidos'],
            'fechaIngreso' => $est['fechaIngreso'],
            'promedio' => $est['promedio'],
            'idPro' => $est['idSaberPro'],
            'id11' => $est['idSaber11'],
            'semestreCursado' => $est['semestreCursado'],
            'materiasAprobadas' => $est['materiasAprobadas']

        );

        $JString = json_encode($json);
        echo $JString;
    }

    function EstudianteActualizar($param)
    {

        $resultado = $this->model->estudiantesActualizar($param[0], $param[1], $param[2],  $param[3], $param[4], $param[5], $param[6], $param[7], $param[8], $param[9]);
        echo $resultado;
    }

    function validarCodigoPrueba($param)
    {
        $est = $this->model->verificarCodigoPruebapro($param[0]);
        $est2 = $this->model->verificarCodigoPrueba11($param[1]);

        if ($est == null) {
            echo 1;
            return;
        }
        if ($est2 == null) {
            echo 2;
            return;
        }
    }


    function cargaEstudianteTesis()
    {
        $this->view->datos = $this->model->cargarEstuTesis();
        $this->view->cantidad = $this->model->listarEstudiantes();
        $this->view->cantidadTesis = $this->model->getTesis();
    }
    function buscarCodigo($param = null)
    {
        $codigo = $param[0];
        $resultado = $this->model->getDatos($codigo);
        if (empty($resultado)) {
            echo 1;
            return;
        }

        $json[] = array(
            'codigoEstudiante' => $resultado['codigoEstudiante'],
            'nombres' => $resultado['nombres'],
            'fechaIngreso' => $resultado['fechaIngreso'],
            'fechaEgreso' => $resultado['fechaEgreso']
        );


        $JString = json_encode($json);
        echo $JString;
    }
    function actualizarFecha($param = null)
    {
        $fecha = $param[0];
        $codigo = $param[1];

        $this->model->uptadeFechaegreso($fecha, $codigo);
        echo 0;
        return;
    }


    function buscarEstudiante($param = null)
    {
        if ($param == null) return;
        $codigo = $param[0];
        $resultado = $this->model->buscarEstudiantes($codigo);
        $json = array();
        foreach ($resultado as $est) {
            $json[] = array(
                'codigoEstudiante' => $est['codigoEstudiante'],
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

    //tare los datos codigo, nombre y apeliidos
    function verificarEstudiante($param = null)
    {
        if ($param == null) return;
        $codigo = $param[0];
        $resultado = $this->model->verificarEstudiantes($codigo);
        if ($resultado == null) {
            echo 0;
            return;
        }
        $cos = $this->model->getCodigosTesis($codigo);
        if ($cos != null) {
            echo 1;
            return;
        }

        $json = array();
        $json[] = array(
            'codigoEstudiante' => $resultado['codigoEstudiante'],
            'nombres' => $resultado['nombres'],
            'apellidos' => $resultado['apellidos']
        );
        $JString = json_encode($json);
        echo $JString;
    }


    function getPrueba($param = null)
    {
        if ($param == null) return;
        $codigo = $param[0];
        $aux = $this->model->getDatos($codigo);
        if (empty($aux)) {
            echo 0;
            return;
        }
        $resultado = $this->model->getPruebaE($codigo);
        $json = array();
        $json[] = array(
            'lecturaPP' => $resultado['lecturaPP'],
            'razonamientoPP' => $resultado['razonamientoPP'],
            'comunicacionPP' => $resultado['comunicacionPP'],
            'competenciasPP' => $resultado['competenciasPP'],
            'inglesPP' => $resultado['inglesPP'],
            'lecturaP11' => $resultado['lecturaP11'],
            'razonamientoP11' => $resultado['razonamientoP11'],
            'naturalesP11' => $resultado['naturalesP11'],
            'competenciasP11' => $resultado['competenciasP11'],
            'inglesP11' => $resultado['inglesP11'],
            'nombre' => $aux['nombres'],
            'apellido' => $aux['apellidos']
        );
        $JString = json_encode($json);
        echo $JString;
    }



    function enviarCorreos($param = null)
    {
        require_once "utils/correo/Correo.php";
        $resultado = $this->model->getCorreos($param[2]);
        $email = new Correo();
        $email->cargaCorreo($resultado, $param[0], $param[1], 0);
    }


    function insertTesis($param = null)
    {
        //$resultado = $this->model->insertTesis($codigo);
        $listCodigos = $_POST['codigo'];
        $titulo = $_POST['titulo'];
        $ruta = $_FILES['archivo']['tmp_name'];
        $nombre = $_FILES['archivo']['name'];

        $array = explode("/", $listCodigos);


        $destino = "almacen/tesis/" . $nombre;


        $maxArray = sizeof($array);



        if ($ruta != "") {
            if (copy($ruta, $destino)) { //Se copia el archivo de la ruta a la carpeta del server


                $this->model->insertTesis($destino, $titulo);
                $max = $this->model->getMaxIdTesis();


                for ($i = 0; $i < $maxArray; $i++) {
                    $this->model->insertEstudiante_Tesis($max['id'], date('d/m/y'), $array[$i]);
                }
            } else {
                echo 1;
            }
        }

        echo 0;
    }

    function getTesis()
    {
        $resultado = $this->model->getTesis();
        $json = array();
        foreach ($resultado as $est) {
            $json[] = array(
                'titulo' => $est['titulo'],
                'archivo' => $est['archivo'],

            );
        }
        $JString = json_encode($json);
        echo $JString;
    }

    //SEGUNDA ITERACION
    function generarReporte($param)
    {

        if ($param[0] == "Alumno") {

            if ($param[1] == "Promedio") {
                require('utils/fPDF/reportePDF.php');
                $_SESSION['repor'] = "Reporte Promedio Alumno";
                $pdf = new reportePDF('L', 'mm', 'A4');
                $resultado = $this->model->listarEstudiantesAlumnos();
                $pdf->AddPage();
                $header = array('Codigo', 'Documento', 'Nombre', 'Apellido', 'Correo Institucional', 'Promedio');
                $pdf->TablaPromedio($header, $resultado);
                $pdf->Output('reporte_promedioA.pdf', 'I');



            } else if ($param[1] == "Notas pruebas Saber 11 y Pro") {
                require('utils/fPDF/reporteNota.php');
                $_SESSION['repor'] = "Reporte Notas Alumno";
                $_SESSION['tamaño'] = "si";
                $pdfN = new reporteNota('L', 'mm', 'legal');
                $resultadoPro = $this->model->listarEstudiantesANotasPRO();
                $resultado11 = $this->model->listarEstudiantesANotas11();
                $pdfN->AddPage();
                $headerPro = array(
                    'codigoEstudiante', 'Nombre' , 'Apellido ', 'Lectura Critica',
                    'RazonamientoC.', 'CompetenciaC.', 'ComunicacionE.', 'Ingles'
                );
                $header11 = array(
                    'codigoEstudiante', 'Nombre' , 'Apellido ', 'Lectura Critica',
                    'Matematica', 'Sociales Ciudadanas', 'Naturales', 'Ingles'
                );
                $pdfN->TablaNotas($headerPro, $header11, $resultadoPro, $resultado11);
                $pdfN->AddPage();
                $pdfN->agregarImagen();
                $pdfN->Output('reporte_promedioA.pdf', 'I');
            }


        } else if ($param[0] == "Egresado") {

            if ($param[1] == "Promedio") {
                require('utils/fPDF/reportePDF.php');
                $_SESSION['repor'] = "Reporte Promedio Egresado";
                $pdf = new reportePDF('L', 'mm', 'A4');
                $resultado = $this->model->listarEstudiantesEgresados();
                $pdf->AddPage();
                $header = array('Codigo', 'Documento', 'Nombre', 'Apellido', 'Correo Institucional', 'Promedio');
                $pdf->TablaPromedio($header, $resultado);
                $pdf->Output('reporte_promedioE.pdf', 'I');


            } else if ($param[1] == "Notas pruebas Saber 11 y Pro") {
                require('utils/fPDF/reporteNota.php');
                $_SESSION['repor'] = "Reporte Notas Egresado";
                $_SESSION['tamaño'] = "si";
                $pdfN = new reporteNota('L', 'mm', 'legal');
                $resultadoPro = $this->model->listarEgresadosANotasPRO();
                $resultado11 = $this->model->listarEgresadosANotas11();
                $pdfN->AddPage();
                $headerPro = array(
                    'codigoEstudiante', 'Nombre' , 'Apellido ', 'Lectura Critica',
                    'Razonamiento Cuantitativo', 'Comptencia Ciudadana', 'Comunicacion Escrita', 'Ingles'
                );
                $header11 = array(
                    'codigoEstudiante', 'Nombre' , 'Apellido ', 'Lectura Critica',
                    'Matematica', 'Sociales Ciudadanas', 'Naturales', 'Ingles'
                );
                $pdfN->TablaNotas($headerPro, $header11, $resultadoPro, $resultado11);

                $pdfN->AddPage();
                $pdfN->agregarImagen();
                $pdfN->Output('reporte_promedioA.pdf', 'I');


            }
        }else if($param[0]=="Empresa Convenio"){

            require('utils/fPDF/reporteEmpresa.php');
            $pdfE = new reporteEmpresa('L', 'mm', 'A4');
            $resultadoE = $this->model->listarEmpresa();
            $pdfE->AddPage();
            $headerPro = array(
                'Nombre', 'Correo', 'Telefono', 'Celular', 'Direccion' , 'Ciudad', 'Fecha Registro'
            );
            $pdfE->TablaConvenio($headerPro,$resultadoE);

            $pdfE->Output('reporte_promedioA.pdf', 'I');


        }
        unset($_SESSION['repor']);
    }

    function obtenerImagen()
    {

        $baseFromJavascript =  $_POST["base64"];
        $base_to_php = explode(',', $baseFromJavascript);
        $data = base64_decode($base_to_php[1]);
        $filepath =  "public/imgTemp/image.png";
        file_put_contents($filepath, $data);
    }


    function promedioNotasAlumno()
    {
        $resultadoPro = $this->model->promedioNotasAlumno();


        $json = array();
        foreach ($resultadoPro as $est) {
            $json[] = array(
                'lectura_critica' => $est['lectura_critica'],
                'matematicas' => $est['matematicas'],
                'sociales_ciudadanas' => $est['sociales_ciudadanas'],
                'naturales' => $est['naturales'],
                'ingles' => $est['ingles'],
                'lectura_criticaPro' => $est['lectura_criticaPro'],
                'razonamiento_cuantitativoPro' => $est['razonamiento_cuantitativoPro'],
                'competencias_ciudadanaPro' => $est['competencias_ciudadanaPro'],
                'comunicacion_escritaPro' => $est['comunicacion_escritaPro'],
                'inglesPro' => $est['inglesPro']



            );
        }
        $JString = json_encode($json);
        echo $JString;
    }
    function promedioNotasEgresado()
    {
        $resultadoPro = $this->model->promedioNotasEgresado();


        $json = array();
        foreach ($resultadoPro as $est) {
            $json[] = array(
                'lectura_critica' => $est['lectura_critica'],
                'matematicas' => $est['matematicas'],
                'sociales_ciudadanas' => $est['sociales_ciudadanas'],
                'naturales' => $est['naturales'],
                'ingles' => $est['ingles'],
                'lectura_criticaPro' => $est['lectura_criticaPro'],
                'razonamiento_cuantitativoPro' => $est['razonamiento_cuantitativoPro'],
                'competencias_ciudadanaPro' => $est['competencias_ciudadanaPro'],
                'comunicacion_escritaPro' => $est['comunicacion_escritaPro'],
                'inglesPro' => $est['inglesPro']



            );
        }
        $JString = json_encode($json);
        echo $JString;
    }

    function crearEvento($param = null)
    {
        require_once "utils/correo/Correo.php";
        $titulo = $param[0];
        $direccion = $param[1];
        $ciudad = $param[2];
        $fecha = $param[3];
        $hora = $param[4];
        $responsable = $param[5];
        $descripcion = $param[6];
        $opcion = $param[7];
        $this->model->crearEvento($titulo, $direccion,$ciudad,$fecha,$hora,$responsable,$descripcion,$opcion);

        $particpan = $param[7];
        $resultado = $this->model->getCorreos($particpan);
        $email = new Correo();
        echo var_dump($resultado);
        
        
        $email->correoEventos($resultado, $titulo, $descripcion, 0);


        return;
        
    }


    function listarEventos(){
        $resultado = $this->model->listarEventos();
        $json = array();
        foreach ($resultado as $est) {
            $json[] = array(
                'id' => $est['id'],
                'titulo' => $est['titulo'],
                'direccion' => $est['direccion'],
                'fecha' => $est['fecha'],
                'hora' => $est['hora'],
                'ciudad' => $est['ciudad'],
                'descripcion' => $est['descripcion'],
                'responsable' => $est['responsable'],
                'destinatario' => $est['destinatario']
            );
        }
        $JString = json_encode($json);
        echo $JString;


    }

     function eliminarEvento($param)
    {
       $codigo = $param[0];
       $this->model->eliminarEvento($codigo);
       echo "Evento eliminado";


    }

    function enviarCorreoEncuesta(){
        require_once "utils/correo/Correo.php";
        $resultado = $this->model->getCorreos($_POST['opcionE']);
        echo var_dump($resultado);
        $email = new Correo();
        $email->correoEventos($resultado, $_POST['asuntoE'], $_POST['cuerpoE'], 1);
    }
}
