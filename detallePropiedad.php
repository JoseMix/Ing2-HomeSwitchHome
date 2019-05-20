<?php
session_start();
require 'conexion.php';
$conexion = conexion();

//print_r($_SESSION);
if (!$conexion){
    die();
}

$id= $_GET['idpropiedad'];
$propiedades = $conexion->prepare("SELECT * FROM propiedades WHERE id_propiedad=" .$id);
$propiedades->execute();
$propiedades = $propiedades->fetch();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Detalle de la Propiedad</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">

        <!-- Error para cuando se trata de acceder por el link (le sirve a daniela)-->
        <?php 
        if (empty($_GET['errorI'])) {
             $errorI=" ";
         } else{
            $errorI=$_GET['errorI'];
         }
         echo $errorI;
        ?>

        <header>
        <a href="listado.php"><img src="img/logos/HSH-Complete.svg" class="img-fluid" alt="Logotipo de homeSwitchHome"></a>
        <br><br>
        </header>
        <div class="card">
            <div class="card-body">


                <div class="">
            
                 <img src="<?php echo "http://localhost/Ing2-HomeSwitchHome/img/" . $propiedades['foto'];?>" class="imagen" alt="">

                 <br><br>
                 <p class="text-info">Nombre: <?php echo $propiedades['nombre']?></p>
                 <p class="text-info">Provincia: <?php echo $propiedades['provincia']?></p>
                 <p class="text-info">Localidad: <?php echo $propiedades['localidad']?></p>
                 <p class="text-info">Calle: <?php echo $propiedades['calle']?> Numero: <?php echo $propiedades['numero']?></p>
                 <p class="text-info"></p>
                 <p class="text-info">Descripcion: <?php echo $propiedades['descripcion']?></p>
                 </div>
                <!-- modifique el if con un isset para que funcione -->
                <?php if ($_SESSION['administrador']=='true'): ?>
                
                    <a  class="btn btn-info" href="iniciarsub.php?idpropiedad=<?php echo $propiedades['id_propiedad']?>">Iniciar Subasta</a> 

                    <a class="btn btn-primary" href="modificarPropiedad.php?idpropiedad=<?php echo $propiedades['id_propiedad']?>">Modificar Propiedad</a>
                    
                    <a class="btn btn-secondary" href="bajaPropiedad.php?idpropiedad=<?php echo $propiedades['id_propiedad']?>">Eliminar Propiedad</a>
                    <a  class="btn btn-dark" href="listado.php">Volver al Inicio</a>
                 <?php else : 
                   
    $diaActual=date('Y-m-d');
     
    $existesubasta= $conexion-> query("SELECT * FROM subasta WHERE idpropiedad=".$_GET['idpropiedad']." AND '$diaActual' BETWEEN fechaInicio AND fechafin ");
    $existesubasta= $existesubasta -> fetch();
    
    if ($existesubasta !== false ){ ?>
                    
                 <a class="btn btn-primary" href="subastasPropiedad.php?idpropiedad=<?php echo $propiedades['id_propiedad'] ?>">Pujar por esta propiedad</a>
             <?php } ?>
                 <a  class="btn btn-dark" href="listado.php">Volver al Inicio</a>
               
                <?php endif; ?>
    
            </div>
  
        </div>
    
        <div class="centrar">
            <h4 class="card-header">Copyright &copy; 2019 &mdash; Guns 'n Coders</h4> 
            <br><br>
        </div>
</body>
</html>

