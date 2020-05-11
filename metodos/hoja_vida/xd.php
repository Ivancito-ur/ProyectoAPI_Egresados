<?php
require_once 'hojaVida.php';
$hojaVida=new hojaVida();
$hojaVida->getAll();
$hojaVida->archivo="gerddede";
$hojaVida->codigoEstudiante="23456";
$hojaVida->create();
?>