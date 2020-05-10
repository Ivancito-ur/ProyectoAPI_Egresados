<?php

require "../PHPOffice/PHPExcel/Classes/PHPExcel/IOFactory.php";
require_once "conexion.php";
require_once "funciones.php";
if (isset($_POST["enviar"])) {

    $archivo = $_FILES["archivo"]["name"];
    $archivo_copiado = $_FILES["archivo"]["tmp_name"];
    $archivo_guardado = "archivos/copia_" . $archivo;

    // echo $archivo_guardado;
    // echo $archivo_copiado;

    $info = new SplFileInfo($archivo_guardado); //Informacion del archivo OBJECT
    $extension = $info->getExtension();

    echo "<br/>" . $extension;

    if ($extension == "xlsx" || $extension == "xls") {
        if (copy($archivo_copiado, $archivo_guardado)) {
            echo "<br/> Se copió correctamente";
        } else {
            echo "<br/> Hubo error";
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

                    insertar_saber_pro($id_saberPro, $lectura, $razonamiento, $sociales, $comunicacion, $ingles, $conexion);
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
                    insertar_saber_11($id_saber11, $lectura, $matematica, $sociales, $naturales, $ingles, $conexion);
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
                    insertar_persona($nombres, $apellidos, $documento, $celular, $telefono, $direccion, $correo, $tipo_documento, $conexion);
                }


                if ($codigo != "") {
                    # code... 
                    if(validar_historial($codigo,$conexion)){
                        
                        insertar_historial($materias_aprobadas, $promedio, $codigo_icfes_11, $codigo_icfes_pro, $codigo, $conexion);
                    }
                    $id_temp_historial = traer_id_historial($codigo, $conexion);
                    insertar_estudiante($codigo, $correo_institucional, $documento, $semestre_cursado, $fecha_ingreso, $fecha_egreso, $egresado, $contraseña, $id_temp_historial, $conexion);
                }
            }
            // echo $char++;    --> Esto para si no se sabe desde que parte del excel se encuentra especificar cordenadas 
            //Se puede hacer mediante recepcion de datos de esos X y Y
        }
    } else {
        echo error_archivo_incorrecto();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VERSION 3</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="formulario">
        <form action="excel.php" class="formularioCompleto" method="POST" enctype="multipart/form-data">
            <input class="btn btn-info" type="file" name="archivo" class="form_control" />
            <input class="btn btn-success" type="submit" value="SUBIR ARCHIVO" name="enviar" />
        </form>
    </div>

</body>

</html>