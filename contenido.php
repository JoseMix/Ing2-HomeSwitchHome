<?php session_start();
if (isset($_SESSION['nombre'])){
    require 'views/contenido.view.php';
} else{
    header('Ĺocation: login.php');
}

?>