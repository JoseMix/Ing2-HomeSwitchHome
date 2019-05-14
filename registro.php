<?php session_start();

if (isset($_SESSION['nombre'])){
    header('Location: contenido.php');
}


require 'conexion.php';
$conexion = conexion();

if (!$conexion){
    die();
}



if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre = ltrim(strtoupper($_POST['nombre']));
    $apellido = ltrim(strtoupper($_POST['apellido']));
    $password = ltrim(strtoupper($_POST['password']));
    $password2 = ltrim(strtoupper($_POST['password2']));
    $email = ltrim(strtoupper($_POST['email']));
$errores = '';

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores .= '<li>Formato de Email no valido</li>';
  }

if(empty($nombre) or empty($apellido) or empty($email) or empty($password) or empty($password2)){
    $errores .= '<li>Por Favor rellene todos los campos</li>';
}else {
    $conexion = conexion();    
    $statement=$conexion->prepare('SELECT * FROM clientes WHERE nombre = :nombre AND apellido= :apellido AND email=:email LIMIT 1' );
    $statement->execute(array(
        ':nombre' => $nombre,
        ':apellido' =>$apellido,
        ':email' =>$email    
    ));
    $resultado = $statement->fetch();

    if($resultado != false){
        $errores .= '<li>El nombre de Usuario ya existe</li>';
    }
    $password = hash('sha512', $password);
    $password2 = hash('sha512', $password2);
  
    if($password != $password2){
        $errores .= '<li>Las Contraseñas no son Iguales</li>';
    }
}

    if($errores == ''){
        $statement = $conexion->prepare('INSERT INTO clientes (nombre, apellido, email, contrasena) VALUES (:nombre, :apellido, :email, :contrasena)');
        $statement->execute(array(':nombre' => $nombre,
                                  ':apellido' => $apellido,
                                  ':email' => $email,
                                  ':contrasena' => $password
                                ));
  
    
   
    header('Location: login.php');
    }

}


require 'views/registro.view.php';
?>