<?php session_start();
if (isset($_SESSION['nombre'])){
    header('Location: contenido.php');
} else {
    header('Location: login.php');

}
?> 