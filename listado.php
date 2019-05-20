<?php
require 'conexion.php';
$conexion = conexion();
session_start();
//print_r($_SESSION);

if (!$conexion){
    die();
}

//Modifique la consulta para agregar un orden  y para checar el campo eliminado (eva)
$propiedades = $conexion->prepare("SELECT * FROM propiedades WHERE eliminado='0' ORDER BY nombre ASC");
$propiedades->execute();
$propiedades = $propiedades->fetchAll();

require './views/listado.view.php';