<?php session_start();
if (isset($_SESSION['nombre'])){
    header('Location: contenido.php');
}
require 'conexion.php';
$errores ='';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = filter_var(ltrim(strtoupper($_POST['email'])), FILTER_SANITIZE_EMAIL);
    $password = ($_POST['password']);
  //  $password = hash('sha512', $password);
    if(empty($email) or empty($password)){
        $errores .= '<li>Por Favor rellene todos los campos</li>';
    }else {
        $conexion = conexion();    
        $statement=$conexion->prepare('SELECT * FROM administradores WHERE email = :email AND contrasena = :contrasena');
        $statement->execute(array(
            ':email' => $email,
            ':contrasena' =>$password
        
        ));
        $resultado = $statement->fetch(); 
        if($resultado !== false){
            $_SESSION['nombre'] = $resultado['nombre'];
            $_SESSION['id']= $resultado['id_administrador'];
            $_SESSION['administrador']="true";
            $_SESSION['cliente']="false";
           //$nombre = $resultado['nombre']; 
           header('Location: panelControlAdmin.php');
           
        }else{
            $conexion = conexion();    
            $statement=$conexion->prepare('SELECT * FROM clientes WHERE email = :email AND contrasena = :contrasena');
            $statement->execute(array(
                ':email' => $email,
                ':contrasena' =>$password
            ));
            $resultado = $statement->fetch();
            if($resultado !== false){
                $_SESSION['nombre'] = $resultado['nombre'];
                $_SESSION['id']= $resultado['id_cliente'];
                $_SESSION['cliente']="true";
                $_SESSION['administrador']="false";
              //$nombre = $resultado['nombre']; 
                //$nombre = $resultado['nombre']; 
                header('Location: listado.php'); 
            }else{
                $errores .='<li>E-mail o contraseña erroneos</li>';
        }
     }
    }
}
require 'views/login.view.php';
?>