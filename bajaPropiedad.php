<?php
 require 'conexion.php';
$conexion = conexion();
<<<<<<< HEAD
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
          
=======

if (!$conexion){
    die();
}
session_start();

if (isset($_SESSION['id'])) {
	if (($_SESSION['administrador'])=='true'){

        $conexion ->query("UPDATE propiedades SET eliminado=1 WHERE id_propiedad=".$_GET['idpropiedad']);
          header('Location:listado.php');
>>>>>>> desarrollo
   }
   else{
   	  
   	  header('Location:detallePropiedad.php?errorI=Debe ser administrador para realizar esta accion');
 	}
}
else{
	
	header('Location:login.php');
}

<<<<<<< HEAD
?>

=======

?>
>>>>>>> desarrollo
