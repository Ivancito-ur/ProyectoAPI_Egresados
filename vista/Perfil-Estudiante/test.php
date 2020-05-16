<?php
require_once '../../metodos/hoja_vida/hojaVida.php';
$hojaVida=new hojaVida();
$hojaVida->getAll();
$hojaVida->archivo="ger";
$hojaVida->codigoEstudiante="56415655";
$hojaVida->create();
?>