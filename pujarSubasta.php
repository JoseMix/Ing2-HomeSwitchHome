<?php 
require 'conexion.php';
$conexion = conexion();
$error ='';

if (!$conexion){
    die();
}
session_start();

if (isset($_SESSION['id'])){
	if ($_SESSION['cliente']=='true'){

	  $consul=$conexion -> prepare("SELECT * FROM subasta WHERE idsubasta=".$_GET['ids']);
	  $consul->execute();
	  $consul=$consul -> fetch();
	  $preciobase=$consul['preciobase'];
   $consulta= $conexion -> query("SELECT credito FROM clientes WHERE id_cliente=".$_SESSION['id']);
      $row=$consulta -> fetch();

      $puja=$conexion -> query("SELECT * FROM pujas WHERE idcliente=".$_SESSION['id']." AND idsubasta=".$_GET['ids']);

      $hizopuja=$puja -> fetch();


      if ($row['credito'] >0 ) {
      	if ($_POST['monto'] < $preciobase){
      		$error.='<li> Debe ingresar un monto mayor al precio base </li>';
      		header('Location:pujarSubasta.php');
      	}
   	    if ($hizopuja){ 
           $conexion->query("INSERT into pujas ( preciopuja, idcliente, idsubasta) values (".$_POST['monto'] .",".$_SESSION['id'].",".$_GET['ids'].")");
          }
        else{
         $conexion->query("UPDATE pujas SET preciopuja=".$_POST['monto']."WHERE idsubasta=".$_GET['ids']." AND idcliente=".$_SESSION['id']);
       }

      }
      else{
         $error .='<li>No posee creditos para participar de la subasta</li>';
      }
   }
   else{
     	//no es un cliente no puede pujar
     }
  }
else{
	header('Location:login.php');
}
 require 'views/pujarSubasta.view.php'



 ?>