<?php
 require 'conexion.php';
$conexion = conexion();
if (!$conexion){
    die();
}

//propiedad pasada desde detalle
$propiedad = ($_GET['idpropiedad']); 

session_start();
if (isset($_SESSION['nombre'])) {
	if (($_SESSION['administrador'])=='true'){
    echo print_r($_GET['idpropiedad']);    
    $conexion ->query("UPDATE propiedades SET eliminado=1 WHERE id_propiedad=$propiedad");
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

