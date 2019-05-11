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
            $stm = $conexion -> prepare("SELECT * FROM propiedades WHERE provincia=:provincia AND localidad=:localidad AND calle=:calle AND numero=:numero");
            $stm->execute(array(
            ':provincia' => ltrim(strtoupper($_POST['provincia'])),
            ':localidad' => ltrim(strtoupper($_POST['localidad'])), 
            ':calle' => ltrim(strtoupper($_POST['calle'])),
            ':numero' => ltrim($_POST['numero'])
            ));
             $row = $stm->fetch();
            if($row){
                echo 'existe';
            }else{
                $statement = $conexion->prepare('
                INSERT INTO propiedades (provincia, localidad, calle ,numero, foto, descripcion)
                VALUES (:provincia, :localidad, :calle, :numero, :foto, :descripcion)');
                $statement->execute(array(
                ':provincia' => ltrim(strtoupper($_POST['provincia'])),
                ':localidad' => ltrim(strtoupper($_POST['localidad'])),
                ':calle' =>     ltrim(strtoupper($_POST['calle'])),
                ':numero' =>    ltrim($_POST['numero']),
                ':descripcion' => ltrim(strtoupper($_POST['descripcion'])),
                ':foto' => $_FILES['foto']['name']
            ));
        }


//CAMBIAR _POST A VARIABLES AL INICIO



        

    }else {
       // $error = "erroress"
    }
}

require 'views/subir.view.php';

?>