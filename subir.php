<?php
require 'conexion.php';
$conexion = conexion();

if (!$conexion){
    die();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    $check = @getimagesize ($_FILES['foto']['tmp_name']);
    if ($check){
        $carpeta_destino = 'img/';
        $archivo_subido = $carpeta_destino . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], $archivo_subido);
        $statement = $conexion->prepare('
            INSERT INTO propiedades (provincia, localidad, calle ,numero, foto, descripcion)
            VALUES (:provincia, :localidad, :calle, :numero, :foto, :descripcion)');
        $statement->execute(array(
            ':provincia' => $_POST['provincia'],
            ':localidad' => $_POST['localidad'],
            ':calle' => $_POST['calle'],
            ':numero' => $_POST['numero'],
            ':descripcion' => $_POST['descripcion'],
            ':foto' => $_FILES['foto']['name']
        ));

    }else {
       // $error = "erroress"
    }
}
require 'views/subir.view.php';
?>