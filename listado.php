<?php
require 'conexion.php';
$conexion = conexion();


if (!$conexion){
    die();
}

$propiedades = $conexion->prepare("
    SELECT * FROM propiedades");
$propiedades->execute();
$propiedades = $propiedades->fetchAll();

require './views/listado.view.php';