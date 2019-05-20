<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subastas Activas</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    
</head>
<?php
  include_once 'conexion.php';
   $conexion= conexion();
   if (!$conexion){
    die();
  }
?>
<body>
      <header>
      <a href="listado.php"><img src="img/logos/HSH-Complete.svg" class="img-fluid" alt="Logotipo de homeSwitchHome"></a>
      <br><br>
    </header>
 
    <div class=" ">

    <h4 class="card-header" >Subastas Activas </h4>
    <br><br>
   
    
      <?php 
   

    $diaActual=date('Y-m-d');
     
    $existesubasta= $conexion-> query("SELECT * FROM subasta WHERE idpropiedad=".$_GET['idpropiedad']." AND '$diaActual' BETWEEN fechaInicio AND fechafin ");
   
    
   while ($subasta= $existesubasta-> fetch()) { ?>

    <div class="centrar">
     <h3>Subasta de la semana : <?php echo $subasta['semana'] ?></h3>
     <a class="btn btn-primary" href="pujar.php?idsub=<?php echo $subasta['idsubasta'] ?>&idpropiedad=<?php echo $_GET['idpropiedad'] ?>"> Ir a Ofertar</a>
     
    <?php } ?>
    <a class="btn btn-dark" href="detallePropiedad.php?idpropiedad=<?php echo $_GET['idpropiedad'] ?>">Volver al detalle</a>
    </div>
    
    
    
    </div>
        <div class="centrar">
            <br><br>
            <h4 class="card-header">Copyright &copy; 2019 &mdash; Guns 'n Coders</h4> 
            <br><br>
        </div>

</body>
</html>