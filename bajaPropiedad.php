<?php
 require 'conexion.php';
$conexion = conexion();

if (!$conexion){
    die();
}
session_start();

if (isset($_SESSION['id'])) {
	if (($_SESSION['administrador'])=='true'){

        $conexion ->query("UPDATE propiedades SET eliminado=1 WHERE id_propiedad=".$_GET['idpropiedad']);
          header('Location:listado.php');
   }
   else{
   	  
   	  header('Location:detallePropiedad.php?errorI=Debe ser administrador para realizar esta accion');
 	}
}
else{
	
	header('Location:login.php');
}


?>