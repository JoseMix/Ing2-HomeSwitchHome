<?php
require 'conexion.php';
$conexion = conexion();

print_r ($_POST);
if (!$conexion){
    die();
}
$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $preciobase = $_POST['preciobase'];
    $fechainicio = $_POST['fecha'];
    $fechafin = date('Y-m-d', strtotime($fechainicio . ' + 3 days'));
    $idpropiedad = 1;  //idpropiedad debe ser pasado



//DIFERENCIA DE MAS DE 6 MESES EN ADELANTE Y NUMERO DE SEMANA//

$fecha1 = $_POST["fecha"];
$fecha2 = date("Y-m-d");
$fecha3 = new Datetime($fecha1);
$semana = $fecha3->format("W");
$fecha1 = new Datetime($fecha1);
$fecha2 = new Datetime($fecha2);
$diferencia = date_diff($fecha1, $fecha2);
$diferencia = $diferencia->format('%m');
if ($diferencia < 6) {
    $errores .= "<li>Fecha de subasta demasiado cerca</li>";
}else{
    $conexion = conexion();    
    $statement=$conexion->prepare('SELECT * FROM subasta WHERE idpropiedad = :idpropiedad AND semana= :semana LIMIT 1' );
    $statement->execute(array(
        ':idpropiedad' => $idpropiedad,
        ':semana' =>$semana   
    ));
   $resultado = $statement->fetch();
    print_r ($resultado);
    if($resultado != false){
        $errores .= '<li>Propiedad Ya Subastada en esa fecha</li>';
    }
}
if ($errores = ''){
    $conexion = conexion();    
    $statement = $conexion->prepare('INSERT INTO subasta (preciobase, fechainicio, fechafin, idpropiedad, semana ) 
                                        VALUES (:preciobase, :fechainicio, :fechafin, :idpropiedad, :semana)');
    $statement->execute(array(
        ':preciobase' => $preciobase,
        ':fechainicio' => $fechainicio,
        ':fechafin' => $fechafin,
        ':idpropiedad' => $idpropiedad,
        ':semana' => $semana
    )); 
    }


}







    











/*$id_propiedad=$_GET[idpropiedad];

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
*/



/*CALCULO DE EL EQUIVALENTE EN FECHAS DE UNA SEMANA
$semana=10;
$anio =2019;
$inicio_semana = new DateTime();
$inicio_semana->setISODate($anio,$semana);
echo $inicio_semana->format('d-M-Y');
$fin_semana = new DateTime();
$fin_semana->setISODate($anio,$semana+1);
echo $fin_semana->format('d-M-Y');
*/






require 'views/iniciarsub.view.php';
?>


