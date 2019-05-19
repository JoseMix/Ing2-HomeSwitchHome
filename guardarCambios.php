<?php 
require 'conexion.php';
$conexion = conexion();



if (!$conexion){
    die();
}


$id= $_GET['idpropiedad'];

//Consulta para Modificar una propiedad

$statement = $conexion->prepare('UPDATE propiedades SET provincia= :provincia , localidad= :localidad, calle= :calle ,numero= :numero, foto= :foto, descripcion= :descripcion WHERE id_propiedad='.$id);
                $statement->execute(array(
                ':provincia' => ltrim(strtoupper($_POST['provincia'])),
                ':localidad' => ltrim(strtoupper($_POST['localidad'])),
                ':calle' =>     ltrim(strtoupper($_POST['calle'])),
                ':numero' =>    ltrim($_POST['numero']),
                ':descripcion' => ltrim(strtoupper($_POST['descripcion'])),
                ':foto' => $_FILES['foto']['name']
            ));
header("Location:detallePropiedad.php?idpropiedad=$id")
?>