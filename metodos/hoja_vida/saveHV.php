<?php
include_once 'Conexion.php';
require_once '../../metodos/hoja_vida/hojaVida.php';
//Subir Hoja De Vida A Carpeta Del Server
if (isset($_POST['cargar'])) {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['codigo'] . ".pdf"; //Se Toma el cod del campo oculto en el formulario y se agrega la extension
    $ruta = $_FILES['hojaVida']['tmp_name'];
    $destino = "../../hojasDeVida/" . $nombre;
    if ($nombre != "") {
        if (copy($ruta, $destino)) { //Se copia el archivo de la ruta a la carpeta del server
            try{
            $hojaVida = new hojaVida();
            $hojaVida->getAll();
            $hojaVida->archivo = $destino;
            $hojaVida->codigoEstudiante = $codigo;
            $hojaVida->create();
            header('location:../../vista/Perfil-Estudiante/PerfilE.php?answer=Ready');
            }catch(PDOException $e){
                echo $e->getMessage();//Trucaso para no hacer metodo de cmparacion de llave duplicada
                header('location:../../vista/Perfil-Estudiante/PerfilE.php?answer=Ready');
            }

           
        } else {
            echo "noo";
        }
    }
}
