
<?php session_start();

if (isset($_SESSION['nombre'])){
    header('Location: contenido.php');
}
require 'conexion.php';
$conexion = conexion();  
$errores ='';



if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = filter_var(ltrim(strtoupper($_POST['email'])), FILTER_SANITIZE_EMAIL);
    $password = ($_POST['password']);
    

    if(empty($email) or empty($password)){
        $errores .= '<li>Por Favor rellene todos los campos</li>';
    }else {
       $statement=$conexion->prepare('SELECT * FROM administradores WHERE email = :email AND contrasena = :contrasena');
           $statement->execute(array(
              ':email' => $email,
              ':contrasena' => $password
            ));
           $administrador = $statement->fetch(); 
    
           if($administrador !== false){
              $_SESSION['nombre'] = $administrador['nombre'];
              $_SESSION['id']= $administrador['id_administrador'];
              $_SESSION['administrador']="true";
              $_SESSION['cliente']="false";
           //$nombre = $resultado['nombre']; 
              header('Location: contenido.php');
            }
            else{
                 $statement=$conexion->prepare('SELECT * FROM clientes WHERE email = :email AND contrasena = :contrasena');
                 $statement->execute(array(
               ':email' => $email,
               ':contrasena' =>$password
        
                ));

                $cliente = $statement->fetch(); 
             if($cliente !== false){
                $_SESSION['nombre'] = $cliente['nombre'];
                $_SESSION['id']= $cliente['id_cliente'];
                $_SESSION['cliente']="true";
                $_SESSION['administrador']="false";
              //$nombre = $resultado['nombre']; 
               header('Location: contenido.php');
             }
            else{
               $errores .='<li>E-mail o contraseña erroneos</li>';
              //echo $administrador;
           }
         }
     }

            
     }


require 'views/login.view.php';


?>