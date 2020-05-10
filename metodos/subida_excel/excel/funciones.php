<?php


function insertar_persona($nombres, $apellidos, $documento, $celular, $telefono, $direccion, $correo, $tipo_documento, $conexion)
{

    $SQL = "INSERT INTO persona (documento,nombres,apellidos,celular,correo,telefono,tipo_documento,direccion)
     values ('$documento','$nombres','$apellidos','$celular','$correo','$telefono','$tipo_documento','$direccion')";

    $ejecutar = mysqli_query($conexion, $SQL);

    return $ejecutar;
}
function insertar_estudiante($codigo, $correo_institucional, $documento, $semestre_cursado, $fecha_ingreso, $fecha_egreso, $egresado, $contraseña, $id_historial, $conexion)
{
    $SQL = "INSERT INTO estudiante (codigoEstudiante,contrasena,documento,egresado,correoInstitucional,semestreCursado,fechaIngreso,fechaEgreso,id_historial)
     values ('$codigo','$contraseña','$documento','$egresado','$correo_institucional','$semestre_cursado','$fecha_ingreso','$fecha_egreso','$id_historial')";


    try {
        $ejecutar = mysqli_query($conexion, $SQL);
        echo mysqli_errno($conexion) . " : " . mysqli_error($conexion);
    } catch (\Throwable $th) {
        echo $th;
    }
    return $ejecutar;
}

function insertar_historial($materias_aprobadas, $promedio, $id_saber11, $id_saberPro, $codigo, $conexion)
{


    $SQL = "INSERT INTO historial (materiasAprobadas,promedio,idSaberPro,idSaber11,codigoEstudiante)
     values ('$materias_aprobadas','$promedio','$id_saberPro','$id_saber11','$codigo')";

    try {
        $ejecutar = mysqli_query($conexion, $SQL);
    } catch (\Throwable $th) {
        echo $th;
    }
    return $ejecutar;
}

function insertar_saber_11($id_saber11, $lectura, $matematica, $sociales, $naturales, $ingles, $conexion)
{

    $SQL = "INSERT INTO pruebassaber11 (idSaber11,lectura_critica,matematica,sociales_ciudadanas,naturales,ingles)
     values ('$id_saber11','$lectura','$matematica','$sociales','$naturales','$ingles')";

    try {
        $ejecutar = mysqli_query($conexion, $SQL);
    } catch (\Throwable $th) {
        echo $th;
    }
    return $ejecutar;
}

function insertar_saber_pro($id_saberPro, $lectura, $razonamiento, $sociales, $comunicacion, $ingles, $conexion)
{

    $SQL = "INSERT INTO pruebassaberpro (idSaberPro,lectura_critica,razonamiento_cuantitativo,competencias_ciudadana,comunicacion_escrita,ingles)
     values ('$id_saberPro','$lectura','$razonamiento','$sociales','$comunicacion','$ingles')";

    try {
        $ejecutar = mysqli_query($conexion, $SQL);
    } catch (\Throwable $th) {
        echo $th;
    }
    return $ejecutar;
}

function traer_id_historial($codigo, $conexion)
{
    try {
        //code...

        $query = "SELECT id FROM historial WHERE codigoEstudiante = '$codigo'";
        $result = mysqli_query($conexion, $query);
        $id = null;

        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
        }
        mysqli_free_result($result);

        return $id;
    } catch (\Throwable $th) {
        echo $th;
    }
}

function validar_historial($codigo,$conexion)
{
    
            try {
    
                $query = "SELECT id FROM historial WHERE codigoEstudiante = '$codigo'";
                $result = mysqli_query($conexion, $query);
    
            
                mysqli_free_result($result);

                if($result){
                    return false; 

                }
                else{
                    return true;
                }
    
            } catch (\Throwable $th) {
                echo $th;
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
