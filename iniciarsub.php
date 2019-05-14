<?php
require 'conexion.php';
$conexion = conexion();


if (!$conexion){
    die();
}

$id_propiedad=$_GET[idpropiedad];
$semana=$_GET[semana];
$anio=_GET[anio];
$precio




$idsemana = $conexion->prepare("SELECT id_semana FROM fecha WHERE semana=:semana AND anio=:anio");
$consulta_fecha->execute();
$consulta_fecha = $consulta_fecha->fetchAll();

$id_semana_propiedad = $conexion->prepare("SELECT idfecha_propiedad FROM propiedades INNER JOIN fecha 









SELECT * 
FROM table1 
INNER JOIN table2
      ON table1.primaryKey=table2.table1Id
INNER JOIN table3
      ON table1.primaryKey=table3.table1Id






                                        ");



require 'views/iniciarsub.view.php';
?>