<?php
require 'conexion.php';
$conexion = conexion();


if (!$conexion){
    die();
}


$propiedades_totales = $conexion->prepare("
    SELECT * FROM propiedades");
$propiedades_totales->execute();
$propiedades_totales = $propiedades_totales->fetchAll();


require 'views/iniciarsub.view.php';
?>