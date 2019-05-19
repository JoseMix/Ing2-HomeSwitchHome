<?php
require 'conexion.php';
$conexion = conexion();


if (!$conexion){
    die();
}

$propiedades = $conexion->prepare("SELECT * FROM propiedades WHERE id_propiedad=" .$_GET['idpropiedad']);
$propiedades->execute();
$propiedades = $propiedades->fetch();

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar Propiedad</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/subir.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.12.0/validate.min.js"></script>

</head>
<body>
     <header>
        <div class="container">
            <a href="listado.php"><img src="img/logos/HSH-Complete.svg" class="img-fluid" alt="Logotipo de homeSwitchHome"></a>
            <br><br>  
        </div>
    </header>

<div class="container">
    <form class="formularioSubir" action="guardarCambios.php?idpropiedad=<?php echo $_GET['idpropiedad']?>" class="formulario" method="post" enctype="multipart/form-data" id="formulario"> 
    <h4 class="card-header">Modificar Propiedad</h4> 
    <br><br>

    <label for="nombre">Nombre</label>
    <input class="form-control form-control-lg" type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $propiedades['nombre']?>">
    <br>

    <label for="provincia">Provincia</label>
    <input  class="form-control form-control-lg" type="text" id="provincia" name="provincia" value="<?php echo $propiedades['provincia']?>">
    <br>

    <label for="localidad">Localidad</label>
    <input  class="form-control form-control-lg" type="text" id="localidad" name="localidad" value="<?php echo $propiedades['localidad']?>">
    <br>

    <label for="calle">Calle</label></label>
    <input  class="form-control form-control-lg" type="calle" id="calle" name="calle" value="<?php echo $propiedades['calle']?>">
    <br>

    <label for="numero">Numero</label>
    <input type="text" id="numero" name="numero"  class="form-control form-control-lg" value="<?php echo $propiedades['numero']?>">
    <br>
    
    <label for="descripcion">Descripcion de la Propiedad</label>
    <textarea class="textarea" name="descripcion" id="descripcion" value="<?php echo $propiedades['descripcion']?>" placeholder=""><?php echo $propiedades['descripcion']?></textarea>
    <br><br>

    
    <label for="foto">Selecciona foto de Propiedad</label>
    <br>
    <img src="<?php echo "http://localhost/Ing2-HomeSwitchHome/img/" . $propiedades['foto'];?>" class="imagen">
    <br><br>

    <input src="<?php echo $propiedades['foto'] ?>" type="file" id="foto" name="foto" class="seleccionaFoto">
    


    <br><br>

    <input class="btn_enviar btn btn-info" type="submit" name="" value="Guardar Cambios">       
    <br><br>

    </form>

</div>
<div class="centrar">
        Copyright &copy; 2019 &mdash; Guns 'n Coders 
        <br><br>
</div>

</body>
</html>


