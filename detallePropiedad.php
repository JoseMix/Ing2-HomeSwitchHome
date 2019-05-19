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


        <a href="listado.php"><img src="img/logos/HSH-Complete.svg" class="img-fluid" alt="Logotipo de homeSwitchHome"></a>
        <br><br>
    
        <div class="card">
            <div class="card-body">


                
            
                 <img src="<?php echo "http://localhost/Ing2-HomeSwitchHome/img/" . $propiedades['foto'];?>" class="imagen" alt="">

                 <br><br>
                 <h5 class="text-info">Nombre: <?php echo $propiedades['nombre']?></h5>
                 <p class="text-info">Provincia: <?php echo $propiedades['provincia']?></p>
                 <p class="text-info">Localidad: <?php echo $propiedades['localidad']?></p>
                 <p class="text-info">Calle: <?php echo $propiedades['calle']?> Numero: <?php echo $propiedades['numero']?></p>
                 <p class="text-info"></p>
                 <p class="text-info">Descripcion: <?php echo $propiedades['descripcion']?></p>
                <!-- No se si funciona porque tengo el login viejo (deberia andar) -->
                <?php if (isset($_SESSION['administrador'])): ?>
               
                    <a  class="btn btn-info" href="iniciarsub.php?idpropiedad=<?php echo $propiedades['id_propiedad']?>">Iniciar Subasta</a> 

                    <a class="btn btn-warning" href="modificarPropiedad.php?idpropiedad=<?php echo $propiedades['id_propiedad']?>">Modificar Propiedad</a>
                    
                    <a class="btn btn-danger" href="bajaPropiedad.php?idpropiedad=<?php echo $propiedades['id_propiedad']?>">Eliminar Propiedad</a>
                
                 <?php else : ?>
               

                 <a class="btn btn-success" href="pujarSubasta.php?idpropiedad=<?php echo $propiedades['id_propiedad']?>">Pujar por esta propiedad</a>
               
                <?php endif; ?>
    
            </div>
  
        </div>
    
    <div class="centrar">
        Copyright &copy; 2019 &mdash; Guns 'n Coders 
    </div>
</body>
</html>

