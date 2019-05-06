<?php

function conexion(){
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=HomeSwitchHome', 'root', '');
        return $conexion;
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
}
?> 