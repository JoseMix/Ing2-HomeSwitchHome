<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subastas Activas</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<?php
  include_once 'conexion.php';
   $conexion= conexion();
   if (!$conexion){
    die();
  }
?>
<body>
  <a href="detallePropiedad.php?idpropiedad=<?php echo $_GET['idpropiedad'] ?>">Volver al detalle</a>
    <div class=" ">

    <h1>Subastas Activas </h1>
   
    <section class=" ">
      <?php 
   

    $diaActual=date('Y-m-d');
     
    $existesubasta= $conexion-> query("SELECT * FROM subasta WHERE idpropiedad=".$_GET['idpropiedad']." AND '$diaActual' BETWEEN fechaInicio AND fechafin ");
   
    
   while ($subasta= $existesubasta-> fetch()) { ?>
     <h3>Subasta de la semana : <?php echo $subasta['semana'] ?></h3>
     <a href="pujar.php?idsub=<?php echo $subasta['idsubasta'] ?>&idpropiedad=<?php echo $_GET['idpropiedad'] ?>"> Pujar</a>
    <?php } ?>
    </section>
    
    
    </div>
</body>
</html>