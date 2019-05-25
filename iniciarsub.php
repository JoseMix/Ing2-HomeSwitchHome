<?php
require 'conexion.php';
$conexion = conexion();
//print_r ($_GET);
if (!$conexion){
    die();
}
session_start();


$errores = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $preciobase = $_POST['preciobase'];
    $fecha = $_POST['fecha']; //fecha reserva
    $fechainicio1 = $_POST['inicio']; //inicio subasta
    $fechafin = date('Y-m-d', strtotime($fechainicio1 . ' + 3 days')); //fin subasta
   //////////////////////////////////////////////////
    $idpropiedad = $_GET['idpropiedad'];  //idpropiedad debe ser pasado
  //////////////////////////////////////////////////  
    
    ///diferencia de dias desde hoy hasta la fecha de la subasta
    $hoy=date_create(date('Y-m-d')); //fecha de hoy
    $hasta=date_create($fecha);   



    $fechareserva = date('Y-m-d',strtotime($fecha));
    
    
    
    
    
    $diff=date_diff($hoy,$hasta);
    $fechainicio= date_create($fechainicio1);
    $diffsubasta=date_diff($fechainicio,$hasta);
    $dias = $diff->format('%a');
    $diassubasta = $diffsubasta->format('%a');
    //////CALCULO DE AÑO Y SEMANA DE RESERVA
    $date = new DateTime($_POST['fecha']);
    $semana = $date->format('W');
    $anio = $date->format('Y');

    if(empty($preciobase) or empty($fecha)){
        $errores .= '<li>Por Favor rellene todos los campos</li>';
    }else{

    if (($dias < 365) or ($diassubasta < 182)){
        $errores .= "<li>Fecha de subasta o Reserva incorrecta</li>";
        }else{
            $conexion = conexion();    
            $statement=$conexion->prepare('SELECT * FROM subasta WHERE idpropiedad = :idpropiedad AND semana= :semana AND anio= :anio LIMIT 1' );
            $statement->execute(array(
                ':idpropiedad' => $idpropiedad,
                ':semana' =>$semana,
                ':anio' =>$anio
                ));
            $resultado = $statement->fetch();
            if($resultado != false){
                $errores .= '<li>Propiedad Ya Subastada en esa fecha</li>';
            }
        }
            if ($errores == ''){
                $statement = $conexion->prepare('INSERT INTO subasta (preciobase, fechainicio, fechafin, idpropiedad, semana, anio, fechareserva) 
                VALUES (:preciobase, :fechainicio, :fechafin, :idpropiedad, :semana, :anio, :fechareserva)');
                $statement->execute(array(
                        ':preciobase' => $preciobase,
                        ':fechainicio' => $fechainicio1,
                        ':fechafin' => $fechafin,
                        ':idpropiedad' => $idpropiedad,
                        ':semana' => $semana,
                        ':anio' => $anio,
                        ':fechareserva' =>$fechareserva
                    )); 
                }
            
            }

        }






    

















require 'views/iniciarsub.view.php';






?>


