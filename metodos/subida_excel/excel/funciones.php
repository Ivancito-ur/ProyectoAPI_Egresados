<?php


function insertar($codigo,$nombres,$apellidos,$fecha_ingreso,$fecha_nacimiento,$cedula,$conexion){

    $SQL = "INSERT INTO egresados (codigo,nombres,apellidos,fecha_ingreso,fecha_nacimiento,cedula)
     values ('$codigo','$nombres','$apellidos','$fecha_ingreso','$fecha_nacimiento','$cedula')";

    $ejecutar = mysqli_query($conexion,$SQL);

    return $ejecutar;
}

function error_archivo_incorrecto (){

    $error=
"
    <div class='alert alert-danger' role='alert'>
         Archivo Incorrecto: Tiene que ser un archivo Excel.
         XLSX o XLS
    </div>
";

 return $error;
}


?>